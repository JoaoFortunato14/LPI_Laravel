<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Redirect the user to the Facebook authentication page
     */
    public function redirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain user information from Facebook
     */
    public function handleProviderCallback(){
        $facebookUser = Socialite::driver('facebook')->user();
        
        //add user to database
        $user = User::create([
            'email'=> $facebookUser->getEmail(),
            'name'=> $facebookUser->getName(),
            'provider_id'=>$facebookUser->getId(),
            'provider'=>'facebook',
        ]);

        //login the user
        Auth::login($user, true);
            
        return redirect($this->redirectTo);

        //$user->name;
    }

}
