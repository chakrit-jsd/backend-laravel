<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum RoomPaymentTimeEnum: int
{
    use InteractWithEnum;

    case T15 = 15;
    case T30 = 30;
    case T45 = 45;
    case T60 = 60;
}
