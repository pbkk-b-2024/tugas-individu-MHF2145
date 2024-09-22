<?php

namespace App\Http\Controllers;

use App\Models\Movie; // Import the Movie model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Show the homepage with available movies
    public function index()
    {
        $movies = Movie::all(); // Fetch all movies
        return view('home.homepage', compact('movies')); // Pass movies to the homepage view
    }
}
