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

                            <form id="transaction_create_from" action="{{route('product-category.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">


                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Name</label>
                                            <input type="text" placeholder="Product category name" name="name"
                                                id="name" class="form-control" required="" aria-required="true"
                                                value="{{ old('name') }}">
                                            <span style="color: red">
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>


                                         <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="type">Type</label>
                                            <select class="form-control select2 " name="type" id="types" required="">
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
                                       
                                      
                                       
                                            <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>
                                            <select class="form-control select2"
                                                name="item_category_id" id="item_category_id" required="">

                                                <option value="">Select Item Category</option>
                                                @foreach ($itemCategory as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>


                                        
                                      
                                      
                                        

                                                                          

                                        <div class="col-md-12 mb-3" id="ddd">
                                            <label class="form-label" for="valuation"> Valuation </label>
                                            <input type="number" name="valuation" class="form-control" id="valuation">
                                                <span style="color: red">
                                                    @error('valuation')
                                                        {{ $message }}
                                                    @enderror
                                                </span>                                              
                                        </div>

                                    </div>
                                </div>
                                <div class="panel-content d-flex flex-row align-items-center float-right">
                                    <button class="btn btn-success  waves-effect waves-themed submit_btn"
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
    $(document).ready(function(){

    $('.select2').select2();


// valuation diable/enable part start
    $('#types').on('change',function(){

    var tt = $(this).val();

   if(tt == 2){

     // $('#valuation').attr('readonly', 'readonly');
     $('#valuation').prop("disabled", true);
     


   }else{
       // $('#ddd').hide();
       // $('#valuation').removeAttr('readonly');
       $('#valuation').prop("disabled", false);
   }

});
// valuation diable/enable part ends

    });





     // for valuation start
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
// for valuation ends


</script>

@endsection
