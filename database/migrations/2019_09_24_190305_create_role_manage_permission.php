<?php

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
        $permissionId = DB::table('permissions')->insertGetId([
            'name'         => 'role.manage',
            'display_name' => '管理角色',
            'description'  => '新增、修改、刪除角色',
        ]);
        /* @var Role $admin */
        $admin = Role::where('name', 'Admin')->first();
        $admin->attachPermission(['id' => $permissionId]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'role.manage')->delete();
    }
}
