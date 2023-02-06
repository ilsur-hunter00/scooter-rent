@extends('layouts.manager')

@section('rents-active', 'text-secondary')
@section('clients-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="rent-logo">
                <h1 class="text-white">Rent requests: </h1>
            </div>
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            <div class="managers d-flex flex-wrap">
                @foreach($orders as $order)
                    <div class="col-lg-2 mr-4 p-3 rents-managers">
                        <form method="POST" action="{{ route('manager.rents-accept', $order->id) }}">
                        @csrf
                            <p>Rent {{ $order->id }}</p><br>
                            <p>Name: </p><span>{{ $order->name }}</span><br>
                            <p>Scooter kind: </p><span>{{ $order->scooter_kind }}</span><br>
                            <p>Scooter id: </p><span>{{ $order->id }}</span><br>
                            <p>Rent price: </p><span>{{ $order->rent_price }}</span><br>
                            <input type="submit" class="btn btn-light" value="Accept">
                            <a href="{{ route('manager.rents-refuse', $order->id) }}" class="btn btn-danger">Refuse</a>
                            <input type="hidden" id="scooter_id" name="scooter_id" value="{{$order->scooter_id}}">
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection