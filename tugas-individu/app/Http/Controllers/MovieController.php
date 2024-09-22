<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    // Show all movies
    public function index()
    {
        $movies = Movie::all();

        // Check if the user is the admin based on username or email
        if (Auth::check() && (Auth::user()->name === 'Moderator' || Auth::user()->email === 'Mod@tugas.com')) {
            return view('admin.movies_management', compact('movies'));
        }

        // If the user is not an admin, display an error message
        return redirect()->back()->with('error', 'You are not authorized to access this page.');
    }


    // Show the form for creating a new movie
    public function create()
    {
        return view('admin.create_movie'); // Updated to point to the new admin view
    }

    // Store a newly created movie
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'director' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'genre' => 'required|string|max:255',
            'poster_path' => 'nullable|string|max:255',
        ]);

        Movie::create($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    // Show the details of a specific movie
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    // Show the form for editing a specific movie
    public function edit(Movie $movie)
    {
        return view('admin.edit_movie', compact('movie')); // Updated to point to the new admin view
    }

    // Update a specific movie
    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'director' => 'required|string|max:255',
            'rating' => 'required|numeric|min:0|max:10',
            'genre' => 'required|string|max:255',
            'poster_path' => 'nullable|string|max:255',
        ]);

        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    // Remove a specific movie
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }

    // Add a movie to the wishlist
    public function addToWishlist(Movie $movie)
    {
        $user = Auth::user();
        if ($user) {
            $user->wishlistMovies()->attach($movie->id);
            return redirect()->route('movies.index')->with('success', 'Movie added to wishlist.');
        }

        return redirect()->route('login')->with('error', 'Please log in to add movies to your wishlist.');
    }
}
