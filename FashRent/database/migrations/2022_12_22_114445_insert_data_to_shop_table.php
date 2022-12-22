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
        DB::table('shop')->insert([
            ['Shop_OwnerName' => 'Maria', 'Shop_Email' => 'kebayaRent@email.com', 'Shop_ShopName' => 'KebayaRent', 'Shop_Address' => 'Jl. Raya Kb. Jeruk No.27, RT.1/RW.9', 'Shop_PhoneNumber' => '08123987456', 'Shop_City' => 'Jakarta Barat', 'Shop_Description' => 'Jual kebaya daerah', 'Shop_Password' => 'kebayaRent', 'Shop_PhotoProfile' => 'kebayaRent.jpg', 'Shop_Status' => 'active'],
            ['Shop_OwnerName' => 'Monic', 'Shop_Email' => 'gudangKostum@email.com', 'Shop_ShopName' => 'gudangKostum', 'Shop_Address' => 'Jalan Lingkar Boulevar Blok WA No.1', 'Shop_PhoneNumber' => '08123000123', 'Shop_City' => 'Bekasi', 'Shop_Description' => 'Jual kostum apa aja', 'Shop_Password' => 'gudangKostum', 'Shop_PhotoProfile' => 'gudangKostum.png', 'Shop_Status' => 'active'],
            ['Shop_OwnerName' => 'Sandi', 'Shop_Email' => 'suitRent@email.com', 'Shop_ShopName' => 'suitRent', 'Shop_Address' => 'Jalan Lingkar Boulevar Blok WA No.1', 'Shop_PhoneNumber' => '0878123000', 'Shop_City' => 'Jakarta Timur', 'Shop_Description' => 'Jual jas pesta, bukan jas hujan', 'Shop_Password' => 'suitRent', 'Shop_PhotoProfile' => 'suitRent.jpg', 'Shop_Status' => 'active'],
            ['Shop_OwnerName' => 'Angel', 'Shop_Email' => 'thisGown@email.com', 'Shop_ShopName' => 'This Gown', 'Shop_Address' => 'Jl. Kemanggisan Ilir III No.45', 'Shop_PhoneNumber' => '08123030303', 'Shop_City' => 'Jakarta Selatan', 'Shop_Description' => 'Jual gaun apa aja', 'Shop_Password' => 'thisGown', 'Shop_PhotoProfile' => 'thisGown.jpg', 'Shop_Status' => 'active'],
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
