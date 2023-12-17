@extends('layout.front')

@section('content')
    <div class="cart w-100">
        <div class="items">
            <h2>Cart Items</h2>

            <table>
                @if($products->isEmpty())
                    <tr>
                        <td class='errMessage'>Your cart is empty</td>
                    </tr>
                @else
                    @php
                        $totalPrice = 0;
                        $subTotalPrice = 0;
                    @endphp
                    @foreach($products as $product)
                        @php
                            $totalPrice += $product->price * $product->quantity;
                            $subTotalPrice += ($product->price - $product->price * $product->discount / 100) * $product->quantity
                        @endphp
                        <tr>
                             <td>{{$product->title}}</td>
                             <td>$<span>{{$product->price}}</span></td>
                             <td>{{$product->quantity}}</td>
                             <td  class='removeItem'>
                                 <form action="{{ route('remove.product') }}" method="post">
                                     @csrf
                                     <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                     <button type="submit" class="btn btn-danger"><i class='fa-solid fa-x'></i></button>
                                 </form>
                             </td>
                          </tr>
                     @endforeach
                 @endif
             </table>
         </div>
         <div class="totals">
             <h2>Cart Totals</h2>
             <div>
                 <p>Total <span>${{$totalPrice ?? 0}}</span></p>
                 <p>Subtotal <span>${{$subTotalPrice ?? 0}}</span></p>
             </div>
             <form action="{{route('front.checkout')}}" method="post">
                 @csrf
                 <input type="hidden" name="total_price" value="{{$subTotalPrice ?? 0}}">
                 <button type="submit">Place Order</button>
             </form>
         </div>
     </div>
 @endsection
