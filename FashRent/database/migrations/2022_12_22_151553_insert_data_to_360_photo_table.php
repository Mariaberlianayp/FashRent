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
        DB::table('360_photo')->insert([
            ['product_id' => 1, 'photo360' => 'kebaya1.jpg'],
            ['product_id' => 2, 'photo360' => 'kebaya1.jpg'],
            ['product_id' => 3, 'photo360' => 'kebaya1.jpg'],
            
        ]);
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
