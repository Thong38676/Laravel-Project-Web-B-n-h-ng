@extends('Admin.layouts.main')
@section('title','Edit Customer')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8">
        <h3 style="text-align: center;">Edit Customer</h3>
        {{Form::model($data,['route' => ['customer.update',$data->id], 'method' => 'put' ])}}
        <div class="container">
            <div class="form-group">
                {{Form::label('First name:')}}
                {{Form::text('first_name',$data->name,['class'=>'form-control'])}}
                @if($errors->has('first_name'))
                <span class="text-danger">
                    {!! $errors->first('first_name') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Last name:')}}
                {{Form::text('last_name',$data->description,['class'=>'form-control'])}}
                @if($errors->has('last_name'))
                <span class="text-danger">
                    {!! $errors->first('last_name') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Email:')}}
                {{Form::email('email',$data->name,['class'=>'form-control'])}}
                @if($errors->has('email'))
                <span class="text-danger">
                    {!! $errors->first('email') !!}
                </span>
                @endif
            </div>
            <div class="d-none">
                {{Form::label('User Name:')}}
                {{Form::text('username',$data->username,['class'=>'form-control'])}}
                @if($errors->has('username'))
                <span class="text-danger">
                    {!! $errors->first('username') !!}
                </span>
                @endif
            </div>
            <div class="d-none">
                {{Form::label('Password:')}}
                {{Form::text('password',$data->password,['class'=>'form-control'])}}
                @if($errors->has('password'))
                <span class="text-danger">
                    {!! $errors->first('password') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Postal address:')}}
                {{Form::text('postal_address',$data->name,['class'=>'form-control'])}}
                @if($errors->has('postal_address'))
                <span class="text-danger">
                    {!! $errors->first('postal_address') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Physical address:')}}
                {{Form::text('physical_address',$data->name,['class'=>'form-control'])}}
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
