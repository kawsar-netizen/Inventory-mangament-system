@extends('backend.layouts.backend_master');
@section('title')
    Inventory Requisition Report
@endsection
@section('page_style')
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/fa-solid.css') }}">
@endsection
@section('content_ims')

    <div class="row" style="margin-left: 40px;margin-right: 80px; margin-top:40px;">

       
		    	

                <div class="col-xl-12">
                <div id="panel-1" class="panel">

    	      <div class="panel-hdr">
                <h2>
                    Inventory Requisition Report<span class="fw-300"><i>List</i></span>
                </h2>   
             </div>              
                

            <div class="panel-container show">
              <div class="panel-content">


<!-- report filters start -->
				<form action="" method="" id="requisitionReportForm" >
		    	<div class="col">
		    		<div class="row">
		    					<div class="col-4 form-group">
		               		<label><strong>Item Category</strong></label>
		               		<select class="form-control select2" name="item_category_id" id="item_category_id" >
                                <option value="">Select Item Category</option>
                                @foreach ($itemCategory as $item_cat)
                                    <option value="{{ $item_cat->id }}" @if(old('item_category_id') == $item_cat->id) selected @endif>{{ $item_cat->name }}</option>
                                @endforeach
                            </select>
		               	</div>

		               	<div class="col-4 form-group">
		               		<label><strong>Product Category</strong></label>
		               		<select class="form-control select2" name="product_category_id" id="product_category_id">
                                    <option value="" >Select Product Category</option>
                            </select>
		               	</div>


                       @php
                       $uRole = Auth::user()->role_id;
                       @endphp


		               	<div class="col-4 form-group">
		               		<label><strong>Branch</strong></label>
		               		<select class="form-control select2" name="branch_id" id="branch_id" >

		               			
                               @if($uRole == 1 || $uRole == 2)
		               			<option value="all">all</option>
                              @foreach ($branches as $branch)
                                  <option value="{{ $branch->id }}"  @if(old('branch_id') == $branch->id) selected @endif>{{ $branch->br_name }}</option>
                                @endforeach

                                @else
                                @foreach ($branches as $branch)
                                  <option value="{{ $branch->id }}"  @if(old('branch_id') == $branch->id) selected @endif>{{ $branch->br_name }}</option>
                                @endforeach
                                @endif

                            </select>
		               	</div>


		               	<div class="col-4 ">
		               		<label><strong>From (Requisition Date)</strong></label>
		               		<input type="text" name="requisitionFrom" class="form-control" id="requisitionFrom" readonly placeholder="Select date">
		               	</div>

		               		<div class="col-4 ">
		               		<label><strong>To (Requisition Date)</strong></label>
		               		<input type="text" name="requisitionTo" class="form-control" id="requisitionTo" readonly placeholder="Select date">
		               	</div>

		               <div class="col-4 form-group">
		               	<label style="color: #faf8fb">sub</label><br>
		              <button type="submit" id="filter" class="btn btn-info ">Search</button>
		              <button type="button" id="reset" class="btn btn-primary"  onClick="window.location.reload();">Reset</button>
		               </div>
		    			
		           </div>
		           <br>
		    	</div>
     		  </form>
			<!-- report filters end	     -->


                        <!-- datatable start -->
                        <table id="dt" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <!-- <th>SL</th> -->
                                    <th>Item Category</th>
                                    <th>Product Category</th>
                                    <th>Inventory Product Name</th>
                                    <th>Branch</th>                                 
                                    <th>Brand No</th>
                                    <th>Model No</th>
                                    <th>Quantity</th>
                                    <th>Warranty (years)</th>
                                    <th>Requisition From</th>
                                    <th>Requisition Date</th>
                                    <th>Status</th>                                 
                                </tr>
                            </thead>
                            <tbody id="rr">

                                @foreach ($productRequisitionReport as $item)

                                 <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $item->item_cat_name }}</td>
                                        <td>{{ $item->product_cat_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->branch_name }}</td>                                       
                                        <td>{{$item->brand}}</td>
                                        <td>{{$item->model}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->warranty}}</td>
                                        <td>{{$item->req_from}}</td>
                                        <td>{{$item->requisition_request_date}}</td>

                                        <td>
                                         @if($item->requisition_current_status == 1)
                                        <span class="badge badge-warning" style="padding: 10px">{{'Pending'}}</span>

                                         @elseif($item->requisition_current_status == 2)           
                                         <span class="badge badge-info" style="padding: 10px">{{'Received'}}</span>

                                         @elseif($item->requisition_current_status == 3)
                                         <span class="badge badge-danger" style="padding: 10px">{{'Canceled'}}</span>
                                         
                                         @else
                                         <span class="badge badge-success" style="padding: 10px">{{'Delivered'}}</span>
                                         @endif
                                        </td>
                                   </tr>
                               
           
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <!-- <th>SL</th> -->
                                    <th>Item Category</th>
                                    <th>Product Category</th>
                                    <th>Inventory Product Name</th>
                                    <th>Branch</th>                                 
                                    <th>Brand No</th>
                                    <th>Model No</th>
                                    <th>Quantity</th>
                                    <th>Warranty (years)</th>
                                    <th>Requisition From</th>
                                    <th>Requisition Date</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('backend/assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/js/datagrid/datatables/datatables.export.js') }}"></script>
    <script>

        $(document).ready(function() {

        	//select2
           $('.select2').select2();


           //datepicker starts
           var controls = {
                leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
                rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
            }

                $('#requisitionFrom').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                }); 


                $('#requisitionTo').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });  


            //datepicker ends    
  
            // initialize datatable
            $('#dt').dataTable({
                responsive: true,
                lengthChange: false,
                dom:

                    "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                


                buttons: [
                   
                    {
                        extend: 'pdfHtml5',
                        text: 'PDF',
                        titleAttr: 'Generate PDF',
                        className: 'btn-outline-danger btn-sm mr-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        titleAttr: 'Generate Excel',
                        className: 'btn-outline-success btn-sm mr-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-outline-primary btn-sm mr-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-outline-primary btn-sm'
                    }
                ]

                
            });


     
        });



         // for fetching product categroy data start
    $('#item_category_id').change(function(e) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      });
      e.preventDefault();

      var item_category_id = $(this).val();
      var product_category_id = $(this).closest('form').find('#product_category_id');
      if (item_category_id == '') {
        $('#product_category_id').html('');
        return false;
      }
      $.ajax({
        url: "{{ route('productCategoryDropdown') }}",
        method: "POST",
        data: {
          'item_category_id': item_category_id
        },
        success: function(response) {
           
           $('#product_category_id').html(response);
            console.log(response);


        },
        error: function(response) {
        
          console.log(response);
        }
      }); 
    });
