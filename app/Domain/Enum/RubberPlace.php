<?php

namespace App\Domain\Enum;

enum RubberPlace: string
{
    case KOTTAYAM = 'kottayam';

    case KOCHI = 'kochi';

    case AGARTALA = 'agartala';

    case BANGKOK = 'bangkok';

    case KUALA_LUMPUR = 'kuala_lumpur';


    public function label(): string
    {
        return match ($this) {

            self::KOTTAYAM =>
            'Kottayam',

            self::KOCHI =>
            'Kochi',

            self::AGARTALA =>
            'Agartala',

            self::BANGKOK =>
            'Bangkok',

            self::KUALA_LUMPUR =>
            'Kuala Lumpur',

        };
    }
}