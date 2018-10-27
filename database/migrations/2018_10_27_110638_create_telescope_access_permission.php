<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateTelescopeAccessPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permission = Permission::create([
            'name'         => 'telescope.access',
            'display_name' => '存取 Laravel Telescope',
            'description'  => '進入 Laravel Telescope 查看各種監控資訊',
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
        Permission::whereName('telescope.access')->delete();
    }
}
