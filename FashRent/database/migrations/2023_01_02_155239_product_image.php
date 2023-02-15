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
        Schema::create('product_image',function(Blueprint $table){
            $table->bigIncrements('photo_id');
            $table->foreignid('product_id')->references('product_id')->on('product')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
