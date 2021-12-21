<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirewallIpAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firewall_ip_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('asset_type');
            $table->integer('asset_id');
            $table->string('asset_nic');
            $table->string('asset_port');
            $table->string('default_gateway');
            $table->string('ip_address');
            $table->string('subnet_mask');

            $table->string('connected_asset_type');
            $table->integer('connected_asset_id');
            $table->string('connected_asset_nic');
            $table->string('connected_asset_port');
            $table->string('vlan_id');
            $table->string('teaming_pair_id');

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
        Schema::dropIfExists('firewall_ip_addresses');
    }
}
