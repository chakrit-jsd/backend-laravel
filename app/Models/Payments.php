<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\PaymentStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payments extends Model
{
    use HasFactory;


    protected $casts = [
        'status' => PaymentStatusEnum::class,
    ];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(PaymentProviders::class, 'payment_id', 'id');
    }
}
