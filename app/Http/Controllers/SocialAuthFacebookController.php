<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::with('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service, Request $request)
    {
        $user = $service->createOrGetUser(Socialite::with('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}