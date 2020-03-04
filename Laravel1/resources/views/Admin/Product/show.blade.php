@extends('Admin.layouts.main')
@section('title','Show Product')
@section('content')
   <div class="row">
    <div class="col-md-8 ml-5">
        <h3 class="ml-4">Detail Product</h3>
        <div class="col-md-7">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-auto d-none d-lg-block">
                    <img height="200" src="{!! asset("images/$product->image") !!}" class="card-img-top ml-4" alt="..." >
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{$product->product_code}}</strong>
                    <h3 class="mb-0">{{$product->product_name}}</h3>
                    <div class="mb-1 text-muted">Price : {{$product->price}}$</div>
                    <div class="mb-1 text-muted">Category : {{ $product->category->name }}</div>
                    <div class="mb-1 text-muted">Brand : {{ $product->brand->name }}</div>
                    <p class="card-text mb-auto">Description : {{$product->description}}</p>
                </div>
            </div>
        </div>
        <div class="form-group ml-2">
            <a href="{{url('admin/product')}}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
   
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
