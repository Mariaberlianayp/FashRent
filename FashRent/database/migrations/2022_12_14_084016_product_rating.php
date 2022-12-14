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
        Schema::create('product_rating',function(Blueprint $table){
            $table->id('rating_id');
            $table->foreignid('renter_id')->references('renter_id')->on('renter')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('product_id')->references('product_id')->on('product')->onUpdate('cascade')->onDelete('cascade');
            $table->string('rating_stars');
            $table->timestamp('rating_date');
            $table->string('rating_description');
            $table->string('rating_photo');
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
