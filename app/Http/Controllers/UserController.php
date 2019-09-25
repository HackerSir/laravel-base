<?php

namespace App\Http\Controllers;

use App\DataTables\Scopes\UserRoleScope;
use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param UserDataTable $dataTable
     * @return \Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function index(UserDataTable $dataTable)
    {
        //過濾器
        if (!request()->ajax()) {
            /** @var Collection|Role[] $roles */
            $roles = Role::withCount('users')->get();
            $roleNameOptions = [null => ''];
            foreach ($roles as $role) {
                $roleNameOptions[$role->name] = $role->display_name . ' (' . $role->users_count . ')';
            }
            view()->share(compact('roleNameOptions'));
        }
        //過濾
        if ($selectedRole = Role::whereName(request('role'))->first()) {
            $dataTable->addScope(new UserRoleScope($selectedRole));
        }

        return $dataTable->render('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::create(array_merge($request->only('email', 'name'), [
            'password' => bcrypt($request->get('new_password')),
        ]));

        //權限
        $user->roles()->sync($request->input('role'));

        return redirect()->route('user.index')->with('success', '會員已建立');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //清除 Laratrust 的 Cache，避免干擾表單
        \Cache::forget('laratrust_roles_for_user_' . $user->getAttribute($user->getKeyName()));
        $roles = Role::all();

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $updateData = $request->only('name');
        //修改密碼
        if ($newPassword = $request->get('new_password')) {
            $updateData['password'] = bcrypt($newPassword);
        }
        $user->update($updateData);
        //管理員禁止去除自己的管理員職務
        $keepAdmin = false;
        if ($user->id == auth()->user()->id) {
            $keepAdmin = true;
        }
        //權限
        $user->roles()->sync($request->input('role'));
        //加回管理員
        if ($keepAdmin) {
            $admin = Role::where('name', '=', 'Admin')->first();
            $user->attachRole($admin);
        }

        return redirect()->route('user.show', $user)
            ->with('success', '資料修改完成。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if ($user->hasRole('Admin')) {
            return redirect()->route('user.show', $user)
                ->with('warning', '無法刪除管理員，請先解除管理員角色。');
        }
        $user->delete();

        return redirect()->route('user.index')
            ->with('success', '會員已刪除。');
    }
}
