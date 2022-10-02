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
                        <h2 class="ui-sortable-handle">Product Category Set up Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="{{route('product-category.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2"
                                                name="item_category_id" id="item_category_id" required="">

                                                <option value="">Select Item Category</option>
                                                @foreach($item_category as $item){
                                                    <option value="{{$item->id}}" {{ $item->id == $data->item_category_id ?"selected":""}}>{{$item->name}}</option>}
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text"  name="name"
                                                id="name" class="form-control" required=""value="{{ $data->name}}">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="type">Type</label>
                                            <select class="form-control select2" name="type"
                                                id="type" required="">
                                                <option value="{{$data->type}}" {{ $data->type == '' ? 'selected' : '' }}>Select Type</option>
                                                <option value="{{$data->type}}"{{ $data->type == '1' ? 'selected' : '' }}>Asset</option>
                                                <option value="{{$data->type}}"{{ $data->type == '2' ? 'selected' : '' }}>Inventory</option>
                                            </select>
                                            <span style="color: red">
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="valuation"> Valuation </label>
                                            <input type="number" name="valuation" class="form-control" value="
                                            @php
                                                $itemCategory = DB::table('item_categories')->where('id','=',$item_category->item_category_id)->first();
                                            @endphp{{$itemCategory->valuation}}"id="valuation" required="" >
                                                <span style="color: red">
                                                    @error('valuation')
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
