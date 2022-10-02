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
        $branches = DB::table('branches')->orderBy('id', 'ASC')->get();
        return view('backend.pages.Branch.index', compact('branches'));
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
            'br_name'       => 'required',
            'br_address'    => 'required',
            'br_code'       => 'required|unique:branches',
        ], [
            'br_name.required'          => 'Select branch name',
            'br_address.required'       => 'Select branch address',
            'location.required'         => 'Select location category',
            'br_type.required'          => 'Select branch type',
            'br_code.required'          => 'Select branch code',
            'br_code.required|unique'   => 'Branch code has already been taken',
        ]);
        $data = DB::table('branches')->insert([
            'br_name'       => $request->input('br_name'),
            'br_address'    => $request->input('br_address'),
            'location'      => $request->input('location'),
            'br_type'       => $request->input('br_type'),
            'br_code'       => $request->input('br_code'),
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
        $data =  DB::table('branches')->where('id', $id)->first();

        return view('backend.pages.Branch.view',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit =  DB::table('branches')->where('id', $id)->first();

        return view('backend.pages.Branch.edit',compact('edit'));
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
        $edit = DB::table('branches')->where('id',$id)->update([
            'br_name'       => $request->input('br_name'),
            'br_address'    => $request->input('br_address'),
            'location'      => $request->input('location'),
            'br_type'       => $request->input('br_type'),
            'br_code'       => $request->input('br_code')
        ]);

        if($edit){
            return redirect()->route('branch.index')->with('success','Data have been successfully updated!!');
        }else{
            return back()->with('fail','Something went wrong.Please try letter!!');
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
    //    $data =  DB::table('branches')->where('id', $id)->delete();
    //    if($data){
    //     return back()->with('delete','Data have been successfully deleted!!');
    //    }else{
    //     return back()->with('fail','Something went wrong.Please try letter!!');
    //    }
    }
}
