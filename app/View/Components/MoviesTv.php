<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MoviesTv extends Component
{
    public $items;
    public $route;

    /**
     * Create a new component instance.
     */
    public function __construct($items)
    {
        $this->items = $items;

        collect($this->items)->first(function ($item) {
            if (isset($item['title'])) {
                $this->route = 'movies.show'; 
            }
            else if (isset($item['name']))  {
                $this->route = 'tv.show'; 
            }
        });
    }

    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.movies-tv');
    }
}
