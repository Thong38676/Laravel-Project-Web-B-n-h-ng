@extends('Admin.layouts.main')
@section('title','Create brand')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8">
        <h3 style="text-align: center;">Create Brand</h3>
        {{Form::open(['url'=>'admin/brand', 'method'=>'post'])}}
        <div class="container">
            <div class="form-group">
                {{Form::label('Name:')}}
                {{Form::text('name','',['class'=>'form-control'])}}
                @if($errors->has('name'))
                <span class="text-danger">
                    {!! $errors->first('name') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Description:')}}
                {{Form::text('description','',['class'=>'form-control'])}}
                @if($errors->has('description'))
                <span class="text-danger">
                    {!! $errors->first('description') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                <a href="{{route('brand.index')}}" class="btn btn-primary">Back to List</a>
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
