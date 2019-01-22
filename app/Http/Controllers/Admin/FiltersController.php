<?php

namespace App\Http\Controllers\Admin;

use App\Filters;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FiltersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filters = Filters::latest()->get();
        return View('admin.filters.index', compact('filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.filters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ar' => 'required|alpha_num',
            'name_en' => 'required|alpha_num',
            // 'value_ar_start' => 'required|alpha_num',
            // 'value_en_end' => 'required|alpha_num'
        ]);
        Filters::create($request->all());
        return redirect()->to(Url('/admin/filters/'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Filters $filter)
    {
        return View('admin.filters.show', compact('filter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Filters $filter)
    {
        return View('admin.filters.edit', compact('filter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Filters $filter, Request $request)
    {
        $filter->update($request->all());
        return redirect()->to(Url('/admin/filters'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filters $filter)
    {
        $filter->delete();
        return redirect()->back();
    }
}
