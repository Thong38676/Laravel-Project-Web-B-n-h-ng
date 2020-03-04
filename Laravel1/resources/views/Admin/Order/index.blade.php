@extends('Admin.layouts.main')
@section('title','Order listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Order listings</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Order number</th>
                            <th>Transaction date</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Total amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->order_number}}</td>
                            <td>{{ date('H:i:s d-m-Y', strtotime($data->created_at))}}</td>
                            <td>{{$data->customer->first_name}} {{$data->customer->last_name}}</td>
                            <td>                          
                                @if($data->status =="Unconfirmed")                                  
                                    <span class="badge badge-danger">Unconfirmed</span>
                                @else
                                    <span class="badge badge-success">Confirmed</span>
                                @endif
                                                            
                        </td>
                        <td>{{$data->total_amount}}$</td>
                        <td>
                            <a href="{{route('order.show',$data->id)}}" class="btn btn-primary ml-1 mr-1">Detail</a>
                                                           <!--  {{Form::open(['route'=>['order.destroy',$data->id],'method'=>'delete'])}}
                                {{Form::button('Delete',['class'=>'btn btn-primary','type'=>'submit'])}}
                                {{Form::close()}} -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
