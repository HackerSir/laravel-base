<?php

use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateMenuViewPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionId = DB::table('permissions')->insertGetId([
            'name'         => 'menu.view',
            'display_name' => '顯示管理選單',
            'description'  => '顯示所有網站管理用的選單',
        ]);
        $admin = Role::whereName('Admin')->first();
        $admin->attachPermission(['id' => $permissionId]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('permissions')->where('name', 'menu.view')->delete();
    }
}
