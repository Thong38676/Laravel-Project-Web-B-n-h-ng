@extends('Client.layouts.main')
@toastr_render
@section('content')
    <h3 class="text-danger text-center">LOGIN</h3>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            {!! Form::open(['url' =>'confirmlogin', 'method' =>'post'])!!}
            <div class="form-label-group">
                <label for="inputEmail">User Name</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Username" required="" name="username" autofocus="">       
            </div>
            <div class="form-label-group mt-3">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">       
            </div>
            <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Sign in</button>
            {!!Form::close()!!}
        </div>
        <div class="col-md-3">
        </div>
    </div>
@endsection