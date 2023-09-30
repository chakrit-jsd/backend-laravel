<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Enums\RoomTypeEnum;
use App\Models\User;
use App\Models\Coins;
use App\Models\Fiats;
use App\Models\CoinWallets;
use App\Models\Payments;
use App\Models\Rooms;
use GuzzleHttp\Client;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Seeder Users');
        $batch = User::factory(1000)->sequence(
            fn (Sequence $sequence) => ['email' => "ftest0000$sequence->index@gmail.com"],
        )->has(Payments::factory()->state(
            function (array $attributes, User $user) {
                return ['account_name' => $user->name];
            }
        ))->create();


        $req = new Client(['headers' => ['X-CoinAPI-Key' => 'AF8CE943-3925-4BE7-B78E-D1D6C6C4E02B']]);
        $coinPrice = [];
        $coins = Coins::all();
        $fiats = Fiats::all();
        $wallets = [];
        foreach ($batch as $user) {
            $count = rand(0, count($coins) - 1);
            $isDup = [];
            $wallet = [];
            for($i = 0; $i < $count; $i++) {
                $coin_index = rand(0, count($coins) - 1);
                if (!in_array($coin_index, $isDup)) {
                    array_push($wallet, CoinWallets::factory()->state(['user_id' => $user->id, 'coin_id' => $coins[$coin_index]])->create());
                    array_push($isDup, $coin_index);
                }
            }
            $type = RoomTypeEnum::values();
            $rCount = rand(0, count($coins));
            $rBatch = [];
            for ($i = 0; $i < $rCount; $i++) {
                $coin = $coins->random();
                $cPrice = isset($coinPrice[$coin->symbol])
                    ? $coinPrice[$coin->symbol]
                    : $res = json_decode($req->request('GET', "https://rest.coinapi.io/v1/exchangerate/$coin->symbol/USD")->getBody())->rate;

                $coinPrice[$coin->symbol] = $cPrice;

                $room = new Rooms();
                $room->fiat_id = $fiats->random()->id;
                $room->coin_id = $coin->id;
                $room->type = $type[rand(0, 1)];

                if ($room->fiat_id == 1) {
                    $room->price = round((rand(85, 110) / 100) * 35 * $cPrice, 2);
                } else {
                    $room->price = round((rand(85, 110) / 100) * $cPrice, 2);
                }
                $room->amount = rand(10, 9999);
                $room->payment_id = $user->payments[0]->id;
                $room->user_id = $user->id;
                $room->save();
            }

        }
        // $req = new Client(['headers' => ['X-CoinAPI-Key' => 'AF8CE943-3925-4BE7-B78E-D1D6C6C4E02B']]);

        // $res = $req->request('GET', 'https://rest.coinapi.io/v1/exchangerate/TRX/USD')->getBody();
        // print_r(json_decode($req->request('GET', "https://rest.coinapi.io/v1/exchangerate/BTC/USD")->getBody())->rate);
        // $coins = CoinWallets::factory()->state(['user_id' => 1, 'coin_id' => 1])->make();
        // print_r(json_decode($res->getBody()->getContents()));
        // $this->command->info(json_encode(User::find(29)->coinWallets));
    }
}
