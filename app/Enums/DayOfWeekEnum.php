<?php

namespace App\Enums;

enum DayOfWeekEnum: string
{
    case Monday = 'monday';
    case Tuesday = 'tuesday';
    case Wednesday = 'wednesday';
    case Thursday = 'thursday';
    case Friday = 'friday';
    case Saturday = 'saturday';
    case Sunday = 'sunday';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
