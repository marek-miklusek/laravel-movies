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
            ['title' => 'Movies', 'href' => '/movies'],
            ['title' => 'Tv Shows', 'href' => '/tvshows'],
            ['title' => 'Upcoming', 'href' => '/upcoming'],
            ['title' => 'My List', 'href' => '/my-list'],
            ['title' => 'Browse', 'href' => '/browse'] 
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
