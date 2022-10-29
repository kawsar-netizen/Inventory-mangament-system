<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    //requisition report list (start)
    public function index()
    {
        $user_id = Auth::user()->id;
       $role = Auth::user()->role_id;
       $br = Auth::user()->branch_id;


        $itemCategory          = DB::table('item_categories')->orderBy('id', 'DESC')->get();
        $branches = DB::table('branches')->orderBy('id', 'ASC')->get();



// this is for master admin and head office
       if($role == 1 || $role == 2){

        $productRequisitionReport = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                   ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                   ->where('product_requisitions.status_by_branch_manager',1)
                                  ->orderBy('product_requisitions.id', 'DESC')
                                  ->get();

     

//this is for branch manager
        }elseif($role == 3){

     
            $branches = DB::table('branches')
                        ->select('*')
                        ->where('id', Auth::user()->branch_id)
                        ->get();


            $productRequisitionReport = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                   ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                  ->where('product_requisitions.branch_id',$br)
                                  ->orderBy('product_requisitions.id', 'DESC')
                                  ->get();


//this is for branch user
        }else{


            $branches = DB::table('branches')
                        ->select('*')
                        ->where('id', Auth::user()->branch_id)
                        ->get();


          

            $productRequisitionReport = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                   ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                  ->where('product_requisitions.requested_from',$user_id)
                                  ->orderBy('product_requisitions.id', 'DESC')
                                  ->get();

        }

        return view('backend.pages.report.requisition_report_index', compact('productRequisitionReport','itemCategory', 'branches'));
    }

//requistion report list (ends)



   




    public function requisitionReport(Request $request){



        if($request->ajax()){

            try{

                $item_category_id = trim($request->item_category_id);
                $product_category_id = trim($request->product_category_id);
                $branch_id = trim($request->branch_id);
                $requisitionFrom = trim($request->requisitionFrom);
                $requisitionTo = trim($request->requisitionTo);


                 $role = Auth::user()->role_id;



              
            if($role == 1 || $role == 2){

                if($branch_id == 'all'){

                     $productReq = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                  ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                  ->where('product_requisitions.item_category_id',$item_category_id)
                                  ->where('product_requisitions.product_category_id',$product_category_id)
                                  ->where('product_requisitions.status_by_branch_manager',1)
                                  ->get();

                }else{
                     $productReq = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                  ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                  ->where('product_requisitions.item_category_id',$item_category_id)
                                  ->where('product_requisitions.product_category_id',$product_category_id)
                                  ->where('product_requisitions.branch_id',$branch_id)
                                  ->where('product_requisitions.status_by_branch_manager',1)
                                  ->get();
                }

                

            }else{
                 $productReq = DB::table('product_requisitions')
                                  ->select('product_requisitions.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name', 'branches.br_name as branch_name','users.name as req_from','requisition_request_date')
                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('product_entries','inventory_product_id','=','product_entries.id')
                                  ->leftjoin('branches','product_requisitions.branch_id','=','branches.id')
                                  ->leftjoin('users','product_requisitions.requested_from','=','users.id')
                                  ->where('product_requisitions.item_category_id',$item_category_id)
                                  ->where('product_requisitions.product_category_id',$product_category_id)
                                  ->where('product_requisitions.branch_id',$branch_id)
                                  ->get();
            }
            




            $str = '';


                           $str.= '<tr>
                                   
                                    <th style = "width:10%">Item Category</th>
                                    <th style = "width:10%">Product Category</th>
                                    <th style = "width:10%">Inventory Product Name</th>
                                    <th style = "width:10%">Branch</th>                                 
                                    <th style = "width:10%">Brand No</th>
                                    <th style = "width:10%">Model No</th>
                                    <th style = "width:10%">Quantity</th>
                                    <th style = "width:10%">Warranty (years)</th>
                                    <th style = "width:10%">Requisition From</th>
                                    <th style = "width:10%">Requisition Date</th>
                                    <th style = "width:10%">Status</th>                                 
                                </tr>';


            foreach ($productReq as $item) {

                       $str.='<tr>
                                        
                                        <td style = "width:10%">'.$item->item_cat_name.'</td>
                                        <td style = "width:10%">'.$item->product_cat_name.'</td>
                                        <td style = "width:10%">'. $item->product_name.'</td>
                                        <td style = "width:10%">'.$item->branch_name.'</td>                                       
                                        <td style = "width:10%">'.$item->brand.'</td>
                                        <td style = "width:10%">'.$item->model.'</td>
                                        <td style = "width:10%">'.$item->quantity.'</td>
                                        <td style = "width:10%">'.$item->warranty.'</td>
                                        <td style = "width:10%">'.$item->req_from.'</td>
                                        <td style = "width:10%">'.$item->requisition_request_date.'</td>

                                        <td style = "width:10%">';

                        if($item->requisition_current_status == 1){
                            $str .='<span class="badge badge-warning" style="padding: 10px">Pending</span>';
                        }
                        elseif($item->requisition_current_status == 2) {          
                            $str .= '<span class="badge badge-info" style="padding: 10px">Received</span>';
                        }
                        elseif($item->requisition_current_status == 3){
                            $str .= '<span class="badge badge-danger" style="padding: 10px">Canceled</span>';
                        }
                        else{
                            $str .= '<span class="badge badge-success" style="padding: 10px">Delivered</span>';
                        }
                            
                        $str.='</td></tr>';
                        }
                                          

                    echo $str;


              

            }catch(\Exception $e){
                 return response()->json( ['success' => false, 'error' => true, 'message' =>  $e->getMessage()]
            );
            }
        }else{
            echo 'This request is not ajax !';
        }

    }





