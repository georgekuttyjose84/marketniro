<?php

namespace App\Domain\Enum;

enum Method: string
{
    case MANUEL = 'manual';
    case CRON = 'cron';

    public function getName(): string
    {
        return match ($this) {
            self::MANUEL => 'manual',
            self::CRON => 'cron',
        };
    }
}

