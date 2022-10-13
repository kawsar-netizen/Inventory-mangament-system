<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductRequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $productRequisition = DB::table('product_entries')->orderBy('id', 'DESC')->get();
        return view('backend.pages.productRequisition.index', compact('productRequisition'));
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
