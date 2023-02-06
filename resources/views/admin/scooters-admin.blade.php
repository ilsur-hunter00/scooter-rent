@extends('layouts.admin')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-white')
@section('managers-active', 'text-white')
@section('clients-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="scooters d-flex flex-wrap">
                @foreach($scooter_kinds as $scooter_kind)
                    <div class="col-lg-4 scooters-kind">
                        <img src="{{ asset('images/small-scooter.jpg') }}" alt="s-size">
                        <h3>{{ $scooter_kind->scooter_kind }}</h3>
                        <p>For small people</p>
                        <a href="{{ route('admin.scooter', $scooter_kind->id) }}" class="btn btn-dark">Choose</a>
                        <a href="{{ route('admin.scooter-delete', $scooter_kind->id) }}" class="btn btn-warning scooter-kind__delete">x</a>
                    </div>
                @endforeach

                <!-- <div class="col-lg-4 scooters-kind">
                    <img src="{{ asset('images/medium-scooter.jpg') }}" alt="m-size">
                    <h3>Medium size</h3>
                    <p>For medium people</p>
                    <a href="{{ url('/admin/scooters/medium-scooters') }}" class="btn btn-dark">Choose</a>
                    <a href="#" class="btn btn-warning scooter-kind__delete">x</a>
                </div>

                <div class="col-lg-4 scooters-kind">
                    <img src="{{ asset('images/large-scooter.jpg') }}" alt="l-size">
                    <h3>Large size</h3>
                    <p>For large people</p>
                    <a href="{{ url('/admin/scooters/large-scooters') }}" class="btn btn-dark">Choose</a>
                    <a href="#" class="btn btn-warning scooter-kind__delete">x</a>
                </div> -->
            </div>
            <div class="add-new__scooter">
                <a href="{{ url('/admin/add-new-kind') }}" class="btn btn-link">Add new kind</a>
            </div>
        </div>
    </div>

@endsection