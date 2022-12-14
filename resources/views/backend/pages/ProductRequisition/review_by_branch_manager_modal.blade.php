 <div class="row" >
            <div class="col-xl-12 col-md-12 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                     <form action="{{route('requisition_accepted_by_branch_manager')}}" method="post">
                        @csrf       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Item Category</label>

                                            <input type="text" name="name"id="name" class="form-control" value="{{$productRequisitionData->item_cat_name}}" readonly>
                                        </div>

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="item_category_id"> Product Category</label>

                                            <input type="text" name="name"id="name" class="form-control" value="{{$productRequisitionData->product_cat_name}}" readonly>
                                        </div>

                                         

                                      
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Inventory Product Name</label>
                                            <input type="text" name="name"id="name" class="form-control" value="{{$productRequisitionData->product_name}}" readonly>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="name">Branch Name</label>
                                            <input type="text" name="name"id="name" class="form-control" value="{{$productRequisitionData->branch_name}}" readonly>
                                        </div>


                                    </div>

                                    <div class="col-md-6">
                                                             
                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="brand_no"> Brand No </label>
                                            <input type="text" name="brand_no" class="form-control" id="brand_no" value="{{$productRequisitionData->brand}}"readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="quantity"> Quantity </label>
                                        <input type="number" name="quantity" class="form-control" value="{{$productRequisitionData->quantity}}" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="warranty_date"> Warranty (years)</label>
                                            <input type="number" name="warranty_date" class="form-control"
                                                id="warranty_date" value="{{$productRequisitionData->warranty}}"readonly>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="model_no"> Model No </label>
                                            <input type="text" name="model_no" class="form-control" id="model_no"value="{{$productRequisitionData->model}}" readonly
                                            >
                                        </div>

                                         <div class="col-md-12 mb-3">
                                            <label class="form-label" for="model_no"> Requisition Date </label>
                                            <input type="text" name="model_no" class="form-control" id="model_no"value="{{$productRequisitionData->requisition_request_date}}" readonly
                                            >
                                        </div>
                                      
                                    </div>
                                </div>


                           <div class="row" style="float: right;padding-bottom: 20px; padding-right: 20px">


                                    <!-- branch manager action buttons (starts)  -->
                                @if($productRequisitionData->status_by_branch_manager == 1) 

                                                @if($productRequisitionData->status_by_head_office == 1) 
                                                <button type="submit" class="btn btn-sm btn-secondary waves-effect waves-themed" disabled style="margin-bottom: 4px;">Delivered</button>
                                                @else

                                               <button type="submit" class="btn btn-sm btn-secondary waves-effect waves-themed" disabled style="margin-bottom: 4px;">Accepted</button>
                                               @endif

                                                 @elseif($productRequisitionData->status_by_branch_manager == 2)
                                                <button type="submit" class="btn btn-sm btn-secondary waves-effect waves-themed" disabled style="margin-bottom: 4px;">Declined</button>

                                                @else

                                               
					                            
					                            <input type="hidden" name="requisition_id" value="{{$productRequisitionData->id}}"> 
					                            <button type="submit" class="btn btn-sm btn-success waves-effect waves-themed" onclick="return confirm('Are you sure?');" style="margin-bottom: 15px; margin-right: 10px">Accept</button>

					                            </form>


                                               <form action="" method="post">                    
				                                <button type="button"  onclick="pop({{$productRequisitionData->id}})" class="btn btn-sm btn-danger waves-effect waves-themed" style="margin-bottom: 4px;">Decline</button>
				                                </form>
                                              @endif
                                              <!-- branch manager action buttons (ends) -->                          
                                
							<br>
							</div>
                                       
                          
                        </div>
                    </div>
                </div>
            </div>

        </div>

<script type="text/javascript">


        function pop(r_id){

        	const  sa = prompt("Enter reason for decline");

        	if(sa){

             $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  }
                 });

              $.ajax({
                        type: 'POST',

                        url: "{{ route('requisition_declined_by_branch_manager') }}",

                        data: {
                          'reason': sa,
                          'row_id': r_id
                        },
                        success: function (response) {

                        window.location.reload();
                        }
                    });

        	}else{
        		$("#reviewByBranchManagerModal").modal('hide');
        	}       	 

        }


</script>

