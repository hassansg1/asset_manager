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
            $table->string('risk_zone');
            $table->string('threat_source');
            $table->string('threat_action');
            $table->longText('vulnerability');
            $table->longText('consequence');
            $table->string('impact');
            $table->string('utl');
            $table->string('unmitigated_risk');
            $table->longText('existing_countermeasures');
            $table->string('mtl');
            $table->string('mitigated_risk');
            $table->longText('recommendations');
            $table->string('atl');
            $table->string('residual_risk');
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
