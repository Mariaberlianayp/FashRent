<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_data_to_360_photo_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('360_photo')->insert([
            ['product_id' => 3, 'photo360' => 'kebaya1.jpg'],
        ]);

        DB::table('360_photo')->insert([
            ['product_id' => 4, 'photo360' => 'kebaya1.jpg'],
        ]);

        DB::table('360_photo')->insert([
            ['product_id' => 5, 'photo360' => 'kebaya1.jpg'],
        ]);

        
        
    }
}
