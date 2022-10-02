@extends('backend.layouts.backend_master');
@section('title')
    Inventory Category
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
        <div class="row" style="margin-left: 80px; margin-right: 80px; margin-top:50px;">
            <div class="col-xl-12 col-md-6 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    <div class="panel-hdr" role="heading">
                        <h2 class="ui-sortable-handle">Inventory Entry Set up Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form action="{{ route('product-entry.store') }}" method="post"enctype="multipart/form-data"
                                novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2" name="item_category_id"
                                                id="item_category_id" required="" data-select2-id="item_category_id"
                                                tabindex="-1" aria-hidden="true" aria-required="true">
                                                <option value="">Select Item Category</option>
                                                @foreach ($itemCategory as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color: red">
                                                @error('item_category_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="type">Type</label>
                                            <select class="form-control select2" name="type" id="type"
                                                required=""tabindex="-1"aria-required="true">
                                                <option value="">Select Type</option>
                                                <option value="1">Asset</option>
                                                <option value="2">Inventory</option>
                                            </select>
                                            <span style="color: red">
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" placeholder="Inventroy entry name" name="name"
                                                id="name" class="form-control" required="" aria-required="true">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="brand_no"> Brand No </label>
                                            <input type="text" name="brand_no" class="form-control" id="brand_no"
                                                required="" aria-required="true">
                                            <span style="color: red">
                                                @error('brand_no')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="quantity"> Quantity </label>
                                            <input type="number" name="quantity" class="form-control" id="quantity"
                                                required="" aria-required="true">
                                            <span style="color: red">
                                                @error('quantity')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="warranty_date"> Warranty </label>
                                            <input type="number" name="warranty_date" class="form-control"
                                                id="warranty_date" required="" aria-required="true">
                                            <span style="color: red">
                                                @error('warranty_date')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="product_category_id"> Product Category</label>
                                            <select class="form-control select2" name="product_category_id"
                                                id="product_category_id" required=""
                                                data-select2-id="product_category_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true">

                                                <option value="">Select Product Category</option>
                                                @foreach ($productCategory as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red">
                                                @error('product_category_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="branch_id"> Branch</label>
                                            <select class="form-control select2" name="branch_id" id="branch_id"
                                                required="" data-select2-id="branch_id" tabindex="-1"
                                                aria-hidden="true" aria-required="true">

                                                <option value="">Select Branch</option>
                                                @foreach ($branches as $item)
                                                    <option value="{{ $item->id }}">{{ $item->br_name }}</option>
                                                @endforeach

                                            </select>
                                            <span style="color: red">
                                                @error('branch_id')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="status">Status</label>
                                            <select class="form-control select2" name="status" id="status"
                                                required="" data-select2-id="status" tabindex="-1"
                                                aria-hidden="true" aria-required="true">

                                                <option value="">Select Status</option>
                                                <option value="1">Product Entry</option>
                                                <option value="0">requisition</option>
                                            </select>
                                            <span style="color: red">
                                                @error('status')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="model_no"> Model No </label>
                                            <input type="text" name="model_no" class="form-control" id="model_no"
                                                required="" aria-required="true">
                                            <span style="color: red">
                                                @error('model_no')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="tag_no"> Tag No </label>
                                            <input type="text" name="tag_no" class="form-control" id="tag_no"
                                                required="" aria-required="true">
                                            <span style="color: red">
                                                @error('tag_no')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="purchase_date"> Purchase Date </label>
                                            <input type="date" name="purchase_date" class="form-control"
                                                id="purchase_date" required="" aria-required="true">
                                            <span style="color: red">
                                                @error('purchase_date')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                    </div>

                                </div>

                                <div
                                    class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center p-2">
                                    <button class="btn btn-primary  waves-effect waves-themed submit_btn"
                                        type="submit">Submit form</button>
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

    });

</script>
@endsection