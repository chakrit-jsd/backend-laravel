@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center flex-column">
    <div class="d-flex">
        <h3>{{ $coin_name }}</h3>
        <div class="px-2"></div>
        <h3>{{ $fiat_name }}</h3>
    </div>
    <ul class="nav">
        <form class="nav" action="/rooms?">
            <li class="nav-item">
                <select name="fiat" class="form-select form-select-sm">
                    <option value="1">THB</option>
                    <option value="2">USD</option>
                </select>
            </li>
            <li class="nav-item">
                <select name="type" class="form-select form-select-sm">
                    <option value="buy">Sell</option>
                    <option value="sell">Buy</option>
                </select>
            </li>
            <li class="nav-item">
                <select name="coin" class="form-select form-select-sm">
                    <option value="1">BTC</option>
                    <option value="2">ETH</option>
                    <option value="3">BNB</option>
                    <option value="4">XRP</option>
                    <option value="5">ADA</option>
                    <option value="6">DOGE</option>
                    <option value="7">SOL</option>
                    <option value="8">TRX</option>
                </select>
            </li>
            <li class="nav-item">
                <select name="order" class="form-select form-select-sm">
                    <option value="desc">High Price</option>
                    <option value="asc">Low Price</option>
                </select>
            </li>
            <li class="nav-item">
              <input type="text" hidden name="page" value="{{ old('page', request('page')) }}">
            </li>
            <input type="submit" value="Submit">
        </form>
      </ul>

    <table class="table table-sm">
        <thead>
            <th>Name</th>
            <th>Price</th>
            <th>Available</th>
            <th>Payment</th>
            <th>Trade</th>
            {{-- <th>Type</th>
            <th>Name</th> --}}
        </thead>
        <tbody>
        @foreach ($rooms as $room)
            <tr>
                <td>{{ $room->users->name }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->amount }}</td>
                <td>Bank tranfer</td>
                <td><a href="{{ route('orders') }}">{{ $room->type->value == 'buy' ? 'sell': 'buy' }}</a></td>
                {{-- <td>{{ $room->type->value }}</td>
                <td>{{ $room->coins->symbol }}</td> --}}
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $rooms->links() }}
    </div>
</div>

@endsection
