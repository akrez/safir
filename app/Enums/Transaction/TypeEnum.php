<?php

namespace App\Enums\Transaction;

use App\Traits\Enum;

enum TypeEnum: string
{
    use Enum;

    case DEPOSIT = 'deposit';
    case WITHDRAW = 'withdraw';
}
