<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputerAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computer_assets', function (Blueprint $table) {
            $table->id();
            $table->string('parentable_type')->nullable();
            $table->integer('parentable_id')->nullable();
            $table->string('code',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('description',255)->nullable();
            $table->integer('function')->nullable();
            $table->integer('make')->nullable();
            $table->string('model')->nullable();
            $table->string('part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('security_zone')->nullable();
            $table->string('client_description')->nullable();
            $table->string('vm_host')->nullable();
            $table->integer('operating_system')->nullable();
            $table->string('connected_scada_server')->nullable();
            $table->string('contact')->nullable();
            $table->string('source_file')->nullable();
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
        Schema::dropIfExists('computer_assets');
    }
}
