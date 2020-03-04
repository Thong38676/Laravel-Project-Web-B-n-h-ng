@extends('Client.layouts.main')
@section('content')
    <h3 class="text-danger text-center">REGISTER ACCOUNT</h3>
    {{Form::open(['url' =>'confirmregister', 'method'=>'post'])}}
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success text-center" role="alert">    
                Account information
            </div>
            <div class="form-group">
                {{Form::label('User Name:')}}
                {{Form::text('username','',['class'=>'form-control'])}}
                @if($errors->has('username'))
                <span class="text-danger">
                    {!! $errors->first('username') !!}
                </span>
                @endif
            </div>
            <div class="form-group">
                {{Form::label('Password:')}}
                {{Form::password('password',['class'=>'form-control'])}}
                @if($errors->has('password'))
                <span class="text-danger">
                    {!! $errors->first('password') !!}
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
                {{Form::submit('Register',['class'=>'btn btn-primary'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-success text-center" role="alert">    
               Delivery information
            </div>
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
    </div>
    {{Form::close()}}    

</div>
@endsection