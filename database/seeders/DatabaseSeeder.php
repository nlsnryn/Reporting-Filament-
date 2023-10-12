<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Nelson Ryan',
            'email' => 'nelson@gmail.com',
            'password' => Hash::make('12345')
        ]);

        $this->call([
            CountrySeeder::class,
            StateSeeder::class,
            CitySeeder::class
        ]);

        Department::create(['name' => 'Laravel']);
    }
}
