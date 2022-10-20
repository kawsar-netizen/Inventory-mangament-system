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
                        <h2 class="ui-sortable-handle">Inventory Entry Show Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form action="" method=""enctype="multipart/form-data"
                                novalidate="novalidate">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2" name="item_category_id"
                                                id="item_category_id" required="" data-select2-id="item_category_id"
                                                tabindex="-1" aria-hidden="true" aria-required="true" readonly>
                                                <option value="">Select Item Category</option>
                                                @foreach ($itemCategory as $item)
                                                    <option value="{{$item->id}}" {{ $item->id == $data->item_category_id ?"selected":""}}>{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="type">Type</label>
                                            <input type="text" name="name"
                                                id="name" class="form-control" value="@if ('type' == '1')
                                                {{ "Asset" }}@else{{ "Inventory" }}@endif" readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" name="name"id="name" class="form-control" value="{{$data->name}}" readonly>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="brand_no"> Brand No </label>
                                            <input type="text" name="brand_no" class="form-control" id="brand_no" value="{{$data->brand_no}}"readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="quantity"> Quantity </label>
                                            <input type="number" name="quantity" class="form-control" value="{{$data->quantity}}"readonly
                                            >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="warranty_date"> Warranty </label>
                                            <input type="number" name="warranty_date" class="form-control"
                                                id="warranty_date" value="{{$data->warranty_date}}"readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="product_category_id"> Product Category</label>
                                            <select class="form-control select2" name="product_category_id"
                                                id="product_category_id" required=""
                                                data-select2-id="product_category_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true" readonly>

                                                <option value="">Select Product Category</option>
                                                @foreach ($productCategory as $item)
                                                    <option value="{{$item->id}}" {{ $item->id == $data->product_category_id ?"selected":""}}>{{$item->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="branch_id"> Branch</label>
                                            <select class="form-control select2" name="branch_id" id="branch_id"
                                                required="" data-select2-id="branch_id" tabindex="-1"
                                                aria-hidden="true" aria-required="true" readonly>

                                                <option value="">Select Branch</option>
                                                @foreach ($branches as $item)
                                                <option value="{{$item->id}}" {{ $item->id == $data->branch_id ?"selected":""}} readonly>{{$item->br_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="status">Status</label>
                                            <input type="text" name="status"
                                                id="status" class="form-control" value="@if ('type' == '1')
                                                {{ "Product Entry" }}@else{{ "requisition" }}@endif" readonly>
                                        
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="model_no"> Model No </label>
                                            <input type="text" name="model_no" class="form-control" id="model_no"value="{{$data->model_no}}" readonly
                                            >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="tag_no"> Tag No </label>
                                            <input type="text" name="tag_no" class="form-control" id="tag_no"value="{{$data->tag_no}}" readonly
                                            >
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="purchase_date"> Purchase Date </label>
                                            <input type="date" name="purchase_date" class="form-control"
                                                id="purchase_date" value="{{$data->purchase_date}}" readonly>
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
