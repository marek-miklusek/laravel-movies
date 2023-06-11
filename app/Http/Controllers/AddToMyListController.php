<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class AddToMyListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_lists = Movie::all();

        return view('mylist.index', compact('my_lists'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        if( ! $user ) {
            return redirect()->route('login');
        }

        $movie = json_decode($request->movie);
        
        $data = $this->formatMovieTv($movie);

        $movie_db = Movie::find($movie->id);

        if ($movie_db) {
            session()->flash('message', $data->name.' is already in your list');
            return redirect()->back();
        }
        
        Movie::create([
            'movie_id' => $movie->id,
            'poster_path' => $movie->poster_path,
            'vote_average' => $movie->vote_average,
            'release_date' => $data->date,
            'genres' => $movie->genres,
            'route' => $data->route,
            'name' => $data->name,
        ]);

        session()->flash('message', $data->name.' has been added to your list');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        session()->flash('message_d', $movie->name.' was removed from your list');
        return redirect()->back();
    }


    private function formatMovieTv($movie)
    {
        if (isset($movie->title)) {
            $data['name'] = $movie->title;
            $data['route'] = 'movie';
            $data['date'] = $movie->release_date;
        
        }
        else if (isset($movie->name)) {
            $data['name'] = $movie->name;
            $data['route'] = 'tvshow';
            $data['date'] = $movie->first_air_date;
        }

        return (object)$data;
    }
}
