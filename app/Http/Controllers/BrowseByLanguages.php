<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\BrowseViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BrowseByLanguages extends Controller
{
    private $sort;

    public function index()
    {
        $movies = Cache::remember('browse_en', 60 * 60, function() {
            return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/discover/movie?with_original_language=en')
                ->json()['results'];
        });

        $viewModel = new BrowseViewModel(
            $movies,
            $this->sort,
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

        $viewModel = new BrowseViewModel(
            $movies,
            $this->sort,
        );
        
        return view('browse.index', $viewModel);
    }


    public function sortBy($sort, $lang)
    {
        $this->sort = $sort;
        return $this->selectByLang($lang);
    }
}
