<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\ActorViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ActorsController extends Controller
{
    public function show($id)
    {
        $actor = Cache::remember('actor_'.$id, 60 * 60, function () use($id) {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id)
            ->json();
        });

        $social = Cache::remember('social_'.$id, 60 * 60, function () use($id) {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/external_names')
            ->json();
        });

        $credits = Cache::remember('credits_'.$id, 60 * 60, function () use($id) {
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/person/'.$id.'/combined_credits')
            ->json();
        });
        
        $viewModel = new ActorViewModel($actor, $social, $credits);

        return view('actors.show', $viewModel);
    }
}
