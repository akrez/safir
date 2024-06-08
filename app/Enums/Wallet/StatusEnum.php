<?php

namespace App\Enums\Wallet;

use App\Traits\Enum;

enum StatusEnum: string
{
    use Enum;

    case ACTIVE = 'active';
    case DEACTIVE = 'deactive';
    case ARCHIVED = 'archived';
}
