<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renter',function(Blueprint $table){
            $table->id('renter_id');
            $table->string('renter_name');
            $table->string('renter_phonenumber');
            $table->string('renter_email');
            $table->string('renter_password');
            $table->string('renter_photoprofile');
            $table->string('renter_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
