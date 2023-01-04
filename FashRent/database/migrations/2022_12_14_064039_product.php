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
        Schema::create('product',function(Blueprint $table){
            $table->bigIncrements('product_id');
            $table->foreignid('shop_id')->references('shop_id')->on('shop')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('admin_id')->nullable()->references('admin_id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignid('category_id')->references('category_id')->on('category')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name');
            $table->string('product_description');
            $table->integer('product_rentprice');
            $table->integer('product_deposito');
            $table->string('product_gender');
            $table->string('product_color');
            $table->string('product_size');
            $table->string('product_stock');
            $table->string('product_status')->default(0);
            $table->string('product_thumbnail')->nullable();
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
