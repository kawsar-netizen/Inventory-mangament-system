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

        $productEntry = DB::table('product_entries')->orderBy('id', 'ASC')->get();
        // return view('backend.pages.productEntry.index', compact('productEntry'));


        return view('backend.pages.dashboard', compact('productEntry')); 
    }
}
