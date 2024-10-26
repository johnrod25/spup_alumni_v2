<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobInformationToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->enum('first_job', ['Yes', 'No'])->nullable();
            $table->integer('previous_jobs_count')->nullable();
            $table->string('first_job_level')->nullable();
            $table->string('current_job_level')->nullable();
            $table->json('job_acceptance_reasons')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('first_job');
            $table->dropColumn('previous_jobs_count');
            $table->dropColumn('first_job_level');
            $table->dropColumn('current_job_level');
            $table->dropColumn('job_acceptance_reasons');
        });
    }
}
