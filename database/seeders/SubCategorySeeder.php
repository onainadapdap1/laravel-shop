<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert subcategory data
        $subcategories = [
            [
                'category_id' => '1',
                'name' => 'Nokia m1',
                'url' => 'nokia-m1',
                'description' => 'NOKIA 1 description item',
                'image' => 'image.png',
            ],
            [
                'category_id' => '1',
                'name' => 'Nokia m2',
                'url' => 'nokia-m2',
                'description' => 'NOKIA 2 description item',
                'image' => 'image.png',
            ]
        ];

        foreach($subcategories as $item) {
            SubCategory::create($item);
        }
    }
}
