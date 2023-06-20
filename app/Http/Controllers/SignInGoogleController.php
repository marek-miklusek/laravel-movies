<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SignInGoogleController extends Controller
{
    public function signIn()
    {
        return Socialite::driver('google')->redirect();
    }


    public function signInRedirect()
    {
        try {
            $user = Socialite::driver('google')->user();
        } 
        catch (\Exception $e) {
            redirect()->back();
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
