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
        'agency_account',
        'balance_account',
        'status_account',
        'type_account',
    ];

    protected $casts = [
        'type_account',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
