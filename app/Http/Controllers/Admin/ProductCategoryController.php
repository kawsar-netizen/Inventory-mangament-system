<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategory = DB::table('product_categories')->orderBy('id', 'DESC')->get();

        return view('backend.pages.ProductCategory.index', compact('productCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $itemCategory = DB::table('item_categories')->get();
        return view('backend.pages.ProductCategory.create', compact('itemCategory'));
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
            'item_category_id'          => 'required',
            'name'                      => 'required',
            'type'                      => 'required',
            // 'valuation'                 => 'required',
        ], [
            'item_category_id.required'             => 'Select item category name',
            'name.required'                         => 'Select product category name',
            'type.required'                         => 'Select product category type',
            // 'valuation.required'                    => 'Select valuation',

        ]);
        $data = DB::table('product_categories')->insert([
            'item_category_id'              => $request->input('item_category_id'),
            'name'                          => $request->input('name'),
            'type'                          => $request->input('type'),
            'product_category_valuation'    => $request->input('valuation')

        ]);
        if ($data) {
            return redirect()->route('product-category.index')->with('success', 'Product Category have been successfully inserted!!');
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
        $data =  DB::table('product_categories')->where('id', $id)->first();

        return view('backend.pages.ProductCategory.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item_category = DB::table('item_categories')->get();

        $data =  DB::table('product_categories')->where('id', $id)->first();


        return view('backend.pages.ProductCategory.edit', compact('data', 'item_category'));
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
        $edit = DB::table('product_categories')->where('id', $id)->limit('1')->update([
            'item_category_id'              => $request->input('item_category_id'),
            'name'                          => $request->input('name'),
            'type'                          => $request->input('type'),
            'product_category_valuation'    => $request->input('valuation'),
        ]);
        if ($edit) {
            return redirect()->route('product-category.index')->with('success', 'Product category have been successfully updated!!');
        } else {
            return redirect()->route('product-category.index')->with('fail', 'No data has been updated!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data =  DB::table('product_categories')->where('id', $id)->delete();
        if ($data) {
            return back()->with('deleted', 'product category have been successfully deleted!!');
        } else {
            return back()->with('fail', 'Something went wrong.Please try letter!!');
        }
    }




    public function productCategoryValuation(Request $request)
    {
        if ($request->ajax()) {
            $item_category_id = trim($request->item_category_id);
            $valuation = DB::table('item_categories')
                ->select('*')
                ->where('id', $item_category_id)
                ->first();
            echo $valuation->valuation;
        } else {
            echo 'This request is not ajax !';
        }
    } 
}
