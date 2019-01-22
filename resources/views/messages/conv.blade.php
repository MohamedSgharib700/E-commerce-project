    <div class="closer"></div>
    <div class="my-modal-body">
        <h1 class="no-margin nb">التحدث المباشر مع : {{$user_to->name}}</h1>
        <div class="massege-box">
            <ul>
                @if(count($messages))
                @foreach($messages as $msg)
                @if($msg->user_id != Auth::user()->id)
                <li><span>{{$user_to->name}} :</span> {{$msg->body}}</li>
                @else
                <li><span>انت :</span> {{$msg->body}}</li>
                @endif
                @php $num++; @endphp
                @endforeach
                @else
                <center><div class="alert alert-info"> يمكنك بدء المحادثه الآن </div></center>
                @endif                    
            </ul>
        </div>
        <form action="{{url('sendMsg/'.$id)}}" method="post" name="postform" id="chatPostform">
            <div class="send-bar">
                {{csrf_field()}}
                <input name="body" id="msgBody" type="text" placeholder="اكتب رسالتك">
                <input type="hidden" name="user_to" value="{{$id}}">
                <button id="sendMsg" type="submit" name="submit">ارسال</button>
            </div>
        </form>
    </div>