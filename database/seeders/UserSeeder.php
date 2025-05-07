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
                'name' => 'Eduardo Weissheimer',
                'email' => 'eduardo@gmail.com',
                'password' => '123456#A',
                'phone' => '11996214999',
                'address' => 'Rua A, 123',
                'CPF' => '02631766067',
                'birth_date' => '2004-03-03',
            ]); 
        }
        if (!User::where('email', 'fernanda@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Fernanda Weissheimer',
                'email' => 'fernanda@gmail.com',
                'password' => '123456#A',
                'phone' => '11959991299',
                'address' => 'Rua A, 123',
                'CPF' => '00045678900',
                'birth_date' => '2009-10-25',
            ]); 
        }
        if (!User::where('email', 'gabriela@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Gabriela Rocha',
                'email' => 'gabriela@gmail.com',
                'password' => '123456#A',
                'phone' => '14956199999',
                'address' => 'Rua A, 123',
                'CPF' => '02945678900',
                'birth_date' => '2004-11-03',
            ]); 
        }
        if (!User::where('email', 'roger@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Roger Santini',
                'email' => 'roger@gmail.com',
                'password' => '123456#A',
                'phone' => '11999562999',
                'address' => 'Rua A, 123',
                'CPF' => '02915678900',
                'birth_date' => '1969-08-18',
            ]); 
        }
        if (!User::where('email', 'daniel@gmail.com')->first()) 
        {
            User::create([
                'name' => 'Daniel da Costa',
                'email' => 'daniel@gmail.com',
                'password' => '123456#A',
                'phone' => '55984080462',
                'address' => 'Rua A, 123',
                'CPF' => '12341678900',
                'birth_date' => '1990-01-01',
            ]); 
        }
    }
}


