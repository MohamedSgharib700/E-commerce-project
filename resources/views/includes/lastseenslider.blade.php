<div class="mini-tab-box m25ran active swiped">
    <div class="swiper-container" dir="rtl">
        <div class="swiper-wrapper">
        @foreach($lastseen as $key=>$post)
            <!-- slide start -->
            @if($key % 2 == 0)
            <div class="swiper-slide">
            @endif
                <!-- ad item -->
                @if($post['isColored'])
                <a href="{{Url('posts').'/'.$post['id']}}" class="ad-item heigh-light">
                @else
                <a href="{{Url('posts').'/'.$post['id']}}" class="ad-item">
                @endif
                @if($post['isUrgent'])
                <div class="important"><span></span><div>عاجل</div></div>
                @endif
                    <div class="image-box">
                        <img src="{{Url($post['img'])}}" alt="">
                    </div>
                    <div class="post-data">
                        <h1 title="{{$post['title']}}">{{$post['title']}}</h1>
                        <div class="price">{{$post['price']}}
                                <span>ر.س</span>
                        </div>
                        <small class="boxed-only">مدينة {{$post['city']}}</small>
                    </div>
                    @if($post['liked'] == 1)
                        <div class="watch-icon active">
                    @else
                        <div class="watch-icon">
                    @endif
                        <input type="hidden" name="liked" class="liked" value="{{$post['liked']}}">
                        <input type="hidden" name="post_id" class="post_id" value="{{$post['id']}}">
                        <i class="fa fa-star"></i>
                    </div>
                </a>
            @if($key % 2 != 0)
            </div>
            @endif
            <!-- slide end -->
        @endforeach
        @if(count($lastseen) != 0 && count($lastseen) % 2 != 0)
        </div>
        @endif
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>