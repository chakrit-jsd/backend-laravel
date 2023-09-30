<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\WithdrawStatusEnum;
use App\Enums\WithdrawTypeEnum;


class Withdraws extends Model
{
    use HasFactory;


    protected $casts = [
        'type' => WithdrawTypeEnum::class,
        'status' => WithdrawStatusEnum::class,
    ];
}
