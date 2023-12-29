@extends('layout.admin')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                                   href="{{route('admin.products')}}">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Products</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Products</h6>
    </nav>
@endsection

@section('header')
    @include('admin.partials.header')
@endsection

@section('content')

    {{--    <div class="text-white">--}}

    {{--        <form action="{{route('admin.products')}}" method="get">--}}

    {{--            <label for="" class="text-white">User Name--}}
    {{--                <input type="text" name="user_name" class="form-control form-control-lg" value="{{request()->get('user_name')}}">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">Product Name--}}
    {{--                <input type="text" name="product_name" class="form-control form-control-lg" value="{{request()->get('product_name')}}">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">Slug--}}
    {{--                <input type="text" name="slug" class="form-control form-control-lg" value="{{request()->get('slug')}}">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">Status--}}
    {{--                <input type="text" name="status" class="form-control form-control-lg" value="{{request()->get('status')}}">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">Price--}}
    {{--                <input type="text" name="price" class="form-control form-control-lg" value="{{request()->get('price')}}">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">Start Date--}}
    {{--                <input type="date" name="startDate" class="form-control form-control-lg" value="{{request()->get('startDate')}}" placeholder="Start Date">--}}
    {{--            </label>--}}
    {{--            <label for="" class="text-white">End Date--}}
    {{--                <input type="date" name="endDate" class="form-control form-control-lg"  value="{{request()->get('endDate')}}" placeholder="End Date">--}}
    {{--            </label>--}}
    {{--            <label class="text-white">Select Page Size--}}
    {{--                <select class="form-select width-20 height-60" name="pageSize">--}}
    {{--                    @foreach([10, 25, 50, 100] as $value)--}}
    {{--                        <option {{ request()->get('pageSize') == $value ? 'selected' : '' }} value="{{$value}}">{{$value}}</option>--}}
    {{--                    @endforeach--}}
    {{--                </select>--}}
    {{--            </label>--}}
    {{--            <button type="submit" class="btn btn-success py-3 mx-2 mt-2">Search</button>--}}
    {{--        </form>--}}

    {{--    </div>--}}


    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between">
                    <h4>Products list</h4>
                    <h4><a href="{{route('admin.addproducts')}}" class="mx-3"><i class="fa-solid fa-plus mx-2"></i>Create
                            New Products</a></h4>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">

                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Product Id
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Product Image
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Product Title
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Product Price
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ">
                                    Product Discount
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7  ">
                                    Product Description
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Product Status
                                </th>
                                <th class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                    Created At
                                </th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td class="text-center">
                                        <p>{{ $product->id }}</p>
                                    </td>
                                    <td class=" w-1 ">
                                            <img src="{{ Storage::url($product->img)}}" class=" w-100 ">

{{--                                        <img src="{{ asset('storage/'. $product->img )}}" class=" w-100 ">--}}
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->title }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->price }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->discount }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->description }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->status }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $product->created_at?$product->created_at->format('Y/m/d'):'' }}</p>
                                    </td>
                                    <td class="text-center d-flex">
                                        <form action="{{route('admin.updateproducts')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{$product->id}}"/>
                                            <button type="submit" class="mx-3 bg-white border-0 text-success"><i class="fa-solid fa-pencil"></i></button>

                                        </form>
                                        <form action="{{route('admin.deleteproducts')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{$product->id}}"/>
                                            <button type="submit" class="bg-white border-0 text-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="px-4">
                    {{ $products->appends(request()->all())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

@endsection
