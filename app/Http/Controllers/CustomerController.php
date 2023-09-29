<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Log;
use App\Exceptions\ResponseError;

class CustomerController extends Controller
{
    /**
     * Create new customer.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customer = new Customers();
        $customer->email = $request->email;
        $customer->full_name = $request->fullName;
        $customer->password = $request->password;
        $customer->save();

        return response()->json([
            'sucess' => true,
            'message' => 'Register Success',
            'data' => $customer,
            'code' => 201
        ], 201);
    }
}
