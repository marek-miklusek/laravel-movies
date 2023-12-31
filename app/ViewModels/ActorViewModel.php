<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public function __construct(public $actor, public $social, public $credits)
    {
        //
    }

    
    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => $this->actor['birthday'] 
                ? Carbon::parse($this->actor['birthday'])->format('d M, Y') 
                : 'Unknown',
            'place_of_birth' => $this->actor['place_of_birth'] ? $this->actor['place_of_birth'] : 'Unknown',
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/w300/'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x450',
        ])->only([
            'birthday', 'age', 'profile_path', 'name', 'id', 'homepage', 'place_of_birth', 'biography'
        ]);
    }


    public function social()
    {
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'instagram', 'twitter',
        ]);
    }


    public function knownForMovies()
    {
        $cast_movies = collect($this->credits)->get('cast');

        return collect($cast_movies)->sortByDesc('popularity')->take(5)->map(function($movie) {
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$movie['poster_path']
                    : 'https://via.placeholder.com/185x278',
                'title' => $title,
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id'])
                    : route('tv.show', $movie['id'])
            ])->only([
                'poster_path', 'title', 'id', 'media_type', 'linkToPage',
            ]);
        });
    }


    public function credits()
    {
        $cast_movies = collect($this->credits)->get('cast');

        return collect($cast_movies)->map(function($movie) {
            if (isset($movie['release_date'])) {
                $release_date = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $release_date = $movie['first_air_date'];
            } else {
                $release_date = '';
            }

            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            return collect($movie)->merge([
                'release_date' => $release_date,
                'release_year' => isset($release_date) ? Carbon::parse($release_date)->format('Y') : 'Future',
                'title' => $title,
                'character' => isset($movie['character']) ? $movie['character'] : '',
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movies.show', $movie['id'])
                    : route('tv.show', $movie['id']),
            ])->only([
                'release_date', 'release_year', 'title', 'character', 'linkToPage',
            ]);
        })->sortByDesc('release_date');
    }
}
