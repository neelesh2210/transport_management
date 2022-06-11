<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmplyoeeprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplyoeeprofiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('emplyoee_id');
            $table->string('emplyoee_type');
            $table->string('company_name');
            $table->string('company_code');
            $table->string('company_location');
            $table->string('company_branch_name');
            $table->string('company_branch_code');
            $table->string('company_branch_location');
            $table->string('emplyoee_name');
            $table->string('emplyoee_photo');
            $table->string('emplyoee_jd');
            $table->string('emplyoee_designation');
            $table->string('emplyoee_cno');
            $table->string('emplyoee_email');
            $table->string('emplyoee_dob');
            $table->string('emplyoee_bg');
            $table->string('gender');
            $table->string('emplyoee_cadd');
            $table->string('emplyoee_padd');
            $table->string('emplyoee_idtype');
            $table->string('emplyoee_idno');
            $table->string('emplyoee_qualification');
            $table->string('emplyoee_exp');
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
        Schema::dropIfExists('emplyoeeprofiles');
    }
}
