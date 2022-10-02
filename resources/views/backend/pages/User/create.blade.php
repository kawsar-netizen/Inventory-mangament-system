@extends('backend.layouts.backend_master');

@section('title')
    Branch
@endsection



@section('content_ims')
@if (Session::get('success'))
<script>
    alert('{{ Session::get('success') }}')
</script>
@endif
@if (Session::get('fail'))
<script>
    alert('{{ Session::get('fail') }}')
</script>
@endif
    <main id="js-page-content" role="main" class="page-content">
        <div class="row" style="margin-left: 80px; margin-top:50px;">
            <div class="col-xl-6 col-md-7 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    <div class="panel-hdr" role="heading">
                        <h2 class="ui-sortable-handle">Add User Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from"
                                action="{{route('user.store')}}" method="post"enctype="multipart/form-data" novalidate="novalidate" autocomplete="off">

                                @csrf
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" >User Name</label>
                                            <input type="text" placeholder="Enter User name" name="name"
                                                id="name" class="form-control"
                                                required="" aria-required="true" value="{{old('name')}}" autocomplete="off">
                                                <span style="color: red">@error('name'){{$message}}@enderror</span>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Branch</label>
                                            <select class="select2 form-control w-100" name="branch_id">
                                            	<option>-Select-</option>
                                            	@foreach($branches as $branch)
                                            	<option value="{{$branch->id}}">{{$branch->br_name}}</option>
                                            	@endforeach
                                            	
                                            </select>
                                            <span style="color: red">@error('branch_id'){{$message}}@enderror</span>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" placeholder="" name="email"value="{{old('email')}}"
                                                id="br_address" class="form-control"
                                                required="" aria-required="true">
                                                <span style="color: red">@error('email'){{$message}}@enderror</span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_code">Password</label>
                                            <input type="password" name="password" class="form-control" id="password" required="" aria-required="true">
                                                <span style="color: red">@error('password'){{$message}}@enderror</span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_code">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password"  name="confirm_password" required="" aria-required="true" onChange="checkPasswordMatch();" placeholder="Confirm password" >
                                            <span style="color: red">@error('confirm_password'){{$message}}@enderror</span>
                                                <p class="registrationFormAlert" id="divCheckPasswordMatch"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content d-flex flex-row align-items-center float-right">
                                    <button class="btn btn-success  waves-effect waves-themed submit_btn"
                                        type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection


@section('page_js')
<script type="text/javascript">
	$(document).ready(function(){



    $('.select2').select2();


		// new and confirm password match starts
       $("#confirm_password").keyup(checkPasswordMatch);
       // new and confirm password match ends here

	});


	function checkPasswordMatch() {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        if (password != confirmPassword)
            $("#divCheckPasswordMatch").html("Password is not matched!").css("color", "red");
        else
            $("#divCheckPasswordMatch").html("Password is matched.").css("color", "green");
    }
</script>

@endsection




