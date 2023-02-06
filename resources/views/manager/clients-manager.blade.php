@extends('layouts.manager')

@section('rents-active', 'text-white')
@section('clients-active', 'text-secondary')

@section('content')

<div class="p-5 main-content">
        <div class="container">
            <div class="rent-logo d-flex">
               <div class="col-lg-9">
                    <h1 class="text-white">List of clients: </h1>
                </div>
                <div class="col-lg-3 text-white">
                    <h2>Rents:  <span>{{ $ordersCount->count() }}</span> rents</h2>
                </div>
            </div>
            </div>
            <div class="report clients d-flex flex-wrap">
                @foreach($clients as $client)
                    <div class="col-lg-2 mr-4 p-3 report-inner client">
                        <img src="{{ asset('images/employee.png') }}" alt="manager"><br>
                        <p>Client Name: {{ $client->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection