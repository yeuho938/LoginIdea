<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class LoginController extends Controller
{
    function login(Request $request){
    	$username = $request->username;
    	$password = $request->password;

    	$user = DB::table("users")->where(["username"=>$username])->first();
    	if($user){
            $passwordInDb = $user->password;
            if(Hash::check($password,$passwordInDb)){
                if($user->role == "admin"){
                    return redirect()->route("admin.dashboard");
                }else{
                    return redirect()->route("home");
                }
            }

        }
        else{
          return redirect()->route("auth.login",["error"=>"Invalid username or password"]);
      }
  }
  function index(){
     return view('auth.login');
  }

}
