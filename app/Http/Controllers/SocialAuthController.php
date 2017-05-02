<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use app\Http\Request;

use Socialite;
use App\SocialAccountService;
class SocialAuthController extends Controller
{
	//redict function
    
    public function redirect(){
    	return Socialite::driver('facebook')->redirect();



    }
    // callback function
    public function callback(SocialAccountService $service){

    	//when facebook call us a with token
    	$user = $service->createOrGetUser(Socialite::driver('facebook')->user());
    	auth()->login($user);
    	return redirect()->to('/home');

    }
}
