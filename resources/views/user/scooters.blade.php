@extends('layouts.user')

@section('scooters-active', 'text-secondary')
@section('reviews-active', 'text-secondary')
@section('rent-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="scooters d-flex flex-wrap">
                @foreach($scooter_kinds as $scooter_kind)
                    <div class="col-lg-4 scooters-kind">
                        <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-size">
                        <h3>{{ $scooter_kind->scooter_kind }}</h3>
                        <p>For small people</p>
                        <a href="{{ route('user.scooter', $scooter_kind->id) }}" class="btn btn-dark">Choose</a>
                    </div>
                @endforeach

                <!-- <div class="col-lg-4 scooters-kind">
                    <img src="{{ asset('images/medium-scooter.jpg') }}" alt="m-size">
                    <h3>Medium size</h3>
                    <p>For medium people</p>
                    <a href="/scooters/medium-scooters" class="btn btn-dark">Choose</a>
                </div>

                <div class="col-lg-4 scooters-kind">
                    <img src="{{ asset('images/large-scooter.jpg') }}" alt="l-size">
                    <h3>Large size</h3>
                    <p>For large people</p>
                    <a href="/scooters/large-scooters" class="btn btn-dark">Choose</a>
                </div> -->
            </div>
        </div>
    </div>

@endsection