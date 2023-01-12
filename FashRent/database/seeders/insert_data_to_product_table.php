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
            ['shop_id' => 2, 'category_id' => 1, 'product_name' => 'Kebaya hijau tua lengan panjang', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_deposito' => 50000, 'product_gender' => 'Wanita', 'product_color' => 'Hijau',
            'product_size' => 'Lingkar dada 50cm
            Lingkar pinggang 70cm','product_stock' => 3, 'product_status' => '0', 'product_thumbnail' => 'images/kebaya1.jpg'],
            ['shop_id' => 2, 'category_id' => 1, 'product_name' => 'Kebaya merah cabai lengan panjang', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_deposito' => 50000, 'product_gender' => 'Wanita', 'product_color' => 'merah cabai',
            'product_size' => 'Lingkar dada 50cm
            Lingkar pinggang 70cm','product_stock' => 3, 'product_status' => '0', 'product_thumbnail' => 'images/kebaya2.jpg'],
            ['shop_id' => 2, 'category_id' => 1, 'product_name' => 'Kebaya kuning bunga', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_deposito' => 50000, 'product_gender' => 'Wanita', 'product_color' => 'kuning',
            'product_size' => 'Lingkar dada 50cm
            Lingkar pinggang 70cm','product_stock' => 3, 'product_status' => '0', 'product_thumbnail' => 'images/kebaya3.jpg'],
            ['shop_id' => 3, 'category_id' => 6, 'product_name' => 'Sepatu formal', 'product_description' => 'Sepatu hitam coklat kulit', 'product_rentprice' => 20000, 'product_deposito' => 100000, 'product_gender' => 'Pria', 'product_color' => 'hitam',
            'product_size' => 'Ukuran 40-48','product_stock' => 15, 'product_status' => '2', 'product_thumbnail' => 'images/shoes/img01.jpg'],


        ]);
    }
}
