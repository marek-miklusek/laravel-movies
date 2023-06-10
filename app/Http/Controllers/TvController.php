<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TvController extends Controller
{
    public function index()
    {
        $popular = Cache::remember('tv_popular', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/popular')
                ->json()['results'];
        });

        $topRated = Cache::remember('tv_topRated', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/top_rated')
                ->json()['results'];
        });

        $genres = Cache::remember('tv_genres', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/tv/list')
                ->json()['genres'];
        });

        $documentary = $this->getTvShowsByGenre(99);
        $comedy      = $this->getTvShowsByGenre(35);
        $mystery     = $this->getTvShowsByGenre(9648);
        $action      = $this->getTvShowsByGenre(10759);
        $war         = $this->getTvShowsByGenre(10768);

        $viewModel = new TvViewModel(
            $popular,
            $topRated,
            $genres,
            $documentary,
            $comedy,
            $mystery,
            $action,
            $war
        );

        return view('tv.index', $viewModel);
    }

    
    public function show($id)
    {
        $tvshow = Cache::remember('tvshow_'.$id, 60 * 60, function() use($id) {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
                ->json();
        });
      dd($tvshow);
        $viewModel = new TvShowViewModel($tvshow);

        return view('tv.show', $viewModel);
    }


    private function getTvShowsByGenre($genre_id)
    {
        return Cache::remember('tv_genre_'.$genre_id, 60 * 60, function () use ($genre_id) {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/discover/tv', [
                'with_genres' => $genre_id,
            ])->json()['results'];
        });
    }
}
