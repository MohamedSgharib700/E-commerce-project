<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function fbredirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function gplusredirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialAccountService $service, $provider)
    {
        
        $user = $service->createOrGetUser(Socialite::driver($provider)->stateless()->user(), $provider);
        auth()->login($user);
        return redirect()->route('landing');
   
    }
}
