@extends('layout.front')

@section('content')
    <div>
        <div class="containerShop">
            <div class="header">
                <h2>Shop</h2>
                <select name="selectShop" id="selectShop">
                    <option value="Sort By">Sort By</option>
                    <option value="select1">select1</option>
                    <option value="select2">select2</option>
                    <option value="select3">select3</option>
                    <option value="select4">select4</option>
                    <option value="select5">select5</option>
                </select>
            </div>

            <div class="products">
                @foreach ($products as $product)
                    <a class='card' href="{{route('front.singlepage', ['id' => $product->id]) }}">
                        <img src={{$product->img}}>
                        <p>{{$product->title}}</p>
                        <p> $<span class='line'>{{$product->price}}</span>
                            <span>{{$product->discount}}% endirim olub</span>
                            $<span>{{ $product->price - $product->discount * $product->price / 100 }}</span>
                        </p>
                    </a>
                @endforeach
            </div>
            <div class="pagination-container">
                {{ $products->appends(request()->all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
