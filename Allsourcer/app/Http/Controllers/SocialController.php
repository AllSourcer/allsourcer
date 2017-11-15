<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    //
        protected $redirectTo = '/home';


     public function  me($provider){
        return $provider;
    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        //return 'not working';
       return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {


        $user = Socialite::driver($provider)->user();

        // $user->token;
        // OAuth Two Providers
        // $token = $user->token;
        // $refreshToken = $user->refreshToken; // not always provided
        // $expiresIn = $user->expiresIn;

        // // OAuth One Providers
        // $token = $user->token;
        // $tokenSecret = $user->tokenSecret;

        // // All Providers
        $userid = $user->getId();
        $userNickname = $user->getNickname();
        $userName = $user->getName();
        $userEmail = $user->getEmail();
        $userAvatar = $user->getAvatar();

        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
