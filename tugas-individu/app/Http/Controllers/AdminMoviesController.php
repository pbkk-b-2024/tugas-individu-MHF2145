<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AdminMoviesController extends Controller
{
    // Display a listing of the movies
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    // Show the form for creating a new movie
    public function create()
    {
        return view('admin.movies.create');
    }

    // Store a newly created movie in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        Movie::create($request->all());
        return redirect()->route('admin.movies.index')->with('success', 'Movie created successfully.');
    }

    // Show the form for editing the specified movie
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    // Update the specified movie in the database
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
        ]);

        $movie->update($request->all());
        return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully.');
    }

    // Remove the specified movie from the database
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('success', 'Movie deleted successfully.');
    }
}
