<?php

namespace App\Http\Controllers\Admin;

use App\AdminGroups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = AdminGroups::latest()->paginate(10);
        return View('admin.groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->has('premession')){
           $request->merge(['premissions'=>implode('||',$request->premession)]);
        }
        AdminGroups::create($request->all());
        return redirect()->to(Url('admin/admin-groups'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminGroups  $adminGroups
     * @return \Illuminate\Http\Response
     */
    public function show(AdminGroups $adminGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminGroups  $adminGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminGroups $admin_group)
    {
        $premessions = explode('||', $admin_group->premissions);
        return View('admin.groups.edit',compact('admin_group','premessions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminGroups  $adminGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminGroups $admin_group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminGroups  $adminGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminGroups $adminGroups)
    {
        //
    }
}
