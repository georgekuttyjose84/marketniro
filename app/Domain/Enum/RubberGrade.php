<?php

namespace App\Domain\Enum;

enum RubberGrade: string
{
    case RSS1 = 'rss1';

    case RSS2 = 'rss2';

    case RSS3 = 'rss3';

    case RSS4 = 'rss4';

    case RSS5 = 'rss5';

    case ISNR20 = 'isnr20';

    case SMR20 = 'smr20';

    case LATEX_60 = 'latex_60';


    public function label(): string
    {
        return match ($this) {

            self::RSS1 =>
            'RSS 1',

            self::RSS2 =>
            'RSS 2',

            self::RSS3 =>
            'RSS 3',

            self::RSS4 =>
            'RSS 4',

            self::RSS5 =>
            'RSS 5',

            self::ISNR20 =>
            'ISNR 20',

            self::SMR20 =>
            'SMR 20',

            self::LATEX_60 =>
            'Latex (60%)',

        };
    }
}