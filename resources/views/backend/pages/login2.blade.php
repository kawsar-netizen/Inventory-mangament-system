<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventory Management System</title>
   <link rel="stylesheet" href="{{asset('backend/assets/bootstrap4_property/css/bootstrap.min.css')}}">



</head>


<body style="background-image: url({{asset('backend/assets/img/bg2.png')}}); background-position: center;
  background-repeat: no-repeat;
  background-size: cover; height: 800px !important">



<div class="container-fluid">
	<br>
	<div class="d-flex justify-content-center">

       <div class="card" style="width: 22rem;">
  <img class="card-img-top" src="{{'backend/assets/img/asset_manage.jpg'}}" height="340px" alt="Card image cap">
  
<div class="card-body">
	 <h5 class="card-title" align="center">Inventory Management System</h5>
				<form  method="POST" action="{{ route('login') }}">
					  @csrf
					 <div class="form-group">
                         <label class="form-label" for="username">Username</label>
                         <input type="email"
                             class="form-control @error('email') is-invalid @enderror"
                             placeholder="Email" name="email" value="{{ old('email') }}"
                             required />
                         <div class="invalid-feedback">No, you missed this one.</div>
                        
                     </div>
                     <div class="form-group">
                         <label class="form-label" for="password">Password</label>
                         <input type="password"
                             class="form-control @error('password') is-invalid @enderror"
                             placeholder="Password" name="password" required />
                         <div class="invalid-feedback">Sorry, you missed this one.</div>
                       

                     </div>
				
					<div class="form-group">
						<button type="submit"class="btn btn-primary btn-md float-right">Login</button>
					</div>
				</form>
			</div>
</div>


	</div>
</div>


<script src="{{asset('backend/assets/bootstrap4_property/js/jquery-3.2.1.slim.min.js')}}"></script>

<script src="{{asset('backend/assets/bootstrap4_property/js/popper.min.js')}}" ></script>

<script src="{{asset('backend/assets/bootstrap4_property/js/bootstrap.min.js')}}"></script>
</body>    

</html>
