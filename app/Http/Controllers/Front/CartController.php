<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\OrderItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(Request $request){

        if ($request->product_id && $request->quantity > 0) {
            $orderItems = OrderItems::where('product_id', $request->product_id)
                ->where('user_id', Auth::id())
                ->get();


            if ($orderItems->isEmpty()) {
                $orderItem = new OrderItems();

                $orderItem->product_id = $request->product_id;
                $orderItem->user_id = Auth::user()->id;
                $orderItem->quantity = $request->quantity;
                $orderItem->save();

            } else {
                $orderItem = $orderItems->first();
                $orderItem->quantity += $request->quantity; // Veya başka bir güncelleme işlemi yapabilirsiniz.
                $orderItem->save();
            }
        }
        $products = DB::table('products')
            ->join('order_items', function ($join) {
                $join->on('products.id', '=', 'order_items.product_id')
                    ->where('order_items.user_id', '=', Auth::user()->id);
            })
            ->select('products.*', 'order_items.*')
            ->get();

//        dd($products);
        return view('front.pages.cart',compact(['products']));
    }


    public function removeProduct(Request $request) {
        $productId = $request->input('product_id');
// dd($productId);

        OrderItems::where('product_id', $productId)
            ->where('user_id', Auth::id())
            ->delete();

        return redirect()->back(); // veya başka bir sayfaya yönlendirme yapabilirsiniz
    }
}
