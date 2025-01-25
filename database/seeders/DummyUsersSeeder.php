<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => bcrypt('12345')
            ],
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'role' => 'owner',
                'password' => bcrypt('12345'),
            ],
            [
                'name' => 'Courier',
                'email' => 'kurir@gmail.com',
                'role' => 'courier',
                'password' => bcrypt('12345'),
            ],

        ];

        foreach($userData as $key => $val) {
            User::create($val);
        }
    }

}