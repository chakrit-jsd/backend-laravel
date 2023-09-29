<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum RoomTypeEnum: string
{
    use InteractWithEnum;

    case Buy = 'buy';
    case Sell = 'sell';
}
