<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class UpcomingViewModel extends ViewModel
{
    public function __construct(public $upcoming, public $nowPlaying, public $airingToday, public $topRated)
    {
        //
    }


    public function upcoming()
    {
        return $this->formatMovies($this->upcoming);
    }


    public function nowPlaying()
    {
        return $this->formatMovies($this->nowPlaying);
    }


    public function airingToday()
    {
        return $this->formatMovies($this->airingToday);
    }


    public function topRated()
    {
        return $this->formatMovies($this->topRated);
    }


    private function formatMovies($movies) 
    {
        return collect($movies)->map(function($movie) {
            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'],
            ])->only([
                'poster_path', 'id', 'title', 'overview', 'name'
            ]);
        });
    }
}
