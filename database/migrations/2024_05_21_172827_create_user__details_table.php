<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__details', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('student_number');
            $table->string('email');
            // $table->string('password');
            $table->string('phone_number');
            $table->string('home_address');
            $table->date('birthdate');
            $table->string('degree');
            $table->string('batch');
            $table->date('year_graduated');
            $table->string('company_name');
            $table->string('specialization');
            $table->string('occupation');
            $table->string('work_status');
            $table->string('before_employed');

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
        Schema::dropIfExists('user__details');
    }
};
