<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('user__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->string('name');
            $table->string('current_position')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('mobile_number');
            $table->string('email');
            $table->string('gender');
            $table->string('age');
            $table->string('civil_status');
            $table->string('degree')->nullable();
            $table->string('college')->nullable();
            $table->string('year_graduated')->nullable();
            $table->string('awards')->nullable();
            $table->string('exams')->nullable();
            $table->string('exam_name')->nullable();
            $table->string('exam_date')->nullable();
            $table->string('exam_rating')->nullable();
            $table->string('training')->nullable();
            $table->string('employed')->nullable();
            $table->string('organization')->nullable();
            $table->string('address')->nullable();
            $table->string('place_of_work')->nullable();
            $table->string('organization_type')->nullable();
            $table->string('occupation')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('monthly_income')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user__details');
    }
}

