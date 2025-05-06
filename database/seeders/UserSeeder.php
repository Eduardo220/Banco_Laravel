<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'eduardo@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Eduardo',
                'email' => 'eduardo@gmail.com',
                'password' => '123456#A',
            ]); 
        }

        if (!User::where('email', 'gabriela@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Gabriela',
                'email' => 'gabriela@gmail.com',
                'password' => '123456#A',
            ]); 
        }

        if (!User::where('email', 'daniel@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Daniel',
                'email' => 'daniel@gmail.com',
                'password' => '123456#A',
            ]); 
        }

        if (!User::where('email', 'marilei@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Marilei',
                'email' => 'marilei@gmail.com',
                'password' => '123456#A',
            ]); 
        }
    }
}

