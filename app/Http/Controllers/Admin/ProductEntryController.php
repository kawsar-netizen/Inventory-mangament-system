<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productEntry = DB::table('product_entries')->orderBy('id', 'ASC')->get();
        return view('backend.pages.productEntry.index', compact('productEntry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches              = DB::table('branches')->orderBy('id', 'ASC')->get();
        $itemCategory          = DB::table('item_categories')->orderBy('id', 'ASC')->get();
        $productCategory       = DB::table('product_cagegories')->orderBy('id', 'ASC')->get();
        return view('backend.pages.productEntry.create', compact('itemCategory', 'branches', 'productCategory'));
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
            'name'                                          => 'required',
            'type'                                          => 'required',
            'status'                                        => 'required',
            'brand_no'                                      => 'required',
            'model_no'                                      => 'required',
            'tag_no'                                        => 'required',
            'quantity'                                      => 'required',
            'warranty_date'                                 => 'required',
            'purchase_date'                                 => 'required',
        ], [
            'item_category_id.required'                                 => 'Select item category name',
            'product_category_id.required'                              => 'Select product category name',
            'branch_id.required'                                        => 'Select branch name',
            'name.required'                                             => 'Enter inventory name',
            'type.required'                                             => 'Select type',
            'status.required'                                           => 'Select status',
            'brand_no.required'                                         => 'Enter brand name',
            'model_no.required'                                         => 'Enter model name',
            'tag_no.required'                                           => 'Enter tag name',
            'quantity.required'                                         => 'Enter quantity',
            'warranty_date.required'                                    => 'Enter product warranty',
            'purchase_date.required'                                    => 'Enter product purchase date',

        ]);

        $user = Auth::user()->name;
        $data = DB::table('product_entries')->insert([
            'item_category_id'                      => $request->input('item_category_id'),
            'product_category_id'                   => $request->input('product_category_id'),
            'branch_id'                             => $request->input('branch_id'),
            'name'                                  => $request->input('name'),
            'type'                                  => $request->input('type'),
            'status'                                => $request->input('status'),
            'brand_no'                              => $request->input('brand_no'),
            'model_no'                              => $request->input('model_no'),
            'tag_no'                                => $request->input('tag_no'),
            'quantity'                              => $request->input('quantity'),
            'warranty_date'                         => $request->input('warranty_date'),
            'purchase_date'                         => $request->input('purchase_date'),
            'entry_by'                              => $user,

        ]);
        if ($data) {
            return redirect()->route('product-entry.index')->with('success', 'Inventroy entry have been successfully inserted!!');
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
        $data               =  DB::table('product_entries')->where('id', $id)->first();

        $itemCategory       = DB::table('item_categories')->get();

        $productCategory    = DB::table('product_cagegories')->get();

        $branches = DB::table('branches')->get();

        return view('backend.pages.productEntry.view', compact('data', 'itemCategory', 'productCategory', 'branches'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory_edit         = DB::table('product_entries')->where('id', $id)->first();

        $itemCategory           = DB::table('item_categories')->get();

        $productCategory        = DB::table('product_cagegories')->get();

        $branches               = DB::table('branches')->get();

        return view('backend.pages.productEntry.edit', compact('inventory_edit', 'itemCategory', 'productCategory', 'branches'));
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
        $data = DB::table('product_entries')->where('id', $id)->update([
            'item_category_id'              => $request->input('item_category_id'),
            'product_category_id'           => $request->input('product_category_id'),
            'branch_id'                     => $request->input('branch_id'),
            'name'                          => $request->input('name'),
            'type'                          => $request->input('type'),
            'status'                        => $request->input('status'),
            'brand_no'                      => $request->input('brand_no'),
            'model_no'                      => $request->input('model_no'),
            'quantity'                      => $request->input('quantity'),
            'purchase_date'                 => $request->input('purchase_date'),
            'warranty_date'                 => $request->input('warranty_date'),
            'tag_no'                        => $request->input('tag_no'),
        ]);
        if ($data) {
            return redirect()->route('product-entry.index')->with('success', 'Inventroy entry have been successfully updated!!');
        } else {
            return redirect()->route('product-entry.index')->with('fail', 'No data has been updated!!');
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
        $data =  DB::table('product_entries')->where('id', $id)->delete();
        if ($data) {
            return back()->with('delete', 'Inventory Entry have been successfully deleted!!');
        } else {
            return back()->with('fail', 'Something went wrong.Please try letter!!');
        }
    }
}
