<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public ?string $search = '';

    public function render()
    {
        $search_results = [];

        if (strlen($this->search >= 3)) {
            $search_results = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search)
                ->json()['results'];
            }

        return view('livewire.search-dropdown', [
            'search_results' => collect($search_results)->take(7),
        ]);
    }
}
