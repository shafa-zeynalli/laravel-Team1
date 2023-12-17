<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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

        $userId = auth()->user()->id; // Veya bu değeri başka bir şekilde alabilirsiniz

        // OrderItems tablosundan gerekli verileri al
        $orderItems = DB::table('products')
            ->join('order_items', function ($join) {
                $join->on('products.id', '=', 'order_items.product_id')
                    ->where('order_items.user_id', '=', Auth::user()->id);
            })
            ->select('products.*', 'order_items.*')
            ->get();
//        $orderItems = OrderItems::where('user_id', $userId)->get();
//        dd($orderItems);
        // Her bir OrderItem için Order tablosuna yeni kayıt ekle
        foreach ($orderItems as $orderItem) {
            Order::create([
                'user_id' => $userId,
                'product_id' => $orderItem->product_id,
                'status' => $orderItem->status,
                'product_quantity' => $orderItem->quantity,
                'price' => $orderItem->price,
                'discount' => $orderItem->discount,
                'emailAddress' => $request->input('email'),
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone' => $request->input('phone'),
                'street_address' => $request->input('address'),
            ]);
        }

        OrderItems::where('user_id', $userId)->delete();

        $orderID = Order::latest()->first()->id;
//        dd($orderID);

        return view('front.pages.thankyou', compact('email','address','orderID'));
    }

}
