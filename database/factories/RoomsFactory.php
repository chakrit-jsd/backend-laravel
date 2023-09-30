<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Coins;
use App\Models\Fiats;
use GuzzleHttp\Client;

class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $req = new Client(['headers' => ['X-CoinAPI-Key' => 'AF8CE943-3925-4BE7-B78E-D1D6C6C4E02B']]);

        $res = $req->request('GET', 'https://rest.coinapi.io/v1/exchangerate/BTC/USD');



        return [
            'coin_id' => Coins::all()->random(),
            'fiat_id' => Fiats::all()->random(),
        ];
    }
}
