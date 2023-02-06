@extends('layouts.admin')

@section('scooters-active', 'text-white')
@section('rent-active', 'text-secondary')
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

                <form method="POST" action="{{ url('admin/add-new-rent-place-button') }}">
                @csrf
                    <input class="mb-1 add-new__input" name="rent_place" type="text" placeholder="rent-place-name"><br>
                    <span style="color: white;">@error('rent_place') {{ $message }} @enderror</span><br>

                    <!-- <input class="mb-1 add-new__input" type="text" placeholder="rent-place-photo (link)"><br> -->

                    <input type="submit" class="btn btn-warning add-new__btn" value="Add new rent place">
                </form>
            </div>
        </div>
    </div>

@endsection