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
        Schema::create('block',function(Blueprint $table){
            $table->id('block_id');
            $table->foreignid('shop_id')->references('shop_id')->on('shop')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('renter_id')->references('renter_id')->on('renter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('admin_id')->references('admin_id')->on('admin')->onUpdate('cascade')->onDelete('cascade');           
            $table->string('block_reason');
            $table->string('block_evidence');
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
