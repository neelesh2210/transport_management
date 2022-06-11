<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Emplyoeelogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('emplyoeelogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_code');
            $table->string('company_location');
            $table->string('company_branch_name');
            $table->string('company_branch_code');
            $table->string('company_branch_location');
            $table->string('emplyoee_type');
            $table->string('emplyoee_id');
            $table->string('emplyoee_password');
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
         Schema::dropIfExists('emplyoeelogs');
    }
}
