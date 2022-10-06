@extends('backend.layouts.backend_master');
@section('title')
    Branch
@endsection
@section('content_ims')
    <main id="js-page-content" role="main" class="page-content">
        <div class="row" style="margin-left: 80px; margin-top:50px;">
            <div class="col-xl-6 col-md-7 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    <div class="panel-hdr" role="heading">
                        <h2 class="ui-sortable-handle">User Show Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="" method="post"enctype="multipart/form-data"
                                novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="name" id="br_name" class="form-control"
                                                value="{{ $data->name }}" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">User Type</label>
                                            <input type="text" name="type" class="form-control"
                                                value="{{ $data->type }}" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="branch_id">Branch</label>
                                            <input type="text" name="branch_id"value="{{ $branch->br_name }}"
                                                id="br_address" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="role_id">Role</label>
                                            <input type="text" name="role_id"value="{{ $roles->role_name }}"
                                                id="role_id" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="email">User Email</label>
                                            <input type="text" name="email"
                                                class="form-control"value="{{ $data->email }}" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="contact_phone">Contact Number</label>
                                            <input type="text" name="contact_phone"
                                                class="form-control"value="{{ $data->contact_phone }}" readonly>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
