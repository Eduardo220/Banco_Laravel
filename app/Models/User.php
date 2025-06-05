<?php

namespace App\Models;

use App\Enums\TypeAccountEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    protected function cpf(): Attribute
    {
        return Attribute::get(fn ($value) 
        => preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/",
            "$1.$2.$3-$4",
            $value));
    }

    protected function phone(): Attribute
    {
        return Attribute::get(fn ($value) 
        => preg_replace("/(\d{2})(\d{5})(\d{4})/",
            "($1) $2-$3",
            $value));
    }

    protected function addressZip(): Attribute
    {
        return Attribute::get(fn ($value)
        => preg_replace("/(\d{5})(\d{3})/",
            "$1-$2",
            $value));
    }

    protected function birthDate(): Attribute
    {
        return Attribute::get(
            fn ($value) => \Carbon\Carbon::parse($value)->format('d-m-Y'));
            
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function account(): HasMany
    {
        return $this->hasMany(Account::class);
    }
}