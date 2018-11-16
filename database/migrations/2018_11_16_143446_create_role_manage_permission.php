<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateRoleManagePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permRoleManage = Permission::create([
            'name'         => 'role.manage',
            'display_name' => '管理角色',
            'description'  => '新增、修改、刪除角色',
        ]);

        /* @var Role $admin */
        $admin = Role::where('name', 'Admin')->first();
        $admin->attachPermission($permRoleManage);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down()
    {
        Permission::where('name', 'role.manage')->delete();
    }
}
