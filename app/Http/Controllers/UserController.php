<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function checklogin(){
       
        if(Auth::check()){
           $user = Auth::user();
           $email = Auth::user()->email;
           $userid = DB::table('students')->where('StudentEmail', $email)->value('StudentID');
            return response()->json($userid, 200);
        }else{
            return response()->json('false', 200);
        }
    }

    public function checkIfAdmin(){
        if(Auth::check()){

           $user = Auth::user();
           $check = Auth::user()->administrator == 1;
           if($check){
            return response()->json(1, 200);
           }else{
               return response()->json('regular', 200);
           }
        }else{
            return response()->json('false', 200);
        }
    }
}
