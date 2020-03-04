@extends('Admin.layouts.main')
@section('title','Create brand')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8 ml-5">
        <h3 style="text-align: center;">Detail Brand</h3>
        <p class="col-md-6"><strong>Name : </strong>{{ $brand->name }}</p>
        <p class="col-md-6"><strong>Description :</strong> {{ $brand->description }}</p>
        <div class="form-group ml-2">
            <a href="{{url('admin/brand')}}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
