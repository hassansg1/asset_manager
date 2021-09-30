<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parentables', function (Blueprint $table) {
            $table->id();
            $table->string('parentable_type',255)->nullable()->default(null);
            $table->integer('parentable_id')->nullable()->default(null);
            $table->string('childable_type',255)->nullable()->default(null);
            $table->integer('childable_id')->nullable()->default(null);
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
        Schema::dropIfExists('parentables');
    }
}
