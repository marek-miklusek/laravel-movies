<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SignInFacebookController extends Controller
{
    public function signIn()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function signInRedirect()
    {
        $user = Socialite::driver('facebook')->user();

        if ( ! $user ) {
            session()->flash('message_w', 'Try to push Continue, not Cancel:)');
            return redirect()->route('login');
        }

        $user = User::firstOrCreate([
            'email' => $user->email
        ],[
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user);

        session()->flash('message', 'Welcome '.auth()->user()->name.', you are logged in');
        return redirect()->route('home');
    }
}
