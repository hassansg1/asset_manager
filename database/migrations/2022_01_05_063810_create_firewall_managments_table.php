<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirewallManagmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewall_managments', function (Blueprint $table) {
            $table->id();
            $table->string('source_zone');
            $table->string('source_location');
            $table->integer('source_asset');
            $table->string('destination_zone');
            $table->string('destination_location');
            $table->integer('destination_asset');
            $table->string('applicatin_port');
            $table->longText('description')->nullable();
            $table->string('condition');
            $table->date('approvel_expirey_date')->nullable();
            $table->string('approved_by');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->date('approvel_date')->nullable();
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
        Schema::dropIfExists('firewall_managments');
    }
}
