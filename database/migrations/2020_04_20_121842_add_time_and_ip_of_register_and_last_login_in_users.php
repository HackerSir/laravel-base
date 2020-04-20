<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTimeAndIpOfRegisterAndLastLoginInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('register_at')->nullable()->comment('註冊時間')->after('password');
            $table->string('register_ip')->nullable()->comment('註冊IP')->after('register_at');
            $table->timestamp('last_login_at')->nullable()->comment('最後登入時間')->after('register_ip');
            $table->string('last_login_ip')->nullable()->comment('最後登入IP')->after('last_login_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('register_at');
            $table->dropColumn('register_ip');
            $table->dropColumn('last_login_at');
            $table->dropColumn('last_login_ip');
        });
    }
}
