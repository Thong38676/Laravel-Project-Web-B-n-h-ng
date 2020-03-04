@extends('Admin.layouts.main')
@section('title','Create Customer')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8">
        <h3 style="text-align: center;">Create Customer</h3>
        {{Form::open(['url'=>'admin/customer', 'method'=>'post'])}}
        <div class="container">
            <div class="form-group">
                {{Form::label('First name:')}}
                {{Form::text('first_name','',['class'=>'form-control'])}}
                @if($errors->has('first_name'))
                <span class="text-danger">
                    {!! $errors->first('first_name') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Last name:')}}
                {{Form::text('last_name','',['class'=>'form-control'])}}
                @if($errors->has('last_name'))
                <span class="text-danger">
                    {!! $errors->first('last_name') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Email:')}}
                {{Form::email('email','',['class'=>'form-control'])}}
                @if($errors->has('email'))
                <span class="text-danger">
                    {!! $errors->first('email') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Postal address:')}}
                {{Form::text('postal_address','',['class'=>'form-control'])}}
                @if($errors->has('postal_address'))
                <span class="text-danger">
                    {!! $errors->first('postal_address') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Physical address:')}}
                {{Form::text('physical_address','',['class'=>'form-control'])}}
                @if($errors->has('physical_address'))
                <span class="text-danger">
                    {!! $errors->first('physical_address') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                <a href="{{route('customer.index')}}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>

<!-- /.container-fluid -->
@endsection
@section('script')
@include('Admin.shared.scrip')
@endsection
