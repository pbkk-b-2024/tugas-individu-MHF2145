@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Movie</h1>

    <form action="{{ route('admin.movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $movie->title }}" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" name="director" value="{{ $movie->director }}" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" name="rating" value="{{ $movie->rating }}" min="0" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
