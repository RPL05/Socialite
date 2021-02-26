<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('login/twitter');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/home');
    }
    private function findOrCreateUser($twitterUser)
    {
        if ($authUser = User::where('twitter_id', $twitterUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $twitterUser->name,
            'email' => $twitterUser->email,
            'twitter_id' => $twitterUser->id,
            'avatar' => $twitterUser->avatar,
            'password' => encrypt('123456dummy')
        ]);
    }
}
