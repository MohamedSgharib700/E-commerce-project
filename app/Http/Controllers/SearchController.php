<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Posts;
use App\Categories;
use App\Favorites;
use App\User;
use App\Post_Photos;
use App\FiltersGroups;
use App\SavedSearch;


class SearchController extends Controller
{
    //
      //
   public function search(Request $request){
        $posts = (new Posts)->newQuery();
        $posts->where('isApproved', 1);
        
        $top = (new Posts)->newQuery();
        $top->where('isApproved', 1)->where('isTop', 1);
    
        $postss= Posts::where('title', 'like', '%'.$request->search_query.'%')->where('isApproved',1)->get();
          $tops= Posts::where('title', 'like', '%'.$request->search_query.'%')->where('isApproved',1)->where('isTop',1)->get();
    
        if ($request->exists('search_query')) {
          $posts->where('title', 'like', '%'.$request->search_query.'%');
          $top->where('title', 'like', '%'.$request->search_query.'%');
        }
    
        if ($request->has('search_city')) {
          $posts->where('city', 'like', '%'.$request->search_city.'%');
          $top->where('city', 'like', '%'.$request->search_city.'%');
        }
      
        if ($request->has('applied_filters')) {
    
              switch ($request->applied_filters) {
                  case 'isinMain':
                    $posts->where('isinMain',1);
                    $top->where('isinMain',1);
                  break;
                  case 'all':
                    
                  break;
    
                  case 'isTop':
                    $posts->where('isTop',1);
                    $top->where('isTop',1);
                  break;
                  
                  case 'isUrgent':
                    $posts->where('isUrgent',1);
                    $top->where('isUrgent',1);
                  break;  
                                  
                  case 'isColored':
                    $posts->where('isColored',1);
                    $top->where('isColored',1);
                  break;
              }
    
          }

             if ($request->has('seller_type')) {

              switch ($request->seller_type) {
                  case 'all':
                    
                  break;

                  case '0':
                    $posts->where('seller_type',0);
                    $top->where('seller_type',0);
                  break;
                  
                  case '1':
                    $posts->where('seller_type',1);
                    $top->where('seller_type',1);
                  break;  

              }

          }
             if ($request->has('type')) {

              switch ($request->type) {
                  case 'all':
                    
                  break;

                  case '0':
                    $posts->where('type',0);
                    $top->where('type',0);
                  break;
                  
                  case '1':
                    $posts->where('type',1);
                    $top->where('type',1);
                  break;  

              }

          }

             if ($request->has('status')) {

              switch ($request->status) {
                  case 'all':
                    
                  break;

                  case '0':
                    $posts->where('status',0);
                    $top->where('status',0);
                  break;
                  
                  case '1':
                    $posts->where('status',1);
                    $top->where('status',1);
                  break;  

              }

          }


     // if ($request->has('applied_filters')) {
          //     $applied_filters = explode(' ', $request->applied_filters);

          //     foreach($applied_filters as $applied){
          //         if($applied){
          //             $ret = trim($this->clean(array_reverse(explode(' : ', $applied))[0]));
          //             $posts->where('search_sentence', 'LIKE',"%{$ret}%");
          //             $top->where('search_sentence', 'LIKE',"%{$ret}%");
          //         }
          //     }
          //   }
       
        $parents = [];
        
      if ($request->has('cat_id')) {
        $category = $request->cat_id;

        if($category > 0){
          $ancestor = Categories::findorfail($category);
          array_push($parents, $ancestor->toArray());
          array_push($applied_filters, $parents[0]['name_ar']);
          while($ancestor->parent_id != null){
            array_push($applied_filters, $ancestor['name_ar']);
            $ancestor = Categories::findorfail($ancestor->parent_id);
            array_push($parents, $ancestor->toArray());
          }
          $parents[0]['subcategories'] = Categories::where('parent_id', $parents[0]['id'])->get()->toArray();
        }
      }

      // $top->inRandomOrder()->take(3);

      if ($request->has('mini_price') &! $request->has('maxi_price')) {
        $posts->where('price','>=', $request->mini_price);
        $top->where('price','>=', $request->mini_price)->get();
      }

      if ($request->has('maxi_price') &! $request->has('mini_price')) {
        $posts->where('price','<=', $request->maxi_price)->get();
        $top->where('price','<=', $request->maxi_price)->get();
      }

      if ($request->has('mini_price') && $request->has('maxi_price')) {
        $posts->whereBetween('price', [$request->mini_price, $request->maxi_price])->get();
        $top->whereBetween('price', [$request->mini_price, $request->maxi_price])->get();
      }

      if($request->has('sort')){
          $posts = $this->sortResults($posts, $request->sort);
          $top = $this->sortResults($top, $request->sort);
      }


      // $top->inRandomOrder()->take(3);
      //
      // $posts = $this->getInfoOfPost($posts)->get();
      // $top = $this->getInfoOfPost($top)->get();
      $parents = array_reverse($parents);
      // dd($posts);
      // dd($top);
      if(count($parents) > 0)$filters = $this->getFiltersOfSubCategory($parents[0]['id']);
      else $filters = [];
      // $top = $top->get()->map(function($t){
      //     $t['img'] = "";
      //     $t['liked'] = "";
      //     return $t;
      // });
      // $posts = $posts->get()->map(function($t){
      //     $t['img'] = "";
      //     $t['liked'] = "";
      //     return $t;
      // });
      //->pluck('attributes')
      // dd($_REQUEST);
      $oldPosts = $posts->get();
     
      $secondIds = Categories::where('parent_id',1)->get()->pluck('id')->toArray();
      $thirdIds = Categories::whereIn('parent_id',$secondIds)->get()->pluck('id')->toArray();
      $posts = Posts::whereIn('category_id',$thirdIds);
      if($request->mini_price && $request->maxi_price == ""){
        $posts->whereBetween('price',[$request->mini_price,99999999999999999999999999999999999999]); 
      }elseif($request->maxi_price && $request->mini_price == ""){
        $posts->whereBetween('price',[0,$request->maxi_price]); 
      }elseif($request->maxi_price && $request->mini_price){
        $posts->whereBetween('price',[$request->mini_price,$request->maxi_price]); 
      }elseif($request->maxi_price == "" && $request->mini_price == ""){
        $posts->where('price','!=',null); 
      }
      
       
      if ($request->search_query) {
        $posts->where('title', 'like', "%{$request->search_query}%");
      }
      
      if ($request->Brand) {
        $posts->where('Brand', 'like', "%{$request->Brand}%");
      }
      if ($request->Model != 'الموديل') {
        $posts->where('Model', 'like', "%{$request->Model}%");
      }
      if ($request->production) {
        $posts->where('production', 'like', "%{$request->production}%");
      }
      if ($request->License) {
        $posts->where('License', 'like', "%{$request->License}%");
      }

      $posts->where('isApproved', 1);
      $posts = $posts->get();
      $top = $top->get();
      if($request->ajax()){
           $view = view('ajaxSearch',compact('posts'))->render();
           return response()->json(['html'=>$view]);
           dd($posts);
      }
      $searchCar = true ;
        
      return view('searchresult', compact('posts', 'parents', 'tops','postss', '_REQUEST', 'filters'));
  }
  
