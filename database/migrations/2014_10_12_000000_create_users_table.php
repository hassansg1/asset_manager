<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_no')->nullable();
            $table->string('alt_mobile_no')->nullable();
            $table->string('email')->unique();
            $table->integer('usertype_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address_line_1',255)->nullable();
            $table->string('address_line_2',255)->nullable();
            $table->string('city',255)->nullable();
            $table->string('state',255)->nullable();
            $table->string('postal_code',255)->nullable();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->string('avatar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
