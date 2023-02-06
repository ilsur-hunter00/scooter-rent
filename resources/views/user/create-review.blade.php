@extends('layouts.user')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-secondary')
@section('reviews-active', 'text-white')

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

                <form method="POST" action="{{ url('user/create-review-button') }}">
                @csrf
                    <input class="mb-1 add-new__input" name="review_head" type="text" placeholder="review-head"><br>
                    <span style="color: white;">@error('review') {{ $message }} @enderror</span><br>

                    <input class="mb-1 add-new__input" name="review_text" type="text" placeholder="review_text"><br>
                    <span style="color: white;">@error('review') {{ $message }} @enderror</span><br>

                    <!-- <input class="mb-1 add-new__input" type="text" placeholder="rent-place-photo (link)"><br> -->

                    <input type="submit" class="btn btn-warning add-new__btn" value="Add new review">
                </form>
            </div>
        </div>
    </div>

@endsection