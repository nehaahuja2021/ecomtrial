<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Session;
class ProductController extends Controller
{
    function index()
    {
        $data=product::all();
        
        /* storing data in variable and passing it to view with an array named products.*/
                //return view ('product',['products'=>$data]);One way
//////////////////////
       return view ('product')->with('products',product::all());
      
      //return response()->json($data);
        
      
    }


    public function search(request $request)
    {              
      $user_input= $request->searchform;
      //echo "$user_input";
      
      $db_output=DB::table('products')->where('name', 'like' ,'%' .$user_input. '%')->get();
      //return response()->json($db_output);  
   
         return view ('search')->with('productArr',product::where('name', 'like' ,'%' .$user_input. '%')->get());  
           

        /* return response()->json(['data' => $db_output->toArray()], 201);*/
}


function add_to_cart(request $req)

{
    if ($req->session()->has('user'))
    {
     $cart = new cart;
     $cart ->user_id=$req->session()->get('user')['id'];
     $cart ->product_id=$req->product_id;
     $cart->save();
     return redirect('/yourcart');
    }
    else{
        return redirect("/login");
    }
}

 function cartItem ()
{
    $userId = Session::get('user')['id'];
    //return Cart ::where('user_id', $userId)->count();

    $cart_count=DB::table('cart')->where('user_id', $userId)->count();
      
//return \View::make('/yourcart')->with('cart_count', $cart_count);

// slash before view as view class is not included.
      //return response()->json($cart_count);
    
      }

function cartlist()
{

$userId=Session::get('user')['id'];
$prod_display=DB::table('cart')
->join('products','cart.product_id','=','products.id')
-> where('cart.user_id',$userId)
->select('products.*')
->get();
//echo "$prod_display";
//return view('yourcart',['productsdisplay'=>$prod_display]);
return response()->json($prod_display);

}

function vegetables()
{
    
    $data_veggies = DB::table('products')
    ->whereIn('category_id', [1])
    ->get();
    return response()->json(['vegetables' => $data_veggies->toArray()], 201);
}
function fruits()
{
    
    $data_fruits = DB::table('products')
    ->whereIn('category_id', [2])
    ->get();
    return response()->json(['fruits' => $data_fruits->toArray()], 201);
}


}