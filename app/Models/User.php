<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Adicione as traits se quiser

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address_street',
        'address_number',
        'address_neighborhood',
        'address_complement',
        'address_city',
        'address_state',
        'address_zip',
        'CPF',
        'birth_date',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}