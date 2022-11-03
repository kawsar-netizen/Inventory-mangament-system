@extends('backend.layouts.backend_master');

@section('title')
    Dashboard
@endsection


@section('page_style')
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/fa-solid.css') }}">
@endsection

@section('content_ims')

    <h1 style="text-align: center; margin-top: 20px"><strong>Inventory Management System</strong></h1>
    <!-- <div style="align-self: center; margin-top: 20px">
        <img src="{{asset('backend/assets/img/sbac2.jpg')}}" width="400px" height="auto" class="center">
    </div> -->

   

    <div class="row"style="margin-left: 80px;margin-right: 80px; margin-top:30px;">
        <div class="col-xl-12">
            <div id="panel-12" class="panel">

                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="card-columns" style="margin-top:20px;">

                            <div class="card bg-danger text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>{{$number_of_branches}}</h2>
                                    <footer class="blockquote-footer text-white">
                                        <h4>Number of Branches</h4>
                                    </footer>
                                </blockquote>
                                 <i class="fa fa-university position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                            </div>


                            <div class="card bg-success text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>{{$total_valuation}} %</h2>
                                    <footer class="blockquote-footer text-white">
                                        <h4>Current Asset Depreciation</h4>
                                    </footer>
                                </blockquote>
                                <i class="fa fa-percent position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                            </div>

                            <div class="card bg-primary text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>{{$total_number_of_product_categories}}</h2>
                                    <footer class="blockquote-footer text-white">
                                       <h4>Number of Product Category</h4>
                                    </footer>
                                </blockquote>
                                <i class="fa fa-folder position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->


    <!-- <div class="row" style="margin-left: 80px;margin-right: 80px; margin-top:20px;"> -->
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Inventory Entry <span class="fw-300"><i>List</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Item Category Name</th>
                                    <th>Product Category Name</th>                                   
                                    <th>Inventory Product Name</th>
                                    <th>Brand No</th>
                                    <th>Model No</th>                                  
                                    <th>User Name</th>
                                    <th>Branch</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productEntry as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->item_cat_name }}</td>
                                        <td>{{$item->product_cat_name }}</td>                                       
                                        <td>{{$item->name}}</td>             
                                        <td>{{$item->brand_no}}</td>
                                        <td>{{$item->model_no}}</td>
                                        <td>{{$item->entry_user_name}}</td>
                                        <td>{{$item->branch_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                               <tr>
                                    <th>SL</th>
                                    <th>Item Category Name</th>
                                    <th>Product Category Name</th>                                   
                                    <th>Inventory Product Name</th>
                                    <th>Brand No</th>
                                    <th>Model No</th>                                  
                                    <th>User Name</th>
                                    <th>Branch</th>
                                    
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
                    // {
                    //     extend: 'pdfHtml5',
                    //     text: 'PDF',
                    //     titleAttr: 'Generate PDF',
                    //     className: 'btn-outline-danger btn-sm mr-1'
                    // },
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