<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

            $this->call([
                insert_data_to_category_table::class,
                insert_data_to_user_table::class,
                insert_data_to_shop_table::class,
                insert_data_to_product_table::class,
                insert_data_to_360_photo_table::class,
                insert_data_to_admin_table::class,
            ]);

    }
}
