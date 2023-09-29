<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum OrderTypeEnum: string
{
    use InteractWithEnum;

    case Buy = 'buy';
    case Sell = 'sell';
}
