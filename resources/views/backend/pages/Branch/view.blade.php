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
                        <h2 class="ui-sortable-handle">Branch Show Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="" method="post"enctype="multipart/form-data"
                                novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_name">Name</label>
                                            <input type="text" name="br_name" id="br_name" class="form-control"
                                                value="{{ $data->br_name }}" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_address">Address</label>
                                            <input type="text" name="br_address"value="{{ $data->br_address }}"
                                                id="br_address" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="loacation">Location Category</label>
                                            <input type="text"
                                                name="loacation"value="@if ($data->location == 1){{ 'Rural' }}
                                        @else{{ 'Urban' }} @endif"id="loacation"
                                                class="form-control" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_type">Branch Type</label>
                                            <input type="text"
                                                name="br_type"value=" @if ($data->br_type == 1){{ 'Sub Branch' }} @elseif($data->br_type == 2) {{ 'Head Office'}}@elseif($data->br_type == 3){{ 'Agent' }}@else{{ 'Branch' }} @endif "
                                                id="br_type" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_code"> Code </label>
                                            <input type="text" name="br_code" class="form-control"value="{{$data->br_code}}" readonly>
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
