<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['movie_id', 'poster_path', 'name'];
    
    protected $primaryKey = 'movie_id';

    public function getRoute()
    {
        if ($this->name == 'movie') {
            return 'movies.show';
        }
        else {
            return 'tv.show';
        };
    }
}
