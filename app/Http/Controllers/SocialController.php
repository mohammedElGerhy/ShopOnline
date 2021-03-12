<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class SocialController extends Controller
{

  // public function redirect()
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
      $user   = Socialite::driver('facebook') ->user() ;
     //   return response() -> json($user);

        $user = User::firstOrCreate([
            'email' => $user->email,
           'name' => $user->name,
            //'password' => \Hash::make(\Str::random(24))

        ],
            [
                'email' => $user->email,
                'name' => $user->name,
                'password' => \Hash::make(\Str::random(24))
            ]);
        Auth::login($user, true);
        return redirect()->back();
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user   = Socialite::driver('google') ->user() ;
        //   return response() -> json($user);

        $user = User::firstOrCreate([
            'email' => $user->email,
            'name' => $user->name,
            //'password' => \Hash::make(\Str::random(24))

        ],
            [
                'email' => $user->email,
                'name' => $user->name,
                'password' => \Hash::make(\Str::random(24))
            ]);
        Auth::login($user, true);
        return redirect()->back();
    }
}