    public function searchMainCategory(Request $request){
        // dd($_REQUEST);
        $postsss = (new Posts)->newQuery();
        $postsss->where('isApproved', 1);
        
        $top = (new Posts)->newQuery();
        $top->where('isApproved', 1)->where('isTop', 1);
    
        $postss= Posts::where('title', 'like', '%'.$request->search_querys.'%')->where('isApproved',1)->get();
          $tops= Posts::where('title', 'like', '%'.$request->search_querys.'%')->where('isApproved',1)->where('isTop',1)->get();
    
        if ($request->exists('search_querys')) {
          $postsss->where('title', 'like', '%'.$request->search_querys.'%');
          $top->where('title', 'like', '%'.$request->search_querys.'%');
        }
    
        if ($request->has('search_city')) {
          $postsss->where('city', 'like', '%'.$request->search_city.'%');
          $top->where('city', 'like', '%'.$request->search_city.'%');
        }
      
        if ($request->has('applied_filters')) {
    
              switch ($request->applied_filters) {
                  case 'isinMain':
                    $postsss->where('isinMain',1);
                    $top->where('isinMain',1);
                  break;
                  case 'all':
                    
                  break;
    
                  case 'isTop':
                    $postsss->where('isTop',1);
                    $top->where('isTop',1);
                  break;
                  
                  case 'isUrgent':
                    $postsss->where('isUrgent',1);
                    $top->where('isUrgent',1);
                  break;  
                                  
                  case 'isColored':
                    $postsss->where('isColored',1);
                    $top->where('isColored',1);
                  break;
              }
    
          }

             if ($request->has('seller_type')) {

              switch ($request->seller_type) {
                  case 'all':
                    
                  break;

                  case '0':
                    $postsss->where('seller_type',0);
                    $top->where('seller_type',0);
                  break;
                  
                  case '1':
                    $postsss->where('seller_type',1);
                    $top->where('seller_type',1);
                  break;  

              }

          }
             if ($request->has('type')) {

              switch ($request->type) {
                  case 'all':
                    
                  break;

                  case '0':
                    $postsss->where('type',0);
                    $top->where('type',0);
                  break;
                  
                  case '1':
                    $postsss->where('type',1);
                    $top->where('type',1);
                  break;  

              }

          }

             if ($request->has('status')) {

              switch ($request->status) {
                  case 'all':
                    
                  break;

                  case '0':
                    $postsss->where('status',0);
                    $top->where('status',0);
                  break;
                  
                  case '1':
                    $postsss->where('status',1);
                    $top->where('status',1);
                  break;  

              }

          }

        $parents = [];
        
      if ($request->has('cat_id')) {
        $category = $request->cat_id;

        if($category > 0){
          $ancestor = Categories::findorfail($category);
          array_push($parents, $ancestor->toArray());
          array_push($applied_filters, $parents[0]['name_ar']);
          while($ancestor->parent_id != null){
            array_push($applied_filters, $ancestor['name_ar']);
            $ancestor = Categories::findorfail($ancestor->parent_id);
            array_push($parents, $ancestor->toArray());
          }
          $parents[0]['subcategories'] = Categories::where('parent_id', $parents[0]['id'])->get()->toArray();
        }
      }

      // $top->inRandomOrder()->take(3);

      if ($request->has('mini_price') &! $request->has('maxi_price')) {
        $postsss->where('price','>=', $request->mini_price);
        $top->where('price','>=', $request->mini_price)->get();
      }

      if ($request->has('maxi_price') &! $request->has('mini_price')) {
        $posts->where('price','<=', $request->maxi_price)->get();
        $top->where('price','<=', $request->maxi_price)->get();
      }

      if ($request->has('mini_price') && $request->has('maxi_price')) {
        $postsss->whereBetween('price', [$request->mini_price, $request->maxi_price])->get();
        $top->whereBetween('price', [$request->mini_price, $request->maxi_price])->get();
      }

      if($request->has('sort')){
          $postsss = $this->sortResults($posts, $request->sort);
          $top = $this->sortResults($top, $request->sort);
      }

      $parents = array_reverse($parents);
      
      if(count($parents) > 0)$filters = $this->getFiltersOfSubCategory($parents[0]['id']);
      else $filters = [];
      
        $oldPosts = $postsss->get();
     
      $secondIds = Categories::where('parent_id',90)->get()->pluck('id')->toArray();
      $thirdIds = Categories::whereIn('parent_id',$secondIds)->get()->pluck('id')->toArray();
      $postsss = Posts::whereIn('category_id',$thirdIds);
      
      if ($request->search_querys) {
        $postsss->where('title', 'like', "%{$request->search_querys}%");
      }
      
        $postsss = $postsss->get();
      
      if($request->ajax()){
           $view = view('ajaxSearchMainCat',compact('postsss'))->render();
           return response()->json(['html'=>$view]);
      }
         
        return view('categories.car-cat', compact('postsss', 'parents', 'top', '_REQUEST', 'filters'));
    }
    
