<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoftwareComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_components', function (Blueprint $table) {
            $table->id();
            $table->integer('software_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('version', 255)->nullable();
            $table->string('description', 255)->nullable();
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
        Schema::dropIfExists('software_components');
    }
}
