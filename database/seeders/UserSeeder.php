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
                'phone' => '11999999999',
                'address' => 'Rua A, 123',
                'CPF' => '12345678900',
                'birth_date' => '2004-03-03',
            ]); 
        }
        if (!User::where('email', 'fernanda@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Fernanda',
                'email' => 'fernanda@gmail.com',
                'password' => '123456#A',
                'phone' => '11999999999',
                'address' => 'Rua A, 123',
                'CPF' => '11345678900',
                'birth_date' => '2009-10-25',
            ]); 
        }
        if (!User::where('email', 'gabriela@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Gabriela',
                'email' => 'gabriela@gmail.com',
                'password' => '123456#A',
                'phone' => '11999999999',
                'address' => 'Rua A, 123',
                'CPF' => '12145678900',
                'birth_date' => '2004-11-03',
            ]); 
        }
        if (!User::where('email', 'roger@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Roger',
                'email' => 'roger@gmail.com',
                'password' => '123456#A',
                'phone' => '11999999999',
                'address' => 'Rua A, 123',
                'CPF' => '12315678900',
                'birth_date' => '1969-08-18',
            ]); 
        }
        if (!User::where('email', 'daniel@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Daniel',
                'email' => 'daniel@gmail.com',
                'password' => '123456#A',
                'phone' => '11999999999',
                'address' => 'Rua A, 123',
                'CPF' => '12341678900',
                'birth_date' => '1990-01-01',
            ]); 
        }
    }
}


