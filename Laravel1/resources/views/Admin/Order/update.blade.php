@extends('Admin.layouts.main')
@section('title','Order brand')
@section('content')
    <!-- Begin Page Content -->
    {{Form::model($data,['route' => ['order.update',$data->id], 'method' => 'put' ])}}
    <div class="container">
        <h3>Information Order</h3>
        <div class="form-group">
            {{Form::label('Transaction date:')}}
            {{Form::date('transaction_date',$data->transaction_date,['class'=>'form-control'])}}
            @error('transaction_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{Form::label('Customer:')}}
            {{Form::select('customer_id',$customer,$data->customer_id,['class' => " form-control"])}}
            @error('customer_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{Form::label('Status:')}}
            {{Form::text('status',$data->status,['class'=>'form-control'])}}
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            {{Form::label('Total amount:')}}
            {{Form::number('total_amount',$data->total_amount,['class'=>'form-control'])}}
            @error('total_amount')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{Form::submit('Save',['class'=>'btn btn-info'])}}
            <a href="{{route('order.index')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    {{Form::close()}}

<!-- /.container-fluid -->
@endsection
@section('script')
    @include('Admin.shared.scrip')
@endsection
