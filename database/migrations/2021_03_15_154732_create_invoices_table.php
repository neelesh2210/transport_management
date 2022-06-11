<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number')->nullable();
            $table->string('invoice_number_date')->nullable();
            $table->string('sales_order_number')->nullable();
            $table->string('sales_order_date')->nullable();
            $table->string('customer')->nullable();
            $table->string('consignee')->nullable();
            $table->string('vechile_no')->nullable();
            $table->string('transport_name')->nullable();
            $table->string('lorry_receipt_no')->nullable();
            $table->string('lorry_recepit_date')->nullable();
            $table->string('company_gst')->nullable();
            $table->string('delivery_instruction_no')->nullable();
            $table->string('destination')->nullable();
            $table->string('dgnintiy')->nullable();
            $table->string('quantitiy')->nullable();
            $table->string('rate_pmt')->nullable();
            $table->string('ammount_rs')->nullable();
            $table->string('tax')->nullable();
            $table->string('total')->nullable();
            $table->string('net_payable')->nullable();
            $table->string('way_bill_no')->nullable();
            $table->string('way_bill_date')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
