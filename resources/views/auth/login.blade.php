 {{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}

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
                                             <input type="email"
                                                 class="form-control @error('email') is-invalid @enderror"
                                                 placeholder="Email" name="email" value="{{ old('email') }}"
                                                 required />
                                             <div class="invalid-feedback">No, you missed this one.</div>
                                             <div class="help-block">Your unique email to site</div>
                                         </div>
                                         <div class="form-group">
                                             <label class="form-label" for="password">Password</label>
                                             <input type="password"
                                                 class="form-control @error('password') is-invalid @enderror"
                                                 placeholder="Password" name="password" required />
                                             <div class="invalid-feedback">Sorry, you missed this one.</div>
                                             <div class="help-block">Your password</div>

                                         </div>

                                         <div class="row no-gutters">
                                             <div class="col-lg-6 pr-lg-1 my-2">
                                                 <button type="submit"class="btn btn-primary btn-md">Login</button>
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
