<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Coins extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name', 'symbol', 'status'
    // ];

    public function coinWallets(): HasMany
    {
        return $this->hasMany(CoinWallets::class, 'coin_id', 'id');
    }

}
