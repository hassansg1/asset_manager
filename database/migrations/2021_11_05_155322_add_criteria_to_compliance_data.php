<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCriteriaToComplianceData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        `Schema::table('compliance_d`ata', function (Blueprint $table) {
//            $table->string('criteria',255)->nullable()->after('applicable');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('compliance_data', function (Blueprint $table) {
            //
        });
    }
}
