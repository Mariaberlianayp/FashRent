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
        Schema::create('shop',function(Blueprint $table){
<<<<<<< HEAD
            $table->id('shop_id');
            $table->foreignid('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
=======
            $table->bigIncrements('shop_id');
>>>>>>> 420eb9844efc2014366b18518bb3a9f2097ae7a8
            $table->string('shop_ownername');
            $table->string('shop_shopname');
            $table->string('shop_address');
            $table->string('shop_phonenumber');
            $table->string('shop_city');
            $table->string('shop_description');
            $table->string('shop_photoprofile');
            $table->string('shop_status');
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
