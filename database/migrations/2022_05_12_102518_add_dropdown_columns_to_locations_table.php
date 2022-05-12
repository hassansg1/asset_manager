<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDropdownColumnsToLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->tinyInteger('criticality')->nullable();
            $table->tinyInteger('single_point_of_failure')->nullable();
            $table->tinyInteger('hardware_legacy')->nullable();
            $table->tinyInteger('software_legacy')->nullable();
            $table->string('process')->nullable();
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
