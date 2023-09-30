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
        $rooms = Rooms::where([
            ['type', '=', $type == 'buy' ? 'sell': 'buy'],
            ['coin_id', '=', $coin],
            ['fiat_id', '=', $fiat]
        ])->orderBy('price', $order)->paginate(20);
        $rooms->withQueryString()->links();
        return view('rooms.room', [
            'rooms' => $rooms,
            'coin_name' => Coins::find($coin)->name,
            'fiat_name' => Fiats::find($fiat)->name,
        ]);
    }

    // public function getRooms() {
    //     return view('rooms.room');
    // }
}
