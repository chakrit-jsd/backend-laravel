<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\View\View;
class OrderController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index(Request $requset): View
    {
        return view('orders.order', [
            'orders' => 'orrrrrr'
        ]);
    }
}
