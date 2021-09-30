<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sites', function (Blueprint $table) {
            $table->id();
            $table->string('parentable_type')->nullable();
            $table->integer('parentable_id')->nullable();
            $table->string('name', 255);
            $table->string('arabic_name', 255)->nullable();
            $table->string('code', 25)->nullable();
            $table->string('existing_code', 25)->nullable();
            $table->text('descriptive_location')->nullable();
            $table->text('location_dec_coordinate')->nullable();
            $table->text('location_deg_coordinate')->nullable();
            $table->text('location_google_link')->nullable();
            $table->string('remote_site', 255)->nullable();
            $table->string('operator_control_center_site', 255)->nullable();
            $table->string('local_scada_site', 255)->nullable();
            $table->string('central_scada_site', 255)->nullable();
            $table->string('function', 255)->nullable();
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
        Schema::dropIfExists('sub_site');
    }
}
