<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use App\Bills;
use App\Messages;
use App\Conversation;
use App\Categories;
use App\Http\Controllers\Controller;
class UsersController extends Controller
{
    public function rules($id)
    {
        return [
            'name'  =>'required',
            'email' =>"required|email|unique:users,email,$id"
        ];

    }

    public function index()
    {
        $users = User::latest()->paginate();
        return View('admin.users.index',compact('users'));
    }

    public function edit(User $user)
    {
        if($user->isCommercial())
        {
            $user = array_merge($user->toArray(),$user->getCommerical->toArray());
            $user['isCommercial'] = true;
        }else{
            $user = $user->toArray();
            $user['isCommercial'] =false;
        }
        return View('admin.users.edit',compact('user'));
    }

    public function update(User $user,Request $request)
    {
        $this->validate($request,$this->rules($user->id));
        if($request->has('password')){
            $request->merge(['password'=>bcrypt($request->password)]);
            $data = $request->all();
        }else{
            $data = $request->except('password');
        }
        $user->update($data);
        return redirect()->to(Url('admin/users'));
    }

    public function destroy(User $user,$id)
    {
        $user->delete();
        return redirect()->to(Url('admin/users'));
    }

    public function userMessages(User $user)
    {

        $user->mesgs = $user->getMessages();
        //  ,$user->getMessagesTo()->toArray())
        //dd($user->mesgs);
        return View('admin.users.messages',compact('user'));
    }

    public function UserBills(User $user)
    {
        $status = ['Mark As Paid','Paid'];
        return View('admin.users.bills',compact('user','status'));
    }
    public function payBill($id)
    {
        Bills::findOrFail($id)->update(['status'=>1]);
        return redirect()->back();
    }

    public function UserSubscriptions(User $user)
    {
        return View('admin.users.subscriptions',compact('user'));
    }

    public function UserPosts(User $user)
    {
        return View('admin.users.posts',compact('user'));
    }

    public function profile(User $user)
    {
      if($user->isCommercial())
      {
          $user = array_merge($user->toArray(),$user->getCommerical->toArray());
          $user['isCommercial'] = true;
      }else{
          $user = $user->toArray();
          $user['isCommercial'] =false;
      }
      return view('users.profile');
    }

    public function ads(User $user)
    {
      return view('users.ads');
    }

    public function messages(User $user)
    {
      return view('users.messages');
    }

    public function savedsearch(User $user)
    {
      return view('users.savedsearch');
    }
}
