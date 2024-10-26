<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSpupInvolvementToUserDetails extends Migration
{
    public function up()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->json('spup_involvement')->nullable();
            $table->string('spup_involvement_other')->nullable();
        });
    }

    public function down()
    {
        Schema::table('user__details', function (Blueprint $table) {
            $table->dropColumn('spup_involvement');
            $table->dropColumn('spup_involvement_other');
        });
    }
}
