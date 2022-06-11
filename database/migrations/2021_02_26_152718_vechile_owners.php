<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VechileOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vechile_owners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ownwer_name');
            $table->string('ownership_type');
            $table->string('owner_phone_first');
            $table->string('owner_phone_second');
            $table->string('owner_whatsapp');
            $table->string('owner_email');
            $table->string('owner_address');
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
          Schema::dropIfExists('vechile_owners');
    }
}
