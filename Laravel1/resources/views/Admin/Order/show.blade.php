@extends('Admin.layouts.main')
@section('title','Show Order')
@section('content')
<div class="content">
    <div class="card ">
      <div class="card-header ">             
        <h5 class="card-title">Order Detail</h5>                
    </div>
    <div class="card-body ">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-md-12">
                    <div class="container123  col-md-6"   style="">
                        <h4></h4>
                        <table class="table table-bordered">
                            <thead>
                                <h3>Customer Information</h3>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>Customer Name</td>
                                    <td >{{ $order->customer->first_name }} {{ $order->customer->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Order date</td>
                                    <td>{{ date('d-m-Y', strtotime($order->transaction_data))}}</td>
                                </tr>
                                <tr>
                                    <td>Postal Address</td>
                                    <td >{{ $order->customer->postal_address }} </td>
                                </tr>
                                <tr>
                                    <td>Physical Address</td>
                                    <td >{{ $order->customer->physical_address }} </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td >{{ $order->customer->email }} </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td >
                                            @if($order->status =="Unconfirmed")                                  
                                            <span class="badge badge-danger">Unconfirmed</span>
                                            @else
                                            <span class="badge badge-success">Confirmed</span>
                                            @endif
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th>STT</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                @foreach($order_detail as $key => $order_detail)
                                <tr>
                                   <td>{{ $key+1 }}</td>
                                   <td>{{ $order_detail->product->product_name }}</td>
                                   <td><img class="ml-4" src="images/{{$order_detail->product->image}}" width="80px" height="80px" alt="..."></td>
                                   <td>{{ $order_detail->quantity  }}</td>
                                   <td>{{ $order_detail->price  }}$</td>
                               </tr>

                               @endforeach
                               <tr>
                                <td  colspan="4"><b>Total Amount : </b></td>
                                <td class="text-danger" >{{$order->total_amount}}$</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                {{ Form::open(['route' => ['order.update',$order->id ],'method' => 'put']) }}
                {{ csrf_field() }}
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <div class="form-group ">
                        {{Form::label('Status:')}}
                        {!! Form::select('status', Array('Unconfirmed' => 'Unconfirmed', 'Confirmed' => 'Confirmed'),$order->status,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                        <a href="{{route('order.index')}}" class="btn btn-primary">Back to List</a>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

</div>
</div>
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
