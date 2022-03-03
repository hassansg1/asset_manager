<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardClausesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standard_clauses', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();
            $table->integer('standard_id');
            $table->string('number',255)->nullable();
            $table->string('short_number',20)->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->string('applicable', 255)->nullable();
            $table->string('location', 255)->nullable();
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
        Schema::dropIfExists('standard_clauses');
    }
}
