<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SavedSearch;
use App\Bills;
use App\Posts;
use App\Post_Photos;
use App\Favorites;
use App\Messages;
use App\Conversation;
use App\Categories;
class UsersController extends Controller
{
    public function rules($id)
    {
        return [
            'name'  =>'required',
            'email' =>"required|email|unique:users,email,$id"
        ];

    }

    public function profile(Authenticatable $user)
    {
        $users = User::where('id' , Auth::user()->id)->first();
      if($user->isCommercial())
      {
          $user = array_merge($user->toArray(),$user->getCommerical->toArray()); 
          $user['isCommercial'] = true; 
      }else{
          $user = $user->toArray();
          $user['isCommercial'] =false;
      }
      return view('users.profile', compact('user','users'));
    }
    
    public function userPersonalUpdate(Request $request)
    {
        if ($request->hasFile('images')) {
      	    $file = $request->file('images');
            $imageName = time().'.'.$file->getClientOriginalName();
            $file->move(public_path('imagesProfile'), $imageName);
        }else{
            $imageName = 'user.jpg';
        }

        if(Auth()->check()){
            $users = User::find(Auth::user()->id);
            //$this->validate($request , ['image'=>'image','des'=>'required' ]);
            // if(array_key_exists('images',$request) == false)
            //   $request['images'] = 0;
            $data = [
                'name' => $request->name,
                'phone' => $request->phone_number,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'profile_picture' => $imageName,
                ];
            $users->update($data);
           // $num = $user;
        }
       return redirect('profile');
    }

    public function showPublicProfile($id){
        
        $users = User::where('id' , $id)->first(); 
        $posts = Posts::where('user_id' , $id)->get();
        $user = User::where('id', $id)->first();
        if($user->isCommercial())
        {
            $user = array_merge($user->toArray(),$user->getCommerical->toArray());
            $user['isCommercial'] = true;
        }else{
            $user = $user->toArray();
            $user['isCommercial'] =false;
        }
        
        
        // dd($user);
        return view('users.publicprofile', compact('user','users','posts'));
    }

    public function showPublicPosts($id){
        $user = User::where('id', $id)->first();
        $active = $user->getPosts()->where('isArchived', 0)->where('isApproved', 1)->get();
        $archived = $user->getPosts()->where('isArchived', 1)->where('isApproved', 1)->get();
        $visitor = Auth::user();
        if(!$visitor){
            $visitor = new User;
            $visitor->id = -1;
        }
        // $posts->map(function ($post) use($visitor){
        //     $post['img'] = Post_Photos::where('post_id', $post['id'])->first()->photolink;
        //     $post['liked'] = Favorites::where('post_id', $post['id'])->where('user_id', $visitor->id)->count();
        //     $features = $post->getFeatures()->get();
        //     foreach($features as $feature){
        //         if($feature->type == 1){
        //             $post['isColored'] = 1;
        //         }
        //         if($feature->type == 2){
        //             $post['isinMain'] = 1;
        //         }
        //         if($feature->type == 5){
        //             $post['isUrgent'] = 1;
        //         }
        //     }
        //     return $post;
        // });
        // dd($posts);
      return view('users.publicads', compact('user', 'archived', 'active'));
    }

    public function ads()
    {
        $user = Auth::user();
        if(!$user){
            return route('login');
        }
        $active = $user->getPosts()->where('isArchived', 0)->where('isApproved', 1)->get();
        $active->map(function ($post){
            if($postPhoto = Post_Photos::where('post_id', $post['id'])->first()){
                $post['img'] = $postPhoto->photolink;
            }else{
                $post['img'] = 'no_image.png';
            }
        });    
           
        $archived = $user->getPosts()->where('isArchived', 1)->where('isApproved', 1)->get();
        $stopped = $user->getPosts()->where('isApproved', 0)->get();
        // $posts->map(function ($post) {
        //     $post['img'] = Post_Photos::where('post_id', $post['id'])->first()->photolink;
        //     $features = $post->getFeatures()->get();
        //     foreach($features as $feature){
        //         if($feature->type == 1){
        //             $post['isColored'] = 1;
        //         }
        //         if($feature->type == 2){
        //             $post['isinMain'] = 1;
        //         }
        //         if($feature->type == 5){
        //             $post['isUrgent'] = 1;
        //         }
        //     }
        //     return $post;
        // });
        $favorites = $user->getFavorites()->get();
        $favorites->map(function ($post){
            if($postPhoto = Post_Photos::where('post_id', $post['id'])->first()){
                $post['img'] = $postPhoto->photolink;
            }else{
                $post['img'] = 'no_image.png';
            }
            
            $post['liked'] = 1;
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
        // stopped active archived
      return view('users.ads', compact('stopped', 'active', 'archived', 'favorites'));
    }


    public function messages(User $user)
    {
        $user = Auth::user();
        if(!$user){
            return route('login');
        }
      return view('users.messages');
    }

    public function savedsearch(User $user)
    {
        $user = Auth::user();
        if(!$user){
            return route('login');
        }
        $savedsearch = SavedSearch::where('user_id', $user)->get();
      return view('users.savedsearch ',compact('savedsearch'));
    }


   public function savedsearchDelete(SavedSearch $savedsearch){
    
    
       $savedsearch->delete();
       return back();
    
    
    }
    
    public function savedsearchDeleteAll($savedsearch){
    
    
       $savedsearch=SavedSearch::all()->delete();

       return back();
    
    
    }
    
    
}    
    
    
    
    
    
    
    
    
    

