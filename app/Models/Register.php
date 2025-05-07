<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'users'; // Nome da tabela no banco de dados
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'CPF',
        'birth_date',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
