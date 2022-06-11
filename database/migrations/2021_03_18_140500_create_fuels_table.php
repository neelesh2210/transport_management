<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('petrol_pump')->nullable();
            $table->string('vechile_no')->nullable();
            $table->string('item')->nullable();
            $table->string('quantitiy')->nullable();
            $table->string('rate')->nullable();
            $table->string('amount')->nullable();
            $table->string('date')->nullable();
            $table->string('add_by')->nullable();
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
        Schema::dropIfExists('fuels');
    }
}
