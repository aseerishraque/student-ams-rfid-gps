<!doctype html>
<html class="no-js" lang="en">
@include('includes.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="post" action="{{ route('register.student.store') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Student Sign up</h4>
                    <p>Hello there, Sign in and start managing your Attendance Management System Using GPS & RFID</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputName1">Full Name</label>
                        <input name="name" type="text" id="exampleInputName1">
                        <i class="ti-user"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" type="email" id="exampleInputEmail1">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputUsername">Username</label>
                        <input name="username" type="text" id="exampleInputUsername">
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="password" type="password" id="exampleInputPassword1">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input name="password_confirmation" type="password" id="exampleInputPassword2">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        <!-- <div class="login-other row mt-4">
                            <div class="col-6">
                                <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-6">
                                <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                            </div>
                        </div> -->
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{ route('login.get') }}">Sign in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

@include('includes.scripts')
</body>

</html>
