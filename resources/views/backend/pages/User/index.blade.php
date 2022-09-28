@extends('backend.layouts.backend_master');
@section('title')
    Branch
@endsection
@section('page_style')
    <link rel="stylesheet" media="screen, print"
        href="{{ asset('backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('backend/assets/css/fa-solid.css') }}">
@endsection
@section('content_ims')
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
                        Branch <span class="fw-300"><i>List</i></span>
                    </h2>
                    <div class="panel-toolbar">
                        <a href="{{ route('user.create') }}">
                            <button class="btn btn-primary btn-sm"> <span class="fal fa-plus mr-1"></span> Add
                                User</button>
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
                                    <th>User Name</th>
                                    <th>User Branch</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->branch_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <form action="" method="post">
                                                @csrf
                                            <a href="{{route('user.show',$user->id)}}"class="btn btn-sm btn-primary waves-effect waves-themed">View</a>
                                            <a href="">
                                                <button type="button" class="btn btn-sm btn-info waves-effect waves-themed">Edit</button>
                                            </a>
                                        </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>User Name</th>
                                    <th>User Branch</th>
                                    <th>Email</th>
                                    <th>Action</th>
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
