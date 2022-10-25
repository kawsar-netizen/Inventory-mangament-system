@extends('backend.layouts.backend_master');
@section('title')
    Product Entry
@endsection
@section('page_style')
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/fa-solid.css') }}">
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
    @if (Session::get('delete'))
        <script>
            alert('{{ Session::get('delete') }}')
        </script>
    @endif
    @if (Session::get('fail'))
        <script>
            alert('{{ Session::get('fail') }}')
        </script>
    @endif

    <div class="row" style="margin-left: 80px;margin-right: 80px; margin-top:50px;">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Inventory Requisition <span class="fw-300"><i>List</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{ route('product-requisition.create') }}">
                            <button class="btn btn-primary btn-sm"><span class="fal fa-plus mr-1"></span>Add Inventory Requisition</button>
                        </a>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
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
                                  
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @php                                                       
                                  $role = Auth::user()->role_id;                                             
                                @endphp

                                @foreach ($productRequisition as $item)


                                @if( (($item->status_by_branch_manager == 1) && ($role == 1)) || (($item->status_by_branch_manager == 1) && ($role == 2)))

                                  <!--list of requisitions for Head office (starts)-->
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                                $item_category = DB::table('item_categories')
                                                    ->where('id', '=', $item->item_category_id)
                                                    ->orderBy('id', 'DESC')
                                                    ->first();
                                            @endphp
                                            {{ $item_category->name }}
                                        </td>
                                        <td>
                                            @php
                                                $product_category = DB::table('product_categories')->where('id','=',$item->product_category_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$product_category->name}}
                                        </td>
                                        <td>
                                           @php
                                                $item_name = DB::table('product_entries')->where('id','=',$item->inventory_product_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$item_name->name}}
                                        </td>
                                        <td>
                                            @php
                                                $branches = DB::table('branches')->where('id','=',$item->branch_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$branches->br_name}}
                                        </td>
                                        
                                        <td>{{$item->brand}}</td>
                                        <td>{{$item->model}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->warranty}}</td>
                                        <td>
                                            @php
                                                $user = DB::table('users')->where('id','=',$item->requested_from)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$user->name}}

                                        </td>
                                        <td>{{$item->requisition_request_date}}</td>

                                        <td>-</td>

                                        <!-- <td>
                                         @if($item->requisition_current_status == 1)
                                        <span class="badge badge-warning" style="padding: 10px">{{'Pending'}}</span>

                                         @elseif($item->requisition_current_status == 2)           
                                         <span class="badge badge-info" style="padding: 10px">{{'Received'}}</span>

                                         @elseif($item->requisition_current_status == 3)
                                         <span class="badge badge-danger" style="padding: 10px">{{'Declined'}}</span>
                                         
                                         @else
                                         <span class="badge badge-success" style="padding: 10px">{{'Delivered'}}</span>
                                         @endif
                                        </td>
 -->

                                       <td>
                                          <form action="" method="post">
                                                @csrf                                                                                       
                        <button type="button" class="btn btn-info" onclick="openEditResolveAgendaFormWithModal({{$item->id}})" >Review</button>                                              
                                            </form> 
                                       </td>
                                   </tr>

                            <!--list of requisitions for Head office (ends)-->



                               @elseif( ($role == 3) || ($role == 4))                         
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @php
                                                $item_category = DB::table('item_categories')
                                                    ->where('id', '=', $item->item_category_id)
                                                    ->orderBy('id', 'DESC')
                                                    ->first();
                                            @endphp
                                            {{ $item_category->name }}
                                        </td>
                                        <td>
                                            @php
                                                $product_category = DB::table('product_categories')->where('id','=',$item->product_category_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$product_category->name}}
                                        </td>
                                        <td>
                                           @php
                                                $item_name = DB::table('product_entries')->where('id','=',$item->inventory_product_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$item_name->name}}
                                        </td>
                                        <td>
                                            @php
                                                $branches = DB::table('branches')->where('id','=',$item->branch_id)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$branches->br_name}}
                                        </td>
                                        
                                        <td>{{$item->brand}}</td>
                                        <td>{{$item->model}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->warranty}}</td>
                                        <td>
                                            @php
                                                $user = DB::table('users')->where('id','=',$item->requested_from)->orderBy('id','DESC')->first();
                                            @endphp
                                            {{$user->name}}

                                        </td>
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
                                      
                                        <td>
                                             @php                                                       
                                              $role = Auth::user()->role_id;                                             
                                            @endphp
                                             
                                            @if($role == 3) 
                                            <!-- if user is branch manager -->


                                               <!-- branch manager action buttons (starts)  -->
                                                @if($item->status_by_branch_manager == 1)                                               
                                                <button type="submit" class="btn btn-sm btn-secondary waves-effect waves-themed" disabled style="margin-bottom: 4px;">Accepted</button>
                                               

                                                 @elseif($item->status_by_branch_manager == 2)
                                                <button type="submit" class="btn btn-sm btn-secondary waves-effect waves-themed" disabled style="margin-bottom: 4px;">Declined</button>

                                                @else

                                                <form action="{{route('requisition_accepted_by_branch_manager')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="requisition_id" value="{{$item->id}}"> 
                                                <button type="submit" class="btn btn-sm btn-success waves-effect waves-themed" onclick="return confirm('Are you sure?');" style="margin-bottom: 4px;">Accept</button>

                                                </form>


                                                <form action="{{route('requisition_declined_by_branch_manager')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="requisition_id" value="{{$item->id}}">
                                                <button type="submit" class="btn btn-sm btn-danger waves-effect waves-themed" onclick="return confirm('Are you sure?');" style="margin-bottom: 4px;">Decline</button>
                                                </form>
                                              @endif
                                              <!-- branch manager action buttons (ends) -->

                                               


                                            @else
                                            <!-- if user is branch user -->
                                            <form action="" method="post">
                                                @csrf                                              
                                                <a href=""class="btn btn-sm btn-primary waves-effect waves-themed" style="margin-bottom: 4px;">View</a>

                                                @if($item->requisition_current_status == 1)
                                                <a href=""style="margin-bottom: 4px;" class="btn btn-sm btn-info waves-effect waves-themed">Edit</a>
                                                @else
                                                @endif
                                            </form>
                                           @endif
                                        </td>
                                    </tr>

                                    @else

                                   @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
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
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->

                        <!-- Modal for review (start)-->
                                            <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Review Current Requisition
                                                            </h4>
                                                           
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                        </div>
                                                        <!-- <div class="modal-footer">
                                                            
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>

                        <!-- Modal for review (end)-->

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

            // initialize datatable
            $('#dt-basic-example').dataTable({
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



         function openEditResolveAgendaFormWithModal(row_id) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });
    

        if (row_id == '') {
            alert('No ID Found !');
            return false;
        }
        var formData = {
            'row_id': row_id
        };
        $.ajax({
            type: 'POST',
            url: "{{ route('requisition_review_modal') }}",
            data: formData,
            beforeSend: function() {
                $('#reviewModal .modal-body').html('');
            },
            success: function(response) {
                if (response.success == true) {
                    $('#reviewModal .modal-body').html(response.html);
                    $('#reviewModal').modal('show');
                } else {
                    $('#reviewModal .modal-body').html('');
                    alert(response.message);
                    console.log(response);
                }
            },
            error: function(response) {
                $('#reviewModal .modal-body').html('');
                alert('Error Is Occored ! ' + response.message);
                console.log(response);
            },
            complete: function() {

            }
        });
    } // end -:- openEditResolveAgendaFormWithModal()

    </script>
@endsection
