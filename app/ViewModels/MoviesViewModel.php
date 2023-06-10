<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popular;
    public $trending;
    public $genres;
    public $comedy;
    public $action;
    public $horror;
    public $mystery;
    public $war;

    public function __construct($popular, $trending, $genres, $comedy, $action, $horror, $mystery, $war)
    {
        $this->popular  = $popular;
        $this->trending = $trending;
        $this->genres   = $genres;
        $this->comedy   = $comedy;
        $this->action   = $action;
        $this->horror   = $horror;
        $this->mystery  = $mystery;
        $this->war      = $war;
    }


    public function popular()
    {
        return $this->formatMovies($this->popular);
    }


    public function trending()
    {
        return $this->formatMovies($this->trending);
    }


    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }


    public function comedy()
    {
        return $this->formatMovies($this->comedy);
    }


    public function action()
    {
        return $this->formatMovies($this->action);
    }


    public function horror()
    {
        return $this->formatMovies($this->horror);
    }


    public function mystery()
    {
        return $this->formatMovies($this->mystery);
    }


    public function war()
    {
        return $this->formatMovies($this->war);
    }

    
    private function formatMovies($movies) 
    {
        return collect($movies)->map(function($movie) {
            $genres_formatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 .'%',
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genres_formatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres', 'original_language'
            ]);
        });
    }
}
