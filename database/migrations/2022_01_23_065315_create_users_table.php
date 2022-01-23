<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('contact_no')->nullable(true);
            $table->string('institute')->nullable(true);
            $table->string('department')->nullable(true);
            $table->string('first_manager')->nullable(true);
            $table->string('second_manager')->nullable(true);
            $table->float('leave_balance',5,1);
            $table->integer('admin_rights');
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
        Schema::dropIfExists('users');
    }
}
