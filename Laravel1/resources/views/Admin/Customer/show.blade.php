@extends('Admin.layouts.main')
@section('title','Create brand')
@section('content')
<!-- Begin Page Content -->
<div class="row">
	<div class="col-md-8 ml-3">
		<h3 style="text-align: center;">Detail Customer</h3>
		<p class="col-md-6"><strong>Full Name : </strong>{{ $customer->first_name .' '. $customer->last_name}}</p>
		<p class="col-md-6"><strong>Email :</strong> {{ $customer->email }}</p>
		<p class="col-md-6"><strong>Postal Address :</strong> {{ $customer->postal_address }}</p>
		<p class="col-md-6"><strong>Physical Address :</strong> {{ $customer->physical_address }}</p>
		<div class="form-group ml-2">
			<a href="{{url('admin/customer')}}" class="btn btn-primary">Back to List</a>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
