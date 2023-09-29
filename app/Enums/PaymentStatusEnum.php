<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum PaymentStatusEnum: string
{
    use InteractWithEnum;

    case Active = 'active';
    case Inactive = 'inactive';
    case Canceled = 'canceled';
}
