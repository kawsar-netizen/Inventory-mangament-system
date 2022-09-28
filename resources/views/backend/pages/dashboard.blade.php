@extends('backend.layouts.backend_master');






@section('title')
    Dashboard
@endsection

@section('content_ims')
    <div class="row"style="margin-left: 80px;margin-right: 80px; margin-top:50px;">
        <div class="col-xl-12">
            <div id="panel-12" class="panel">

                <div class="panel-container show">
                    <div class="panel-content">

                        <div class="card-columns" style="margin-top:20px;">

                            <div class="card bg-info text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h3>475</h3>
                                    <footer class="blockquote-footer text-white">
                                        <p>Number of Branches</p>
                                    </footer>
                                </blockquote>
                            </div>
                            <div class="card bg-primary text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h3>2774</h3>
                                    <footer class="blockquote-footer text-white">
                                        <p>Current Asset Valuation</p>
                                    </footer>
                                </blockquote>
                            </div>

                            <div class="card bg-primary text-white text-center p-3">
                                <blockquote class="blockquote mb-0">
                                    <h3>25</h3>
                                    <footer class="blockquote-footer text-white">
                                       <p>Number of Product Category</p>
                                    </footer>
                                </blockquote>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
