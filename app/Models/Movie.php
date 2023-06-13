<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'poster_path', 'route', 'vote_average', 'release_date', 'genres', 'name'];
    
    protected $primaryKey = 'movie_id';

    
    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    /**
     * Get the formatted release date attribute for display
     */
    public function getReleaseDateAttribute($value) 
    {
        return Carbon::parse($value)->format('d M, Y');
    }


    /**
     * Get the route attribute based on the type of media (movie or TV show)
     */
    public function getRouteAttribute($value)
    {
        if ($value == 'movie') {
            return 'movies.show';
        }
        else {
            return 'tv.show';
        };
    }


    /**
     * Get the vote average attribute without the percentage sign.
     */
    public function getVoteAverageAttribute($value)
    {
        return rtrim($value, '%');
    }
}