    public function mainSearch ( Request $request){
        
        $parents = [];
        
      if ($request->has('cat_id')) {
        $category = $request->cat_id;

        if($category > 0){
          $ancestor = Categories::findorfail($category);
          array_push($parents, $ancestor->toArray());
          array_push($applied_filters, $parents[0]['name_ar']);
          while($ancestor->parent_id != null){
            array_push($applied_filters, $ancestor['name_ar']);
            $ancestor = Categories::findorfail($ancestor->parent_id);
            array_push($parents, $ancestor->toArray());
          }
          $parents[0]['subcategories'] = Categories::where('parent_id', $parents[0]['id'])->get()->toArray();
        }
      }
      
      $parents = array_reverse($parents);
      // dd($posts);
      // dd($top);
      if(count($parents) > 0)$filters = $this->getFiltersOfSubCategory($parents[0]['id']);
      else $filters = [];
        
        $searchResult = Posts::where('title' , 'like' ,'%'.$request->search_query.'%')->get();
        
        return view('searchresult', compact('searchResult','parents')); 
    }

    
    public function save_search(){
        $lastSearch = SavedSearch::where('searchWord',Request()->searchWord)->where('user_id',Auth()->user()->id)->get();
        if(count($lastSearch)){
          return json_encode(['success'=>false,'message'=>'هذا البحث محفوظ مسبقا']);
        }
        SavedSearch::create([
          'searchUrl' => URL()->previous(),
          'user_id' => Auth::user()->id,
          'searchWord' => Request()->searchWord
          ]);
        return json_encode(['success'=>true,'message'=>'تم حفظ البحث بنجاح']);
    }
    private function sortResults($posts, $sort){
        if($sort == 1){
            // sort by latest
            $posts->latest();
        }else if($sort == 2){
            // sort by least price
            $posts->orderBy('price', 'asc');
        }else if($sort == 3){
            // sort by highest price
            $posts->orderBy('price', 'desc');
        }
        return $posts;
    }