//inventory entry report list (start)
    public function inventoryEntryReportIndexList()
    {
       
        

        $user_id = Auth::user()->id;
       $role = Auth::user()->role_id;
       $br = Auth::user()->branch_id;


        $itemCategory          = DB::table('item_categories')->orderBy('id', 'DESC')->get();
        $branches = DB::table('branches')->orderBy('id', 'ASC')->get();



// this is for master admin and head office
       if($role == 1 || $role == 2){

        $productRequisitionReport = DB::table('product_entries')
                                  ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name','users.name as entry_user_name', 'branches.br_name as branch_name')

                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('users','product_entries.entry_by','=','users.id')
                                  ->leftjoin('branches','product_entries.branch_id','=','branches.id')                                 
                                  ->orderBy('product_entries.id', 'DESC')
                                  ->get();

     

//this is for branch manager
        }elseif($role == 3){

     
            $branches = DB::table('branches')
                        ->select('*')
                        ->where('id', Auth::user()->branch_id)
                        ->get();


            $productRequisitionReport = DB::table('product_entries')
                                  ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name','users.name as entry_user_name', 'branches.br_name as branch_name')

                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('users','product_entries.entry_by','=','users.id')
                                  ->leftjoin('branches','product_entries.branch_id','=','branches.id') 
                                  ->where('product_entries.branch_id',$br)
                                  ->orderBy('product_entries.id', 'DESC')
                                  ->get();


//this is for branch user
        }else{


           

        }

        return view('backend.pages.report.inventory_report_index', compact('productRequisitionReport','itemCategory', 'branches'));


    }

//Inventory Entry report list (ends)








 public function inventoryEntryReport(Request $request){



        if($request->ajax()){

            try{

                $item_category_id = trim($request->item_category_id);
                $product_category_id = trim($request->product_category_id);
                // $product_entry_id = trim($request->product_entry_id);

                $branch_id = trim($request->branch_id);
              
                 $role = Auth::user()->role_id;



              
            if($role == 1 || $role == 2){

                if($branch_id == 'all'){

                     $productReq = DB::table('product_entries')
                                  ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name','users.name as entry_user_name', 'branches.br_name as branch_name')

                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('users','product_entries.entry_by','=','users.id')
                                  ->leftjoin('branches','product_entries.branch_id','=','branches.id')

                                  ->where('product_entries.item_category_id',$item_category_id)
                                  ->where('product_entries.product_category_id',$product_category_id)
                                  // ->where('product_entries.id',$product_entry_id)
                                  ->get();

                }else{
                     $productReq = DB::table('product_entries')
                                  ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name','users.name as entry_user_name', 'branches.br_name as branch_name')

                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('users','product_entries.entry_by','=','users.id')
                                  ->leftjoin('branches','product_entries.branch_id','=','branches.id')

                                  ->where('product_entries.item_category_id',$item_category_id)
                                  ->where('product_entries.product_category_id',$product_category_id)
                                  // ->where('product_entries.id',$product_entry_id)

                                  ->where('product_entries.branch_id',$branch_id)
                                  ->get();
                }

                

            }else{

              $productReq = DB::table('product_entries')
                                  ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','product_entries.name as product_name','users.name as entry_user_name', 'branches.br_name as branch_name')

                                  ->leftjoin('item_categories','item_category_id','=','item_categories.id')
                                  ->leftjoin('product_categories','product_category_id','=','product_categories.id')
                                  ->leftjoin('users','product_entries.entry_by','=','users.id')
                                  ->leftjoin('branches','product_entries.branch_id','=','branches.id')

                                  ->where('product_entries.item_category_id',$item_category_id)
                                  ->where('product_entries.product_category_id',$product_category_id)
                                  // ->where('product_entries.id',$product_entry_id)

                                  ->where('product_entries.branch_id',$branch_id)
                                  ->get();
                
            }
            




            $str = '';


                           $str.= '<tr>
                                   
                                    <th style = "width:10%">Item Category</th>
                                    <th style = "width:10%">Product Category</th>
                                    <th style = "width:10%">Inventory Product Name</th>                             
                                    <th style = "width:10%">Brand No</th>
                                    <th style = "width:10%">Model No</th>
                                    <th style = "width:10%">Quantity</th>
                                    <th style = "width:10%">Warranty (years)</th>
                                    <th style = "width:10%">Entry User</th>
                                    <th style = "width:10%">Entry User Branch</th>    
                                                                
                                </tr>';


            foreach ($productReq as $item) {

                       $str.='<tr>
                                        
                                        <td style = "width:10%">'.$item->item_cat_name.'</td>
                                        <td style = "width:10%">'.$item->product_cat_name.'</td>
                                        <td style = "width:10%">'. $item->product_name.'</td>
                                                                            
                                        <td style = "width:10%">'.$item->brand_no.'</td>
                                        <td style = "width:10%">'.$item->model_no.'</td>
                                        <td style = "width:10%">'.$item->quantity.'</td>
                                        <td style = "width:10%">'.$item->warranty_date.'</td>
                                        <td style = "width:10%">'.$item->entry_user_name.'</td>
                                        <td style = "width:10%">'.$item->branch_name.'</td></tr>'; 

                                      
                        }
                                          

                    echo $str;


              

            }catch(\Exception $e){
                 return response()->json( ['success' => false, 'error' => true, 'message' =>  $e->getMessage()]
            );
            }
        }else{
            echo 'This request is not ajax !';
        }

    }









}
