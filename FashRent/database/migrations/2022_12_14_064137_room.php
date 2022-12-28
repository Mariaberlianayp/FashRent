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
        
        Schema::create('room',function(Blueprint $table){
            $table->bigIncrements('room_id');
            $table->foreignid('renter_id')->references('renter_id')->on('renter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('shop_id')->references('shop_id')->on('shop')->onUpdate('cascade')->onDelete('cascade');
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
