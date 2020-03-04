@extends('Client.layouts.main')
@section('content')
<div class="row">
  @if(Cart::count()>0)
  <br>
  <br>
  <div class="col-md-10 mt-5">
    <h4>List products</h4>
    <div class="table-responsive  cart_info">
      <table class="table table-condensed table-striped table-bordered">
        <thead>
          <tr class="cart_menu" style="color: black; font-weight: bold;">
            <td class="description">Product Name</td>
            <td class="description">Image</td>
            <td class="price">Price</td>
            <td class="quantity">Quantity</td>
            <td class="total">Total</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach($items as $item)
          <tr>
            <td class="cart_description">
              <h4><a href="">{{$item->name}}</a></h4>

            </td>
            <td class="cart_description">
              <img class="ml-4" src="http://localhost/Laravel1/public/images/{{$item->options->image}}" width="80px" height="80px" alt="...">
            </td>

            <td class="cart_price">
              <p>{{number_format($item->price,0,',','.')}}$</p>
            </td>
            <td class="cart_quantity">
              <div class="cart_quantity_button">
                <input class="cart_quantity_input" type="number" name="quantity" value='{{$item->qty}}' size="2" onchange="updateCart(this.value,'{{$item->rowId}}')">
              </div>
            </td>
            <td class="cart_total">
              <p class="cart_total_price">
                {{number_format($item->price*$item->qty,0,',','.')}}$
              </p>
            </td>
            <td class="cart_delete">
              <a class="cart_quantity_delete" href="{{asset('cart/delete/'.$item->rowId)}}"><button class="btn btn-primary">Delete</button></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{asset('cart/delete/all')}}"><button class="btn btn-primary">Detele All</button></a>
      <h3 class="mt-4">Total Order: {{$total}}$</h3>
    </div>
  </div>
  {{Form::open(['url'=>'cart/thanhToanCart', 'method'=>'post'])}}
  <div class="col-md-2">
    <br><br><br>
    <div class="form-group">
      {{Form::submit('Check Out',['class'=>'btn btn-primary mt-3'])}}
    </div>
  </div>
  {{Form::close()}}
  @else
  <h5 class="text-center text-danger">Cart is empty!!!</h5>
  @endif
</div>
<script type="text/javascript">
  function updateCart(qty,rowId) {
    $.get(
      '{{asset('cart/update')}}',
      {qty:qty,rowId:rowId},
      function () {
        location.reload();
      }
      );
  }
</script>
@endsection