@extends('layouts.user')

@section('rent-active', 'text-secondary')
@section('scooters-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="rent-logo">
                <h1 class="text-white">Where you can rent our scooters</h1>
            </div>
            <div class="scooters d-flex flex-wrap">
                @foreach($rent_places as $rent_place)
                    <div class="col-lg-6 scooters-kind rent-kind">
                        <img src="{{ asset('images/kazan-mall.jpg') }}" alt="kazan mall">
                        <div class="rent-info">
                            <h3>{{ $rent_place->rent_place }}</h3>
                            <p>Pavlukhin str</p>
                        </div>
                    </div>
                @endforeach

                <!-- <div class="col-lg-6 scooters-kind rent-kind">
                    <img src="{{ asset('images/grandhotel.jpg') }}" alt="grand hotel">
                    <div class="rent-info">
                        <h3>Grand hotel</h3>
                        <p>Peterburgskaya str</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

@endsection