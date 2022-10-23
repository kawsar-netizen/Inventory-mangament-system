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
                                @foreach ($productRequisition as $item)
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
                                         <span class="badge badge-danger" style="padding: 10px">{{'Denied'}}</span>
                                         
                                         @else
                                         <span class="badge badge-success" style="padding: 10px">{{'Delivered'}}</span>
                                         @endif
                                        </td>
                                       
                                        <td>

                                             @php                                                       
                                              $role = Auth::user()->role_id;                                             
                                            @endphp


                                            @if(($role == 1) || ($role == 2) || ($role == 3))
                                              
                                              <form action="" method="post">
                                                @csrf                                                                                       
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#default-example-modal-center">Review</button>                                              
                                            </form>
                                            @else

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



                        <!-- Modal center -->
                                            <div class="modal fade" id="default-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">
                                                                Review Current Requisition
                                                            </h4>
                                                           
                                                        </div>
                                                        <div class="modal-body">
                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-success" data-dismiss="modal">Accept</button>
                                                            <button type="button" class="btn btn-danger">Decline</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                    /*{
                        extend:    'colvis',
                        text:      'Column Visibility',
                        titleAttr: 'Col visibility',
                        className: 'mr-sm-3'
                    },*/
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

    </script>
@endsection
