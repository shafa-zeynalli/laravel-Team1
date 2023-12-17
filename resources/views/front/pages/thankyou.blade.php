@extends('layout.front')

@section('content')
    <div class="checkout w-100">
        <div class="details thanks">
            <h2>Thank you!</h2>

            <div>
                <p>Order number: {{$orderID}} </p>
                <p>Your order has been received. An email confirming your order has been sent to
                    <span>{{$email}} </span>.</p>
            </div>
            <h3>Shipping Address</h3>

            <div class="">
                <p>{{$address}} </p>
            </div>

        </div>
        <div class="order">
            <h2>Your Order</h2>
            <div>
                <p>Product <span>Subtotal</span></p>
                <p>Total <span>$598</span></p>
            </div>

        </div>
    </div>
@endsection
