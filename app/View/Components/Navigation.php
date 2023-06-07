<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navigation extends Component
{
    public array $lists = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->lists = [
            ['title' => 'Films', 'href' => '/movies'],
            ['title' => 'Tv Shows', 'href' => '/shows'],
            ['title' => 'Latest', 'href' => '/latest'],
            ['title' => 'My List', 'href' => '/my-list'],
            ['title' => 'Watch Again', 'href' => '/watch-again'] 
        ];
    }

    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation');
    }
}
