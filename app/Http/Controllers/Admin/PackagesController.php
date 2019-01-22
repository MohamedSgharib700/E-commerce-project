<?php

namespace App\Http\Controllers\Admin;

use App\Packages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Packages::latest()->get();
        return View('admin.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        {
            $this->validate($request, [
             'name' => 'required|alpha_num',
             'price' => 'required|numeric',
             'desciption' => 'required|alpha_num',
             'features' => 'required|alpha_num',
             'isBestValue' => 'required|numeric'
         ]);
        Packages::create($request->all());
        return redirect()->to(Url('/admin/packages/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Packages $package)
    {
        return View('admin.packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Packages $package)
    {
        return View('admin.packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Packages $package, Request $request)
    {
        $package->update($request->all());
        return redirect()->to(Url('/admin/packages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Packages $package)
    {
        $package->delete();
        return redirect()->back();
    }
}
