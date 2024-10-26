<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSelfEmploymentFieldsToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->string('self_employed_skills')->nullable();
            $table->json('business_type')->nullable();
        });
    }

    public function down()
{
    Schema::table('user__details', function (Blueprint $table) {
        if (Schema::hasColumn('user__details', 'self_employed_skills')) {
            $table->dropColumn('self_employed_skills');
        }
        if (Schema::hasColumn('user__details', 'business_type')) {
            $table->dropColumn('business_type');
        }
    });
}
}
