<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->integer('firewall_asset_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('firewall_zone_id');
            $table->integer('firewall_address_group_id');
            $table->integer('firewall_destination_zone_id');
            $table->integer('firewall_destination_address_group_id');
            $table->string('application')->nullable();
            $table->string('service')->nullable();
            $table->string('action')->nullable();
            $table->string('profile')->nullable();
            $table->string('options')->nullable();
            $table->string('target')->nullable();
            $table->string('rule_usage')->nullable();
            $table->string('rule_usage_app_screen')->nullable();
            $table->string('days_with_no_new_app')->nullable();
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
        Schema::dropIfExists('policies');
    }
}
