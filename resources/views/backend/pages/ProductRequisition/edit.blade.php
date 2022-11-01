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
            <div class="col-xl-12 col-md-12 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    <div class="panel-hdr" role="heading">
                        <h2 class="ui-sortable-handle">Inventory Requisition Update Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form action="{{ route('product-requisition.update', $productRequisitionData->id) }}"
                                method="post"enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <input type="text" name="item_category_id"id="item_category_id" class="form-control" value="{{$productRequisitionData->item_cat_name}}" readonly>
                                            
                                        </div>


                                            <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label"> Product Category</label>                                         
                                            <input type="text" name="product_category_id"id="product_category_id" class="form-control" value="{{$productRequisitionData->product_cat_name}}" readonly>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Inventory Product Name</label>
                                            <input type="text" name="inventory_product_id" value="{{ $productRequisitionData->product_name }}"
                                                id="inventory_product_id" class="form-control" readonly="">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="brand_no"> Brand No </label>
                                            <input type="text" name="brand" class="form-control" id="brand_no"
                                                value="{{ $productRequisitionData->brand }}" readonly="">
                                            

                                        </div>


                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="model_no"> Model No </label>
                                            <input type="text" name="model" class="form-control" id="model_no"
                                                value="{{ $productRequisitionData->model}}" readonly="">
                                           
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="quantity"> Quantity </label>
                                            <input type="number" name="quantity" class="form-control" id="quantity"
                                                value="{{ $productRequisitionData->quantity }}">
                                            <span style="color: red">
                                                @error('quantity')
                                                    {{ $message }}
                                                @enderror
                                            </span>

                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="warranty_date"> Warranty (years)</label>
                                            <input type="number" name="warranty" class="form-control"
                                                id="warranty_date" value="{{ $productRequisitionData->warranty }}" readonly="">
                                       
                                        </div>
                                       
                                     

                                    </div>

                                </div>

                                <div
                                    class="panel-content  d-flex flex-row align-items-center p-2">
                                    <button class="btn btn-primary  waves-effect waves-themed submit_btn"
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
