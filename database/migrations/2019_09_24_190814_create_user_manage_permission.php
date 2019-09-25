<?php

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
        $permissionId = DB::table('permissions')->insertGetId([
            'name'         => 'user.manage',
            'display_name' => '管理會員',
            'description'  => '修改會員資料、調整會員權限、刪除會員等',
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
        DB::table('permissions')->where('name', 'user.manage')->delete();
    }
}
