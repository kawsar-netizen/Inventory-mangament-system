<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Inventory Management System | Login</title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/app.bundle.css') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/assets/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('backend/assets/img/favicon/favicon-32x32.png') }}">
    <link rel="mask-icon" href="{{ asset('backend/assets/img/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <!-- Optional: page related CSS-->
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/fa-brands.css') }}">
</head>

<body>
    <div class="page-wrapper">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">

                <div class="flex-1"
                    style="background: url(img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4" style="padding:1 0px;">
                                <div class="card p-4 rounded-plus bg-faded">

                                    <form id="js-login" novalidate="" method="POST" action="{{ route('login') }}">

                                        @csrf

                                        <div class="form-group">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="email" id="email" class="form-control form-control-lg"
                                                placeholder="Please, give your email" required>
                                            <div class="invalid-feedback">No, you missed this one.</div>
                                            <div class="help-block">Your unique username to app</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" class="form-control form-control-lg"
                                                placeholder="password"required>
                                            <div class="invalid-feedback">Sorry, you missed this one.</div>
                                            <div class="help-block">Your password</div>
                                        </div>
                                        <div class="form-group text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="rememberme">
                                                <label class="custom-control-label" for="rememberme"> Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-lg-6 pr-lg-1 my-2">
                                                <button type="submit"
                                                    class="btn btn-primary btn-block btn-lg">Login</button>
                                            </div>
                                        </div>
                                    </form> 
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('backend/assets/js/vendors.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.bundle.js') }}"></script>
    <script>
        $("#js-login-btn").click(function(event) {

            // Fetch form to apply custom Bootstrap validation
            var form = $("#js-login")

            if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.addClass('was-validated');
            // Perform ajax submit here...
        });
    </script>
</body>

</html>
