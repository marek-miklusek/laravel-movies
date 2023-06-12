<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public function __construct(public $popular, public $trending, public $comedy, public $action, public $horror, public $mystery, public $war)
    {
        //
    }


    public function popular()
    {
        return $this->formatMovies($this->popular);
    }


    public function trending()
    {
        return $this->formatMovies($this->trending);
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
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
            ])->only([
                'poster_path', 'id', 'title', 'overview'
            ]);
        });
    }
}
