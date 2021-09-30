<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoneAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lone_assets', function (Blueprint $table) {
            $table->id();
            $table->string('parentable_type')->nullable();
            $table->integer('parentable_id')->nullable();
            $table->string('code',255)->nullable();
            $table->string('name',255)->nullable();
            $table->string('description',255)->nullable();
            $table->integer('function')->nullable();
            $table->integer('make')->nullable();
            $table->string('model')->nullable();
            $table->string('part_number')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('security_zone')->nullable();
            $table->string('existing_asset_id')->nullable();
            $table->string('existing_asset_name')->nullable();
            $table->string('asset_parent_code')->nullable();
            $table->string('sim_imsi')->nullable();
            $table->string('sim_msisdn')->nullable();
            $table->string('sim_iccid')->nullable();
            $table->string('process_equipment')->nullable();
            $table->string('wan_interface')->nullable();
            $table->string('wan_interface_address')->nullable();
            $table->string('wan_interface_protocal')->nullable();
            $table->string('comm_interface_1')->nullable();
            $table->string('comm_interface_1_protocal')->nullable();
            $table->string('comm_interface_1_address')->nullable();
            $table->string('comm_interface_2')->nullable();
            $table->string('comm_interface_2_protocal')->nullable();
            $table->string('comm_interface_2_address')->nullable();
            $table->string('comm_interface_3')->nullable();
            $table->string('comm_interface_3_protocal')->nullable();
            $table->string('comm_interface_3_address')->nullable();
            $table->string('communication_type')->nullable();
            $table->string('control')->nullable();
            $table->string('equipment_unavailalbe')->nullable();
            $table->string('redundant_pair_id')->nullable();
            $table->string('connected_to_site')->nullable();
            $table->string('owner_contact')->nullable();
            $table->string('data_source')->nullable();
            $table->string('data_source_1')->nullable();
            $table->string('data_source_2')->nullable();
            $table->date('dl_start_time_1')->nullable();
            $table->date('dl_start_time_2')->nullable();
            $table->date('dl_start_time_3')->nullable();
            $table->string('application_file_for_firm')->nullable();
            $table->date('firmware_upgrade_date')->nullable();
            $table->string('firmware_upgrade_by')->nullable();
            $table->string('firmware_upgrade_proof')->nullable();
            $table->string('firmware_upgrade_comment')->nullable();
            $table->string('new_ot_configuration_status')->nullable();
            $table->date('data_logger_update_date')->nullable();
            $table->string('data_logger_update_by')->nullable();
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
        Schema::dropIfExists('lone_assets');
    }
}
