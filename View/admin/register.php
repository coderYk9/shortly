<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title ?></title>
    <?= extend('head') ?>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h2 class="logo text-center text-main"><a href="/"
                                class="text-decoration-none text-main">CutURL</a></h2>
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signin">
                            <div class="form-label-group">
                                <input type="text" id="name" class="form-control" placeholder="Full Name " required
                                    autofocus>
                                <label for="name">FullName</label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" id="username" class="form-control" placeholder="Email address"
                                    required autofocus>
                                <label for="username">Email address</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" class="form-control" placeholder="Password"
                                    required>
                                <label for="password">Password</label>
                            </div>


                            <button class="btn btn-lg btn-form btn-block text-uppercase" type="submit">Register
                                Now</button>

                        </form>

                        <div class="member text-center mt-5">
                            <a class=" text-dark" href="/auth/login">i am already a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--js files-->
    <?= extend('script') ?>
</body>

</html>
