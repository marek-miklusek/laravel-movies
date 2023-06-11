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
        $request->validate([
            'id' => 'integer',
            'poster_path' => 'string',
            'name' => 'string',
        ]);

        $user = auth()->user();

        if( ! $user ) {
            return redirect()->route('login');
        }
        
        $movie = Movie::find($request->id);
        
        if ($movie) {
            session()->flash('message', 'This '.$request->name.' is already in your list');
            return redirect()->back();
        }
        
        Movie::create([
            'movie_id' => $request->id,
            'poster_path' => $request->poster_path,
            'name' => $request->name,
        ]);

        session()->flash('message', 'Fantastic!, Your favorite '.$request->name.' has been added to your list');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        session()->flash('message_d', 'Your favorite '.$movie->name.' was removed');
        return redirect()->back();
    }
}
