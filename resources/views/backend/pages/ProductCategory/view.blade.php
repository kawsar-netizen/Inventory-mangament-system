@extends('backend.layouts.backend_master');
@section('title')
    Product Category
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
                        <h2 class="ui-sortable-handle">Product Category Show Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                name="item_category_id" id="item_category_id" required="">

                                                <option value="">Select Item Category</option>

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" name="name"readonly id="name" class="form-control"
                                                required="" aria-required="true" value="{{ $data->name }}">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="loacation">Type</label>
                                            <input type="text"
                                                name="loacation"value="@if ($data->type == 1) {{ 'Asset' }}
                                        @else
                                            {{ 'Inventory' }} @endif"id="loacation"
                                                class="form-control" readonly>
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        {{-- <div class="col-md-12 mb-3">
                                            <label class="form-label" for="valuation"> Valuation </label>
                                            <input type="number" name="valuation" class="form-control" value="
                                            @php
                                                $itemCategory = DB::table('item_categories')->where('id','item_category_id')->first();
                                            @endphp{{$itemCategory->valuation}}"id="valuation" required="" >
                                                <span style="color: red">
                                                    @error('valuation')
                                                        {{ $message }}
                                                    @enderror
                                                </span>
                                        </div> --}}

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
