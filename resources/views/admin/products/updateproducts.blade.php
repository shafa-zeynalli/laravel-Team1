@extends('layout.admin')

@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white"
                                                   href="{{route('admin.products')}}">Pages</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Products</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Create New Products</h6>
    </nav>
@endsection

@section('header')
    @include('admin.partials.header')
@endsection

@section('content')
    <div class="text-white bg-secondary p-3">

        <form action="{{route('admin.update')}}" method="post" enctype="multipart/form-data" class="d-flex justify-content-between gap-3 flex-wrap">
            @csrf
            <label class="text-white">Product Image
                <input type="file" name="image"  class="form-control form-control-lg"/>
            </label>
            <label for="" class="text-white">Product Title
                <input type="text" name="title" class="form-control form-control-lg"
                       value="{{$product->title}}">
            </label>
            <label for="" class="text-white">Product Price
                <input type="number" name="price" class="form-control form-control-lg"
                       value="{{$product->price}}">
            </label>
            <label for="" class="text-white">Product Discount
                <input type="number" name="discount" class="form-control form-control-lg"
                       value="{{$product->discount}}">
            </label>
            <label for="" class="text-white">Product Description
                <input type="text" name="description" class="form-control form-control-lg"
                       value="{{$product->description}}">
            </label>
            <label for="" class="text-white">Product Summary Text
                <input type="text" name="summary_text" class="form-control form-control-lg"
                       value="{{$product->summary_text}}">
            </label>
            <label for="" class="text-white">Product Status
                <input type="text" name="status" class="form-control form-control-lg"
                       value="{{$product->status}}">
            </label>
                <input type="hidden" name="productId" value="{{$product->id}}">

            <button type="submit" class="btn btn-behance py-3 mx-2 mt-2">Update</button>
        </form>

    </div>
@endsection
