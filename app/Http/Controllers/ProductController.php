<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        /*$data=product::all();
        
        /* storing data in variable and passing it to view with an array named products.*/
        
        //return view ('product',['products'=>$data]);One way
        return view ('product')->with('products',product::all());
        
    }


    public function search(request $request)
    {
              
      $user_input= $request->searchform;
      //echo "$user_input";
      
      /*$db_output=DB::table('products')->where('name', 'like' ,'%' .$user_input. '%')->get();*/
   

           //echo "$db_output";
    
    return view ('search')->with('productArr',product::where('name', 'like' ,'%' .$user_input. '%')->get());
        


}
}