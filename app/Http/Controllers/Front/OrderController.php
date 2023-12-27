<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\m;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index(Request $request)
    {
//        dd($request->all());
        $totalPrice = $request->total_price;
        return view('front.pages.checkout', compact('totalPrice'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|min:4',
            'last_name' => 'required|min:4',
            'phone' => 'required',
            'address' => 'required|min:4',
        ]);
        $email = $request->input('email');
        $address = $request->input('address');

        $userId = auth()->user()->id;

        $cartItems = DB::table('products')
            ->join('carts', function ($join) {
                $join->on('products.id', '=', 'carts.product_id')
                    ->where('carts.user_id', '=', Auth::user()->id);
            })
            ->select('products.*', 'carts.*')
            ->get();

//        dd($cartItems);

        $order= Order::create([
            'user_id' => $userId,
            'status' => 1,
            'emailAddress' => $request->input('email'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'street_address' => $request->input('address'),
        ]);

//        dd($order);
        $orders = Order::where('user_id', $userId)->latest()->first();
        $subTotalPrice=0;

        foreach ($cartItems as $cartItem) {
            $subTotalPrice += ($cartItem->price - $cartItem->price * $cartItem->discount / 100) * $cartItem->quantity;
            OrderItems::create([
                'user_id' => $userId,
                'product_id' => $cartItem->product_id,
                'order_id' => $orders->id,
                'status' => $cartItem->status,
                'product_quantity' => $cartItem->quantity,
                'price' => $cartItem ->price,
                'discount' => $cartItem->discount,
            ]);
        }

//        dd($subTotalPrice);
        $orders->discount_price = $subTotalPrice;
        $orders->save();

        Cart::where('user_id', $userId)->delete();

        $orderID = $orders->id;
//        dd($orderID);
        $request->replace([]);

        return view('front.pages.thankyou', compact('email','address','orderID', 'subTotalPrice'));
    }

}
