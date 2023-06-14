<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating($title)
    {
        session()->flash('message', $title.' got '.request('amount').' rating from you');
        return redirect()->back();
    }
}
