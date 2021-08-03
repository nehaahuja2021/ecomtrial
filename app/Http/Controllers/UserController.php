<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    function login (Request $req)
    {
        //return $req->input(); [generates all info added]
        $user= User::where(['email'=>$req->email])->first();
        if(!$user ||!Hash::check($req->password,$user->password)) //check func takes 2 params, one req coming from using and other user which is getting password from DB
        {
            return "User name or password is not matched";
        }
        else
        {
            $req->session()->put('user',$user);
            //return "You are now logged in";
            return redirect ('/product');
        }
    }
}
