<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('parentable_type')->nullable();
            $table->integer('parentable_id')->nullable();
            $table->string('short_name', 255)->nullable();
            $table->string('long_name', 255)->nullable();
            $table->string('code', 25)->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->string('ot_apn', 255)->nullable();
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
        Schema::dropIfExists('0501_units');
    }
}
