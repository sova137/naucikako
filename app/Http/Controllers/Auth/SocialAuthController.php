<?php


namespace App\Http\Controllers\Auth;

use Socialite;
use App\SocialAccountService;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
       return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $service,$provider)
    {
        $user = $service->createOrGetUser(Socialite::driver($provider));

        auth()->login($user);

        return redirect()->to('/home');
    }
}
