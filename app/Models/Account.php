<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';

    protected $fillable = [
        'user_id',
        'name_account',
        'number_account',
        'type_account',
        'agency_account',
        'balance_account',
        'status_account',
    ];
}
