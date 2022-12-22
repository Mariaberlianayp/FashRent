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
        Schema::create('message',function(Blueprint $table){
            $table->bigIncrements('message_id');
            $table->foreignid('room_id')->references('room_id')->on('room')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Message');
            $table->date('Message_Time');
            $table->string('Message_Status');
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
