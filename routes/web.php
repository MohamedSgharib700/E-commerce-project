<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();


Route::get('userss',function(){
    
    $users=App\User::all();
    return view('admin.users',compact('users'));
    
});

Route::get('/companies',function(){
    
   return view('companies');
});

Route::get('families',function(){
    
   return view('families');
});

Route::get('individuals',function(){
    
   return view('individuals');
});


Route::get('mahmoud/mohamed/ghareeb',function(){
	if(in_array('shennawy',Request::segments())){
		return 'shennawy is found';
	}elseif(in_array('ghareeb',Request::segments())){
		return 'ghareeb is found';
	}else{
		return 'your segment not found';
	}
});


#=================================================================================
#=========================== Messages Area -- shennawy Code ======================

    #=========================== send Messages ===================================

    Route::get('sendMsg/{user_to}','MessageController@sendMsg')->middleware('auth');
    Route::post('sendMsg/{user_to}','MessageController@sendMsg')->middleware('auth');

    #=========================== inbox & outbox ==================================

    Route::get('inbox','MessageController@inbox')->middleware('auth');
    Route::get('outbox','MessageController@outbox')->middleware('auth');

    #=========================== show sonversations ==============================

    Route::get('conv/{id}','MessageController@userconv')->middleware('auth');

    #=========================== delete messages =================================

    Route::get('delMessages','MessageController@delMsg')->middleware('auth');
    
    

#=================================================================================

   

Route::get('/', 'HomeController@getPostsHome')->name('landing');


Route::get('/help', 'HomeController@help')->name('help');
Route::get('/categories/{category}', 'PostsController@GetPostsByCategory');
Route::get('/savedata', 'HomeController@savedata')->name('savedata');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contactus', 'HomeController@contactus')->name('contactus');
Route::get('/conditions', 'HomeController@conditions')->name('conditions');
Route::get('/customerservice', 'HomeController@customerservice')->name('customerservice');
Route::get('/privacypolicy', 'HomeController@privacypolicy')->name('privacypolicy');
Route::get('/protectionadvices', 'HomeController@protectionadvices')->name('protectionadvices');
Route::get('/publishingpolicy', 'HomeController@publishingpolicy')->name('publishingpolicy');

Route::get('/profile', 'UsersController@profile')->name('profile');
Route::post('userUpdate', 'UsersController@userPersonalUpdate') ;

Route::get('/user/{id}', 'UsersController@showPublicProfile');
Route::get('/user/{id}/ads', 'UsersController@showPublicPosts');
Route::get('/ads', 'UsersController@ads')->name('ads');
Route::get('/messages', 'MessagesController@index')->name('messages');
Route::get('/allmessages/{id}', 'MessagesController@showAllMessages');
//Route::get('', 'MessagesController@showAllMessages');
Route::post('/messages', 'MessagesController@SendMessage');
Route::get('/savedsearch', 'UsersController@savedsearch')->name('savedsearch');
Route::get('savedsearch/{savedsearch}/delete','UsersController@savedsearchDelete');  
Route::get('savedsearch/{savedsearch}/deleteall','UsersController@savedsearchDeleteAll');  
Route::get('/posts/{id}', 'PostsController@ShowPost');
#=========================== Message Are you busy ==============================
Route::post('/send','MessageController@sendOffer');
Route::get('/deleteMess/{inboxes}','MessagesController@deleteMessage');
Route::post('/replyMess','MessageController@sendOffer'); //Reply the message
Route::post('/report/{id}', 'PostsController@ReportPost');

Route::get('/search', 'SearchController@search');
Route::get('/searchMainCat', 'SearchController@searchMainCategory');
Route::get('searchresult','SearchController@mainSearch');
Route::post('/savesearch', 'SearchController@save_search');
Route::post('/favorite/posts/{id}', 'PostsController@toggleFavorite');

Route::get('/fb/redirect', 'Auth\SocialAuthController@fbredirect')->name('fbredirect');
Route::get('/auth/google', 'Auth\SocialAuthController@gplusredirect')->name('gplusredirect');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@callback');


Route::get('register', 'Auth\RegisterController@showRegistrationForm');
Route::get('personalregister', 'Auth\RegisterController@showUserRegistrationForm');


Route::get('ProfileEdit','Auth\RegisterController@personalEditUser');



Route::get('commercialuserregister', 'Auth\RegisterCommercialController@showRegistrationForm')->name('commercialuserregister');
Route::post('commercialuserregister', 'Auth\RegisterCommercialController@createNewCommercialUser');

Route::get('/user/verify', function () {
    return response()->view('auth.verifyUser');
})->name('user-show-verify');

Route::post('/user/verify','Auth\RegisterCommercialController@verify')->name('user-verify');

Route::get(
    '/user/verify/resend',
    ['uses' => 'Auth\RegisterCommercialController@verifyResend',
//        'middleware' => 'auth',
        'as' => 'user-verify-resend']
);


Route::get('companyregister', 'Auth\RegisterCompanyController@showRegistrationForm')->name('companyregister');
Route::post('companyregister', 'Auth\RegisterCompanyController@createNewCompanyUser');
//
//Route::get(
//    '/user/verify', ['as' => 'user-show-verify', function () {
//        return response()->view('auth.verifyUser');
//    }]
//);
//
//Route::post(
//    '/user/verify',
//    ['uses' => 'Auth\RegisterCompanyController@verify', 'as' => 'user-verify',]
//);
//
//Route::post(
//    '/user/verify/resend',
//    ['uses' => 'Auth\RegisterCompanyController@verifyResend',
////        'middleware' => 'auth',
//        'as' => 'user-verify-resend']
//);