    private function clean($search_sentence){
        $ret = "";
        $strings = explode(' ', $search_sentence);
        foreach($strings as $tmp){
            if($tmp && $tmp != 'جميع' && $tmp != 'الاعلانات')
                $ret .= ' ' . $tmp;    
        }
        return $ret;
    }

    private function getInfoOfPost($posts){
        $user = Auth::user();
        if(!$user){
            $user = new User;
            $user->id = -1;
        }
        $posts->get()->map(function ($post) use($user) {
            $features = $post->getFeatures()->get();
            // foreach($features as $feature){
            //     if($feature->type == 1){
            //         if($feature->expiry_date->lt(\Carbon\Carbon::now()))
            //             $post['isColored'] = 0;
            //     }
            //     if($feature->type == 2){
            //         if($feature->expiry_date->lt(\Carbon\Carbon::now()))
            //             $post['isinMain'] = 0;
            //     }
            //     if($feature->type == 3){
            //         if($feature->expiry_date->lt(\Carbon\Carbon::now()))
            //             $post['isTop'] = 0;
            //     }
            //     if($feature->type == 5){
            //         if($feature->expiry_date->lt(\Carbon\Carbon::now()))
            //             $post['isUrgent'] = 0;
            //     }
            // }
            $post->save();
            $post['liked'] = Favorites::where('post_id', $post['id'])->where('user_id', $user->id)->count();
            $post['img'] = Post_Photos::where('post_id', $post['id'])->first()->photolink;
            return $post;
        });
        return $posts;
    }

    private function getFiltersOfSubCategory($subcategory_id){
        if($subcategory_id == 0)
            return [];
        $groupsoffilters = [];
        $ancestor = Categories::findorfail($subcategory_id);
        $filterss = $ancestor->filtersgroups()->get();
        foreach ($filterss as $item) {
            $groupsoffilters[$item['id']] = $item;
        }
        while($ancestor->sub_id != null){
            $ancestor = Categories::findorfail($ancestor->sub_id);
            $filterss = $ancestor->filtersgroups()->get();
            foreach ($filterss as $item) {
                $groupsoffilters[$item['id']] = $item;
            }
        }
        $filters = [];
        foreach ($groupsoffilters as $key => $group) {
            $tmp = FiltersGroups::findorfail($group->id)->first();
            $var = $group['group_name'];
            $filters[$var] = $group->getFilters()->get();
        }
        return $filters;
    }
    #================ search at sql text to regx =====================================

    private function sql_text_to_regx($string){
        $alamat             = array("+","=","-","_",")","(","*","&","^","%","$","#","@","!","/","\\","|",">","<","?","؟");
        $alamat_change      = "";

        $alef               = array("ا","أ","آ","إ");
        $alef_change        = "@@@";
        $alef_last_change   = "(ا|أ|آ|إ)";

        $yeh                = array("ى","ي");
        $yeh_change         = "(ي|ى)";

        $teh                = array("ة","ه");
        $teh_change         = "(ة|ه)";

        $abd                = array("عبد {$alef_change}ل","عبد{$alef_change}ل");
        $abd_change         = "(عبدال|عبد ال)";

        $alfLam                = array("{$alef_change}ل{$alef_change}","{$alef_change}");
        $alfLam_change         = "(ا|أ|آ|إلا|أ|آ|إ|ا|أ|آ|إ)";

        $all_changes        = array($alamat,       $alef       ,$yeh       ,$teh       ,$abd       ,$alfLam       ,$alef_change       );
        $replaces           = array($alamat_change,$alef_change,$yeh_change,$teh_change,$abd_change,$alfLam_change,$alef_last_change  );

        $id = 0;
        foreach ($all_changes as $change) {     
            $string = str_replace($change,$replaces[$id],$string);
            $id++;    
        }
        return $string;
    }

}
