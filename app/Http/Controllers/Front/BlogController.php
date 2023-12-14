<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $products = Product::paginate(6);

        return view('front.index',compact('products'));
    }
    public function sendSinglePage($id){
        $product = Product::find($id);
//        dd($products);

        return view('front.singlepage.index', compact('product'));
    }
    public function sendLoginPage(){
//        $product = Product::find($id);
//        dd($products);

        return view('front.auth.login');
    }

    public function register(Request $request){

    }



    public function sendSignupPage(){
//        $product = Product::find($id);
//        dd($products);

        return view('front.auth.signup');
    }
}
