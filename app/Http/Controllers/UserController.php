<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

/*class UserController extends Controller
{
    function login (Request $req)
    {
        //return $req;
        //return $req->input(); 
       
        $user= User::where(['email'=>$req->email])->first();
        if(!$user ||!Hash::check($req->password,$user->password)) //check func takes 2 params, one req coming from using and other user which is getting password from DB
        {
            return "User name or password is not matched";
           
        }
        else
        {

            $req->session()->put('user',$user);
            
            //return redirect ('/product');
            return response()->json($req);
            //return json_decode($req->getBody(), true)['access_token'];
           
        }
    }


    function register(Request $req)
{

return $req->input();

$user=new User;
$user->name=$req->name;
$user->email=$req->email;
$user->password=Hash::make($req->password);
$token = Str::random(60);
    $user = User::find(1);
    $user->api_token = hash('sha256', $token); // <- This will be used in client access
$user->save();
return response()->json($user);
//return redirect('/login');

}*/

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response([ 'user' => $user, 'token' => $token]);

        //return $request;
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. 
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response(['user' => auth()->user(), 'token' => $token]);
        //return $request;
       // return $data;

    }
}




