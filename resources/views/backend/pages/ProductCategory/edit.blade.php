
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
                        <h2 class="ui-sortable-handle">Product Category Update Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from" action="{{route('product-category.update',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">



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
                                            <select class="select2 form-control w-100" name="type" id="type">
                                                <option value="{{$data->type}}">
                                                    @if($data->type == 1)
                                                    Asset
                                                    @else
                                                    Inventory
                                                    @endif
                                                </option>
                                               
                                                <option value="">--Select Type--</option>
                                                <option value="1">Asset</option>
                                                <option value="2">Inventory</option>
                                               
                                                
                                            </select>
                                            <span style="color: red">
                                                @error('type')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>



                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2"name="item_category_id" id="item_category_id" required="">

                                                <option value="">Select Item Category</option>
                                                @foreach($item_category as $item){
                                                    <option value="{{$item->id}}" {{ $item->id == $data->item_category_id ?"selected":""}}>{{$item->name}}</option>}
                                                @endforeach
                                            </select>
                                        </div>

                                     
                                        @if($data->type == 1)
                                     
                                        <div class="col-md-12 mb-3" id="ddd">
                                            <label class="form-label" for="valuation"> Valuation </label>
                                    <input type="number" name="valuation" class="form-control" value="{{$data->product_category_valuation}}" id="valuation" >
                                                <span style="color: red">
                                                    @error('valuation')
                                                        {{ $message }}
                                                    @enderror
                                                </span>                                               
                                        </div>

                                        @else
                                        <div class="col-md-12 mb-3" id="ddd">
                                            <label class="form-label" for="valuation"> Valuation </label>
                                    <input type="number" name="valuation" class="form-control" value="{{$data->product_category_valuation}}" id="valuation" disabled="" >
                                                <span style="color: red">
                                                    @error('valuation')
                                                        {{ $message }}
                                                    @enderror
                                                </span>                                               
                                        </div>

                                        @endif

                                    </div>
                                </div>
                                <div
                                    class="panel-content d-flex flex-row align-items-center">
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

@section('page_js')
<script type="text/javascript">
    $(document).ready(function(){

    $('.select2').select2();



    // div show/hidden part start
    $('#type').on('change',function(){

    var tt = $(this).val();

    
   if(tt == 2){

    //  $('#ddd').hide();
    // $('#valuation').val('');
     $('#valuation').prop("disabled", true);
     


   }else{
       // $('#ddd').show();
        $('#valuation').prop("disabled", false);
   }

});
// div show/hidden part ends

    });



         // for resolve description start
    $('#item_category_id').change(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      });
      e.preventDefault();

      var item_category_id = $(this).val();
      var valuation = $(this).closest('form').find('#valuation');
      if (item_category_id == '') {
        $('#valuation').html('');
        return false;
      }
      $.ajax({
        url: "{{ route('productCategoryValuation') }}",
        method: "POST",
        data: {
          'item_category_id': item_category_id
        },
        success: function(response) {
           
            valuation.val(response);
        },
        error: function(response) {
        
          console.log(response);
        }
      }); 
    });

</script>



@endsection