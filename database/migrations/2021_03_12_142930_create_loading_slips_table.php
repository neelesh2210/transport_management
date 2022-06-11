<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadingSlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loading_slips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('di_no')->nullable();
            $table->string('truck_no')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_mobile_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_mobile')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('case_advance')->nullable();
            $table->string('diesel_case_advance')->nullable();
            $table->string('diesel_quantity')->nullable();
            $table->string('diesel_slip_no')->nullable();
            $table->string('material_name')->nullable();
            $table->string('driver_signature')->nullable();
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
        Schema::dropIfExists('loading_slips');
    }
}
