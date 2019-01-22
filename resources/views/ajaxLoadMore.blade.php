                @foreach($posts as $post)
                    <div class="col l3">
                        <!-- ad item -->
                        @if($post->isColored)
                            <a href="{{Url('posts').'/'.$post->id}}" class="ad-item heigh-light">
                        @else
                            <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        @endif
                        @if($post->isUrgent)
                            <div class="important"><span></span><div>عاجل</div></div>
                        @endif
                            <div class="image-box">
                                @if(\App\Post_Photos::where('post_id', $post['id'])->count())
                                <img src="{{Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)}}" alt="">
                                @else
                                <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                @endif
                                <div class="price">{{$post->price}}
                                @if(Session::get('lang') == 'en')
                                    <span>R.S</span>
                                @else
                                    <span>ر.س</span>
                                @endif
                                </div>
                            </div>
                            <h1 title="{{$post->title}}">{{$post->title}}</h1>
                             @if(Session::get('lang') == 'en')
                            <small>City {{$post->city}}</small>
                            @else
                            <small>مدينة {{$post->city}}</small>
                            @endif
                            @if($post->liked == 1)
                                <div class="watch-icon active">
                            @else
                                <div class="watch-icon">
                            @endif
                                <input type="hidden" name="liked" class="liked" value="{{$post->liked}}">
                                <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                                @if (Auth::check())
                                    <i class="fa fa-star"></i>
                                 @endif
                            </div>
                        </a>
                        
                    </div>
                @endforeach
