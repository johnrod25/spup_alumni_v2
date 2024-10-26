<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDegreesTable extends Migration
{
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Add other fields as necessary
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}



