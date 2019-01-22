
@extends('layouts.app')
@section('title', '')
@section('content')
<!-- Home -->
<div class="home-screen">
  <div class="screen" style="background-image:url('{{ asset('front-assets/images/slider-home.jpg')}}')" >
    <h1 class="no-margin">
        @if (Session::get('lang') == 'en')
         .... Everything you want and much more 
      <small> Just on gulf Roots</small>
      @else
      كل ما تريدة واكثر بكثير .... 
      
      <small>  فقط علي قلف روتس</small>
    </h1>
    @endif
  </div>
</div>
<div class="home-body">
  <div class="big-container">
      @include('includes.searchbar')

      <!-- home tabs -->
      <div class="home-tabs">
          <div class="row no-margin">
           @if (Session::get('lang') == 'en')
            <div class="home-tab col l3 active" data-tab-target=".new-ads">
               Latest Ads
            </div>
            <div class="home-tab col l3" data-tab-target=".prev-ads">
                Previous views
            </div>
            <div class="home-tab col l3" data-tab-target=".watch-ads">
               Wish List
            </div>
            <div class="home-tab col l3" data-tab-target=".search-ads">
                Previous searches
            </div>
            @else
            <div class="home-tab col l3 active" data-tab-target=".new-ads">
                أحدث الاعلانات
            </div>
            <div class="home-tab col l3" data-tab-target=".prev-ads">
                مشاهدات سابقة
            </div>
            <div class="home-tab col l3" data-tab-target=".watch-ads">
                قائمة الرغبات
            </div>
            <div class="home-tab col l3" data-tab-target=".search-ads">
                عمليات بحث سابقة
            </div>
            @endif

          </div>
      </div>


      <!-- home tabs screens -->
      
      
      <div class="home-tabs-screens">
        <!-- new ads tab -->
        <div class="home-tab-screen new-ads  active">
            <div  class="row no-margin boxed-ads">
                            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <!--@php $postss = \App\Posts::where('isApproved',1)->paginate(14); @endphp-->
                @foreach($posts as $key=> $post)
                
                        @if($key == 3)
                                <div class="col l3">
                                    <div class="google-ads">
                                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                                    </div>
                                </div>
                            @endif
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
                                <div class="watch-icon active" >
                            @else
                                <div class="watch-icon" >
                            @endif
                                <input type="hidden" name="liked" class="liked" value="{{$post->liked}}">
                                <input type="hidden" name="post_id" class="post_id" value="{{$post->id}}">
                                 
                                   <i class="fa fa-star"></i>
                                
                            </div>
                        </a>
                        
                    </div>
                @endforeach
               </table>
               <div align="center">
               <!--{{ $posts->links() }}-->
               </div>
               </div>
               <!--<div class="centerd">-->
               <!--         <br>-->
               <!--         <a href="#!" class="butn blue">شاهد المزيد</a>-->
               <!--     </div>-->
                   <center>
                    <button type="button" class="butn blue" id="loadMore">شاهد المزيد</button>
                </center>
            </div>
        </div>
        <!-- prev ads tab -->
        <div class="home-tab-screen prev-ads">
                <div class="row no-margin boxed-ads">
                @if(count($lastseen) > 0)
                    @foreach($lastseen as $post)
                        <div class="col l3">
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
                                    <img src="{{$post['img']}}" alt="">
                                    <div class="price">{{$post['price']}}
                                        <span>ر.س</span>
                                    </div>
                                </div>
                                <h1 title="{{$post['title']}}">{{$post['title']}}</h1>
                                <small>مدينة {{$post['city']}}</small>
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
                        </div>
                    @endforeach
                @else
                <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد مشاهدات سابقة</h2>
                    <h4>ابدأ بالتصفح اﻵن</h4>

                    </div>
                    <div class="clearfix"></div>
                @endif
                </div>
        </div>

        <!-- watch ads tab -->
        <div class="home-tab-screen watch-ads">
            @guest
                <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد قائمة رغبات</h2>
                    <h4>ابدأ بالتسجيل واضافة منتجات لتظهر في القائمة</h4>

                </div>
                <div class="clearfix"></div>
            @else
                <div class="row no-margin boxed-ads">
                @if(count($favorites) > 0)
                    @foreach($favorites as $post)
                        <div class="col l3">
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
                                    <img src="{{$post['img']}}" alt="">
                                    <div class="price">{{$post['price']}}
                                        <span>ر.س</span>
                                    </div>
                                </div>
                                <h1 title="{{$post['title']}}">{{$post['title']}}</h1>
                                <small>مدينة {{$post['city']}}</small>
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
                        </div>
                    @endforeach
                @else
                    <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد قائمة رغبات</h2>

                    </div>
                    <div class="clearfix"></div>
                @endif
                </div>
            @endguest
        </div>

        <!-- search ads tab -->
        <div class="home-tab-screen search-ads">

            <div class="row no-margin boxed-ads no-data">

                <h2>لاتوجد عمليات بحث سابقة</h2>
                <h4>ابدأ باضافه عمليات البحث السابقه من خلال اختيار كلمة البحث والضغط علي مفتاح إبحث.</h4>

            </div>

        </div>


        <!-- <div class="centerd top-50">
                <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">
        </div> -->

      </div>


  </div>

