<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data groups
        $groups = [
            [
                'name' => 'Electronics',
                'url' => 'electronics',
                'description' => 'This is a small description of electronics group'
            ],
            [
                'name' => 'Fashions',
                'url' => 'fashions',
                'description' => 'This is a small description of fashions group'
            ],
        ];

        foreach($groups as $group) {
            Group::create($group);
        }
    }
}
