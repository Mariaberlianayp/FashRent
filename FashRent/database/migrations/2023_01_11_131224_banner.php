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
        Schema::create('banner',function(Blueprint $table){
            $table->bigIncrements('banner_id');
            $table->foreignid('admin_id')->nullable()->references('admin_id')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('shop_id');
            $table->string('banner_image');
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
