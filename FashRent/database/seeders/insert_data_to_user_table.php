<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class insert_data_to_user_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'admin','id' => '1','email' => 'admin@gmail.com', 'password' => Hash::make('admin123'), 'user_priority' => '1', 'user_status' => '0'],
            ['name'=>'Gudang Kostum','id' => '2','email' => 'kostum@gmail.com', 'password' => Hash::make('kostum12345'), 'user_priority' => '2', 'user_status' => '1'],
            ['name'=>'Kebaya Rent','id' => '3','email' => 'kebaya@gmail.com', 'password' => Hash::make('kebaya12345'), 'user_priority' => '2', 'user_status' => '1'],
            ['name'=>'SuitRent','id' => '4','email' => 'suit@gmail.com', 'password' => Hash::make('suit12345'), 'user_priority' => '2', 'user_status' => '1'],
            ['name'=>'This Gown','id' => '5','email' => 'gown@gmail.com', 'password' => Hash::make('gown12345'), 'user_priority ' => '2', 'user_status' => '1'],

        ]);
    }
}
