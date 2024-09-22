<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show the user's wishlist
    public function index()
    {
        $user = Auth::user();
        $wishlistMovies = $user ? $user->wishlistMovies : collect();

        // Check if the wishlist is empty and set a placeholder message
        $placeholderMessage = $wishlistMovies->isEmpty() ? 'Your wishlist is currently empty. Start adding movies!' : null;

        return view('wishlist.wishlist_page', compact('wishlistMovies', 'placeholderMessage'));
    }

    // Add a movie to the wishlist
    public function store(Request $request, Movie $movie)
    {
        $user = Auth::user();

        if ($user) {
            $user->wishlistMovies()->attach($movie->id);
            return redirect()->route('wishlist.index')->with('success', 'Movie added to wishlist.');
        }

        return redirect()->route('login')->with('error', 'Please log in to add movies to your wishlist.');
    }

    // Remove a movie from the wishlist
    public function destroy(Movie $movie)
    {
        $user = Auth::user();

        if ($user) {
            $user->wishlistMovies()->detach($movie->id);
            return redirect()->route('wishlist.index')->with('success', 'Movie removed from wishlist.');
        }

        return redirect()->route('login')->with('error', 'Please log in to remove movies from your wishlist.');
    }
}
