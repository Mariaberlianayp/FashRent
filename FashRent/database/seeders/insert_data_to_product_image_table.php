<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_data_to_product_image_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_image')->insert([
            ['photo_id' => 1, 'product_id' => 4, 'product_photo' => 'images/img01.jpg'],
            ['photo_id' => 2, 'product_id' => 4, 'product_photo' => 'images/img02.jpg'],
            ['photo_id' => 3, 'product_id' => 4, 'product_photo' => 'images/img03.jpg'],
            ['photo_id' => 4, 'product_id' => 4, 'product_photo' => 'images/img04.jpg'],
            ['photo_id' => 5, 'product_id' => 4, 'product_photo' => 'images/img05.jpg'],
            ['photo_id' => 6, 'product_id' => 1, 'product_photo' => 'images/kebaya1.jpg'],
            ['photo_id' => 7, 'product_id' => 2, 'product_photo' => 'images/kebaya2.jpg'],
            ['photo_id' => 8, 'product_id' => 3, 'product_photo' => 'images/kebaya3.jpg'],

        ]);
    }
}
