@extends('backend.layouts.backend_master');
@section('title')
    Product Category
@endsection
@section('content_ims')
    <main id="js-page-content" role="main" class="page-content">
        <div class="row" style="margin-left: 80px; margin-top:50px;">
            <div class="col-xl-6 col-md-7 sortable-grid ui-sortable">
                <div id="panel-3" class="panel panel-sortable" role="widget">
                    <div class="panel-hdr" role="heading">
                        <h2 class="ui-sortable-handle">Product Entry Set up Form</h2>
                    </div>
                    <div class="panel-container show" role="content">
                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                        <div class="panel-content">

                            <form id="transaction_create_from"
                                action="http://venturelifestylelimited.com/salary/disburse/create" method="post"
                                enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" name="_token" value="HNdDHwvwy2QiCgFKV80Uaosquq5GFcf0W5pqX97b">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="employee_id"> Item Category</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                name="employee_id" id="employee_id" required=""
                                                data-select2-id="employee_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true">

                                                <option value="" data-select2-id="2">Select Item Category</option>

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="employee_id">Type</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                name="employee_id" id="employee_id" required=""
                                                data-select2-id="employee_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true">

                                                <option value="" data-select2-id="2">Select Type</option>
                                                <option value="" data-select2-id="2">Asset</option>
                                                <option value="" data-select2-id="2">Inventory</option>

                                            </select>
                                        </div>

                                        
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="employee_id"> Branch</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                name="employee_id" id="employee_id" required=""
                                                data-select2-id="employee_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true">

                                                <option value="" data-select2-id="2">Select Branch</option>

                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3 select_2_error">
                                            <label class="form-label" for="employee_id">Status</label>
                                            <select class="form-control select2 select2-hidden-accessible"
                                                name="employee_id" id="employee_id" required=""
                                                data-select2-id="employee_id" tabindex="-1" aria-hidden="true"
                                                aria-required="true">

                                                <option value="" data-select2-id="2">Select Status</option>
                                                <option value="" data-select2-id="2">Product Entry</option>
                                                <option value="" data-select2-id="2">requisition</option>

                                            </select>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="present_salary">Name</label>
                                            <input type="text" placeholder="product name" name="present_salary"
                                                id="present_salary" class="form-control" onblur="checkIncrementSalary()"
                                                required="" aria-required="true">
                                            <div class="valid-feedback"></div>
                                            <small id="present_salary_in_word"
                                                style="color: red; font-weight:bold; text-transform:capitalize"></small>
                                        </div>


                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="effective_date"> Brand No </label>
                                            <input type="text" name="effective_date" class="form-control"
                                                id="effective_date" required="" aria-required="true">
                                            <div class="valid-feedback"></div>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="effective_date"> Model No </label>
                                            <input type="text" name="effective_date" class="form-control"
                                                id="effective_date" required="" aria-required="true">
                                            <div class="valid-feedback"></div>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="effective_date"> Tag No </label>
                                            <input type="text" name="effective_date" class="form-control"
                                                id="effective_date" required="" aria-required="true">
                                            <div class="valid-feedback"></div>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="effective_date"> Quantity </label>
                                            <input type="number" name="effective_date" class="form-control"
                                                id="effective_date" required="" aria-required="true">
                                            <div class="valid-feedback"></div>

                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label" for="effective_date"> Purchase Date </label>
                                            <input type="date" name="effective_date" class="form-control"
                                                id="effective_date" required="" aria-required="true">
                                            <div class="valid-feedback"></div>

                                        </div>


                                    </div>

                                </div>

                                <div
                                    class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center p-2">
                                    <button class="btn btn-primary  waves-effect waves-themed submit_btn"
                                        type="submit">Submit form</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

