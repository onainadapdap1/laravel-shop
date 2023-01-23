<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data table users
        $users = [
            [
                'name' => 'Jevania Datubara',
                'email' => 'jevaniadatubara@gmail.com',
                'password' => bcrypt('password'),
                'role_as' => 'admin',
                'isban' => 0
            ],
            [
                'name' => 'Onai Nadapdap',
                'email' => 'onainadapdap@gmail.com',
                'password' => bcrypt('sidapdap'),
                'role_as' => 'user',
                'isban' => 0
            ],
            [
                'name' => 'vendor',
                'email' => 'vendor@gmail.com',
                'password' => bcrypt('password'),
                'role_as' => 'vendor',
                'isban' => 0
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
