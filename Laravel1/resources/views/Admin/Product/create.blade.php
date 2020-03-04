@extends('Admin.layouts.main')
@section('title','Create Product')
@section('content')
<!-- Begin Page Content -->
<div class="row">
    <div class="col-md-8">
        <h3 style="text-align: center;">Create Product</h3>
        {{Form::open(['url'=>'admin/product', 'method'=>'post'])}}
        <div class="container">
            <div class="form-group">
                {{Form::label('Product name:')}}
                {{Form::text('product_name','',['class'=>'form-control'])}}
                @if($errors->has('product_name'))
                <span class="text-danger">
                    {!! $errors->first('product_name') !!}
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
                {{Form::label('Price($):')}}
                {{Form::number('price','',['class'=>'form-control'])}}
                @if($errors->has('price'))
                <span class="text-danger">
                    {!! $errors->first('price') !!}
                </span>
                @endif

            </div>
            <div class="form-group">
                {{ Form::label('', 'Image') }} 
                {{ Form::file('image',['class' => 'form-control']) }}
                @if($errors->has('image'))
                <span class="text-danger">
                    {!! $errors->first('image') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Brand:')}}
                {{Form::select('brand_id',$brand,null,['class' => " form-control"])}}
                @if($errors->has('brand_id'))
                <span class="text-danger">
                    {!! $errors->first('brand_id') !!}
                </span>
                @endif

            </div>
            <div class="form-group">
                {{Form::label('Category:')}}
                {{Form::select('category_id',$category,null,['class' => " form-control"])}}
                @if($errors->has('category_id'))
                <span class="text-danger">
                    {!! $errors->first('category_id') !!}
                </span>
                @endif

            </div>
            <div class="form-group">
                {{Form::submit('Save',['class'=>'btn btn-primary'])}}
                <a href="{{route('product.index')}}" class="btn btn-primary">Back to List</a>
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
