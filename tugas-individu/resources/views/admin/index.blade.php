@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">All Movies</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary">Add New Movie</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Director</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->rating }}</td>
                    <td>
                        <a href="{{ route('admin.movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
