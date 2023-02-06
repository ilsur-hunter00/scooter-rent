@extends('layouts.admin')

@section('scooters-active', 'text-white')
@section('rent-active', 'text-white')
@section('managers-active', 'text-secondary')
@section('clients-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="rent-logo d-flex">
                <div class="col-lg-9">
                    <h1 class="text-white">List of managers: </h1>
                </div>
                <div class="col-lg-3 text-white">
                    <h2>Sells:  <span>{{ $sellsCount->count() }}</span> sells</h2>
                </div>
            </div>
            <div class="report managers d-flex flex-wrap">
                @foreach($managers as $manager)
                    <div class="col-lg-2 mr-4 p-3 report-inner manager">
                        <img src="{{ asset('images/employee.png') }}" alt="manager"><br>
                        <p>Manager name: {{ $manager->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection