<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompetenciesAndDifficultiesToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->json('useful_competencies')->nullable();
            $table->string('useful_competencies_other')->nullable();
            $table->json('job_difficulties')->nullable();
            $table->string('job_difficulties_other')->nullable();
            $table->string('time_to_find_job')->nullable();
            $table->string('time_to_find_job_other')->nullable();
            $table->json('waiting_time_reasons')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('useful_competencies');
            $table->dropColumn('useful_competencies_other');
            $table->dropColumn('job_difficulties');
            $table->dropColumn('job_difficulties_other');
            $table->dropColumn('time_to_find_job');
            $table->dropColumn('time_to_find_job_other');
            $table->dropColumn('waiting_time_reasons');
        });
    }
}
