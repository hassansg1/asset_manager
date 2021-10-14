<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworkAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network_assets', function (Blueprint $table) {
            $table->id();
            $table->string('rec_id', 255)->unique();
            $table->string('name', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('function')->nullable();
            $table->integer('make')->nullable();
            $table->string('model')->nullable();
            $table->string('part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('security_zone')->nullable();
            $table->string('asset_firmware')->nullable();
            $table->string('redundant_pair_id')->nullable();
            $table->string('comments')->nullable();
            $table->string('column1')->nullable();
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
        Schema::dropIfExists('network_assets');
    }
}
