<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrowseInputs extends Component
{
    public $movies;
    public $genre;

    /**
     * Create a new component instance.
     */
    public function __construct($movies, $genre)
    {
        $this->movies = $movies;
        $this->genre = $genre;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $genres = [
            'name' => [
                'comedy', 'action', 'mystery', 'horror', 'war'
            ],
            'route_lang' => $this->movies[0]['original_language'],
            'route_sort' => $this->movies[0]['sort'], 
        ];

        $languages = [
            'en' => 'English',
            'fr' => 'France',
            'sk' => 'Slovakia',
            'cs' => 'Czechia',
        ];

        $sorts = [
            'name' => [
                'release' => 'Year Released',
                'rating'  => 'Rating', 
                'az'      => 'A-Z', 
                'za'      => 'Z-A'
            ],
            'route_lang' => $this->movies[0]['original_language'],
            'route_genre' => $this->genre, 
        ];

        return view('components.browse-inputs', compact('genres', 'languages', 'sorts'));
    }
}
