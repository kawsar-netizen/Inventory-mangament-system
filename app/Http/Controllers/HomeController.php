<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


         $productEntry = DB::table('product_entries')
                        ->select('product_entries.*','item_categories.name as item_cat_name','product_categories.name as product_cat_name','users.name as entry_user_name','branches.br_name as branch_name')
                        ->leftJoin('item_categories','product_entries.item_category_id','=','item_categories.id')
                        ->leftJoin('users','product_entries.entry_by','=','users.id')
                        ->leftJoin('branches','product_entries.branch_id','=','branches.id')
                        ->leftJoin('product_categories','product_entries.product_category_id','=','product_categories.id')
                        ->orderBy('product_entries.id', 'DESC')->get();


        $total_valuation = DB::table('item_categories')->sum('valuation');
        $number_of_branches = DB::table('branches')->count();
        $total_number_of_product_categories = DB::table('product_categories')->count();

       
        return view('backend.pages.dashboard', compact('productEntry','number_of_branches','total_valuation','total_number_of_product_categories'));
    }
}
