<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRequiredColumnsToLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->integer('parent_asset_id')->nullable();
            $table->string('sim_ssid')->nullable();
            $table->string('sim_imsi')->nullable();
            $table->string('sim_misisdn')->nullable();
            $table->string('communication_type')->nullable();
            $table->boolean('controll')->nullable();
            $table->string('impact_of_equipment')->nullable();
            $table->string('connected_site')->nullable();
            $table->string('ot_apn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            //
        });
    }
}
