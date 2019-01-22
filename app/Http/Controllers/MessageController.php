<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Message;
use App\User;
use App\MessageInquire;
use Auth;

use Notification;

class MessageController extends Controller
{
    public function convsViews()
    {
        $messagesFrom = Message::where('user_to', Auth()->user()->id)->get();

        $selected_id = Message::select('user_id')->where('user_to', Auth()->user()->id)->get()->toArray();

        $messagesTo = Message::where('user_id', Auth()->user()->id)->whereNotIn('user_to', $selected_id)->get();

        return view('messages.index', compact('messagesFrom', 'messagesTo'));
    }

    public static function inbox(){
        $user = Auth()->user();

        // Message::where('user_to', $user->id)->update(['status' => 0]);
        $messagesFrom = Message::where('user_to',$user->id)->orderBy('created_at','desc')->get();

        $selected_id = Message::select('user_id')->where('user_to',$user->id)->get()->toArray();

        $messagesTo = Message::where('user_id', $user->id)->whereNotIn('user_to',$selected_id)->orderBy('created_at','desc')->get();

        $messagesFrom->unique('user_id');
        $messagesTo->unique('user_to');

        $messages = $messagesTo->merge($messagesFrom)->unique(function($u){
            return $u['user_id'].$u['user_to'];
        }); 

        if(Request()->ajax()){
            $view = view('messages.loadMore',compact('messages'))->render();
            return response()->json(['html'=>$view]);
        }
        return $messages;
    }

    function userconv ($id){

        $user_to = User::findOrFail($id);
        $user = Auth()->user();
        $num = 1;

        $messages = Message::where(function($q) use($user,$user_to){
            $q->where('user_id',$user->id);
            $q->where('user_to',$user_to->id);
        })->orWhere(function($q) use($user,$user_to){
            $q->where('user_to',$user->id);
            $q->where('user_id',$user_to->id);
        })->update(['status' => 0]);

        $messages = Message::where(function($q) use($user,$user_to){
            $q->where('user_id',$user->id);
            $q->where('user_to',$user_to->id);
        })->orWhere(function($q) use($user,$user_to){
            $q->where('user_to',$user->id);
            $q->where('user_id',$user_to->id);
        })->orderBy('created_at', 'asc')->get();
        if (Request()->ajax()) {
            $view = view('messages.conv',compact('messages','num','id','user_to'))->render();
            return response()->json(['html'=>$view,'data'=>'done']);
        }else{
            return ['data'=>'error'];
        }
    }

    public function sendMsg(Request $request,$user_to){
        $user_id = Auth()->user()->id;
        if ($request->body == '') {
            $msgBody = " ";
        } else {
            $msgBody = $request->body;
        }
        $newMsg = Message::create([
            'user_id' => $user_id,
            'user_to' => $request->user_to,
            'body' => $msgBody,
            'status' => 1
        ]);
        if ($request->ajax()) {
            $view = view('messages.loadMoreConv',compact('newMsg'))->render();
            $viewFrom = view('messages.loadMoreConvFrom',compact('newMsg'))->render();
            if($user_to != Auth()->user()->id){
                $msgCount = Message::where('user_to',$user_to)->where('status',1)->count();
                $this::pusherFun('Messages','msgSend'.$user_id.'msgReceive'.$user_to,['html'=>$viewFrom]);
                if(!in_array('conv', Request()->segments())){
                    $this::pusherFun('Messages','countMsg'.$user_to,['msgCount'=>$msgCount]);
                }
            }
            return response()->json(['html'=>$view,'data'=>'done']);
        }
        return 'error';
    }

    public function destroy($id)
    {
        if(Message::findOrFail($id)->delete()){
            return 'hide';
        }else{
            return 'error';
        }
    }

    public function delMsg (Request $r){
        $user = Auth()->user();
        Message::where('user_id',$user->id)->delete();
        Message::where('user_to',$user->id)->delete();
        return 'hide';
    }

    public function restoree($id)
    {
        $message = Message::where('id', $id);
        if($message->restore()){
            return 'restore';
        }else{
            return 'error';
        }
    }

    public function forceDel($id)
    {
        $message = Message::where('id', $id);
        $message->forceDelete();
        if(Message::withTrashed()->count() < 1){
            return 'empty';
        }
        return '';
    }
    function pusherFun($chanel,$event,$data =""){
        $options = array(
          'cluster' => 'eu',
          'encrypted' => true
        );
        $pusher = new \Pusher\Pusher(
            'ab9e6f5292c0376329e0',
            '16b026a7cce940c78f8b',
            '522665',
            $options
        );
        return $pusher->trigger($chanel,$event,$data);
    }
    
    
     public function sendOffer(Request $request , MessageInquire $message){
         
         $user = Auth::user();
         $this->validate($request , ['sender_phone'=>'numeric']);
         $message->sender_id = $request->sender_id ;
         $message->sentTo_id = $request->sentTo_id ;
         $message->sender_name = $request->sender_name ;
         $message->sender_phone = $request->sender_phone ;
         $message->messages = $request->messages ;
             
         $message->save(); 
        if($user){ 
            return back()->with('message', 'تم ارسال رسالتك بنجاج  √ √');
        }else{
            return back()->with('message', 'برجاء اجراء عملية تسجيل الدخول لتتمكن من التواصل مع البائع');
        }
         
        
    }
}