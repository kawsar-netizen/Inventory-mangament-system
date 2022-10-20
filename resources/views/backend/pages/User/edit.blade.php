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
                        <h2 class="ui-sortable-handle">User Update Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="{{ route('user.update', $edit->id) }}"
                                method="post"enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_name">User Name</label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                required="" aria-required="true" value="{{ $edit->name }}">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_name">User Type</label>
                                            <input type="text" name="type" id="type" class="form-control"
                                                required="" aria-required="true" value="{{ $edit->type }}">
                                            <span style="color: red">
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Branch</label>
                                            <select class="select2 form-control w-100" name="branch_id">
                                                <option value="">Select Branch Name</option>
                                                @foreach ($branches as $branch)
                                                    <option value="{{ $branch->id }}" {{ $branch->id == $edit->branch_id ? 'selected' : ''}}>{{ $branch->br_name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red">
                                                @error('branch_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Role</label>
                                            <select class="select2 form-control w-100" name="role_id">
                                                <option value="">Select Role</option>
                                                @foreach ($roles as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $edit->role_id ? 'selected' : '' }}>
                                                        {{ $item->role_name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red">
                                                @error('role_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">User Email</label>
                                            <input type="text" name="email"
                                                class="form-control"value="{{ $edit->email }}" id="email"
                                                required="" aria-required="true">
                                            <span style="color: red">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_name">Contact Number</label>
                                            <input type="text" name="contact_phone" id="contact_phone" class="form-control"
                                                required="" aria-required="true" value="{{ $edit->contact_phone }}">
                                            <span style="color: red">
                                                @error('contact_phone')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content d-flex flex-row align-items-center">
                                    <button class="btn btn-primary waves-effect waves-themed submit_btn"
                                        type="submit">Update</button>
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
        $(document).ready(function() {

            $('.select2').select2();

        });
    </script>
@endsection
