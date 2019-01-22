<?php

namespace App\Http\Controllers\Admin;

use App\Posts;
use App\Categories;
use App\UserSubscriptions;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\FileReader;

class PostsController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::latest()->get();
        return View('admin.posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     	$category = Categories::pluck('name','id');
        $subcategory = Categories::pluck('sub_id','id');
        $user = UserSubscriptions::pluck('user_id','id');
        return View('admin.posts.create',compact('category','subcategory','user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
             'name' => 'required',
             'short_des' => 'required',
             //'name_ar' => 'required|alpha_num',
             //'short_des_ar' => 'required|alpha_num',
             'long_des' => 'required',
             //'long_des_ar' => 'required|alpha_num',
             'photos' => 'required',
             'price' => 'required|numeric'
         ]);
        
        Posts::create($request->all());
        return redirect()->to(Url('/admin/posts/'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Responsese
     */
    public function show(Posts $post)
    {
        return View('admin.posts.show', compact('post'));   
    }
    /**
     * Edit the posts $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $category = Categories::pluck('name','id');
        $subcategory = Categories::pluck('sub_id','id');
        $user = UserSubscriptions::pluck('user_id','id');
        return View('admin.posts.edit',compact('post','category','subcategory','user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Posts $post, Request $request)
    {
        $post->update($request->all());
        return redirect()->to(Url('/admin/posts'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        return redirect()->back(); 
    }

}
