@extends('backend.layouts.backend_master');

@section('title')
    Dashboard
@endsection

@section('content_ims')


    <h1 style="text-align: center; margin-top: 20px"><strong>Inventory Management System</strong></h1>
    <div style="align-self: center; margin-top: 20px">
        <img src="{{asset('backend/assets/img/sbac2.jpg')}}" width="400px" height="auto" class="center">
    </div>
   

    <div class="row"style="margin-left: 80px;margin-right: 80px; margin-top:30px;">
        <div class="col-xl-12">
            <div id="panel-12" class="panel">

                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="card-columns" style="margin-top:20px;">

                            <div class="card bg-info text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>475</h2>
                                    <footer class="blockquote-footer text-white">
                                        <h4>Number of Branches</h4>
                                    </footer>
                                </blockquote>
                                 <i class="fa fa-university position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                            </div>


                            <div class="card bg-success text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>2774</h2>
                                    <footer class="blockquote-footer text-white">
                                        <h4>Current Asset Valuation</h4>
                                    </footer>
                                </blockquote>
                                <i class="fa fa-percent position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
                            </div>

                            <div class="card bg-primary text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h2>25</h2>
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
    </div>
@endsection
