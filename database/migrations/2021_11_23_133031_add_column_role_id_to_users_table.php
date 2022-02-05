<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')-> after('password') -> nullable();
            $table->index('role_id', 'user_role_id');       
            $table->foreign('role_id', 'user_role_fk') -> on('users') -> references('id');
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
            $table->dropForeign('user_role_fk');
            $table->dropIndex('user_role_id');
            $table->dropColumn('role_id');
        });
    }
}
