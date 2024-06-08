<?php

namespace App\Traits;

trait Enum
{
    public static function values(): array
    {
        return collect(self::cases())->pluck('value')->toArray();
    }
}
