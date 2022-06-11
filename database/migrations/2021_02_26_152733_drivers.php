<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Drivers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('driver_name');
            $table->string('driver_mobile_no');
            $table->string('driver_license_no');
            $table->string('driver_id_no');
            $table->string('driver_blood_group');
            $table->string('driver_license_expairy');
            $table->string('note');
            $table->string('status');
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
        Schema::dropIfExists('drivers');
    }
}