// for fetching product categroy data end




$('#requisitionReportForm').submit(function(e){

    e.preventDefault();
	
	var requisitionReportFormData = new FormData(document.querySelector('#requisitionReportForm'));

	var item_category_id = $('#item_category_id').val();
	var product_category_id = $('#product_category_id').val();
	var branch_id = $('#branch_id').val();
	var requisitionFrom = $('#requisitionFrom').val();
	var requisitionTo = $('#requisitionTo').val();
	
	if(item_category_id == ''){
		alert('Please select an item category');
		return false;
	}

	if(product_category_id == ''){
		alert('Please select a product category');
		return false;
	}

	if(branch_id == ''){
		alert('Branch can not be null');
		return false;
	}

            


	$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
      });

	$.ajax({
		url: "{{ route('requisitionReport') }}",
        method: "POST",
        processData: false,
        contentType: false,
        data: requisitionReportFormData,
        success: function(response) {
           
           $('#rr').html(response);
           console.log(response);

                
        },
        error: function(response) {
          console.log(response);
        }
	})


})


// var myTable = $('#dt-basic-example').DataTable( {
//     "serverSide": true,
//     "ajax": { 
//         "url" : "{{ route('requisitionReport') }}",
//         "method" : "POST"
//     },
//     "drawCallback": function (settings) { 
//         var response = settings.json;
//         console.log(response);
//     },
// });


    </script>
@endsection
