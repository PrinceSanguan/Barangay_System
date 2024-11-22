<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPositioninFamilyToBrgyInhabitants extends Migration
{
    public function up()
    {
        Schema::table('brgy_inhabitants', function (Blueprint $table) {
            $table->string('positioninFamily')->nullable()->after('civilstatus');
        });
    }

    public function down()
    {
        Schema::table('brgy_inhabitants', function (Blueprint $table) {
            $table->dropColumn('positioninFamily');
        });
    }
}
