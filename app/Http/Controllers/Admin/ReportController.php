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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




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
                                  // ->where('product_requisitions.branch_id',$branch_id)
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


            foreach ($productReq as $item) {

                       $str.='<tr>
                                        
                                        <td>'.$item->item_cat_name.'</td>
                                        <td>'.$item->product_cat_name.'</td>
                                        <td>'. $item->product_name.'</td>
                                        <td>'.$item->branch_name.'</td>                                       
                                        <td>'.$item->brand.'</td>
                                        <td>'.$item->model.'</td>
                                        <td>'.$item->quantity.'</td>
                                        <td>'.$item->warranty.'</td>
                                        <td>'.$item->req_from.'</td>
                                        <td>'.$item->requisition_request_date.'</td>

                                        <td>';

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
}
