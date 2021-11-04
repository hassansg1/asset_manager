<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_data', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('compliance_id');
            $table->string('applicable',255)->nullable();
            $table->string('reason',255)->nullable();
            $table->string('compliant',255)->nullable();
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
        Schema::dropIfExists('compliance_data');
    }
}
