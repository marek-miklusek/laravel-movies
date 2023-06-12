<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class TvViewModel extends ViewModel
{
    public function __construct(public $popular, public $topRated, public $documentary, public $comedy, public $mystery, public $action, public $war)
    {
       //
    }


    public function popular()
    {
        return $this->formatTv($this->popular);
    }


    public function topRated()
    {
        return $this->formatTv($this->topRated);
    }


    public function documenray()
    {
        return $this->formatTv($this->documentary);
    }


    public function comedy()
    {
        return $this->formatTv($this->comedy);
    }


    public function mystery()
    {
        return $this->formatTv($this->mystery);
    }


    public function action()
    {
        return $this->formatTv($this->action);
    }


    public function war()
    {
        return $this->formatTv($this->war);
    }


    private function formatTv($tv)
    {
        return collect($tv)->map(function($tvshow) {
            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$tvshow['poster_path'],
            ])->only([
                'poster_path', 'id', 'name', 'overview',
            ]);
        });
    }
}
