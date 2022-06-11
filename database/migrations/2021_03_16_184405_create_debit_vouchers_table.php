<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebitVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debit_vouchers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lr_no')->nullable();
            $table->string('lr_date')->nullable();
            $table->string('weight')->nullable();
            $table->string('rate')->nullable();
            $table->string('fright')->nullable();
            $table->string('advance_diesel')->nullable();
            $table->string('commission')->nullable();
            $table->string('shorted_claim')->nullable();
            $table->string('balance')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('debit_vouchers');
    }
}
