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
        Schema::create('admin',function(Blueprint $table){
<<<<<<< HEAD
            $table->id('admin_id');
            $table->foreignid('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('admin_name');

=======
            $table->bigIncrements('admin_id');
>>>>>>> 420eb9844efc2014366b18518bb3a9f2097ae7a8
            $table->string('admin_name');
            $table->string('admin_password');

            $table->foreignid('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('admin_name');

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