</div>
<div class="top-cats">

    <div class="big-container">

        <div class="top-head centerd">
            @if (Session::get('lang') == 'en')
            <h2>Featured Sections</h2>
            <h5>Browse through the most popular and popular sections</h5>
            
        </div>

        <div class="row no-margin bottom-50">

             <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/1}}"><img src="{{ asset('front-assets/images/cat1.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/193}}"><img src="{{ asset('front-assets/images/cat2.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/123}}"><img src="{{ asset('front-assets/images/cat3.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/272}}"><img src="{{ asset('front-assets/images/cat4.jpg')}}" alt=""></a>
            </div>

            <div class="clearfix"></div>
            @else
            
            <h2>الأقسام المميزة</h2>
            <h5>تصفح من خلال الاقسام المميزة والاكثر شعبية</h5>
        </div>

        <div class="row no-margin bottom-50">

            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/1}}"><img src="{{ asset('front-assets/images/cat1.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/193}}"><img src="{{ asset('front-assets/images/cat2.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/123}}"><img src="{{ asset('front-assets/images/cat3.jpg')}}" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="{{Url('/')}}/categories/272}}"><img src="{{ asset('front-assets/images/cat4.jpg')}}" alt=""></a>
            </div>

            <div class="clearfix"></div>
        @endif
        </div>

    </div>

</div>
    <div class="spical-cats white-bg">
        <div class="big-container">
        @include('includes.specialcategories')
        </div>
    </div>

      <!-- home slider -->
      <div class="home-slider">
            <div class="swiper-container" dir="rtl">
                <div class="swiper-wrapper">
                   @if (Session::get('lang') == 'en')
                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>Buy and sell safely</h2>
                                    <h5>
                                       You can purchase and sell with all confidentiality and safety
 We provide high security and protection of data, transactions and privacy to the seller and buyer at the same time<br>
                                        
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="{{ asset('front-assets/images/home-slider.jpg')}}" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->

                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>Buy and sell safely</h2>
                                    <h5>
                                       You can purchase and sell with all confidentiality and safety
 We provide high security and protection of data, transactions and privacy to the seller and buyer at the same time<br>
                                        
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="{{ asset('front-assets/images/home-slider.jpg')}}" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->
                    
                    @else
                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>الشراء والبيع بكل امان</h2>
                                    <h5>
                                        يمكنك مع قلف روتس الشراء والبيع بكل سرية وامان<br>
                                        نوفر وسائل عالية من الامان والحماية للبيانات والتعاملات والخصوصية للبائع
                                        والمشتري في وقت واحد
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="{{ asset('front-assets/images/home-slider.jpg')}}" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->

                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>الشراء والبيع بكل امان</h2>
                                    <h5>
                                        يمكنك مع قلف روتس الشراء والبيع بكل سرية وامان<br>
                                        نوفر وسائل عالية من الامان والحماية للبيانات والتعاملات والخصوصية للبائع
                                        والمشتري في وقت واحد
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="{{ asset('front-assets/images/home-slider.jpg')}}" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->
                @endif

                </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
            </div>
      </div>
      
<script type="text/javascript">
var page = 1;

$(document).on("click","#loadMore",function() {
   page=page+1;
   loadMoreData(page);
});

function loadMoreData(page){
    var url = "{{url('/?page=')}}"+page;
    $.get(url,function(data){
        if(data.html == ''){
            $('#loadMore').hide();
        }
        console.log(data.html);
$('.box-body').append(data.html);
    })
}

$(document).on("change","#search_query", function(){
    if($('#search_query').val() = '') {
      alert('يجب ان تكون قيمة الاحد الادني اقل من الحد الاقصي.');
    }
});


</script>
      
@endsection
