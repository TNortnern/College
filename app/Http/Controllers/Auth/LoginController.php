<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

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
    public function signin(Request $request){
        
        $user = User::where('email', '=', $request->email)->first();
        $data = Hash::check($request->password, $user->password);
        $userid = $user->id;
        if($data == true){
            Auth::login($user);
            Session::flash('message', 'Logged in as'); 
            return response()->json($userid, 200); 
           
        }else{
           return response()->json($data, 200);
        }
        // $data = User::where('password', Hash::check(12, $user->password))->first();
    }

    
}
