<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_assessments', function (Blueprint $table) {
            $table->id();
            $table->string('risk_assesment_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('participant')->nullable();
            $table->string('date_of_assesment')->nullable();
            $table->longText('reason_of_assesment')->nullable();
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
        Schema::dropIfExists('risk_assessments');
    }
}
