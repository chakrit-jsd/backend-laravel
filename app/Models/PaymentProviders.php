<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PaymentTypeEnum;

class PaymentProviders extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => PaymentTypeEnum::class,
    ];
}
