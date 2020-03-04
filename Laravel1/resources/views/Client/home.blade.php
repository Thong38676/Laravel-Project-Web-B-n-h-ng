@extends('Client.layouts.main')
@section('content')
<div class="row"><!--features_items-->
    @if (count($data) >0)
    @foreach($data as $key=>$product)
    <div class="col-md-4 mt-4 a">
        <div style="width: 18rem;">
          <img height="200" src="{!! asset("images/$product->image") !!}"  class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">{{ $product->product_name }}</h5>
            <p class="card-text text-center">{{ number_format($product->price )}} $</p>
            <a href="{{asset('cart/add/'.$product->id)}}" class="text-center btn btn-danger ml">Add to Cart</a>
        </div>
    </div>
</div>
@endforeach
@endif
</div><!--features_items-->
<style type="text/css">
    .ml{
        margin-left: 70px;
    }
</style>
@endsection


