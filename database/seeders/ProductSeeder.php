<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data product
        $products = [
            [
                'sub_category_id' => '1',
                'name' => 'nokia m1 2007',
                'url' => 'nokia-m1-2007',
                'small_description' => 'this is small description about nokia m1 2007',
                'image' => 'profile.png',
                'p_highlight_heading' => 'available offer',
                'p_highlights' => 'get 70% off',
                'original_price' => 13000,
                'new_arrival_products' => 1
            ]
        ];

        foreach($products as $product) {
            Product::create($product);
        }
    }
}
