@extends('Admin.layouts.main')
@section('title','Update category')
@section('content')
    <!-- Begin Page Content -->
    {{Form::model($data,['route' => ['category.update',$data->id], 'method' => 'put' ])}}
    <div class="container">
        <h3>Update Category</h3>
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
        <div class="form-group">
            {{Form::label('Name:')}}
            {{Form::text('name',$data->name,['class'=>'form-control'])}}
            @if($errors->has('name'))
                <span class="text-danger">
                    {!! $errors->first('name') !!}
                </span>
            @endif
        </div>
        <div class="form-group">
            {{Form::label('Description:')}}
            {{Form::text('description',$data->description,['class'=>'form-control'])}}
        </div>
        <div class="form-group">
            {{Form::submit('Save',['class'=>'btn btn-primary'])}}
            <a href="{{route("category.index")}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    {{Form::close()}}
    <!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
