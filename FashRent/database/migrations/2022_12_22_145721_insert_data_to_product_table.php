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
        DB::table('product')->insert([
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya hijau tua lengan panjang', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_stock' => 3, 'product_status' => 'active'],
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya kuning bunga', 'product_description' => 'lengan panjang, motif bunga', 'product_rentprice' => 20000, 'product_stock' => 2, 'product_status' => 'active'],
            ['shop_id' => 1, 'admin_id' => 1, 'category_id' => 1, 'product_name' => 'Kebaya merah cabai', 'product_description' => 'Kebaya lengan panjang untuk acara adat', 'product_rentprice' => 20000, 'product_stock' => 2, 'product_status' => 'active'],
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
