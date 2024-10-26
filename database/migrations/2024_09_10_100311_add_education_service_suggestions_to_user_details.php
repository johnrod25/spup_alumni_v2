<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationServiceSuggestionsToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->text('education_service_suggestions')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('education_service_suggestions');
        });
    }
}

