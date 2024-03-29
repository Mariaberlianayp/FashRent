<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_data_to_category_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['category_name' => 'Baju Adat', 'category_image' => 'images/bajuAdat.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Jas Pria', 'category_image' => 'images/jas.png'],

        ]);

        DB::table('category')->insert([
            ['category_name' => 'Aksesoris', 'category_image' => 'images/aksesoris.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Kostum', 'category_image' => 'images/kostum.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Dress', 'category_image' => 'images/dress.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Sepatu Pria', 'category_image' => 'images/SepatuPria.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Sepatu Wanita', 'category_image' => 'images/SepatuWanita.png'],

        ]);
        DB::table('category')->insert([
            ['category_name' => 'Rambut Palsu', 'category_image' => 'images/wig.png'],

        ]);



    }
}
