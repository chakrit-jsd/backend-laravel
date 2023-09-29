<?php

namespace App\Enums;
use Kongulov\Traits\InteractWithEnum;

enum RoomStatusEnum: string
{
    use InteractWithEnum;

    case Active = 'active';
    case Inactive = 'inactive';
    case Canceled = 'canceled';
}
