@extends('Admin.layouts.main')
@section('title','Customer listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customer listings</h1>
<!--     <p class="mb-4">
       <a href="{{url('admin/customer/create')}}" class="btn btn-primary mt-1 mb-1">Create Customer</a>
   </p> -->

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Postal address</th>
                        <th>Physical address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $key => $data)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$data->first_name}} {{$data->last_name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->postal_address}}</td>
                        <td>{{$data->physical_address}}</td>
                        <td>
                            <div class="form-inline  ">                 
                                <a href="{{route('customer.edit',$data->id)}}" class="btn btn-primary ">Edit</a>
                                <a href="{{route('customer.show',$data->id)}}" class="btn btn-primary ml-1 mr-1">Detail</a>

                                {{Form::open(['route'=>['customer.destroy',$data->id],'method'=>'delete'])}}
                                {{Form::button('Delete',['class'=>'btn btn-primary','type'=>'submit','onclick' => 'myFunction()'])}}
                                {{Form::close()}}
                            </div>
                            <script>
                                  function myFunction() {
                                      if(!confirm("Are You Sure to delete this"))
                                          event.preventDefault();
                                  }
                            </script>
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
