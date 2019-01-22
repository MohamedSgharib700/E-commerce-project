<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AdminGroups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::latest()->get();
        // return \Response::json(['data'=>$admins], 200);
        return View('admin.admins.index',compact('admins'));
    }

    public function create()
    {
        $groups = AdminGroups::pluck('name','id');
        return View('admin.admins.create',compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['password'=>bcrypt($request->password)]);
        $this->validate($request, [
         'name'=>'required|alpha_num',
         'email' => 'required|email',
        ]);
        Admin::create($request->all());
        return redirect()->to(Url('admin/admins'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $groups = AdminGroups::pluck('name','id');
        return View('admin.admins.edit',compact('admin','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        if($request->has('password'))
        {
            $request->merge(['password'=>bcrypt($request->password)]);
        }else{
            $request->merge(['password'=>$admin->password]);
        }
        $admin->update($request->all());
        return redirect()->to(Url('admin/admins'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();
        return redirect()->to(Url('admin/admins'));
    }
}
