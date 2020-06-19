<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    function index(){
    	return  view("auth.register");
    }
    function register(Request $request){
        
    	$name = $request->name;
    	$username = $request->username;
    	$password = $request->password;
    	$phone = $request->phone;
        $email = $request->email;
    	$role = $request->role;
    	$hashpassword = Hash::make($password);

    	DB::table('users')->insert(
			["name" => $name, "username" => $username,"password" => $hashpassword, "phone"=>$phone, "email"=>$email,"role"=>$role]);
        return redirect('/auth/login');
    	
    }
}
