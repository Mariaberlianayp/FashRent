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
            ['Shop_OwnerName' => 'Maria','id' => '1','Shop_ShopName' => 'KebayaRent', 'Shop_Address' => 'Jl. Raya Kb. Jeruk No.27, RT.1/RW.9', 'Shop_PhoneNumber' => '08123987456', 'Shop_City' => 'Jakarta Barat', 'Shop_Description' => 'Jual kebaya daerah','Shop_PhotoProfile' => 'kebayaRent.jpg', 'Shop_Status' => 'active'],
        ]);

        // DB::table('shop')->insert([
        //     ['Shop_OwnerName' => 'Monic','Shop_ShopName' => 'gudangKostum', 'Shop_Address' => 'Jalan Lingkar Boulevar Blok WA No.1', 'Shop_PhoneNumber' => '08123000123', 'Shop_City' => 'Bekasi', 'Shop_Description' => 'Jual kostum apa aja','Shop_PhotoProfile' => 'gudangKostum.png', 'Shop_Status' => 'active'],
        // ]);
        // DB::table('shop')->insert([
        //     ['Shop_OwnerName' => 'Sandi', 'Shop_ShopName' => 'suitRent', 'Shop_Address' => 'Jalan Lingkar Boulevar Blok WA No.1', 'Shop_PhoneNumber' => '0878123000', 'Shop_City' => 'Jakarta Timur', 'Shop_Description' => 'Jual jas pesta, bukan jas hujan','Shop_PhotoProfile' => 'suitRent.jpg', 'Shop_Status' => 'active'],
        // ]);
        // DB::table('shop')->insert([
        //     ['Shop_OwnerName' => 'Angel', 'Shop_ShopName' => 'This Gown', 'Shop_Address' => 'Jl. Kemanggisan Ilir III No.45', 'Shop_PhoneNumber' => '08123030303', 'Shop_City' => 'Jakarta Selatan', 'Shop_Description' => 'Jual gaun apa aja', 'Shop_PhotoProfile' => 'thisGown.jpg', 'Shop_Status' => 'active'],
        // ]);


  
    }
}
