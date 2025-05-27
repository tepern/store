<?php

namespace Database\Seeders;

use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\AdminMenuSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(ProductCategorySeeder::class);
        $this->call(AdminMenuSeeder::class);
    }
}
