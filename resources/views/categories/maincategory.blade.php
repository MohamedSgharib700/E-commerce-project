
    <?php $tmp = 'layouts.app' ?>

@extends($tmp)
 @if (Session::get('lang') == 'en')
@section('title', ' - ' . $category->name_en)
@else
@section('title', ' - ' . $category->name_ar)
@endif
@section('content')
    @if(count($parents) == 1)
    @if (Session::get('lang') == 'en')
        <div class="cat-banner" style="background-image:url('{{ asset($parents[0]['photo'])}}')">
           <!--  <h1>{{$parents[0]['name_en']}}</h1> -->
        </div>
        @else
        <div class="cat-banner" style="background-image:url('{{ asset($parents[0]['photo'])}}')">
            <!-- <h1>{{$parents[0]['name_ar']}}</h1>  -->
        </div>
        @endif
    @endif 
    
    <!--  script -->
    <script id="privet-filters" type="application/json">{!! json_encode($filters, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_FORCE_OBJECT) !!}</script>
    <!-- normal body -->
    <div class="normal-body">
        <div class="big-container">
            @include('includes.searchbarMainCat')
            @include('includes.specialcategories')
            <!-- link map -->
            <div class="link-map">
                @if (Session::get('lang') == 'en')
                <div class="map-item"><a href="{{route('landing')}}">Home</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_en']}}</a></div>
                @endforeach
                
                @else
                <div class="map-item"><a href="{{route('landing')}}">الرئيسية</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_ar']}}</a></div>
                @endforeach
                @endif
            </div>
            <!-- search data -->
            <div class="row no-margin top-25">
                @include('sidebars.category')
                <div class="col l9">
                    
                    
                    
                    
                    
                    
                    <div>
                        
                        <div class="control-box">
                            <div class="views-box">
                                <div class="switch-view list-view">
                                    <i class="fa fa-bars"></i> عرض قائمة
                                </div>
                                <div class="switch-view grid-view active">
                                    <i class="fa fa-th-large"></i> عرض شبكي
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row no-margin ads-list boxed-ads">
            @if(count($postss) > 0 || count($posts) > 0 ||  count($searchResult) > 0)                
                    @if( isset($_GET['searchButton'] ) )
                    
                    @foreach($postss as $key=>$post)
                            @if($key == 2)
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                                    </div>
                                </div>
                            @endif
                                <div class="col l4">
                                    <!-- ad item -->
                                    @if($post['isColored'] == 1)
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item heigh-light">
                                    @else
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                                    @endif
                                    @if($post->isUrgent)
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    @endif
                                        <div class="image-box">
                                          @if(empty( $post->images->first()->photolink))
                                           <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                          @else
                                          <img src="{{Url($post->images->first()->photolink)}}" alt="">
                                          @endif
                                            <div class="price">{{$post->price}}
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="{{$post->title}}">{{$post->title}}</h1>
                                        <small>مدينة {{$post->city}}</small>
                                        
                                        @if($post->liked == 1)
                                            <div class="watch-icon active">
                                        @else
                                            <div class="watch-icon">
                                        @endif
                                            <input type="hidden" name="liked" class="liked" value="{{$post->liked}}">
                                            <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <div align="center">
                            {{ $postss->links() }}
                         </div>
                          @elseif(isset($_GET['search_querys'] ))
                    @foreach($searchResult as $key=>$post)
                            @if($key == 2)
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                                    </div>
                                </div>
                            @endif
                                <div class="col l4">
                                    <!-- ad item -->
                                    @if($post['isColored'] == 1)
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item heigh-light">
                                    @else
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                                    @endif
                                    @if($post->isUrgent)
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    @endif
                                        <div class="image-box">
                                          @if(empty( $post->images->first()->photolink))
                                           <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                          @else
                                          <img src="{{Url($post->images->first()->photolink)}}" alt="">
                                          @endif
                                            <div class="price">{{$post->price}}
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="{{$post->title}}">{{$post->title}}</h1>
                                        <small>مدينة {{$post->city}}</small>
                                        
                                        @if($post->liked == 1)
                                            <div class="watch-icon active">
                                        @else
                                            <div class="watch-icon">
                                        @endif
                                            <input type="hidden" name="liked" class="liked" value="{{$post->liked}}">
                                            <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            
                              <div class="clearfix"></div>
                               </div>
                               <br>
                           @if(count($searchResult) == 0)
                             <div class="row no-margin boxed-ads no-data">
                               <h2> لايوجد اعلان بهذا الاسم في هذا القسم </h2>
                             </div>
                           @endif
                       @else
                    
                            @foreach($posts as $key=>$post)
                            @if($key == 2)
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                                    </div>
                                </div>
                            @endif
                                <div class="col l4">
                                    <!-- ad item -->
                                    @if($post['isColored'] == 1)
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item heigh-light">
                                    @else
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                                    @endif
                                    @if($post->isUrgent)
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    @endif
                                        <div class="image-box">
                                            @if(\App\Post_Photos::where('post_id', $post['id'])->count())
                                             <img src="{{Url($post->img)}}" alt="">
                                            @else
                                             <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                            @endif
                                            <div class="price">{{$post->price}}
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <div class="post-data normal-only">
                                            <h1 title="{{$post['title']}}">
                                            {{$post['title']}} 
                                            </h1>
                                            <div class="info normal-only">
                                            <h3>{{$post['country']}}
                                                <small>{{$post['city']}}</small>
                                            </h3>
                                            <div class="time"> {{  strftime("%b %d %Y",strtotime($post['created_at']))}}</div>
                                        </div>
                                            <div class="price boxed-only">{{$post['price']}}
                                               @if(Session::get('lang') == 'en')
                                                 <span>R.S</span>
                                                 @else
                                                 <span>ر.س</span>
                                               @endif
                                            </div>
                                            <div class="desc" style="overflow:hidden">
                                                {{$post['description']}}
                                            </div>
                                        </div>
                                        <h1 class="boxed-only" title="{{$post->title}}">{{$post->title}}</h1>
                                        <small class="boxed-only">مدينة {{$post->city}}</small>
                                        @if($post->liked == 1)
                                            <div class="watch-icon active">
                                        @else
                                            <div class="watch-icon">
                                        @endif
                                            <input type="hidden" name="liked" class="liked" value="{{$post->liked}}">
                                            <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            <div class="clearfix"></div>
                              </div>
                             <br>
                           <div align="center">
                             {{ $posts->links() }}
                           </div>
                        @endif
                      @else
                            <div class="row no-margin boxed-ads no-data">
                               <h2>لم يتم نشر اعلانات بعد في هذا القسم</h2>
                            </div>
                     @endif
                            <div class="clearfix"></div>
                            
                            <div class="centerd top-50 bottom-50">
                            
                          <!--  @if (Session::get('lang') == 'en')
                                <a href="#!" class="butn blue">See more</a>
                                @else
                                <a href="#!" class="butn blue"> شاهد المزيد</a>
                                @endif -->
                            </div>
                        </div>
                        <div class="centerd">
                        <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">
                </div>


                @guest
                @else
                <div class="strip-head on-top">
                    @if (Session::get('lang') == 'en')
                    <div class="mini-tabs">
                        <div class="tab-button active" data-tab-btn=".m25ran">Recently seen</div>
                        <div class="tab-button" data-tab-btn=".tamany">Wish list</div>
                        <div class="tab-button" data-tab-btn=".ma7foz">Saved search</div>
                    </div>
                    @else
                    <div class="mini-tabs">
                        <div class="tab-button active" data-tab-btn=".m25ran">شوهد مؤخرا</div>
                        <div class="tab-button" data-tab-btn=".tamany">قائمة التمني</div>
                        <div class="tab-button" data-tab-btn=".ma7foz">بحث محفوظ</div>
                    </div>
                    @endif
                </div>
                <div class="tabs-body">

                    @include('includes.lastseenslider')

                    @include('includes.favoriteslider')

                    @include('includes.savedsearchslider')

                </div>
                @endguest


                <!--<div class="centerd">-->
                <!--        <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">-->
                <!--</div>-->

</div>
</div>

<div class="clearfix"></div>
</div>

</div>


</div>



@endsection