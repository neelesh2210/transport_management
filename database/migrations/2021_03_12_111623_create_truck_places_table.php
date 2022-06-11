<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transporter_code')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('driver_mobile')->nullable();
            $table->string('vechile_no')->nullable();
            $table->string('dgnitity')->nullable();
            $table->string('destination')->nullable();
            $table->string('vechicle_type')->nullable();
            $table->string('truck_place_date')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('lorry_receipt_no')->nullable();
            $table->string('lorry_receipt_date')->nullable();
            $table->string('delivery_instruction_no')->nullable();
            $table->string('destination_city_code')->nullable();
            $table->string('quantity')->nullable();
            $table->string('way_bill_no')->nullable();
            $table->string('way_bill_no_date')->nullable();
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
        Schema::dropIfExists('truck_places');
    }
}
