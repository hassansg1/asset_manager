<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->integer('risk_assesment_id');
            $table->string('risk_number');
            $table->longText('risk_statement');
            $table->string('risk_zone')->nullable();
            $table->string('threat_source')->nullable();
            $table->longText('threat_action')->nullable();
            $table->longText('vulnerability')->nullable();
            $table->longText('consequence')->nullable();
            $table->string('impact')->nullable();
            $table->string('utl')->nullable();
            $table->string('unmitigated_risk')->nullable();
            $table->longText('existing_countermeasures')->nullable();
            $table->string('mtl')->nullable();
            $table->string('mitigated_risk')->nullable();
            $table->longText('recommendations')->nullable();
            $table->string('atl')->nullable();
            $table->string('residual_risk')->nullable();
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
        Schema::dropIfExists('risks');
    }
}
