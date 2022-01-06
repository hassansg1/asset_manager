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
            $table->string('asset_nic')->nullable()->change();
            $table->string('asset_port');
            $table->string('default_gateway')->nullable()->change();
            $table->string('ip_address')->nullable()->change();
            $table->string('subnet_mask')->nullable()->change();

            $table->string('connected_asset_type');
            $table->integer('connected_asset_id');
            $table->string('connected_asset_nic')->nullable()->change();
            $table->string('connected_asset_port')->nullable()->change();
            $table->string('vlan_id')->nullable()->change();
            $table->string('teaming_pair_id')->nullable()->change();

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
