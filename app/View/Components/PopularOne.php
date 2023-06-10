<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PopularOne extends Component
{
    public $popular;
    public $title;
    public $route;

    /**
     * Create a new component instance.
     */
    public function __construct($popular)
    {
        $this->popular = $popular;

        if ($this->popular->has('title')) {
            $this->title = $this->popular['title'];
            $this->route = route('movies.show', $this->popular['id']); 
            return $this->popular;
        }
        else  {
            $this->title = $this->popular['name'];
            $this->route = route('tv.show', $this->popular['id']); 
            return $this->popular;
        }
        
    }

    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popular-one');
    }
}
