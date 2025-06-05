<?php

namespace App\Enums;

enum TypeAccountEnum: string
{
    case CURRENT = 'corrente';
    case SAVINGS = 'poupanca';

    public function label(): string
    {
        return match ($this) {
            self::CURRENT => 'corrente',
            self::SAVINGS => 'poupanca',
        };
    }
}
