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
        DB::table('category')->insert([
            ['category_name' => 'Baju Adat', 'category_image' => 'bajuAdat.png'],
            ['category_name' => 'Jas Pria', 'category_image' => 'jas.png'],
            ['category_name' => 'Aksesoris', 'category_image' => 'aksesoris.png'],
            ['category_name' => 'Kostum', 'category_image' => 'kostum.png'],
            ['category_name' => 'Dress', 'category_image' => 'dress.png'],
            ['category_name' => 'Sepatu Pria', 'category_image' => 'SepatuPria.png'],
            ['category_name' => 'Sepatu Wanita', 'category_image' => 'SepatuWanita.png'],
            ['category_name' => 'Rambut Palsu', 'category_image' => 'wig.png'],
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
