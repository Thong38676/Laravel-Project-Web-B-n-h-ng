@extends('Admin.layouts.main')
@section('title','Create brand')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8 ml-5">
        <h3 style="text-align: center;">Detail Brand</h3>
        <p class="col-md-6"><strong>Name : </strong>{{ $category->name }}</p>
        <p class="col-md-6"><strong>Description :</strong> {{ $category->description }}</p>
        <div class="form-group ml-2">
            <a href="{{url('admin/category')}}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
