<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Auth;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the chosen provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        //return 'not working';
       return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider chosen.
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
