<?php

namespace App\Repositories;

use App\Interfaces\SocialAuthInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthRepository implements SocialAuthInterface
{

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $githubUser->getEmail()],
            [
                'name' => $githubUser->getName(),
                'emal' => $githubUser->getEmail(),
                'password' => bcrypt(str::random(8)),
            ]
        );

        Auth::login($user);

        return redirect()->route('home');
    }
}
