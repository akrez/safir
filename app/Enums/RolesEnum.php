<?php

namespace App\Enums;

use App\Traits\Enum;

enum RolesEnum: string
{
    use Enum;

    case ADMIN = 'admin';
}
