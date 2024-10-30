<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="pixelstrap">
    {{-- <link rel="icon" href="{{ asset('assets/images/logo2.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo2.png') }}" type="image/x-icon"> --}}
    <title>BREWERY </title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo" href="/"><img style="width: 250px" class="img-fluid"
                                    src="http://carrental.arm-sc.com/wp-content/uploads/sites/28/2022/12/logo.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="{{route('login_post')}}" method="POST">
                                @csrf

                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close" data-bs-original-title="" title=""></button>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" name="email" type="text" required=""
                                        placeholder="Abc123">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" name="password" type="password" required=""
                                            placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        {{-- <label class="text-muted" for="checkbox1">Remember password</label> --}}
                                        {{-- </div><a class="link" href="forget-password.html">Forgot password?</a> --}}
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary btn-block w-100" type="submit">Sign
                                                in</button>
                                        </div>
                                    </div>

                                    {{-- <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                  <div class="social mt-4">
                    <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                  </div> --}}
                                    {{-- <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script  src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
        <!-- Bootstrap js-->
        <script  src="{{asset('assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
        <!-- feather icon js-->
        <script  src="{{asset('assets/js/icons/feather-icon/feather.min.js')}}"></script>
        <script  src="{{asset('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script  src="{{asset('assets/js/config.js')}}"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script  src="{{asset('assets/js/script.js')}}"></script>
        <!-- login js-->
        <!-- Plugin used-->
        <script>

            $(document).ready(function() {

                $('.show-hide').on('click', function() {
                    var passInput = $("input[name=password]");
                    if (passInput.attr('type') === 'password') {
                        passInput.attr('type', 'text');
                    } else {
                        passInput.attr('type', 'password');
                    }
                })
            })
        </script>
    </div>
</body>

</html>
