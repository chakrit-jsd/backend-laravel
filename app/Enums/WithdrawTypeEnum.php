<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum WithdrawTypeEnum: string
{
    use InteractWithEnum;

    case Internal = 'internal';
    case External = 'external';
}
