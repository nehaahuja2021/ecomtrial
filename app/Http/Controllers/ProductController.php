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
}
