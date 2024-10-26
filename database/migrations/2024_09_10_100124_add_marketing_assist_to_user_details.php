<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMarketingAssistToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->json('marketing_assist')->nullable();
            $table->string('marketing_assist_other')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('marketing_assist');
            $table->dropColumn('marketing_assist_other');
        });
    }
}
