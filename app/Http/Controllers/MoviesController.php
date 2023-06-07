<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MoviesController extends Controller
{
    public function index(): View
    {
        $popular = Cache::remember('movies_popular', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
                ->json()['results'];
        });

        $trending = Cache::remember('movies_trending', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/trending/movie/day')
                ->json()['results'];
        });

        $genres = Cache::remember('movies_genres', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        });

        $viewModel = new MoviesViewModel(
            $popular,
            $trending,
            $genres,
        );

        $comedies  = $this->getMoviesByGenre(35);
        $action    = $this->getMoviesByGenre(28);
        $mystery   = $this->getMoviesByGenre(9648);
        $horror    = $this->getMoviesByGenre(27);
        $war       = $this->getMoviesByGenre(10752);
        
        return view('movies.index', $viewModel, [
            'comedies'  => $comedies,
            'mystery'   => $mystery,
            'action'    => $action,
            'horror'    => $horror,
            'war'       => $war,
        ]);
    }


    public function show($id): View
    {
        $movie = Cache::remember('movie_'.$id, 3600, function () use ($id) {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();
        });

        $viewModel = new MovieViewModel($movie);

        return view('movies.show', $viewModel);
    }


    private function getMoviesByGenre($genre_id)
    {
        return Cache::remember('movies_genre_'.$genre_id, 60 * 60, function () use ($genre_id) {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie', [
                'with_genres' => $genre_id,
            ])->json()['results'];
        });
    }
}
