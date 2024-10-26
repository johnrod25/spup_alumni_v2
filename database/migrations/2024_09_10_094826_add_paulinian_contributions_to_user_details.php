<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaulinianContributionsToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->string('paulinian_relevance')->nullable();
            $table->string('recommend_spup')->nullable();
            $table->string('recommend_spup_reason')->nullable();
            $table->json('well_being')->nullable();
            $table->string('well_being_other')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('paulinian_relevance');
            $table->dropColumn('recommend_spup');
            $table->dropColumn('recommend_spup_reason');
            $table->dropColumn('well_being');
            $table->dropColumn('well_being_other');
        });
    }
}
