<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductRequisitionController extends Controller
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



// this is for master admin and super user
       if($role == 1 || $role == 2){

        $productRequisition = DB::table('product_requisitions')->orderBy('id', 'DESC')->get();
        return view('backend.pages.productRequisition.index', compact('productRequisition'));

//this is for branch manager
        }elseif($role == 3){

            $productRequisition = DB::table('product_requisitions')
                                  ->where('branch_id',$br)
                                  ->orderBy('id', 'DESC')
                                  ->get();
        return view('backend.pages.productRequisition.index', compact('productRequisition'));

//this is for branch user
        }else{

            $productRequisition = DB::table('product_requisitions')
                                  ->where('requested_from',$user_id)
                                  ->orderBy('id', 'DESC')
                                  ->get();
        return view('backend.pages.productRequisition.index', compact('productRequisition'));

        }

         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user_role = Auth::user()->role_id;

        if(($user_role == 1) ||  ($user_role == 2)){

            $branches = DB::table('branches')->orderBy('id', 'ASC')->get();

        }else{

            $branches = DB::table('branches')
                        ->select('*')
                        ->where('id', Auth::user()->branch_id)
                        ->get();
        }



        $itemCategory          = DB::table('item_categories')->orderBy('id', 'ASC')->get();
        $productCategory       = DB::table('product_categories')->orderBy('id', 'ASC')->get();
        return view('backend.pages.productRequisition.create', compact('itemCategory', 'branches', 'productCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'item_category_id'                              => 'required',
            'product_category_id'                           => 'required',
            'branch_id'                                     => 'required',
            'product_entry_id'                              => 'required',
          
        ], [
            'item_category_id.required'                                 => 'Select item category name',
            'product_category_id.required'                              => 'Select product category name',
            'branch_id.required'                                        => 'Select branch name',
            'product_entry_id.required'                                 => 'Select inventory product name',
            

        ]);


         $br = $request->branch_id;
         $req = DB::table('users')
                           ->select('id')
                           ->where('branch_id',$br)
                           ->where('role_id',3)
                           ->first();

         $req_to_user_id = $req->id;
        
        $user = Auth::user()->id;

        $data = DB::table('product_requisitions')->insert([
            'item_category_id'                      => $request->input('item_category_id'),
            'product_category_id'                   => $request->input('product_category_id'),
            'inventory_product_id'                  => $request->input('product_entry_id'),
            'branch_id'                             => $br,
            'brand'                                 => $request->input('brand_no'),
            'model'                                 => $request->input('model_no'),
            'quantity'                              => $request->input('quantity'),
            'warranty'                              => $request->input('warranty_date'),
            'requisition_request_date'              => Carbon::today(),
            'requested_from'                        => $user,
            'requested_to'                          => $req_to_user_id,
            'requisition_current_status'            => 1

        ]);
        if ($data) {
            return redirect()->route('product-requisition.index')->with('success', 'Product Requisition have been successfully sumbmitted!');
        } else {
            return back()->with('fail', 'Something went wrong.Please try letter!!');
        }
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


    public function productEntryDropdown(Request $request)
    {
        if ($request->ajax()) {
            $product_category_id = trim($request->product_category_id);

            $product_entries = DB::table('product_entries')
                ->select('*')
                ->where('product_category_id', $product_category_id)
                ->get();


 $str="<option value=''>-- Select --</option>";  


    foreach ($product_entries as $p_entries) {

       $str .= "<option value='$p_entries->id'> $p_entries->name </option>";
       
    }

    echo $str;

           


        } else {
            echo 'This request is not ajax !';
        }
    }




 public function productEntryBrandDropdown(Request $request)
    {
        if ($request->ajax()) {
            $product_entry_id = trim($request->product_entry_id);

            $product_entries = DB::table('product_entries')
                                ->leftJoin('branches','branch_id','=','branches.id')
                                ->select('product_entries.*','branches.br_name')
                                ->where('product_entries.id', $product_entry_id)
                                ->first();



    echo json_encode($product_entries);


        } else {
            echo 'This request is not ajax !';
        }
    }





}
