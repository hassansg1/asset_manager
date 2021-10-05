<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ports', function (Blueprint $table) {
            $table->id();
            $table->string('portable_type', 255)->nullable();
            $table->integer('portable_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('number', 255)->nullable();
            $table->string('speed', 255)->nullable();
            $table->string('type', 255)->nullable();
            $table->integer('status')->default(1);
            $table->string('ip_address', 255)->nullable();
            $table->string('mac_address', 255)->nullable();
            $table->string('nic', 255)->nullable();
            $table->string('default_gateway', 255)->nullable();
            $table->string('network_id', 255)->nullable();
            $table->string('connected_port_id', 255)->nullable();
            $table->string('sub_net_mask', 255)->nullable();
            $table->string('dhcp_server', 255)->nullable();
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
        Schema::dropIfExists('portsable');
    }
}
