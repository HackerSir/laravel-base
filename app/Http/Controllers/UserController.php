<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Role;
use App\User;

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
        return $dataTable->render('user.index');
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
        $user->update($request->only('name'));
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
