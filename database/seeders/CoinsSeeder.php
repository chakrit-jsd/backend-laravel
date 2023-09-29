<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Coins;
use Log;

class CoinsSeeder extends Seeder
{

    /**
     * Data
     * @param array
     */
    protected $cyptos = [
        'BTC' => 'Bitcoin',
        'ETH' => 'Ethereum',
        'BNB' => 'BNB',
        'XRP' => 'XRP',
        'ADA' => 'Cardano',
        'DOGE' => 'Dogecoin',
        'SOL' => 'Solana',
        'TRX' => 'TRON',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = [];
        foreach ($this->cyptos as $key => $value) {
            // Log::channel('console')->info("$value -- $key");
            array_push($batch, [
                'name' => $value,
                'symbol' => $key,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        Coins::insert($batch);
    }
}
