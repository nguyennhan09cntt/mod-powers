<?php
 
namespace App\Http\Controllers;
use Auth;
use App\User;
use Socialite;
 
class FacebookAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
 
    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user(); 
        $authUser = $this->findOrCreateUser($user); 
        Auth::login($authUser, true);
 
        return redirect()->route('home');
        
    }
 
    private function findOrCreateUser($facebookUser){
        $authUser = User::where('provider_id', $facebookUser->id)->first();
 
        if($authUser){
            return $authUser;
        }
 
        return User::create([
            'name' => $facebookUser->name,
            'username' => $facebookUser->id,
            'password' => $facebookUser->token,
            'email' => $facebookUser->email,
            'provider_id' => $facebookUser->id,
            'provider' => 'facebook',
        ]);
    }
}