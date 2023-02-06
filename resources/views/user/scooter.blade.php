@extends('layouts.user')

@section('scooters-active', 'text-secondary')
@section('reviews-active', 'text-secondary')
@section('rent-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="small-scooters">
                @if(Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif

                @foreach($scooters as $scooter)
                    <div class="small-scooter d-flex">
                        <div class="small-scooter__img">
                            <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-scooter">
                        </div>
                        <div class="small-scooter__info">

                            @foreach($scooter_kinds as $scooter_kind)
                            <form method="POST" action="/user/scooters/{{ $scooter_kind->id }}/{{ $scooter->id }}">
                            @csrf
                                <p>Scooter kind: <span><b>{{ $scooter -> scooter_kind }}</b></span></p>
                                <label class="mb-3" for="rent-place">Choose rent place</label><br>
                                <select class="mb-2 rent-place__select" name="" id="rent-place">
                                    <option value="{{ $scooter -> rent_place }}">{{ $scooter -> rent_place }}</option>
                                </select>
                                <br>
                                
                                @if($scooter->is_rented != true)
                                    <input type="submit" value="Rent" class="btn btn-warning rent-scooter__btn">
                                @else 
                                    <input type="submit" value="Rent" class="btn btn-warning rent-scooter__btn" disabled>
                                @endif


                                <input type="hidden" name="scooterId" id="scooterId" value="{{ $scooter->id }}">

                                <input type="hidden" name="managerId" id="managerId" value="{{ $scooter->manager_id }}">

                                <input type="hidden" name="userId" id="userId" value="{{ $scooter->user_name_id }}">

                                
                                <div class="scooter-price">{{ $scooter -> rent_price }}$/hour</div>
                            </form>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <!-- <div class="small-scooter d-flex">
                    <div class="small-scooter__img">
                        <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-scooter">
                    </div>
                    <div class="small-scooter__info">
                        <p>Scooter name: <span><b>Scooter 1</b></span></p>
                        <label class="mb-3" for="rent-place">Choose rent place</label><br>
                        <select class="mb-2" name="" id="rent-place">
                            <option value="Kazan mall">Kazan mall</option>
                            <option value="Grand hotel">Grand hotel</option>
                        </select>
                        <br>
                        <input type="submit" value="rent" class="btn btn-warning rent-scooter__btn">
                        <div class="scooter-price">5$/hour</div>
                    </div>
                </div>

                <div class="small-scooter d-flex">
                    <div class="small-scooter__img">
                        <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-scooter">
                    </div>
                    <div class="small-scooter__info">
                        <p>Scooter name: <span><b>Scooter 1</b></span></p>
                        <label class="mb-3" for="rent-place">Choose rent place</label><br>
                        <select class="mb-2" name="" id="rent-place">
                            <option value="Kazan mall">Kazan mall</option>
                            <option value="Grand hotel">Grand hotel</option>
                        </select>
                        <br>
                        <input type="submit" value="rent" class="btn btn-warning rent-scooter__btn">
                        <div class="scooter-price">5$/hour</div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

@endsection