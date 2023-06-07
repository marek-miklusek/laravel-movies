<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function newsletter()
    {
        session()->flash('message_w', 'I\'m sorry, but the service is currently unavailable');
        return redirect('/');
    }
}
