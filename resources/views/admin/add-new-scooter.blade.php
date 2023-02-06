@extends('layouts.admin')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-white')
@section('managers-active', 'text-white')
@section('clients-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="add-new">

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

                @foreach($scooter_kinds as $scooter_kind)

                    <form method="POST" action="{{ route('admin.add-new-scooter-button', $scooter_kind->id) }}">
                
                @endforeach

                    @csrf
                            <label class="mb-3" for="rent-place">Choose scooter kind</label><br>
                            <select class="mb-2 rent-place__select" name="kind_id" id="kind_id">
                                @foreach($scooter_kinds as $scooter_kind)
                                    <option value="{{ $scooter_kind->id }}">{{ $scooter_kind->scooter_kind }}</option>
                                @endforeach
                            </select>

                            <label class="mb-3" for="rent-place">Choose rent place</label><br>
                            <select class="mb-2 rent-place__select" name="place_id" id="place_id">
                                @foreach($rent_places as $rent_place)
                                    <option value="{{ $rent_place->id }}">{{ $rent_place->rent_place }}</option>
                                @endforeach
                            </select>

                            <label class="mb-3" for="rent-place">Choose manager</label><br>
                            <select class="mb-2 rent-place__select" name="manager_id" id="manager_id">
                                @foreach($managers as $manager)
                                    <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                @endforeach
                            </select>

                            @foreach($scooter_prices as $scooter_price)
                                <input type="hidden" id="rent_price_id" name="rent_price_id" value="{{ $scooter_price->rent_price_id }}" >
                            @endforeach
                            <br><br>

                            <input type="submit" class="btn btn-warning add-new__btn" value="Add new scooter">

                    </form>

            </div>
        </div>
    </div>

@endsection