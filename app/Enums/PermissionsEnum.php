<?php

namespace App\Enums;

use App\Traits\Enum;

enum PermissionsEnum: string
{
    use Enum;

    case USERS_INDEX = 'users.index';
}
