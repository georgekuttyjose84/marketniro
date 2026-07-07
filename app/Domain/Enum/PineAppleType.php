<?php

namespace App\Domain\Enum;

enum PineAppleType: string
{
    case RIPE = 'ripe';
    case GREEN = 'green';

    public function getName(): string
    {
        return match ($this) {
            self::RIPE => 'Ripe',
            self::GREEN => 'Green',
        };
    }
}
