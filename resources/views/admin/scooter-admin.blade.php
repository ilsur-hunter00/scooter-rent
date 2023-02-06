@extends('layouts.admin')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-white')
@section('managers-active', 'text-white')
@section('clients-active', 'text-white')

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
                @foreach($scooter_kinds as $scooter_kind)

                    @foreach($scooters as $scooter)
                        <div class="small-scooter d-flex">
                            <div class="small-scooter__img">
                                <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-scooter">
                            </div>
                            <div class="small-scooter__info">
                                <form action="">
                                    <p>Scooter kind: <span><b>{{ $scooter -> scooter_kind }}</b></span></p>
                                    <label class="mb-3" for="rent-place">Choose rent place</label><br>
                                    <select class="mb-2 rent-place__select" name="" id="rent-place">
                                        <option value="{{ $scooter -> rent_place }}">{{ $scooter -> rent_place }}</option>
                                    </select>
                                    <br>
                                        <a href="/admin/scooters/{{ $scooter_kind->id }}/{{ $scooter->id }}/delete" class="btn btn-warning">Delete</a>
                                    
                                    <div class="scooter-price">{{ $scooter -> rent_price }}$/hour</div>
                                </form>
                            </div>
                        </div>
                    @endforeach            
            </div>
            
            
                <div class="add-new__scooter">
                    <a href="{{ route('admin.add-new-scooter', $scooter_kind->id) }}" class="btn btn-link">Add new scooter</a>
                </div>
                
                @endforeach
        </div>
    </div>

@endsection