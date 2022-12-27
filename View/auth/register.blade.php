@extends('web.layouts.layout')
@section('content')

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="logo text-center text-main"><a href="/"
                                class="text-decoration-none text-main">Shortly</a></h2>
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signin" method="post" action="/register" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <input type="text" id="name" name="name" class="form-control" placeholder="Full Name "
                                    required autofocus>
                                <label for="name">FullName</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Email address" required autofocus>
                                <label for="username">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="passwordcon" name="passwordcon" class="form-control"
                                    placeholder="passwordcon" required>
                                <label for="passwordcon">Password Confrmation</label>
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

                            <button class="btn btn-lg btn-form btn-block text-uppercase" type="submit">Register
                                Now</button>

                        </form>

                        <div class="member text-center mt-5">
                            <a class=" text-dark" href="/login">i am already a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection