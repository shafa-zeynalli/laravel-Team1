@extends('layout.front')

@section('content')
    <div class="checkout w-100">
        <div class="details">
            <h2>Billing Details</h2>

            <form action="{{route('front.thankyou')}}" method="POST" class="form">
                @csrf
                <div class="inputs">
                    <label for="fName">First Name*
                        <input type="text" name="first_name" value="{{old('first_name')}}">
                        @error('first_name')
                        <span class="errMessage">{{$message}}</span>
                        @enderror
                    </label>

                    <label for="lName">Last Name*
                        <input type="text" name="last_name" value="{{old('last_name')}}">
                        @error('last_name')
                        <span class="errMessage">{{$message}}</span>
                        @enderror
                    </label>

                    <label for="phone">Phone*
                        <input type="text" name="phone" value="{{old('phone')}}">
                        @error('phone')
                        <span class="errMessage">{{$message}}</span>
                        @enderror
                    </label>

                    <label for="email">Email Address*
                        <input type="text" name="email" value="{{old('email')}}">
                        @error('email')
                        <span class="errMessage">{{$message}}</span>
                        @enderror
                    </label>

                    <label for="address">Street Address*
                        <input type="text" name="address" value="{{old('address')}}">
                        @error('address')
                        <span class="errMessage">{{$message}}</span>
                        @enderror
                    </label>

                </div>

                <div class="checkbox">
                    <label for=""><input type="checkbox">
                        I have read and agree to the website <span> Terms and Conditions.* </span></label>
                </div>

                <button type="submit">Place Order</button>

            </form>
        </div>

        <div class="order">
            <h2>Your Order</h2>
            <div>
                <p>Product <span>Subtotal</span></p>
                <p>Total <span>${{$totalPrice}} </span></p>
            </div>

        </div>
    </div>
@endsection
