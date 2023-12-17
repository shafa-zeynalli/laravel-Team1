@extends('layout.front')

@section('content')
    <div class="singlePage">
        <div class="flex w-100">
            <div class='flex w-60 h-340'>
                <div class='images w-20'>
                    <img src={{$product->img}}>
                    <img src={{$product->img}}>
                    <img src={{$product->img}}>
                </div>
                <img src={{$product->img}}>
            </div>
            <div class='information w-40'>
                <h3>{{$product->title}}</h3>
                <p class='price'>$<span>{{$product->price}}</span></p>
                <div>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <span>1 customer review</span>
                    <p class='description'>{{$product->description}}</p>
                    <select name='color'>
                        <option value='color'>Color</option>
                    </select>

                    <form action="{{ route('front.cart') }}" class='myForm' method='post'>
                        @csrf
                        <div class='flex'>
                            <input type='number' class='quantityInput' value='1' name='quantity'>
                            <input type='hidden' class='quantityInput'  value="{{$product->id}}" name='product_id'>
                            <button type='submit' class='addToCart' >Add To Cart</button>
                        </div>
                    </form>

                    <p class='tags'> Tags: <span> Art, Office</span></p>
                </div>
            </div>
        </div>

        <div class="des">
            <button>Description</button>
            <button>Additional Information</button>
        </div>

        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit curabitur sed mollis augue. Cras suscipit sit amet
            est in  aliquam in vel blandit nunc.
        </p>
    </div>

@endsection
