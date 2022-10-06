<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Models\User;

use Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users  = DB::table('users')
            ->leftJoin('branches', 'branch_id', '=', 'branches.id')
            ->select('users.*', 'branches.br_name as branch_name')
            ->orderBy('users.id', 'ASC')
            ->get();
        return view('backend.pages.User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches   = DB::table('branches')->get();

        $roles      = DB::table('roles')->get();

        return view('backend.pages.User.create', compact('branches', 'roles'));
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
            'branch_id'                     => 'required',
            'role_id'                       => 'required',
            'name'                          => 'required',
            'type'                          => 'required',
            'email'                         => 'required|unique:users',
            'contact_phone'                 => 'required|unique:users',
            'password'                      => 'required',
            'confirm_password'              => 'required'
        ], [
            'branch_id.required'            => 'Select branch name',
            'role_id.required'              => 'Select role name',
            'email.required|unique'         => 'This email address has already been taken'
        ]);
        $data = DB::table('users')->insert([
            'branch_id'                     => $request->input('branch_id'),
            'role_id'                       => $request->input('role_id'),
            'name'                          => $request->input('name'),
            'type'                          => $request->input('type'),
            'email'                         => $request->input('email'),
            'contact_phone'                 => $request->input('contact_phone'),
            'password'                      => Hash::make($request->input('password')),
        ]);
        if ($data) {
            return redirect()->route('user.index')->with('success', 'User have been successfully inserted!!');
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
        $data             =  DB::table('users')->where('id', $id)->first();

        $br               = $data->branch_id;
        $role_id          = $data->role_id;

        $roles      = DB::table('roles')->where('id', $role_id)->first();

        $branch     = DB::table('branches')
            ->select('br_name', 'id')
            ->where('id', $br)
            ->first();
        return view('backend.pages.User.view', compact('data', 'branch', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit      = DB::table('users')
            ->leftJoin('branches', 'branch_id', '=', 'branches.id')
            ->leftJoin('roles', 'role_id', '=', 'roles.id')
            ->select('users.*', 'roles.id as r_id', 'roles.role_name', 'branches.br_name as branch_name')
            ->where('users.id', $id)
            ->first();

        $branches   = DB::table('branches')->get();

        $roles      = DB::table('roles')->get();

        return view('backend.pages.User.edit', compact('edit', 'branches', 'roles'));
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

        Validator::make($request->all(), [
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);

        $edit       = DB::table('users')
            ->where('id', $id)
            ->limit('1')
            ->update([
                'branch_id'                 => $request->input('branch_id'),
                'role_id'                   => $request->input('role_id'),
                'name'                      => $request->input('name'),
                'type'                      => $request->input('type'),
                'email'                     => $request->input('email'),
                'contact_phone'             => $request->input('contact_phone'),
            ]);

        // dd($edit);

        if ($edit) {
            return redirect()->route('user.index')->with('success', 'User have been successfully updated!!');
        } else {
            return redirect()->route('user.index')->with('fail', 'No data has been updated!!');
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
        //
    }
}
