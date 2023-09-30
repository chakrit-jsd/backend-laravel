<?php

namespace App\Http\Controllers\Rooms;

use App\Http\Controllers\Controller;
use App\Models\Rooms;
use App\Models\Coins;
use App\Models\Fiats;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RoomController extends Controller
{
    use AuthenticatesUsers;
    //
    protected $coinArr = ['BTC', 'ETH', 'BNB', 'XRP', 'ADA', 'DOGE', 'SOL', 'TRX'];
    protected $fiatArr = ['THB', 'USD'];
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $requset): View
    {
        $fiat = is_null((request()->query('fiat'))) ? 1 : request()->query('fiat');
        $type = is_null((request()->query('type'))) ? 'buy' : request()->query('type');
        $coin = is_null((request()->query('coin'))) ? 1 : request()->query('coin');
        $order = is_null((request()->query('order'))) ? 'asc' : request()->query('order');
        $cQuery = Coins::where('symbol', $this->coinArr[$coin])->first();
        $fQiery =  Fiats::where('symbol', $this->fiatArr[$fiat])->first();
        $rooms = Rooms::where([
            ['type', '=', $type],
            ['coin_id', '=', $cQuery->id],
            ['fiat_id', '=', $fQiery->id]
        ])->orderBy('price', $order)->paginate(20);
        $rooms->withQueryString()->links();
        return view('rooms.room', [
            'rooms' => $rooms,
            'coin_name' => $cQuery->name,
            'fiat_name' => $fQiery->name,
        ]);
    }

    // public function getRooms() {
    //     return view('rooms.room');
    // }
}
