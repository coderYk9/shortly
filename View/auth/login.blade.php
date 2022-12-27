@extends('web.layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h2 class="logo text-center text-main">
                        <a href="/" class="text-decoration-none text-main">Shortly</a>
                    </h2>
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="post" action="/login" enctype="multipart/form-data">
                        <div class="form-label-group">
                            <input type="text" id="inputEmail" name="username" class="form-control"
                                placeholder="Email address" required autofocus />
                            <label for="inputEmail">Email address</label>
                        </div>
                        @if (isset($_SESSION['error']))


                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>

                                <li> {{ $_SESSION['message'] }} </li>

                            </ul>

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @php
                        unset($_SESSION['error']);
                        @endphp

                        @endif
                        <div class="form-label-group">
                            <input type="password" name="password" id="inputPassword" class="form-control"
                                placeholder="Password" required />
                            <label for="inputPassword">Password</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="remb" name="remb" />
                            <label class="custom-control-label" for="remb">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-form btn-block text-uppercase" type="submit">
                            Sign in
                        </button>
                    </form>
                    <div class="member text-center mt-5">
                        <a class="text-dark" href="/register">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--js files-->
@endsection