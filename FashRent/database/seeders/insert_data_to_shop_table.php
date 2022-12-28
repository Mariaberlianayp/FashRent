<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_data_to_shop_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shop')->insert([
            ['shop_id' => '1', 'id' => '2', 'Shop_Address' => 'Jl. Raya Kb. Jeruk No.27, RT.1/RW.9', 'Shop_PhoneNumber' => '08123987456', 'Shop_City' => 'Jakarta Barat', 'Shop_Description' => 'Berbagai jenis Kostum kami sediakan untuk memenuhi semua kebutuhan Anda. Dari kostum superhero, pakaian adat, pakaian negara, pakaian profesi, binatang dan lain-lain tersedia di tempat kami. Butik yang luas dan nyaman menambah kemudahan memilih kostum yang diinginkan.','Shop_PhotoProfile' => 'images/gudangKostum.png'],
            ['shop_id' => '2', 'id' => '3', 'Shop_Address' => 'Jalan Lingkar Boulevar Blok WA No.1', 'Shop_PhoneNumber' => '08123000123', 'Shop_City' => 'Jakarta Selatan', 'Shop_Description' => 'Jual dan sewa macam macam kebaya adat daerah. Menyewakan kebaya dengan kualitas terbaik dan berbagai jenis model kebaya sesaui dengan acara,  untuk acara pernikahan, pre-wedding, wisuda, birthday party, kondangan.','Shop_PhotoProfile' => 'images/kebayaRent.jpg'],
            ['shop_id' => '3', 'id' => '4', 'Shop_Address' => 'Jl. Kemanggisan Ilir III No.45', 'Shop_PhoneNumber' => '0878123000', 'Shop_City' => 'Jakarta Pusat', 'Shop_Description' => 'Sewa jas dan setelan pria dan blazer wanita, Koleksi kami up-to-date dan banyak pilihan ukuran, warna dan model. Kamu akan tampan maksimal ','Shop_PhotoProfile' => 'images/suitRent.jpg'],
            ['shop_id' => '4', 'id' => '5', 'Shop_Address' => 'Jl. Raya Kb. Jeruk No.55', 'Shop_PhoneNumber' => '08123030303', 'Shop_City' => 'Jakarta Timur ', 'Shop_Description' => 'Toko online untuk sewa dan beli gaun. Kami menyediakan evening gowns dan gaun pesta dari merk designer ternama di Indonesia dan sedunia. Showroom kami ada di Jakarta Barat, namun kami melayani pengiriman ke seluruh kota besar di Indonesia','Shop_PhotoProfile' => 'images/thisGown.jpg'],
        ]);




    }
}
