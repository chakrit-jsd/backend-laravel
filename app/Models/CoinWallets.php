<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CoinWallets extends Model
{
    use HasFactory;


    public function coins(): BelongsTo
    {
        return $this->belongsTo(Coins::class, 'coin_id');
    }

}
