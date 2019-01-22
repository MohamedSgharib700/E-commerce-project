<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\PostsDictionary;
use App\PostFeatures;
use App\Favorites;
use App\Categories;
use App\User;
use App\CommercialUsers;
use App\Post_Photos;
use App\Reports;
use App\FiltersGroups;
use App\MessageInquire;
use Illuminate\Support\Facades\Schema;

class PostsController extends Controller
{
    public function ChooseCategory(){
        return view('posts.ad1');
    }
    
    

    public function ChooseSubCategory($category_id){
        $subcategoriesALL = Categories::where('parent_id', '!=', null)->get()->toArray();
        $subcategories = Categories::where('parent_id', $category_id)->get()->toArray();
        $parents = [];
        $ancestor = Categories::findorfail($category_id);
        if($ancestor->parent_id != null)
            array_push($parents, $ancestor->id);
        while($ancestor->parent_id != null){
            $ancestor = Categories::findorfail($ancestor->parent_id);
            array_push($parents, $ancestor->id);
        }
        $ancestor = $ancestor->id;
        if(empty($subcategories)){
            return $this->ChooseSupplyOrDemand($category_id, $parents, $ancestor, $subcategoriesALL);
        }
        return view('posts.ad2', compact('subcategories', 'subcategoriesALL', 'parents', 'ancestor', 'category_id'));
    }

    public function ChooseSupplyOrDemand($category_id, $parents, $ancestor, $subcategoriesALL){
        return view('posts.ad3', compact('category_id', 'parents', 'ancestor', 'subcategoriesALL'));
    }

    public function ShowNewProduct(Request $request){
        $category_id = $_REQUEST['subcategory_id'];
        $id = Categories::where('id', $category_id)->get();
        $subcategories = Categories::where('parent_id', $id)->get()->toArray();
        $SupplyOrDemand = $_REQUEST['SupplyOrDemand'];
        $filters = $this->getFiltersOfSubCategory($category_id);
        $ancestor = Categories::findorfail($category_id);
        // a real ancestor                 or       add_land        or          add_rent
        while($ancestor->parent_id != null and $ancestor->id != 396 and $ancestor->id != 92)
            $ancestor = Categories::findorfail($ancestor->parent_id);
        // dd($filters);        
        return view('posts.newpost', compact( 'category_id', 'SupplyOrDemand', 'filters', 'ancestor','subcategories'));
    }
    
    

    private function getFiltersOfSubCategory($subcategory_id){
        $groupsoffilters = [];
        $ancestor = Categories::findorfail($subcategory_id);
        $filterss = $ancestor->filtersgroups()->get();
        foreach ($filterss as $item) {
            $groupsoffilters[$item['id']] = $item;
        }
        while($ancestor->parent_id != null){
            $ancestor = Categories::findorfail($ancestor->parent_id);
            $filterss = $ancestor->filtersgroups()->get();
            foreach ($filterss as $item) {
                $groupsoffilters[$item['id']] = $item;
            }
        }
        $filters = [];
        foreach ($groupsoffilters as $key => $group) {
            $var = $group['group_name'];
            $filters[$var] = $group->getFilters()->get()->toArray();
            $filters['type'][$var] = $group->type;  
        }
        // dd($filters);
        return $filters;
    }

