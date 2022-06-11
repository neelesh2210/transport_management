<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PetrolPumps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('petrol_pumps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('petrolpump_name');
            $table->string('petrolpump_address');
            $table->string('petrolpump_mobile_no');
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
         Schema::dropIfExists('petrol_pumps');
    }
}
