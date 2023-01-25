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
                'name' => 'Jevania',
                'lname' => 'Datubara',
                'email' => 'jevaniadatubara@gmail.com',
                'password' => bcrypt('password'),
                'role_as' => 'admin',
                'isban' => 0,
                'address1' => 'Sigumpar',
                'address2' => 'situa-tua',
                'city' => 'toba',
                'state' => 'medan',
                'pincode' => '22384',
                'phone' => '082277319005',
                'alternate_phone' => '085156870284',
                'image' => 'profile.png'
            ],
            [
                'name' => 'Onai',
                'lname' => 'Nadapdap',
                'email' => 'onainadapdap@gmail.com',
                'password' => bcrypt('sidapdap'),
                'role_as' => 'user',
                'isban' => 0,
                'address1' => 'Sigumpar',
                'address2' => 'situa-tua',
                'city' => 'toba',
                'state' => 'medan',
                'pincode' => '22384',
                'phone' => '082277319005',
                'alternate_phone' => '085156870284',
                'image' => 'profile.png'
            ],
            [
                'name' => 'vendor',
                'lname' => 'kita',
                'email' => 'vendor@gmail.com',
                'password' => bcrypt('password'),
                'role_as' => 'vendor',
                'isban' => 0,
                'address1' => 'Sigumpar',
                'address2' => 'situa-tua',
                'city' => 'toba',
                'state' => 'medan',
                'pincode' => '22384',
                'phone' => '082277319005',
                'alternate_phone' => '085156870284',
                'image' => 'profile.png'
            ]
        ];
        
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
