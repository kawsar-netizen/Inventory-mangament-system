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
                        <h2 class="ui-sortable-handle">Branch Set up Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="{{ route('branch.store') }}"
                                method="post"enctype="multipart/form-data" novalidate="novalidate">

                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_name">Name</label>
                                            <input type="text" placeholder="Enter branch name" name="br_name"
                                                id="br_name" class="form-control" required="" aria-required="true"
                                                value="{{ old('br_name') }}">
                                            <span style="color: red">
                                                @error('br_name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_address">Address</label>
                                            <input type="text" placeholder="Enter branch address"
                                                name="br_address"value="{{ old('br_address') }}" id="br_address"
                                                class="form-control" required="" aria-required="true">
                                            <span style="color: red">
                                                @error('br_address')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="location">Location Category</label>
                                            <select class="form-control select2" name="location" id="location"
                                                required="" tabindex="-1" aria-required="true">

                                                <option value="">Select Location Category</option>
                                                <option value="1">Rural</option>
                                                <option value="2">Urban</option>

                                            </select>
                                            <span style="color: red">
                                                @error('location')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="br_type">Branch Type</label>
                                            <select class="form-control select2" name="br_type" id="br_type"
                                                required="" tabindex="-1" aria-required="true">

                                                <option value="">Select Branch Type</option>
                                                <option value="1">Sub Branch</option>
                                                <option value="2">Head Office</option>
                                                <option value="3">Agent</option>
                                                <option value="4">Branch</option>

                                            </select>
                                            <span style="color: red">
                                                @error('br_type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="br_code"> Code </label>
                                            <input type="text" name="br_code"
                                                class="form-control"value="{{ old('br_code') }}" id="br_code"
                                                required="" aria-required="true" placeholder="Enter branch code">
                                            <span style="color: red">
                                                @error('br_code')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel-content d-flex flex-row align-items-center">
                                    <button class="btn btn-primary waves-effect waves-themed submit_btn"
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
        $(document).ready(function() {

            $('.select2').select2();

    });

</script>

@endsection
