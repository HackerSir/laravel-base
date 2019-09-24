<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permission = Permission::create([
            'name'         => 'user.manage',
            'display_name' => '管理會員',
            'description'  => '修改會員資料、調整會員權限、刪除會員等',
        ]);
        /* @var Role $admin */
        $admin = Role::where('name', 'Admin')->first();
        $admin->attachPermission($permission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::where('name', 'user.manage')->delete();
    }
}
