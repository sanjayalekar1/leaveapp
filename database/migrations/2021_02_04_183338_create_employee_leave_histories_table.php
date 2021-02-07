<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_histories', function (Blueprint $table) {
            $table->increments('leave_id');
            $table->integer('emp_id');
            $table->string('leave_start_date');
            $table->string('leave_end_date');
            $table->integer('no_of_days');
            $table->integer('leave_type');
            $table->string('reason')->nullable();
            $table->integer('is_approved')->default(0);
            $table->string('remark')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_leave_histories');
    }
}
