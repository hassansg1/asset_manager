<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClauseDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clause_data', function (Blueprint $table) {
            $table->id();
            $table->integer('clause_id');
            $table->integer('standard_id');
            $table->string('applicable', 255)->nullable();
            $table->string('criteria', 255)->nullable();
            $table->string('location', 255)->nullable();
            $table->string('reason', 255)->nullable();
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
        Schema::dropIfExists('clause_date');
    }
}
