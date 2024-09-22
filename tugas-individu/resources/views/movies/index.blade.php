@extends('layouts.app_layout')

@section('content')
    <div class="container">
        <h1>Movie List</h1>

        <div class="row">
            @foreach($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $movie->poster_path }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">Rating: {{ $movie->rating }} / 10</p>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
