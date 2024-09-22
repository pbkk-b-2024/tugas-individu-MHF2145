@extends('layouts.app_layout')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-4">Welcome to Movie Wiki</h1>

        @guest
            <p class="mb-4">Welcome, Guest! Please <a class="text-blue-500" href="{{ route('login') }}">login</a> or <a class="text-blue-500" href="{{ route('register') }}">register</a> to add movies to your wishlist.</p>
        @else
            <script>
                document.getElementById('sidebar-toggle').classList.remove('hidden');
            </script>
            <p class="mb-4">Welcome, {{ Auth::user()->name }}!</p>

            @if(Auth::user()->role == 'admin')
                <p class="mb-4">You are an Admin. You can <a class="text-blue-500" href="{{ route('admin.movies.index') }}">manage movies</a>.</p>
            @else
                <p class="mb-4">You are a User. Explore our collection of movies and add them to your <a class="text-blue-500" href="{{ route('wishlist.index') }}">wishlist</a>.</p>
            @endif
        @endguest

        <div class="movie-list">
            <h2 class="text-2xl font-semibold mb-2">Available Movies</h2>
            @if($movies->isEmpty())
                <p>No movies available at the moment.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($movies as $movie)
                        <div class="bg-white p-4 shadow rounded">
                            <img src="{{ $movie->poster_path }}" alt="{{ $movie->title }} poster" class="w-full h-48 object-cover rounded mb-2">
                            <h5 class="font-bold text-lg">{{ $movie->title }}</h5>
                            <p class="text-gray-600">{{ Str::limit($movie->description, 100) }}</p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="text-blue-500 underline">View Details</a>

                            @auth
                                <form action="{{ route('movies.addToWishlist', $movie->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white py-1 px-2 rounded">Add to Wishlist</button>
                                </form>
                            @endauth
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
