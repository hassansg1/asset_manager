<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpAddressNameToFirewallIpAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('firewall_ip_addresses', function (Blueprint $table) {
            $table->string('ip_address_name')->nullable()->after('default_gateway');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('firewall_ip_addresses', function (Blueprint $table) {
            //
        });
    }
}
