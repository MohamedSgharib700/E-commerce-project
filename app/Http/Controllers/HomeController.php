<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Categories;
use App\Favorites;
use App\Post_Photos;
use App\User;
use App\Posts;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = User::all();
        return view('home', compact('$user','users'));
    }
    
    public function getPostsHome(Request $request){
        
        $posts = Posts::where('isApproved',1)->paginate(11);
        
         if ($request->ajax()) {
           $view = view('ajaxLoadMore',compact('posts'))->render();
           return response()->json(['html'=>$view]);
         }

         return view('home',compact('posts'));
    }
    
    public function app(User $user)
    {
        
        return view('layouts.app', compact('$user'));
    }

    public function mc()
    {
        return view('messageconfirmation');
    }

    public function help()
    {
        return view('help');
    }

    public function search()
    {
        return view('searchresult');
    }

    public function about()
    {
      return view('about');
    }

    public function ads()
    {
      return view('posts.ad1');
    }

    public function contactus()
    {
      return view('contactus');
    }

    public function privacypolicy()
    {
      return view('privacypolicy');
    }

    public function conditions()
    {
      return view('conditions');
    }

    public function protectionadvices()
    {
      return view('protectionadvices');
    }

    public function publishingpolicy()
    {
      return view('publishingpolicy');
    }

    public function customerservice()
    {
      return view('custmoerservice'); 
    }

    public function savedata()
    {
      return view('savedata');
    }

    private static function hashMe()
    {
        $cookie = Cookie::get(env('COUNTER_COOKIE', 'kryptonit3-counter'));
        $visitor = ($cookie !== false) ? $cookie : $_SERVER['REMOTE_ADDR'];
        return hash("SHA256", env('APP_KEY') . $visitor);
    }
}
