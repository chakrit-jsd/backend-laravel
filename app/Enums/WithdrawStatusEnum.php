<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum WithdrawStatusEnum: string
{
    use InteractWithEnum;

    case Successed = 'successed';
    case Pending = 'pending';
    case Canceled = 'canceled';
}
