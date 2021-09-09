<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User2;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;
class User2Controller extends Controller
{
    public function getGoogleSignInUrl()
    {
        // try {
        //     $url = Socialite::driver('google')->stateless()
        //         ->redirect()->getTargetUrl();
        //     return response()->json([
        //         'url' => $url,
        //     ])->setStatusCode(Response::HTTP_OK);
        // } catch (\Exception $exception) {
        //     return $exception;
        // }
        //return "gogo";
        return Socialite::driver('google')->redirect();
    }

    public function loginCallback(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user2 = User2::where('email', $googleUser->email)->first();
            if ($user2) {
                Auth::guard('user2')->login($user2);
      
               return redirect('/profile-user2'); //->intended('dashboard');
                //throw new \Exception(__('google sign in email existed'));
            }
            $user2 = User2::create(
                [
                    'email' => $googleUser->email,
                    'name' => $googleUser->name,
                    'google_id'=> $googleUser->id,
                    //'password'=> '123',
                ]
            );
            Auth::guard('user2')->login($user2);
            return redirect('/profile-user2');
            // return response()->json([
            //     'status' => __('google sign in successful'),
            //     'data' => $user2,
            // ], Response::HTTP_CREATED);

        } catch (\Exception $exception) {
            return response()->json([
                'status' => __('google đăng nhập thất bại'),
                'error' => $exception,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    function logoutUser(){
        Auth::guard('user2')->logout();
        return redirect('/');
    }
    function profileUser2(){
        return view('home.profile_user2');
    }
    function loginUser2(){
        
        if( Auth::guard('user2')->check()){
            return view('home.profile_user2');
        }
        return view('home.login_user2');
    }
    function quanLyUser2(){
        
        $user2 = User2::select('name','email')->get();
        return view('admin.quan_ly_user2',compact('user2'));
    }
}
