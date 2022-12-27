@extends('admin.layout.main')

@section('content')
@if(isset($_SESSION['message']))
<div class="alert alert-danger">{{ $_SESSION['message']  }}</div>
@php
unset($_SESSION['message']);
@endphp
@endif


<form method="post" action="/auth/login" enctype="multipart/form-data"">
    <div class=" form-group has-feedback ">
        <input type=" text" name="username" class="form-control" placeholder="Username" value="">
    <span class="fa fa-user form-control-feedback"></span>

    </div>
    <div class="form-group has-feedback has-error ">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="help-block">password</div>

    </div>
    <div class="row">
        <div class="col-xs-8">
            <div class="checkbox icheck">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
    </div>
</form>
@endsection