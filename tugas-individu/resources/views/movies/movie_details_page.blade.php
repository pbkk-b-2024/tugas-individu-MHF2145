@extends('layouts.app_layout')

@section('content')
    <div class="container">
        <div class="card">
            <img src="{{ $movie->poster_path }}" class="card-img-top" alt="{{ $movie->title }}">
            <div class="card-body">
                <h1>{{ $movie->title }}</h1>
                <p>{{ $movie->description }}</p>
                <p><strong>Director:</strong> {{ $movie->director }}</p>
                <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
                <p><strong>Rating:</strong> {{ $movie->rating }}/10</p>
                <p><strong>Genre:</strong> {{ $movie->genre }}</p>

                <form action="{{ route('wishlist.add', $movie->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Add to Wishlist</button>
                </form>
            </div>
        </div>
    </div>
@endsection
