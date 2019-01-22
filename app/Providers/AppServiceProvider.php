<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Posts;
use App\Filters;
use App\Categories;
use App\Post_Photos;
use App\Favorites;
use App\PostFeatures;
use Cookie;
use session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->singleton('lang',function(){
           
           if(auth()->user())
           {
               if(empty(auth()->user()->lang))
               {
                   return 'ar';
               }else{
                   return auth()->user()->lang;
               }
           }else
           {
               if(session()->hse('lang'))
               {
                   return session()->get('lang');
               }else{
                   return 'ar';
               }
           }
        });
        Schema::defaultStringLength(191);
        
        view()->composer(['layouts.user', 'layouts.app', 'layouts.page'], function($view) {
            $featured = explode(',', DB::table('site_settings')->first()->featured_categories);
            $categories = Categories::where(function($query) use ($featured){
                foreach($featured as $id){
                    $query->orwhere('id', $id);
                }
            })->get()->map(function ($cat) {
                $cat['subcategories'] = $cat->getSubCategories()->get()->splice(0,8)->pluck('attributes');
                return $cat;
            })->pluck('attributes');
            $view->with(compact('categories'));
        });
        
        view()->composer(['categories.car-cat','categories.maincategory', 'searchresult'], function($view) {
            $categories = Categories::where('parent_id', null)->get()->map(function ($category) {
                $category['subcategories'] = $category->getSubCategories()->get()->map(function ($cat) {
                    $cat['subcategories'] = $cat->getSubCategories()->get()->pluck('attributes');
                    return $cat;
                })->pluck('attributes');
                return $category;
            })->pluck('attributes');
            $car = Filters::where('group_id', 16)->get();
            $cars = Filters::where('group_id', 7)->get();
            // dd($cars);            
          $view->with(compact('categories', 'cars', 'car'));
        });
        view()->composer(['posts.ad1'], function($view) {
            $categories = Categories::where('parent_id', null)->get()->map(function ($cat) {
                return collect($cat->toArray())
                    ->only(['id', 'name_ar', 'icon'])
                    ->all();
            });
            $view->with(compact('categories'));
        });
        view()->composer(['posts.ad2', 'posts.ad3','includes.searchbar'], function($view) {
            $categories = Categories::where('parent_id', null)->get()->map(function ($category) {
                $category['subcategories'] = $category->getSubCategories()->get()->map(function ($cat) {
                    $cat['subcategories'] = $cat->getSubCategories()->get()->pluck('attributes');
                    return $cat;
                })->pluck('attributes');
                return $category;
            })->pluck('attributes');
          $view->with(compact('categories'));
        });
        view()->composer('includes.specialcategories', function($view) {
            $special = explode(',', DB::table('site_settings')->first()->special_categories);
            $specialcategories = Categories::where(function($query) use ($special){
                foreach($special as $id){
                    $query->orwhere('id', $id);
                }
            })->get()->pluck('attributes');
            $view->with(compact('specialcategories'));
          });
        view()->composer('includes.favoriteslider', function($view) {
            $user = Auth::user();
            if(!$user){
                $user = new User;
                $user->id = -1;
            }
            $favorites = $user->getFavorites()->get();
            $favorites = $this->getInfoOfPost($favorites, $user);
            $view->with(compact('favorites'));
          });
        view()->composer('home', function($view) {
            $features = PostFeatures::orderBy(DB::raw('RAND()'))->where('type', 2)->orderBy('id', 'desc')->get();
            $features = $features->splice(0, 12);
            $latest = collect();
            foreach($features as $feature){
                $latest = $latest->merge($feature->getPost()->get());
            }
            $user = Auth::user();
            if(!$user){
                $user = new User;
                $user->id = -1;
            }
            $latest = $this->getInfoOfPost($latest, $user);
            $favorites = $user->getFavorites()->get();
            $favorites = $this->getInfoOfPost($favorites, $user);
            $id = $this->hashMe();
            $lastseen = collect();
            $visitor = DB::table('kryptonit3_counter_visitor')->where('visitor', $id)->first();
            if($visitor){
              $visits = DB::table('kryptonit3_counter_page_visitor')->where('visitor_id', $visitor->id)->orderBy('created_at', 'desc')->get();
              $visits = $visits->splice(0, 12);
              $visitedList = collect();
              foreach($visits as $visit){
                $visitedList = $visitedList->merge(DB::table('kryptonit3_counter_page')->where('id', $visit->page_id)->get());
              }
              
              foreach($visitedList as $visited){
                $postHash = DB::table('posts_dictionaries')->where('hash', $visited->page)->first();
                if(!$postHash)continue;
                $lastseen = $lastseen->merge(Posts::where('id', $postHash->post_id)->get());
              }
              $lastseen = $this->getInfoOfPost($lastseen, $user);
            }
            $favorites = $favorites->toArray();
            $lastseen = $lastseen->toArray();
            $latest = $latest->toArray();
            $view->with(compact('favorites', 'latest', 'lastseen'));
        });
        view()->composer('includes.lastseenslider', function($view){
            $user = Auth::user();
            if(!$user){
                $user = new User;
                $user->id = -1;
            }
            $id = $this->hashMe();
            $lastseen = collect();
            $visitor = DB::table('kryptonit3_counter_visitor')->where('visitor', $id)->first();
            if($visitor){
              $visits = DB::table('kryptonit3_counter_page_visitor')->where('visitor_id', $visitor->id)->orderBy('created_at', 'desc')->get();
              $visits = $visits->splice(0, 12);              
              $visitedList = collect();
              foreach($visits as $visit){
                $visitedList = $visitedList->merge(DB::table('kryptonit3_counter_page')->where('id', $visit->page_id)->get());
              }
              
              foreach($visitedList as $visited){
                $postHash = DB::table('posts_dictionaries')->where('hash', $visited->page)->first();
                if(!$postHash)continue;
                $lastseen = $lastseen->merge(Posts::where('id', $postHash->post_id)->get());
              }
              $lastseen = $this->getInfoOfPost($lastseen, $user);
            }
            $lastseen = $lastseen->toArray();
            $view->with(compact('lastseen'));
        });
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        if ($this->app->environment() == 'local') {
            $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
        }
    }

    private static function hashMe()
    {
        $cookie = Cookie::get(env('COUNTER_COOKIE', 'kryptonit3-counter'));
        $visitor = ($cookie !== false) ? $cookie : $_SERVER['REMOTE_ADDR'];
        return hash("SHA256", env('APP_KEY') . $visitor);
    }

    private function getIdsOfChildrenCategories($category){
        $ids = [];
        $categories = Categories::all();
        foreach($categories as $cat){
            if($cat->id == $category){
                array_push($ids, $cat->id);
            }else{
                $tmp = $cat->parent_id;
                while($tmp != NULL){
                    if($tmp == $category){
                        array_push($ids, $cat->id);
                    }
                    $tmp = Categories::where('id', $tmp)->first()->parent_id;
                }
            }
        }
        return $ids;
    }

    private function getInfoOfPost($posts, $user){
        $posts->map(function ($post) use($user) {
            $post['liked'] = Favorites::where('post_id', $post['id'])->where('user_id', $user->id)->count();
            if($postPhoto = Post_Photos::where('post_id', $post['id'])->first()){
                $post['img'] = $postPhoto->photolink;
            }else{
                $post['img'] = 'no_image.png';
            }
            // $tmp = explode(' - ', $post->filters()->first()->name);
            $post['country'] = "";
            $post['city'] = "";
            $features = $post->getFeatures()->get();
            $post['isColored'] = $post['isinMain'] = $post['isUrgent'] = 0;
            foreach($features as $feature){
                if($feature->type == 1){
                    $post['isColored'] = 1;
                }
                if($feature->type == 2){
                    $post['isinMain'] = 1;
                }
                if($feature->type == 5){
                    $post['isUrgent'] = 1;
                }
            }
            return $post;
        });
        return $posts;
    }
}
