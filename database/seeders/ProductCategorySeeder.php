<?php

namespace Database\Seeders;

use App\Models\Products\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->truncate();
        $categories = [
            [
                'name' => 'легкий'
            ],
            [
                'name' => 'хрупкий'
            ],
            [
                'name' => 'тяжелый'
            ],
        ];
        DB::table('product_categories')->insert($categories);
    }
}
