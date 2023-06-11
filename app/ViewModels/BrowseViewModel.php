<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class BrowseViewModel extends ViewModel
{
    public $movies;
    public $sort;
    public $genres;

    public function __construct($movies, $sort, $genres)
    {
        $this->movies = $movies;
        $this->sort = $sort;
        $this->genres = $genres;
    }


    public function movies()
    {
         switch ($this->sort) {
            case 'release':
                return $this->formatMovies($this->movies)->sortByDesc('release_date');
                break;
            case 'rating':
                return $this->formatMovies($this->movies)->sortByDesc('vote_average');
                break;
            case 'az':
                return $this->formatMovies($this->movies)->sortBy('title');
                break;
            case 'za':
                return $this->formatMovies($this->movies)->sortByDesc('title');
                break;
            default:
                return $this->formatMovies($this->movies);
                break;
        }
    }


    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }


    private function formatMovies($movies)
    {
        return collect($movies)->map(function($movie) {
            $genres_formatted = collect($movie['genre_ids'])->mapWithKeys(function($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w500'.$movie['poster_path']
                    : 'https://via.placeholder.com/500x750',
                'sort' => $this->sort,
                'vote_average' => $movie['vote_average'] * 10 .'%',
                'human_date' => Carbon::parse($movie['release_date'])->format('d M, Y'),
                'genres' => $genres_formatted,
            ])->only([
                'poster_path', 'id', 'release_date', 'title', 'original_language', 'sort',
                'vote_average', 'genres', 'human_date'
            ]);
        });
    }
}
