<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'director',
        'rating',
        'genre',
        'poster_path',
    ];

    /**
     * The users that have this movie in their wishlist.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'wishlists', 'movie_id', 'user_id')
                    ->withTimestamps(); // Use withTimestamps if you want to keep track of when movies were added
    }
}
