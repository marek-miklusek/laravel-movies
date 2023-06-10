<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public $popular;
    public $topRated;
    public $genres;
    public $documentary;
    public $comedy;
    public $mystery;
    public $action;
    public $war;    
    
    public function __construct($popular, $topRated, $genres, $documentary, $comedy, $mystery, $action, $war)
    {
        $this->popular     = $popular;
        $this->topRated    = $topRated;
        $this->genres      = $genres;
        $this->documentary = $documentary;
        $this->comedy      = $comedy;
        $this->mystery     = $mystery;
        $this->action      = $action;
        $this->war         = $war;
    }


    public function popular()
    {
        return $this->formatTv($this->popular);
    }


    public function topRated()
    {
        return $this->formatTv($this->topRated);
    }


    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }


    public function documenray()
    {
        return $this->formatTv($this->documentary);
    }


    public function comedy()
    {
        return $this->formatTv($this->comedy);
    }


    public function mystery()
    {
        return $this->formatTv($this->mystery);
    }


    public function action()
    {
        return $this->formatTv($this->action);
    }


    public function war()
    {
        return $this->formatTv($this->war);
    }


    private function formatTv($tv)
    {
        return collect($tv)->map(function($tvshow) {
            $genres_formatted = collect($tvshow['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
                'vote_average' => $tvshow['vote_average'] * 10 .'%',
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $genres_formatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'name', 'vote_average', 'overview', 'first_air_date', 'genres',
            ]);
        });
    }
}
