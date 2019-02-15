<?php

// SocialAuthFacebookController.php

namespace App\Http\Controllers;

use App\SocialFacebookAccount;
use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialFacebookAccountService;

class SocialAuthFacebookController extends Controller
{

    public function genererChaineAleatoire($longueur)
    {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        $chaineAleatoire = '';
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
        }
        return $chaineAleatoire;
    }
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::with('facebook')-> fields(['name', 'first_name', 'last_name', 'email', 'gender', 'verified'])->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service, Request $request)
    {
        $driver = Socialite::driver('facebook')-> fields(['name', 'first_name', 'last_name', 'email', 'gender', 'verified'])->user();

        $user = User::updateOrCreate([
            'email' => $driver['email'],
            'firstname' => $driver['first_name'],
            'name' => $driver['last_name'],
            'phone' => null,
            'password' => md5($this->genererChaineAleatoire(20)),
            'is_resp' => 0
            //'facebook_id' => $driver['id']
        ]);

        SocialFacebookAccount::updateOrCreate([
            'user_id' =>$user->id,
            'provider_user_id'=>$driver['id'],
            'provider'=>'facebook'
        ]);

        auth()->login($user);
        return redirect()->to('/');
    }
}
