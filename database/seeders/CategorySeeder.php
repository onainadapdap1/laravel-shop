<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert category data
        $categories = [
            [
                'group_id' => '1',
                'name' => 'mobile phone',
                'description' => 'category description of mobile phone',
                'image' => 'category.png',
                'url' => 'mobile-phone',
                'icon' => 'icon.png',
                'status' => '0'
            ],
            [
                'group_id' => '2',
                'name' => 'Celana',
                'description' => 'category description of celana ',
                'image' => 'category.png',
                'url' => 'celana',
                'icon' => 'icon.png',
                'status' => '0'
            ],
        ];

        foreach($categories as $category) {
            Category::create($category);
        }
    }
}
