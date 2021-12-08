<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();
            $table->string('rec_id',255);
            $table->string('type',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('short_name', 255)->nullable();
            $table->string('long_name', 255)->nullable();
            $table->string('arabic_name', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->text('descriptive_location')->nullable();
            $table->text('location_dec_coordinate')->nullable();
            $table->text('location_deg_coordinate')->nullable();
            $table->text('location_google_link')->nullable();
            $table->text('main_process_equipment')->nullable();
            $table->string('function')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('vm_host')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('connected_scada_server')->nullable();
            $table->string('contact')->nullable();
            $table->string('firmware')->nullable();
            $table->string('redundant_pair_id')->nullable();
            $table->string('security_zone')->nullable();
            $table->string('asset_firmware')->nullable();
            $table->string('comment')->nullable();
            $table->string('asset_contact_person')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('asset_parent_code')->nullable();
            $table->string('owner_contact')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
