<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::with('roles')->get();

        return view('role.index', compact(['roles', 'permissions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('role.create-or-edit', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required|unique:roles,name',
            'display_name' => 'required',
            'permissions'  => 'array',
        ]);

        $role = Role::create([
            'name'         => $request->get('name'),
            'display_name' => $request->get('display_name'),
            'description'  => $request->get('description'),
            'protection'   => false,
        ]);
        //TODO: 避免具備保護屬性的權限被賦予或撤銷
        $role->perms()->sync($request->get('permissions') ?: []);

        return redirect()->route('role.index')->with('global', '角色已建立');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('role.create-or-edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name'         => 'required|unique:roles,name,' . $role->id . ',id',
            'display_name' => 'required',
            'permissions'  => 'array',
        ]);

        //TODO: 避免具備保護屬性的權限被賦予或撤銷
        if ($role->protection) {
            $role->update([
                'display_name' => $request->get('display_name'),
                'description'  => $request->get('description'),
            ]);
        } else {
            $role->update([
                'name'         => $request->get('name'),
                'display_name' => $request->get('display_name'),
                'description'  => $request->get('description'),
            ]);
            $role->perms()->sync($request->get('permissions') ?: []);
        }

        return redirect()->route('role.index')->with('global', '角色已更新');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if ($role->protection) {
            return back()->with('warning', '無法刪除受保護角色');
        }
        $role->delete();

        return redirect()->route('role.index')->with('global', '角色已刪除');
    }
}
