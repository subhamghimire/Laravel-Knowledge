<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name');
            $table->string('avatar');
            $table->unsignedSmallInteger('user_role')->comment('1 for admin, 2 for user');
            $table->dateTime('registered_at');
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
            $table->dropColumn('user_name');
            $table->dropColumn('avatar');
            $table->dropColumn('user_role');
            $table->dropColumn('registered_at');
        });
    }
}
