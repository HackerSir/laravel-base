<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateLogViewerAccessPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permLogViewerAccess = Permission::create([
            'name'         => 'log-viewer.access',
            'display_name' => '進入 Log Viewer 面板',
            'description'  => '進入 Log Viewer 面板，對網站記錄進行查詢與管理',
        ]);
        /* @var Role $admin */
        $admin = Role::where('name', 'Admin')->first();
        $admin->attachPermission($permLogViewerAccess);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * @throws Exception
     */
    public function down()
    {
        Permission::where('name', 'log-viewer.access')->delete();
    }
}
