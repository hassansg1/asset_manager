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
            $table->string('rec_id', 25)->unique();
            $table->string('name', 255);
            $table->string('arabic_name', 255)->nullable();
            $table->text('description')->nullable();
            $table->text('descriptive_location')->nullable();
            $table->text('location_dec_coordinate')->nullable();
            $table->text('location_deg_coordinate')->nullable();
            $table->text('location_google_link')->nullable();
            $table->text('main_process_equipment')->nullable();
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