Route::get('admin/login', 'Admin\AdminAuthController@login');
Route::post('admin/login', 'Admin\AdminAuthController@doLogin');

Route::get('admin/logout', 'Admin\AdminAuthController@logout');

Route::post('password/email', 'Admin\AdminAuthController@sendResetLinkEmail');
Route::get('password/reset', 'Admin\AdminAuthController@showResetForm');

Route::post('password/reset', 'Admin\AdminAuthController@showResetForm');


Route::group(['middleware' => ['auth', 'Role'], 'roles' => ['user.*']], function () {
    Route::resource('/posts', 'Admin\PostsController', ['except' => [
        'show', 'index',
    ]]);
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth_admin'], function () {
    Route::get('/', function () {
        return view('layouts.admin.main');
    });

    Route::resource('site-settings', 'Admin\SiteSettingsController');
    Route::resource('admins', 'Admin\AdminController');

    Route::resource('users', 'Admin\UsersController');
    Route::get('users/{user}/messages', 'Admin\UsersController@userMessages');
    Route::get('users/{user}/bills', 'Admin\UsersController@UserBills');
    Route::post('bills/{id}', 'Admin\UsersController@payBill');
    Route::get('users/{user}/subscriptions', 'Admin\UsersController@UserSubscriptions');
    Route::get('users/{user}/posts', 'Admin\UsersController@UserPosts');

    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories/sort', 'Admin\CategoriesController@sortRows');
    Route::get('categories/{id}/create', 'Admin\CategoriesController@create');
    Route::post('categories/{id}', 'Admin\CategoriesController@store');

    Route::resource('packages', 'Admin\PackagesController');

    Route::resource('filters', 'Admin\FiltersController');
    Route::resource('filter-groups', 'Admin\FiltersGroupsController');

    Route::get('filters/create', 'Admin\FiltersController@create');
    Route::post('filters/', 'Admin\FiltersController@store');

    Route::get('admins/create', 'Admin\AdminController@create');
    Route::post('admins', 'Admin\AdminController@store');

    Route::get('packages/create', 'Admin\PackagesController@create');
    Route::post('packages', 'Admin\PackagesController@store');

    Route::resource('ads', 'Admin\AdController');
    Route::get('ads/create', 'Admin\AdController@create');
    Route::post('ads', 'Admin\AdController@store');

    Route::resource('posts', 'Admin\PostsController');
    Route::get('posts/create', 'Admin\PostsController@create');
    Route::post('posts', 'Admin\PostsController@store');

    Route::resource('messages', 'Admin\MessagesController');
    Route::get('messages/create', 'Admin\MessagesController@create');
    Route::post('messages', 'Admin\MessagesController@store');


});

Route::get('newad', 'PostsController@ChooseCategory');
Route::post('newad', 'PostsController@ShowNewProduct');
Route::get('post/{post}/delete', 'PostsController@postDelete');
Route::get('editads', 'PostsController@ShowEditProduct');
Route::get('editads/{post}', 'PostsController@ShowEditProduct');
Route::get('newad/{category}', 'PostsController@ChooseSubCategory');
Route::post('newpost', 'PostsController@CreateNewPost');
Route::post('post/{post}update', 'PostsController@editPost')->name('post') ;


Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
Auth::routes();
Route::get('/messageconfirmation', 'HomeController@mc')->name('messageconfirmation');


Route::get('lang/{lang}',function($lang){
    if(in_array($lang,['ar','en'])){
        if(Auth::check()){
            $user = \App\User::find(Auth::user()->id);
            if($user->lang != $lang){
                 $user->update(['lang' => $lang]);
            }

        }
        session()->put('lang',$lang);
    }else{
        session()->put('lang','ar');
    }
  	return back();
});

Route::get('posts/lang/{lang}',function($lang){
    if(in_array($lang,['ar','en'])){
        if(Auth::check()){
            $user = \App\User::find(Auth::user()->id);
            if($user->lang != $lang){
                 $user->update(['lang' => $lang]);
            }

        }
        session()->put('lang',$lang);
    }else{
        session()->put('lang','ar');
    }
  	return back();
});

Route::get('categories/lang/{lang}',function($lang){
    if(in_array($lang,['ar','en'])){
        if(Auth::check()){
            $user = \App\User::find(Auth::user()->id);
            if($user->lang != $lang){
                 $user->update(['lang' => $lang]);
            }

        }
        session()->put('lang',$lang);
    }else{
        session()->put('lang','ar');
    }
  	return back();
});

//  if(in_array($lang,['ar','en']))
//  {
     

//      if(auth()->user())
//      {
//          $user = auth()->user();
//          $user->lang = $lang ;
//          $user->Save();
//      }else{
//          if(session()->has('lang'))
//          {
//              session()->forget('lang');
//          }
//          session()->put('lang',$lang);
//      }
     
//  }else{
     
//      if(auth()->user())
//      {
//          $user = auth()->user();
//          $user->lang = 'ar' ;
//          $user->Save();
//      }else{
//          if(session()->has('lang'))
//          {
//              session()->forget('lang');
//          }
//      }
//      session()->put('lang','ar');
//  }
//  return back();
    




Route::group(['middleware'=>'Lang'],function(){



});


