<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RoomPaymentTimeEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomStatusEnum;

class Rooms extends Model
{
    use HasFactory;


    protected $casts = [
        'type' => RoomTypeEnum::class,
        'status' => RoomStatusEnum::class,
        'payment_time' => RoomPaymentTimeEnum::class,
    ];
}
