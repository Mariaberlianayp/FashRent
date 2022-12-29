<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_data_to_product_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya hijau tua lengan panjang', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_stock' => 3, 'product_status' => 'active'],
        ]);
        DB::table('product')->insert([
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya kuning bunga', 'product_description' => 'lengan panjang, motif bunga', 'product_rentprice' => 20000, 'product_stock' => 2, 'product_status' => 'active'],
        ]);

        DB::table('product')->insert([
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya merah cabai', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_stock' => 2, 'product_status' => 'active'],
        ]);
    }
}
