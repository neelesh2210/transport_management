<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckHisabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_hisabs', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('loding_slip_id')->nullable();
            $table->integer('truck_placement_id')->nullable();
            $table->integer('tax_invoice_id')->nullable();
            $table->string('vechile_no')->nullable();
            $table->string('quantity')->nullable();
            $table->string('rate')->nullable();
            $table->string('transporter_percent')->nullable();
            $table->string('tac')->nullable();
            $table->string('cash_advance')->nullable();
            $table->string('diesel')->nullable();
            $table->string('total')->nullable();
            $table->string('status')->nullable();
            $table->string('add_by')->nullable();
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
        Schema::dropIfExists('truck_hisabs');
    }
}
