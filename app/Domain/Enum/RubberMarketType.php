<?php

namespace App\Domain\Enum;

enum RubberMarketType: string
{
    case DOMESTIC = 'domestic';

    case INTERNATIONAL = 'international';


    public function label(): string
    {
        return match ($this) {

            self::DOMESTIC =>
            'Domestic Market',

            self::INTERNATIONAL =>
            'International Market',

        };
    }
}