<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalExamsTable extends Migration
{
    public function up()
    {
        Schema::create('professional_exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_details_id'); // Foreign key
            $table->string('exam_name');
            $table->date('exam_date')->nullable();
            $table->string('exam_rating')->nullable();
            $table->timestamps();

            $table->foreign('user_details_id')->references('id')->on('user__details')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('professional_exams');
    }
}
