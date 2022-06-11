<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trucks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vechile_number');
            $table->string('vechile_type');
            $table->string('vechile_make');
            $table->string('make_year');
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('vechile_id');
            $table->string('gross_capicity');
            $table->string('unladen_weight');
            $table->string('permissable');
            $table->string('normal_load');
            $table->string('owner_id');
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
         Schema::dropIfExists('trucks');
    }
}
