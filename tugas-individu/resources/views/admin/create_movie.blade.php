@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add New Movie</h1>

    <form action="{{ route('admin.movies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" name="director" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" class="form-control" name="rating" min="0" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
        <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
