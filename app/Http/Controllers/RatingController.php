<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating($title)
    {
        $amount = '<span class="text-orange-500">'.request('amount').'</span>';
        session()->flash('message', $title.' got a '.$amount.' rating from you');
        return redirect()->back();
    }
}
