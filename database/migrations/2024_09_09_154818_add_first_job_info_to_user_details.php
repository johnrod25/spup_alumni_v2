<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFirstJobInfoToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->string('first_job_duration')->nullable();
            $table->string('first_job_duration_other')->nullable();
            $table->json('job_finding_method')->nullable();
            $table->string('job_finding_method_other')->nullable();
            $table->string('time_to_first_job')->nullable();
            $table->string('time_to_first_job_other')->nullable();
            $table->string('curriculum_relevance')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('first_job_duration');
            $table->dropColumn('first_job_duration_other');
            $table->dropColumn('job_finding_method');
            $table->dropColumn('job_finding_method_other');
            $table->dropColumn('time_to_first_job');
            $table->dropColumn('time_to_first_job_other');
            $table->dropColumn('curriculum_relevance');
        });
    }
}
