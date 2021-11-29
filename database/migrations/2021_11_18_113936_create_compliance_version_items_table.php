<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplianceVersionItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compliance_version_items', function (Blueprint $table) {
            $table->id();
            $table->integer('compliance_version_id')->nullable();
            $table->integer('compliance_data_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('compliant')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('compliance_version_items');
    }
}
