<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class BrowseViewModel extends ViewModel
{
    public $movies;
    public $sort;

    public function __construct($movies, $sort)
    {
        $this->movies = $movies;
        $this->sort = $sort;
    }


    public function movies()
    {
         switch ($this->sort) {
            case 'release':
                return $this->formatMovies($this->movies)->sortByDesc('release_date');
                break;
            case 'az':
                return $this->formatMovies($this->movies)->sortBy('original_title');
                break;
            case 'za':
                return $this->formatMovies($this->movies)->sortByDesc('original_title');
                break;
            default:
                return $this->formatMovies($this->movies);
                break;
        }
    }


    private function formatMovies($movies)
    {
        return collect($movies)->map(function($movie) {
            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w500'.$movie['poster_path']
                    : 'https://via.placeholder.com/500x750',
                'sort' => $this->sort
            ])->only([
                'poster_path', 'id', 'name', 'release_date', 'original_title', 'original_language', 'sort'
            ]);
        });
    }
}
