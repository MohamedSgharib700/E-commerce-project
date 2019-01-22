<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use App\Messages;
use App\Conversation;
use App\ConversationRepository;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    //
    // protected $authUser;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     Talk::setAuthUserId(Auth::user()->id);

    //     View::composer('partials.peoplelist', function($view) {
    //         $threads = Talk::threads();
    //         $view->with(compact('threads'));
    //     });
    // }

    // public function chatHistory($id)
    // {
    //     $conversations = Conversation::getMessagesByUserId($id);
    //     $user = '';
    //     $messages = [];
    //     if(!$conversations) {
    //         $user = User::find($id);
    //     } else {
    //         $user = $conversations->withUser;
    //         $messages = $conversations->messages;
    //     }

    //     return view('messages.conversations', compact('messages', 'user'));
    // }

    // public function ajaxSendMessage(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $rules = [
    //             'message-data'=>'required',
    //             '_id'=>'required'
    //         ];

    //         $this->validate($request, $rules);

    //         $body = $request->input('message-data');
    //         $userId = $request->input('_id');

    //         if ($message = Talk::sendMessageByUserId($userId, $body)) {
    //             $html = view('ajax.newMessageHtml', compact('message'))->render();
    //             return response()->json(['status'=>'success', 'html'=>$html], 200);
    //         }
    //     }
    // }

    // public function ajaxDeleteMessage(Request $request, $id)
    // {
    //     if ($request->ajax()) {
    //         if(Talk::deleteMessage($id)) {
    //             return response()->json(['status'=>'success'], 200);
    //         }

    //         return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
    //     }
    // }

    // public function tests()
    // {
    //     dd(Talk::channel());
    // }

     public function index()
    {
        $conversations = Conversation::latest()->get();
        $user1 = '$conversations->id()';
        //$conversation = Conversation::where('user_one', $user1);
        //dd($conversations,$user1);
        return View('admin.messages.index', compact('conversations','user_id'));
    }
}