    public function CreateNewPost(Request $request){
        $user = Auth::user();
        
        $this->validate($request , 
        [
            'title'=>'required',
            'short'=>'required',
            'description'=>'required',
            'address'=>'required',
            'price'=>'required'
        ],
        [
            
            'title.required' => 'من فضلك ادخل عنوان الاعلان',
            'short.required' => 'من فضلك ادخل العنوان المختصر للاعلان',
            'description.required' => 'من فضلك ادخل تفاصيل الاعلان',
            'address.required' => 'من فضلك ادخل العنوان الشخصي الخاص بك',
            'price.required' => 'من فضلك ادخل السعر',
        ]);
        
        $post = Posts::create([
            'title' =>$_REQUEST['title'],
            'short' => $_REQUEST['short'],
            'description' => is_array($request->description) ? implode(' ', $_REQUEST['description']) : $_REQUEST['description'],
            'address' => $_REQUEST['address'],
            'seller_name' => $_REQUEST['seller_name'],
            'seller_email' => $_REQUEST['seller_email'],
            'seller_number' => $_REQUEST['seller_number'],
            'price' => $_REQUEST['price'],
            'category_id' => $_REQUEST['category_id'],
            'user_id' => $user->id,
            'search_sentence' => $_REQUEST['filter'],  
        ]);
        $search_sentence = $_REQUEST['filter'];
        $search_sentence['category'] = "";
        foreach($this->getParents($_REQUEST['category_id']) as $cat){
            $search_sentence['category'] .= ' ' . $cat['name_ar'];
        }
        // dd($search_sentence);
        $hash = $this->pageId('posts', $post->id);
        PostsDictionary::create([
            'hash' => $hash,
            'post_id' => $post->id,
        ]);
        $cost = 0;
        foreach ($request->file('img') as $image){
            $getimageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $getimageName);
            $photo = Post_Photos::create([
               'post_id' => $post->id,
               'photolink' => 'images/'. $getimageName
            ]);
        }
        $search_sentence['نوع الاعلان'] = "";
        //Package
        if($request->input('pack') == 1){
            //isColored Feature
            if($request->input('isColoredDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isColored اعلانات مدفوعه ملونة';
                PostFeatures::create([
                    'type' => 1,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isColored')) ,
                ]);
                $post['isColored'] = 1;
            }
            //isinMain Feature
            if($request->input('isinMainDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isinMain اعلانات مدفوعه مميزة';
                PostFeatures::create([
                    'type' => 2,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isinMain')),
                ]);
                $post['ininMain'] = 1;
            }
            //isinTop Feature
            if($request->input('isinTopDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isinTop أفضل الاعلانات';
                PostFeatures::create([
                    'type' => 3,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isinTop')),
                ]);
                $post['isTop'] = 1;
            }
            // isUrgent
            if($request->input('isUrgent') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isUrgent  عاجل الاعلانات';
                PostFeatures::create([
                    'type' => 4,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isUrgent')),
                ]);
                $post['isUrgent'] = 1;
            }
        }elseif($request->input('pack') == 2){
            // $search_sentence['نوع الاعلان'] .= " اعلانات مدفوعه عادية";
            //isColored Feature
            $search_sentence['نوع الاعلان'] .= ' paid isColored اعلانات مدفوعه ملونة';
            PostFeatures::create([
                'type' => 1,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isColored'] = 1;
            //isinMain Feature
            if($request->input('isinMainDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isinMain اعلانات مدفوعه مميزة';
                PostFeatures::create([
                    'type' => 2,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isinMain')),
                ]);
                $post['ininMain'] = 1;
            }
            //isinTop Feature
            if($request->input('isinTopDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isinTop أفضل الاعلانات';
                PostFeatures::create([
                    'type' => 3,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isinTop')),
                ]);
                $post['isTop'] = 1;
            }
             // isUrgent
            if($request->input('isUrgent') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isUrgent  عاجل الاعلانات';
                PostFeatures::create([
                    'type' => 4,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isUrgent')),
                ]);
                $post['isUrgent'] = 1;
            }
        }elseif($request->input('pack') == 3){
            //isColored Feature
            PostFeatures::create([
                'type' => 1,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isColored'] = 1;
            //isinMain Feature
            PostFeatures::create([
                'type' => 2,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isinMain'] = 1;
            //has20photos
            PostFeatures::create([
                'type' => 4,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $search_sentence['نوع الاعلان'] .= ' paid isColored اعلانات مدفوعه ملونة';
            $search_sentence['نوع الاعلان'] .= ' paid isinMain اعلانات مدفوعه مميزة';
            //isinTop Feature
            if($request->input('isinTopDecision') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isinTop أفضل الاعلانات';
                PostFeatures::create([
                    'type' => 3,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays($request->input('isinTop')),
                ]);
                $post['isTop'] = 1;
            }
             // isUrgent
            if($request->input('isUrgent') == 1){
                $search_sentence['نوع الاعلان'] .= ' paid isUrgent  عاجل الاعلانات';
                PostFeatures::create([
                    'type' => 4,
                    'post_id' => $post->id,
                    'expiry_date' => $post->created_at->addDays(30),
                ]);
                $post['isUrgent'] = 1;
            }
        }else{
            //isColored Feature
            PostFeatures::create([
                'type' => 1,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isColored'] = 1;
            //isUrgent
             PostFeatures::create([
                'type' => 4,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isUrgent'] = 1;
            //isinMain Feature
            PostFeatures::create([
                'type' => 2,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isinMain'] = 1;
            //isinTop Feature
            PostFeatures::create([
                'type' => 3,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $post['isTop'] = 1;
            //has20photos
            PostFeatures::create([
                'type' => 4,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays(30),
            ]);
            $search_sentence['نوع الاعلان'] .= ' paid isColored اعلانات مدفوعه ملونة';
            $search_sentence['نوع الاعلان'] .= ' paid isinMain اعلانات مدفوعه مميزة';
            $search_sentence['نوع الاعلان'] .= ' paid isinTop أفضل الاعلانات';
        }
        //isUrgent Feature
        if($request->input('isUrgent') == 1){
            $search_sentence['نوع الاعلان'] .= ' isUrgent اعلانات مدفوعه عاجلة';
            PostFeatures::create([
                'type' => 5,
                'post_id' => $post->id,
                'expiry_date' => $post->created_at->addDays($request->input('isinTop')),
            ]);
            $post['isUrgent'] = 1;
        }
        // dd($search_sentence);
        $post->search_sentence = $search_sentence;
        $post->save();
        return redirect('posts/'.$post->id);
    }
    
    public function ShowEditProduct(Request $request , Posts $post){
       
        $category_id = Categories::where('id', $request->id);
         $ancestor =$category_id;
        // dd($filters);
        return view('posts.editPost', compact( 'category_id','ancestor','post'));
    }
    
    public function postDelete(Posts $post)
    {
       $post ->delete();
        return back();
    }
    
    public function editPost(Request $request, $post ){
        
        
        $post = Posts::where('id',$post)->first();
        
        $post->price = $request->price ;
        $post->title = $request->title ;
        $post->short = $request->short ;
        $post->description = $request->description ;
        $post->seller_name = $request->seller_name ;
        $post->seller_email = $request->seller_email ;
        $post->seller_number = $request->seller_number ;
        $post->address = $request->address ;
        
        $post->update();
        return redirect('ads');
    }


    private function pageId($identifier, $id = null)
    {
        $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $identifier);
        if ($id) {
            $uuid5 = Uuid::uuid5(Uuid::NAMESPACE_DNS, $identifier . '-' . $id);
        }
        return $uuid5;
    }
    //
    public function ShowPost($id){
        $userAuth = Auth::user();
        $user = Auth::user();
        // $posts = [];
        // foreach($user->Posts as $post){
        //     $posts[] = $post;
        // }
        // dd($posts);
        if(!$user){
            $user = new User;
            $user->id = -1;
        }
        $post = Posts::findorfail($id);
        // if(Auth::check()){
        //     $post->Users()->attach($user->id);
        // }
        // dd($post);
        $post->liked = Favorites::where('post_id', $id)->where('user_id', $user->id)->count();
        // $tmp = explode(' - ', $post->filters()->where('group_id', 1)->first()->name); 
        // dd($post['city']);
        // $post['status'] = ;
        $seller = User::where('id', $post->user_id)->first();
        $sellerCommercial = CommercialUsers::where('user_id', $post->user_id)->first();
        $seller->whatsapp_number = $post->seller_number;
        $latest = Posts::where('user_id', $post->user_id)->where('isArchived', 0)->where('isApproved', 1)->where('id', '!=', $id)->orderBy('created_at', 'desc')->get();
        $latest = $latest->splice(0, 3);
        $post_photos = Post_Photos::with('post')->where('post_id', $id)->get();
        //$latest = $this->getInfoOfPost($latest, $user);
        $alike = Posts::orderBy(DB::raw('RAND()'))->where('id', '!=', $id)->where('isArchived', 0)->where('isApproved', 1)->where('category_id', $post->category_id)->where('id', '!=', $post->id)->get();
        $alike = $alike->splice(0, 3);
        $alike = $this->getInfoOfPost($alike, $user);
        $parents = $this->getParents($post->category_id);
        $post = $post->toArray();
        return view('posts.single', compact('post', 'post_photos', 'latest', 'alike', 'seller','sellerCommercial', 'parents','userAuth'));
    }
    //
    public function toggleFavorite($id){
        $user = Auth::user();
        if(!$user)
            return 2;
    	$action = Favorites::where('post_id', $id)->where('user_id', $user->id)->get();
    	if(count($action) == 0){
    		Favorites::create([
            'post_id' => $id,
            'user_id'=> $user->id,
            ]);
            return 1;
    	}else{
    		Favorites::where('post_id', $id)->where('user_id', $user->id)->delete();
    		return 0;
    	}
    }
    
    public function GetPostsByCategory($category_id , Request $request){
        $category = Categories::findorfail($category_id);
        $posts = Posts::whereIn('category_id', $this->getSubCategoriesIds($category_id))->paginate(14);
        $filters = $this->getFiltersOfSubCategory($category_id);
        $posts = $this->getInfoOfPost($posts);
        $parents = $this->getParents($category_id); 
        
      //   $postss = (new Posts)->newQuery();
        $secondIds = Categories::where('parent_id',$category_id)->get()->pluck('id')->toArray();
        $postss = Posts::whereIn('category_id',$secondIds);
        if($request->mini_price && $request->maxi_price == ""){
          $postss->whereBetween('price',[$request->mini_price,99999999999999999999999999999999999999]); 
        }elseif($request->maxi_price && $request->mini_price == ""){
          $postss->whereBetween('price',[0,$request->maxi_price]); 
        }elseif($request->maxi_price && $request->mini_price){
          $postss->whereBetween('price',[$request->mini_price,$request->maxi_price]); 
        }elseif($request->maxi_price == "" && $request->mini_price == ""){
          $postss->where('price','!=',null); 
        }
         $searchResult = Posts::where('title' , 'like' ,'%'.$request->search_querys.'%')->where('category_id',$secondIds)->get();
         
        foreach ($request->all() as $key => $value) {
            if(Schema::hasColumn('posts', $key)){
                if(is_numeric($value)){
                    $postss->where($key,$value);
                }else{
                    $postss->where($key,'like',"%{$value}%");
                }
            }
        }
        $postss = $postss->paginate(14);
        // dd($postss);
        if($category_id == 1){
            return view('categories.car-cat', compact('posts', 'category', 'parents', 'filters'));
        }
        return view('categories.maincategory', compact('posts', 'category', 'parents', 'filters','postss','searchResult'));
    }
    
    
    // public function inputFilter(Request $request , $category_id){
        
    //     $category = Categories::findorfail($category_id);
    //     $postss = (new Posts)->newQuery();
        
    //      $secondIds = Categories::where('parent_id',1)->get()->pluck('id')->toArray();
    //   $thirdIds = Categories::whereIn('parent_id',$secondIds)->get()->pluck('id')->toArray();
    //   $postss = Posts::whereIn('category_id',$thirdIds);
    //   if($request->mini_price && $request->maxi_price == ""){
    //     $postss->whereBetween('price',[$request->mini_price,99999999999999999999999999999999999999]); 
    //   }elseif($request->maxi_price && $request->mini_price == ""){
    //     $postss->whereBetween('price',[0,$request->maxi_price]); 
    //   }elseif($request->maxi_price && $request->mini_price){
    //     $postss->whereBetween('price',[$request->mini_price,$request->maxi_price]); 
    //   }elseif($request->maxi_price == "" && $request->mini_price == ""){
    //     $postss->where('price','!=',null); 
    //   }
    //      $searchCar = true ;
    //     return view('categories.maincategory', compact('postss','category'));
    // }
    
    
    private function getSubCategoriesIds($id){
        $category = Categories::findorfail($id);
        $ids = [$id];
        $subcategories = $category->getSubCategories()->get();
        foreach($subcategories as $sub){
            $ids = array_merge($ids, $this->getSubCategoriesIds($sub->id));
        }
        return $ids;
    }

    public function ReportPost(Request $request, $id){
        Reports::create([
            'type'=> $request->input('type'),
            'post_id' => $id,
        ]);
        //return route('landing');
        return back()->with('message', '  تم ارسال البلاغ بنجاح √ √');
    }
    
    // public function imageCheck($imageName,$folder='products'){
    //     $path = public_path().'/upload/'.$floder.'/'.$imageName;
    //     if(!$imageName){
    //         return Request()->root().'/public/website/images/noImage.png';
    //     }
    //     if(file_exists($path)){
    //         return Request()->root().'/upload/'.$floder.'/'.$imageName;
    //     }else{
    //         return Request()->root().'/public/website/images/noImage.png';
    //     }
    // }
    
    private function getInfoOfPost($posts){ 
        $user = Auth::user();
        if(!$user){
            $user = new User;
            $user->id = -1;
        }
        $posts->map(function ($post) use($user) {
            $post['liked'] = Favorites::where('post_id', $post['id'])->where('user_id', $user->id)->count();
            if($postPhoto = Post_Photos::where('post_id', $post['id'])->first()){
                $post['img'] = $postPhoto->photolink;
            }else{
                $post['img'] = 'no_image.png';
            }
            $features = $post->getFeatures()->get();
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

    private function getParents($category_id){
        $parents = [];
        $ancestor = Categories::where('id', $category_id)->get()->map(function ($cat) {
            $cat['subcategories'] = $cat->getSubCategories()->get()->pluck('attributes');
            return $cat;
        })->pluck('attributes')[0];
        array_push($parents, $ancestor);
        while($ancestor['parent_id'] != null){
            $ancestor = Categories::where('id', $ancestor['parent_id'])->get()->map(function ($cat) {
                $cat['subcategories'] = $cat->getSubCategories()->get()->pluck('attributes');
                return $cat;
            })->pluck('attributes')[0];
            array_push($parents, $ancestor);
        }
        $parents = array_reverse($parents);
        return $parents;
    }
    
    // The "Are you busy" service message located on the ad details page
    
    public function sendOffer(Request $request , MessageInquire $message){
         
      
         $message->sender_id = $request->sender_id ;
         $message->sentTo_id = $request->sentTo_id ;
         $message->sender_name = $request->sender_name ;
         $message->sender_phone = $request->sender_phone ;
         $message->messages = $request->messages ;
             
         $message->save(); 
         
         return back()->with('message', 'تم ارسال رسالتك بنجاج  √ √');
         
        
    }
}
