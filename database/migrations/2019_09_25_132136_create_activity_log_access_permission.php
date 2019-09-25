<?php

use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLogAccessPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissionId = DB::table('permissions')->insertGetId([
            'name'         => 'activity-log.access',
            'display_name' => '查看活動紀錄',
            'description'  => '查看網站各類型活動紀錄',
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
        DB::table('permissions')->where('name', 'activity-log.access')->delete();
    }
}
