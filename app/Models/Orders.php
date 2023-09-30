<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\OrderTypeEnum;
use App\Enums\OrderStatusEnum;

class Orders extends Model
{
    use HasFactory;


    protected $casts = [
        'type' => OrderTypeEnum::class,
        'status' => OrderStatusEnum::class,
    ];
}
