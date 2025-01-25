<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        Role::create([
            'role_name' => 'Admin',
        ]);

        Role::create([
            'role_name' => 'Owner',
        ]);

        Role::create([
            'role_name' => 'Courier',
        ]);

        User::factory(5)->create();

    }
}
