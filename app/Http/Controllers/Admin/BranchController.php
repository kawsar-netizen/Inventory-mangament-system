<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = DB::table('branches')->orderBy('id', 'ASC')->get();
        return view('backend.pages.Branch.index', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.Branch.create');
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
            'br_name' => 'required',
            'br_address' => 'required',
            'br_code' => 'required|unique:branches',
        ], [
            'br_name.required' => 'Select branch name',
            'br_address.required' => 'Select branch address',
            'br_code.required' => 'Select branch code',
        ]);
        $data = DB::table('branches')->insert([
            'br_name' => $request->input('br_name'),
            'br_address' => $request->input('br_address'),
            'br_code' => $request->input('br_code'),
        ]);
        if($data){
            return back()->with('success','Data have been successfully inserted!!');
        }else{
            return back()->with('fail','Something went wrong.Please try letter!!');
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
}
