<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompliancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliances', function (Blueprint $table) {
            $table->id();
            $table->string('clause','50');
            $table->text('section')->nullable();
            $table->text('objective')->nullable();
            $table->text('control')->nullable();
            $table->text('policies')->nullable();
            $table->text('policies_extended')->nullable();
            $table->string('nwc_applicable',50)->nullable();
            $table->text('action_item')->nullable();
            $table->string('compliant',50)->nullable();
            $table->text('proof')->nullable();
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('compliances');
    }
}
