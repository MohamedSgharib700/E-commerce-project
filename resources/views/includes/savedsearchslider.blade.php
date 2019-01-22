<div class="mini-tab-box ma7foz">
    <div class="swiper-container" dir="rtl">
        <div class="swiper-wrapper">
            @auth
            <!-- slide start -->
            @php $num = 0; @endphp
            @foreach(\App\SavedSearch::where('user_id',Auth::user()->id)->get() as $saved)
                @if($num % 2 == 0)
                <div class="swiper-slide">
                @endif
                    <!-- ad item -->
                    <a href="{{$saved->searchUrl}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{asset('images/dca2e6d461d197443d6751d1d4b3335b.jpg')}}" alt="">
                        </div>
                        <div class="post-data">
                            <h1 title="{{$saved->searchWord}}">{{$saved->searchWord}}</h1>
                        </div>
                        
                    </a>
                @if($num % 2 != 0)
                </div>
                @endif
                @php $num ++; @endphp
            @endforeach
            @if(\App\SavedSearch::where('user_id',Auth::user()->id)->count() % 2 != 0)
                </div>
            @endif
            <!-- slide end -->
            @endauth
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>