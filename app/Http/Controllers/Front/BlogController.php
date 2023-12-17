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
    public function index(Request $request){
        $pTitle = $request->p_title;

        $products = !empty($pTitle)
            ? Product::where('title', 'LIKE', "$pTitle%")->paginate(6)
            : Product::paginate(6);

        return view('front.index',compact('products'));
    }


    public function sendSinglePage($id){
        $product = Product::find($id);
        return view('front.singlepage.index', compact('product'));
    }
}
