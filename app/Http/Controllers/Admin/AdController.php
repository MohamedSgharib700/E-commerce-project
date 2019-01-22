<?php

namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Packages;
use App\Categories;
use App\UserSubscriptions;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::latest()->get();
        return View('admin.ads.index', compact('ads'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::pluck('name','id');
        $package = Packages::pluck('name','id');
        $user = UserSubscriptions::pluck('user_id','id');
        return View('admin.ads.create',compact('category','package','user'));
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
             'description' => 'required|alpha_num',
             'slug' => 'required|alpha_num',
             'type' => 'required|numeric'
         ]);

        Ad::create($request->all());
        return redirect()->to(Url('/admin/ads/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
       return View('admin.ads.show', compact('ad'));
    } 

    public function edit(Ad $ad)
    {
        $category = Categories::get()->pluck('name','id');
        $package = Packages::get()->pluck('name','id');
        $user = UserSubscriptions::pluck('user_id','id');
        return View('admin.ads.edit', compact('ad','category','package','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Ad $ad, Request $request)
    {
        $ad->update($request->all());
        return redirect()->to(Url('/admin/ads'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        $ad->delete();
        return redirect()->back();
    }

}
