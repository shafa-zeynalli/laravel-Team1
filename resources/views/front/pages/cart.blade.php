@extends('layout.front')

@section('content')
    <div class="cart w-100">
        <div class="items">
            <h2>Cart Items</h2>

            <table>
                @if(true)
                    <tr>
                        <td class='errMessage'>Your cart is empty</td>
                    </tr>
                @endif

                         <tr>
                            <td>{$val['title']}</td>
                            <td>$<span>{$val['price']}</span></td>
                            <td>{$val['quantity']}</td>
                            <td  class='removeItem' data-product-id='{$val['product_id']}' ><i class='fa-solid fa-x'></i></td>
                         </tr>
            </table>
        </div>
        <div class="totals">
            <h2>Cart Totals</h2>
            <div>
{{--                <p>Subtotal <span>$<?php echo $subTotalPrice ?></span></p>--}}
{{--                <p>Total <span>$<?php echo $totalPrice ?></span></p>--}}
            </div>
            <form action="Cart.php" method="post">
                <button type="submit">Place Order</button>
            </form>
        </div>
    </div>
@endsection
