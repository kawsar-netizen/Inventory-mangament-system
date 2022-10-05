<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemCategory = DB::table('item_categories')->orderBy('id', 'ASC')->get();
        return view('backend.pages.ItemCategory.index', compact('itemCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.ItemCategory.create');
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
            'name'          => 'required',
            'valuation'     => 'required',
        ], [
            'name.required'             => 'Select item category name',
            'valuation.required'        => 'Select item category valuation',
        ]);
        $data = DB::table('item_categories')->insert([
            'name'          => $request->input('name'),
            'valuation'     => $request->input('valuation'),
        ]);
        if ($data) {
            return redirect()->route('item-category.index')->with('success', 'Item category have been successfully inserted!!');
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
        $edit =  DB::table('item_categories')->where('id', $id)->first();

        return view('backend.pages.ItemCategory.edit', compact('edit'));
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
        $edit = DB::table('item_categories')->where('id', $id)->limit('1')->update([
            'name'         => $request->input('name'),
            'valuation'    => $request->input('valuation'),
        ]);
        if ($edit) {
            return redirect()->route('item-category.index')->with('success', 'Item category have been successfully updated!!');
        } else {
            return back()->with('fail', 'No data has been updated!!');
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
        $data =  DB::table('item_categories')->where('id', $id)->delete();
        if ($data) {
            return back()->with('deleted', 'Item category have been successfully deleted!!');
        } else {
            return back()->with('fail', 'Something went wrong.Please try letter!!');
        }
    }
}
