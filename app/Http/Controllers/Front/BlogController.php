<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index(){
        $products = Product::paginate(6);
//        Auth::logout();
//        dd(Auth::user());
        return view('front.index',compact('products'));

    }


    public function sendSinglePage($id){
        $product = Product::find($id);

        return view('front.singlepage.index', compact('product'));
    }



}
