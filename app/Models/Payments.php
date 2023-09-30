<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PaymentStatusEnum;

class Payments extends Model
{
    use HasFactory;


    protected $casts = [
        'status' => PaymentStatusEnum::class,
    ];
}
