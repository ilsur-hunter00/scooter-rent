@extends('layouts.admin')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-white')
@section('managers-active', 'text-white')
@section('clients-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="add-new"><br>
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
                <form method="POST" action="{{ url('admin/add-new-kind-button') }}">
                @csrf

                    <input class="add-new__input" name="scooter_kind" type="text" placeholder="size-name"><br>
                    <span style="color: white;">@error('scooter_kind') {{ $message }} @enderror</span><br>

                    <input class="add-new__input" name="rent_price" type="text" placeholder="rent-price"><br>
                    <span style="color: white;">@error('rent_price') {{ $message }} @enderror</span><br><br>
                    
                    <!-- <input class="mb-1 add-new__input" type="text" placeholder="scooter-photo (link)"><br> -->
                   

                    <button type="submit" class="btn btn-warning add-new__btn">Add new kind</button>
                </form>
            </div>
        </div>
    </div>

@endsection