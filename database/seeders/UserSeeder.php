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
                'address_street' => 'Rua dos Alfeneiros',
                'address_number' => '123',
                'address_neighborhood' => 'Centro',
                'address_complement' => 'Apto 101',
                'address_city' => 'São Paulo',
                'address_state' => 'SP',
                'address_zip' => '12345-678',
                'CPF' => '02631766067',
                'birth_date' => '2004-03-03',
            ]); 
        }
    }
}


