@extends('layouts.user')

@section('scooters-active', 'text-secondary')
@section('rent-active', 'text-secondary')
@section('reviews-active', 'text-white')

@section('content')

    <div class="p-5 main-content">
        <div class="container">
            <div class="scooters d-flex flex-wrap">
                <div><a href="{{ route('user.create-review') }}" class="btn btn-danger mb-3">New review</a></div>
                @foreach($reviews as $review)
                    <div class="reviews">
                        <h3 class="text-white">{{ $review->review_head }}</h3>
                        <p class="text-white">{{ $review->review_text }}</p>
                        <a href="{{ route('user.delete-review', $review->id) }}" class="btn btn-warning review__delete">DELETE</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection