<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\RoomPaymentTimeEnum;
use App\Enums\RoomTypeEnum;
use App\Enums\RoomStatusEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rooms extends Model
{
    use HasFactory;


    protected $casts = [
        'type' => RoomTypeEnum::class,
        'status' => RoomStatusEnum::class,
        'payment_time' => RoomPaymentTimeEnum::class,
    ];


    public function coins(): BelongsTo
    {
        return $this->belongsTo(Coins::class, 'coin_id', 'id');
    }
    public function fiats(): BelongsTo
    {
        return $this->belongsTo(Fiats::class, 'fiat_id', 'id');
    }
    public function payments(): BelongsTo
    {
        return $this->belongsTo(Payments::class, 'payment_id', 'id');
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
