<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum PaymentTypeEnum: string
{
    use InteractWithEnum;

    case Null = 'null';
    case Bank = 'bank';
}
