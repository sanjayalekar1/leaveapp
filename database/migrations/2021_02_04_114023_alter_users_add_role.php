<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersAddRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->default(1)->after('password');
            $table->biginteger('phone')->default(1)->after('role_id');
            $table->string('hire_date')->default(1)->after('phone');
            $table->integer('hr_id')->default(1)->after('hire_date');
            $table->integer('balance_leave')->default(1)->after('hr_id');
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
            $table->dropColumn('role_id');
            $table->dropColumn('phone');
            $table->dropColumn('hire_date');
            $table->dropColumn('hr_id');
            $table->dropColumn('balance_leave');
        });
    }
}
