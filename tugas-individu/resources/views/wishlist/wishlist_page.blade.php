@extends('layouts.app_layout')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Your Wishlist</h1>

    @if($wishlistMovies->isEmpty())
        <div class="text-center text-gray-500">
            <p>{{ $placeholderMessage }}</p>
        </div>
    @else
        <ul>
            @foreach($wishlistMovies as $movie)
                <li>{{ $movie->title }}</li>
                <!-- You can add more movie details here -->
            @endforeach
        </ul>
    @endif
</div>
@endsection
