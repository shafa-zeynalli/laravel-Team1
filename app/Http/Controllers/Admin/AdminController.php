<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
//        dd(Auth::guard('admin')->user());
        return view('admin.index');
    }
    public function show(){
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function addproducts(){
        return view('admin.products.createnewproduct');
    }
    public function create(Request $request){
        $credentials = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,gif|max:2048',
            'title' =>'required',
            'price' =>'required',
            'discount' =>'required',
            'description' =>'required',
            'summary_text' =>'required',
            'status' =>'required',
        ]);

        $image= $request->file('image')->store('uploads');
//if($request->hasFile('image')){
//    $image = Storage::putFile('images', file($request->image));
//}
//        dd($request->all());

        $order= Product::create([
            'title' => $request->title,
            'img' => $image,
            'price' => $request->price,
            'discount' => $request->discount,
            'status' => $request->status,
            'description' => $request->description,
            'summary_text' => $request->summary_text,
        ]);

//        $products = Product::paginate(10);
        return redirect()->intended('admin/products');
    }

    public function  updateProducts(Request $request){
        $product = Product::find($request->productId);
//        dd($product->title);
        return view('admin.products.updateproducts', compact('product'));
    }

    public function update(Request $request){

        $credentials = $request->validate([
            'title' =>'required',
            'price' =>'required',
            'discount' =>'required',
            'description' =>'required',
            'summary_text' =>'required',
            'status' =>'required',
        ]);
        $product = Product::find($request->productId);
//        dd($product);
        $oldImage = $product->img;

        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'discount' =>$request->discount,
            'description' => $request->description,
            'summary_text' => $request->summary_text,
            'status' => $request->status,
        ]);

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')->store('uploads');
            $product->update(['img' => $newImage]);
            Storage::delete($oldImage);
        } else {
            $product->update(['img' => $oldImage]);
        }

        return redirect()->route('admin.products');
    }

    public function delete(Request $request){
        $productId = $request->input('productId');
//        dd($request->all());
        $product = Product::where('id', $productId)->first();
//        dd($product);
        if ($product->img) {
            Storage::delete($product->img);
        }
        Product::where('id', $productId)->delete();

        return redirect()->back();
    }





    public function login(){
        return view('admin.auth.login');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user= User::query()->where([
            'email' => $request->input('email')
        ])->first();

        if ($user && Hash::check($request->input('password'), $user->password)){
//            $request->session()->regenerate();
            Auth::guard('admin')->loginUsingId($user->id);
            return redirect()->intended('admin');

        }

//        if (Auth::guard('admin')->attempt($credentials)) {
//            $request->session()->regenerate();
//            return redirect()->intended('admin');
//        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(){
        Auth::logout();
        return redirect()->intended('admin/login');
    }
}
