<?php

namespace App\Http\Controllers\Admin;

use App\FiltersGroups;
use App\Filters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiltersGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $groups = FiltersGroups::all();
        return View('admin.filtersGroup.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = Filters::all();
        return View('admin.filtersGroup.create',compact('filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        if(!$request->has('filters')){
            return redirect()->back()->withInput()->with(['error'=>'You Must Select at least 1 Filter']);
        }

        $group = new FiltersGroups;
        $group->group_name = $request->group_name;
        $group->save();

        foreach ($request->filters as $filter) {
            $groupFilter = new \App\GroupsFilters(['filter_id' => $filter]);
            $group       ->groupFilters()->save($groupFilter);
        }

        return redirect()->to(Url('admin/filter-groups'))->with(['msg'=>'Group Created Successfully']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FiltersGroups  $filtersGroups
     * @return \Illuminate\Http\Response
     */
    public function show(FiltersGroups $filtersGroups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FiltersGroups  $filtersGroups
     * @return \Illuminate\Http\Response
     */
    public function edit(FiltersGroups $filter_group)
    {
        $filters = Filters::all();
        return View('admin.filtersGroup.edit',compact('filter_group','filters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FiltersGroups  $filtersGroups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FiltersGroups $filtersGroups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FiltersGroups  $filtersGroups
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiltersGroups $filtersGroups)
    {
        //
    }
}
