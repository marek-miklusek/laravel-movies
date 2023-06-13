<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\MovieViewModel;
use App\ViewModels\MoviesViewModel;
use App\ViewModels\UpcomingViewModel;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        
        $comedy  = $this->getMoviesByGenre(35);
        $action  = $this->getMoviesByGenre(28);
        $horror  = $this->getMoviesByGenre(27);
        $mystery = $this->getMoviesByGenre(9648);
        $war     = $this->getMoviesByGenre(10752);

        $viewModel = new MoviesViewModel(
            $popular,
            $trending,
            $comedy,
            $action,
            $horror,
            $mystery,
            $war
        );

        return view('movies.index', $viewModel);
    }


    public function show($id): View
    {
        $movie = Cache::remember('movie_'.$id, 60 * 60, function () use ($id) {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,videos,images')
                ->json();
        });

        $viewModel = new MovieViewModel($movie);

        return view('movies.show', $viewModel);
    }


    public function upcoming()
    {
        $upcoming = Cache::remember('movies_upcoming', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/upcoming')
                ->json()['results'];
        });

        $nowPlaying = Cache::remember('movies_now_playing', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/now_playing')
                ->json()['results'];
        });

        $airingToday = Cache::remember('tv_airing_today', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/airing_today')
                ->json()['results'];
        });

        $topRated = Cache::remember('movies_top_rated', 60 * 60, function () {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/top_rated')
                ->json()['results'];
        });

        $viewModel = new UpcomingViewModel(
            $upcoming,
            $nowPlaying,
            $airingToday,
            $topRated,
        );

        return view('movies.upcoming', $viewModel);
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
