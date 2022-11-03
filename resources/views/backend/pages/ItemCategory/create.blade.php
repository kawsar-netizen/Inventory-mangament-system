@extends('backend.layouts.backend_master');
@section('title')
    Item Category
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
                        <h2 class="ui-sortable-handle">Item Category Set up Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="{{ route('item-category.store') }}"
                                method="post"enctype="multipart/form-data" novalidate="novalidate">

                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" placeholder="Enter item category name" name="name"
                                                id="name" class="form-control" required="" aria-required="true"
                                                value="{{ old('name') }}">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="valuation">Depreciation</label>
                                            <input type="number" placeholder="Enter item category depreciation"
                                                name="valuation"value="{{ old('valuation') }}" id="valuation"
                                                class="form-control" required="" aria-required="true">
                                            <span style="color: red">
                                                @error('valuation')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-content d-flex flex-row align-items-center">
                                    <button class="btn btn-primary  waves-effect waves-themed submit_btn"
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
