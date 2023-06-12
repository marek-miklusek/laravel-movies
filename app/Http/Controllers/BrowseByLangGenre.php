<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\BrowseViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BrowseByLangGenre extends Controller
{
    private $sort;

    public function index()
    {
        $movies = Cache::remember('browse_en', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=en')
                ->json()['results'];
        });

        $genres = Cache::remember('genres_browse', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list')
                ->json()['genres'];
        });

        $viewModel = new BrowseViewModel(
            $movies,
            $this->sort,
            $genres,
        );

        return view('browse.index', $viewModel);
    }


    public function selectByLang($lang)
    {
        switch ($lang) {
            case 'en':
                $movies = Cache::remember('lang_en', 60 * 60, function() {
                    return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=en')
                        ->json()['results'];
                });
                break;
            case 'fr':
                $movies = Cache::remember('lang_fr', 60 * 60, function() {
                    return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=fr')
                        ->json()['results'];
                });
                break;
            case 'sk':
                $movies = Cache::remember('lang_sk', 60 * 60, function() {
                    return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=sk')
                        ->json()['results'];
                });
                break;
            case 'cs':
                $movies = Cache::remember('lang_cs', 60 * 60, function() {
                    return Http::withToken(config('services.tmdb.token'))
                        ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=cs')
                        ->json()['results'];
                });
                break;
            default:
                $movies = [];
                break;
        }

        $genres = Cache::remember('genres_lang', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list')
                ->json()['genres'];
        });

        $viewModel = new BrowseViewModel(
            $movies,
            $this->sort,
            $genres,
        );
        
        return view('browse.index', $viewModel);
    }


    public function selectByGenres($genre, $lang, $sort = null)
    {
        switch ($genre) {
            case 'comedy':
                $movies  = $this->getMoviesByLangGenre($lang, 35);
                break;
            case 'action':
                $movies  = $this->getMoviesByLangGenre($lang, 28);
                break;
            case 'horror':
                $movies  = $this->getMoviesByLangGenre($lang, 27);
                break;
            case 'mystery':
                $movies  = $this->getMoviesByLangGenre($lang, 9648);
                break;
            case 'war':
                $movies  = $this->getMoviesByLangGenre($lang, 10752);
                break;
            default:
                $movies = [];
                break;
        }

        $genres = Cache::remember('select_by_genres', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/movie/list')
                ->json()['genres'];
        });

        $viewModel = new BrowseViewModel(
            $movies,
            $sort,
            $genres,
        );
        
        return view('browse.index', $viewModel, compact('genre'));
    }


    public function sortBy($sort, $lang, $genre = null)
    {
        $this->sort = $sort;

        if ($genre) {
            return $this->selectByGenres($genre, $lang, $this->sort);
        }
        else{
            return $this->selectByLang($lang);
        }
    }


    private function getMoviesByLangGenre($lang, $genre_id)
    {
        return Cache::remember('lang_genre'.$lang.'_'.$genre_id, 60 * 60, function () use ($lang, $genre_id) {
            return Http::withToken(config('services.tmdb.token'))
                ->get("https://api.themoviedb.org/3/discover/movie?with_original_language=$lang&with_genres=$genre_id")
                ->json()['results'];
        });
    }
}
