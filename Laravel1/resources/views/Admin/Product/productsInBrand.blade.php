@extends('Admin.layouts.main')
@section('title','Create Category')
@section('content')
    <!-- Begin Page Content -->
    <h3 class="ml-5">List Product in this Brand</h3>
    <div class="row ml-4">
    @foreach($product as $key => $product)      
            <div class="col-md-3 card mt-3" style="width: 21rem; margin-left: 20px; ">
              <img height="200" src="{!! asset("images/$product->image") !!}" class="card-img-top" alt="..." >
              <div class="card-body">
                <h5 class="card-title">{{$product->product_name}}</h5>
                <p class="card-text">{{$product->description}}</p>
              </div>
            </div>      
    @endforeach
    </div>
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
