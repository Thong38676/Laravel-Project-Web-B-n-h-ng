@extends('Admin.layouts.main')
@section('title','Brand Listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Brand listings</h1>
    <p class="mb-4">
        <a href="{{url('admin/brand/create')}}" class="btn btn-primary mt-1 mb-1">Create Brand</a>
    </p>

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
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($brands as $key => $data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><a href="{{ route('productsInBrand',$data->id) }}">{{$data->name}}</a></td>
                            <td>{{$data->description}}</td>
                            <td>
                                <div class="form-inline  ">                 
                                    <a href="{{route('brand.edit',$data->id)}}" class="btn btn-primary ">Edit</a>
                                    <a href="{{route('brand.show',$data->id)}}" class="btn btn-primary ml-1 mr-1">Detail</a>

                                    {{Form::open(['route'=>['brand.destroy',$data->id],'method'=>'delete'])}}
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
