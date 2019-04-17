<?php

use App\Permission;
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
        $permission = Permission::create([
            'name'         => 'menu.view',
            'display_name' => '顯示管理選單',
            'description'  => '顯示所有網站管理用的選單',
        ]);
        $admin = Role::whereName('Admin')->first();
        $admin->attachPermission($permission);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down()
    {
        Permission::whereName('menu.view')->delete();
    }
}
