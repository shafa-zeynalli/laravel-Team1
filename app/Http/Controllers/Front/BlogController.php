<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index(Request $request){

//        $request = Http::get('https://kontakt.az');
//
//        dd($request->body());

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
