@extends('layouts.user') 
@section('content')
    <!-- normal body -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style>
.popup-box {
    position:static;
}
    .pop-over {
    position: fixed;
    width: 100%;
    height: 100%;
    display: block;
    background: #000;
    top: 0;
    left: 0;
    z-index: 999;
    opacity: .5;
}
.pop-wrap {
    background: #fff;
    position: fixed;
    width: 90%;
    left: 50%;
    transform: translate(-50%,-50%);
    top: 50%;
    max-width: 500px;
    z-index: 999;
    text-align: center;
    border-radius: 10px;
    padding: 40px;
}
.ok {
    cursor:pointer;
}
a.social-share {
    display: inline-block;
    background: #048bfb;
    padding: 5px 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}
</style>
    <div class="normal-body">
       
        <div class="big-container">

            @include('includes.searchbar')

            @include('includes.specialcategories')
            <!-- link map -->
             @if (Session::get('lang') == 'en')
            <div class="link-map">
                <div class="map-item"><a href="{{ route ('landing')}}">Home</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_en']}}</a></div>
                @endforeach
                <div class="map-item">{{$post['title']}}</div>
                <div class="map-item"> Ad number : {{$post['id']}}</di
            </div>
            @else
            <div class="link-map">
                <div class="map-item"><a href="{{ route ('landing')}}">الرئيسية</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_ar']}}</a></div>
                @endforeach
                <div class="map-item">{{$post['title']}}</div>
              
                <div class="map-item"> رقم الاعلان : {{$post['id']}}</div>
            </div>
            @endif
           
              
            <!-- search data -->
            <div class="row no-margin top-25">
              @if(Session::has('message'))
                   <div class="{{ Session::get('alert-class', 'popup-box') }}">
                       <div class="pop-over"></div>
                       <div class="pop-wrap">
                           <p>{{ Session::get('message') }}</p>
                           <div class="ok butn blue">اغلاق</div>
                       </div>
                   </div>  
                   @endif
                <div class="col l9">
                   
                    <div class="single-box">
                        @if($post['liked'] == 1)
                            <div class="watch-icon active">
                        @else
                            <div class="watch-icon">
                        @endif
                            <input type="hidden" name="liked" class="liked" value="{{$post['liked']}}">
                            <input type="hidden" name="post_id" class="post_id" value="{{$post['id']}}">
                            <i class="fa fa-star"></i>
                        </div>
                        @if (Session::get('lang') == 'en')
                        <h1>{{$post['short']}}</h1>
                        <h3> {{$post['price']}} <span>Real</span></h3>
                        @else
                        <h1>{{$post['short']}}</h1>
                        <h3> {{$post['price']}} <span>ريال</span></h3>
                        @endif
                        <div class="row no-margin borderd">
                            <div class="col l6">
                                @if (Session::get('lang') == 'en')
                                <i class="fa fa-map-marker"></i>
                                {{$post['address']}} | <span dir="ltr">Watch {{Counter::showAndCount('posts', $post['id'])}} </span>
                                @else
                                <i class="fa fa-map-marker"></i>
                                {{$post['address']}} | <span dir="ltr">مشاهدة {{Counter::showAndCount('posts', $post['id'])}} </span>
                                @endif
                            </div>
                            <div class="col l6 lefted">
                                @if (Session::get('lang') == 'en')
                                 @if(Auth::user())
                                  <a href="{{Url('newad') .'/'. $post['category_id']}}">
                                    <i class="fa fa-plus crcl"></i> Add your ad
                                  </a>
                                 @else
                                  <a href="{{ route('login') }}">
                                    <i class="fa fa-plus crcl"></i> Add your ad
                                  </a>
                                 @endif
                                @else
                                 @if(Auth::user())
                                   <a href="{{Url('newad') .'/'. $post['category_id']}}">
                                    <i class="fa fa-plus crcl"></i> اضف اعلان مشابة
                                </a>
                                 @else
                                   <a href="{{ route('login') }}">
                                    <i class="fa fa-plus crcl"></i> اضف اعلان مشابة
                                   </a>
                                 @endif
                                @endif
                                |
                                @if (Session::get('lang') == 'en')
                                <a href="#!" class="modal-open" data-modal-open=".share-now">
                                    <i class="fa fa-share crcl"></i> sharing
                                </a>
                                @else
                               <a href="#!" class="modal-open" data-modal-open=".share-now">
                                    <i class="fa fa-share crcl"></i> مشاركة
                                </a>
                                @endif
                                |
                                @if (Session::get('lang') == 'en')
                                <a href="#!" class="show-drop">
                                    <i class="fa fa-ban"></i>Report responsible announcement

                                </a>
                                @else
                                <a href="#!" class="show-drop">
                                    <i class="fa fa-ban"></i> ابلغ عن اعلان مسئ
                                </a>
                                @endif
                                <div class="report-box my-drop">
                                     @if (Session::get('lang') == 'en')
                                    <form method="POST" action="{{Url('report/'.$post['id'])}}">
                                        {{csrf_field()}}
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="1"><span></span> Duplicate Advertisement
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="2"><span></span> False announcement
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="3"><span></span> Wrong classification
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="4"><span></span> unavailable
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="5"><span></span> Advertiser does not deriveيب
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="6"><span></span> Other
                                        </label>
                                        <input type="submit" value="Report">
                                    </form>
                                    @else
                                    <form method="POST" action="{{Url('report/'.$post['id'])}}">
                                        {{csrf_field()}}
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="1"><span></span> اعلان مكرر
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="2"><span></span> اعلان زائف
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="3"><span></span> تصنيف خاطئ
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="4"><span></span> غير متاحة
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="5"><span></span> المعلن لا يستجيب
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="6"><span></span> اخري
                                        </label>
                                        <input type="submit" value="تبليغ">
                                    </form>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                @foreach($post_photos as $photo)
                                    <div class="swiper-slide" style="background-image:url('{{asset($photo->photolink) }}')"></div>
                                @endforeach
                            </div>

                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                            @foreach($post_photos as $photo)
                                <div class="swiper-slide" style="background-image:url('{{ asset($photo->photolink) }}')"></div>
                            @endforeach
                            </div>
                        </div>

                    </div>


                    <div class="centerd top-25 bottom-25">
                        <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">
                    </div>

                    <div class="product-info">

                        <div class="row no-margin">
                            <div class="col l7">
                                @if (Session::get('lang') == 'en')
                                <h2>Product Description</h2>
                                <p>
                                  {{$post['description']}}
                                </p>
                                    {{--<p>--}}
                                    {{--@foreach($post['search_sentence'] as $key=>$value)--}}
                                    {{--@if($key != 'Advertising Type')--}}
                                    {{--{{$key}} : {{$value}} <br>--}}
                                    {{--@endif--}}
                                    {{--@endforeach--}}
                                    {{--</p>--}}
                                    @else
                                    <h2>وصف المنتج</h2>
                                <p>
                                  {{$post['description']}}
                                </p>
                                    {{--<p>--}}
                                    {{--@foreach($post['search_sentence'] as $key=>$value)--}}
                                    {{--@if($key != 'نوع الاعلان')--}}
                                    {{--{{$key}} : {{$value}} <br>--}}
                                    {{--@endif--}}
                                    {{--@endforeach--}}
                                    {{--</p>--}}
                                    @endif
                            </div>
                            <div class="col l5">
                                <div class="product-det">
                                    @if (Session::get('lang') == 'en')
                                    <div>
                                        Date of announcement
                                        <span>{{  strftime("%b %d %Y",strtotime($post['created_at']))}}</span>
                                    </div>
                                    <div>
                                        Modified date
                                        <span>{{  strftime("%b %d %Y",strtotime($post['updated_at']))}}</span>
                                    </div>
                                    <div>
                                       Case
                                        <span>{{$post['status']}}</span>
                                    </div>
                                    @else
                                    <div>
                                        تاريخ الاعلان
                                        <span>{{  strftime("%b %d %Y",strtotime($post['created_at']))}}</span>
                                    </div>
                                    <div>
                                        تاريخ التعديل
                                        <span>{{  strftime("%b %d %Y",strtotime($post['updated_at']))}}</span>
                                    </div>
                                    <div>
                                        الحالة
                                        <span>{{$post['status']}}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    @if(count($latest) > 1)
                    @if (Session::get('lang') == 'en')
                    <div class="strip-head blue on-top">Latest ads for this seller</div>
                    @else
                     <div class="strip-head blue on-top">احدث الاعلانات لهذا البائع</div>
                     @endif

                    <div class="row no-margin ads-list">
                        @foreach($latest as $listing)
                            @if($listing->id != $post['id'])
                                <div class="col l4">
                                    <!-- ad item -->
                                    <a href="{{Url('posts').'/'.$listing->id}}" class="ad-item">
                                        <div class="image-box">
                                            @if(\App\Post_Photos::where('post_id', $listing['id'])->count())
                                <img src="{{Url(\App\Post_Photos::where('post_id', $listing['id'])->first()->photolink)}}" alt="">
                                @else
                                <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                @endif
                                            <div class="price boxed-only">{{$listing->price}}
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="{{$listing->title}}" class="boxed-only">{{$listing->title}}</h1>
                                        <div class="post-data normal-only">
                                            <h1 title="{{$listing->title}}">{{$listing->title}}</h1>
                                            <div class="price">{{$listing->price}}
                                                <span>ر.س</span>
                                            </div>
                                            <div class="desc">
                                                {{$listing->description}}
                                            </div>
                                        </div>
                                        <small class="boxed-only">{{$listing->city}}</small>
                                        <div class="info normal-only">
                                            <h3>{{$listing->country}}
                                                <small>{{$listing->city}}</small>
                                            </h3>
                                            <div class="time">{{  strftime("%b %d %Y",strtotime($listing->created_at))}}</div>
                                        </div>
                                        @if($listing->liked == 1)
                                            <div class="watch-icon active">
                                        @else
                                            <div class="watch-icon">
                                        @endif
                                            <input type="hidden" name="liked" class="liked" value="{{$listing->liked}}">
                                            <input type="hidden" name="post_id" class="post_id" value="{{$listing->id}}">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                </div>
                            @endif    
                        @endforeach
                    </div>
                    @endif
                    
                    <!--Ads 1-->
                    
                    <div class="centerd">
                        <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">
                    </div>
                    
                    @if(count($alike) > 0)
                     @if (Session::get('lang') == 'en')
                    <div class="strip-head on-top">Similar ads</div>
                    @else
                    <div class="strip-head on-top">اعلانات متشابهه</div>
                    @endif
                    
                    <div class="row no-margin ads-list">
                        @foreach($alike as $listing)
                            <div class="col l4">
                                <!-- ad item -->
                                <a href="{{Url('posts').'/'.$listing->id}}" class="ad-item">
                                    <div class="image-box">
                                        <img src="{{asset($listing->img)}}" alt="">
                                        <div class="price boxed-only">{{$listing->price}}
                                            <span>ر.س</span>
                                        </div>
                                    </div>
                                    <h1 title="{{$listing->title}}" class="boxed-only">{{$listing->title}}</h1>
                                    <div class="post-data normal-only">
                                        <h1 title="{{$listing->title}}">{{$listing->title}}</h1>
                                        <div class="price">{{$listing->price}}
                                            <span>ر.س</span>
                                        </div>
                                        <div class="desc">
                                            {{$listing->description}}
                                        </div>
                                    </div>
                                    <small class="boxed-only">{{$listing->city}}</small>
                                    <div class="info normal-only">
                                        <h3>{{$listing->country}}
                                            <small>{{$listing->city}}</small>
                                        </h3>
                                        <div class="time">{{  strftime("%b %d %Y",strtotime($listing->created_at))}}</div>
                                    </div>
                                    @if($listing->liked == 1)
                                        <div class="watch-icon active">
                                    @else
                                        <div class="watch-icon">
                                    @endif
                                        <input type="hidden" name="liked" class="liked" value="{{$listing->liked}}">
                                        <input type="hidden" name="post_id" class="post_id" value="{{$listing->id}}">
                                        <i class="fa fa-star"></i>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @endif
                   

                  @if(Auth::user())
                    <div class="strip-head on-top">
                        @if (Session::get('lang') == 'en')
                        <div class="mini-tabs">
                            <div class="tab-button active" data-tab-btn=".m25ran">Recently Viewed</div>
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
                  @endif
                
                <!--Ads 2-->
                    <div class="centerd">
                        <img src="{{ asset('front-assets/images/width-ads.jpg')}}" alt="">
                    </div>

                </div>

                <div class="col l3">

                    <div class="user-side">
                        <div class="user-info-box">
                       @if( $seller->profile_picture != null)
                            <img src="{{asset('imagesProfile/'.$seller->profile_picture)}}" alt="">
                        @else
                         <img src="{{ asset('front-assets/images/user.jpg')}}" alt="">
                       @endif
                            <div class="user-data">
                                <a href="{{Url('user/'.$seller->id)}}">{{ $seller->name }}</a>
                                <span>{{  strftime("%b %d %Y",strtotime($seller->created_at)) }}</span>
                                
                                 <!--<div class="on">متصل الان</div> -->
                            </div>
                        </div>
                        @if(Auth::check())
                        <a href="{{url('conv')}}/{{$seller->id}}" data-modal-open=".direct-messege" class="modal-open openUserConv" style="color: #fff;">
                            <div class="send-masseg mt-25 the-btn blue">
                             @if (Session::get('lang') == 'en')
                             send a message
                             @else
                            ارسل رسالة
                            @endif
                            </div>
                        </a>
                        @endif
                        <div class="my-modal normal-messege">
                        <div class="closer"></div>
                        <div class="my-modal-body">
                            @if (Session::get('lang') == 'en')
                            <h1 class="no-margin nb">Send a message to me : </h1>
                            @else
                            <h1 class="no-margin nb">ارسل رسالة الي : </h1>
                            @endif
                            <form class="frmSendMessge" role="form" method="POST" action="{{ action('MessagesController@SendMessage') }}">
                              {!! csrf_field() !!}
                              @if (Session::get('lang') == 'en')
                              <input type="text" placeholder="Title">
                              <textarea name="message-data" id="message-data" class="send-massege" placeholder="Enter"></textarea>
                              <input type="hidden" name="_id" value="{{$seller->id}}">
                              <button class="send-btn" type="submit">Send</button>
                              @else
                              <input type="text" placeholder="عنوان الرساله">
                              <textarea name="message-data" id="message-data" class="send-massege" placeholder="اكتب رسالتك"></textarea>
                              <input type="hidden" name="_id" value="{{$seller->id}}">
                              <button class="send-btn" type="submit" class="redirect-register">ارسال</button>
                              @endif
                            </form>
                        </div>
                        </div>

                       @if (Session::get('lang') == 'en')
                        <a href="http://api.whatsapp.com/send?phone={{$seller->whatsapp_number}}" target="_blank" class="whats mt-15 the-btn gray">Continue through Watts</a>
                        <a href="http://api.whatsapp.com/send?phone={{$seller->whatsapp_number}}" target="_blank" class="whats mt-15 the-btn gray" style="background: #1ec10c;">Continue through Watts</a>
                        @else
                          @if($seller->whatsapp_number == null)
                        <a href="" class="whats mt-15 the-btn gray">تواصل خلال واتس اب</a>
                          @else
                        <a href="http://api.whatsapp.com/send?phone={{$seller->whatsapp_number}}" target="_blank" class="whats mt-15 the-btn gray" style="background: #1ec10c;">تواصل خلال واتس اب</a>
                          @endif
                        @endif

                        <div class="borderd mt-15 show-num">
                            @if (Session::get('lang') == 'en')
                            Show number
                            @else
                            اظهر الرقم
                            @endif
                            <span>
                                
                            {{substr($seller->whatsapp_number, 0, 3)}}******
                            </span>
                            <span>
                                {{$seller->whatsapp_number}}
                            </span>
                        </div>


                        <div class="borderd">
                            
                                @if (Session::get('lang') == 'en')
                                <h3 class="centerd">are you busy?
                                    <small>Leave your data and we will contact you again</small>
                                </h3>
                                <input placeholder="Name" type="text">
                                <input placeholder="Phone" type="text">
                                <textarea placeholder="Notes"></textarea>
                                <input type="submit" value="Send">
                                @else
                                <h3 class="centerd">هل انت مشغول؟
                                    <small>اترك بياناتك وسوف نعاود الاتصال بك</small>
                                </h3>
                                <form method="post" action="{{Url('/send')}}" accept-charset="UTF-8">
                                     {{ csrf_field() }}
                                     
                                    <div>
                                     <input name="sender_name" placeholder="الاسم" type="text" required>
                                     @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                     <input name="sender_phone" placeholder="رقم الجوال" type="text" required>
                                     @if ($errors->has('sender_phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sender_phone') }}</strong>
                                    </span>
                                @endif
                                     <textarea name="messages" required placeholder="ملاحظات"></textarea> 
                                     <input name="sender_id" type="hidden" value="{{$userAuth['id']}}" > 
                                     <input name ="sentTo_id" type="hidden" value="{{$post['user_id']}}" >
                                     
                                <input type="submit" value="ارسال">
                                </form>
                                @endif
                           
                        </div>

                        <div class="borderd ebay">
                            
                            @if (Session::get('lang') == 'en')
                              @if($seller->type == 1 || $seller->type == 2)
                                 <a href="{{$seller->getCommerical->maaroof_url}}" class="map-opener modal-open" data-modal-open=".location">
                                   <i class="fa fa-map-marker"></i> Link the merchant</a>
                              @else
                                 <a href="{{$seller->getCommerical->maaroof_url}}" class="map-opener modal-open" data-modal-open=".location">
                                   <i class="fa fa-map-marker"></i> There is no website link for the merchant</a>
                              @endif
                            @else
                              @if($seller->type == 1 || $seller->type == 2)
                                <a href="{{$seller->getCommerical->maaroof_url}}" class="map-opener modal-open" data-modal-open=".location">
                                <i class="fa fa-map-marker"></i> رابط موع التاجر  <a>
                              @else
                               
                              @endif
                            @endif
                            
                 
                            @if (Session::get('lang') == 'en')
                            <div class="centerd bolded nc top-25">
                              Make a presentation
                                <div class="input-ebay mt-15">
                                    <form>
                                        <input type="text" placeholder="0">
                                        <button type="submit">Push</button>
                                    </form>
                                </div>

                            </div>
                            @else
                            <div class="centerd bolded nc top-25">
                                قم بتقديم سعر
                                <div class="input-ebay mt-15">
                                    <form>
                                        <input type="text" placeholder="0">
                                        <button type="submit">ادفع</button>
                                    </form>
                                </div>

                            </div>
                            @endif
                        </div>
                        @if (Session::get('lang') == 'en')
                        <div class="mt-15">
                            <div class="bolded nb">times of work</div>
                            <div class="nc">
                            @if($seller->type == 1 || $seller->type == 2)
                              {{$seller->getCommerical->contact_number}}
                            @else
                             
                            @endif
                            </div>
                        </div>
                        @else
                        <div class="mt-15">
                            @if($seller->type == 1 || $seller->type == 2)
                            <div class="bolded nb">مواعيد العمل</div>
                            <div class="nc">
                              {{$seller->getCommerical->contact_number}}
                            @else
                             
                            @endif
                            </div>
                        </div>
                        @endif

                    </div>
                 <!--@if (Auth::check())-->
                 <!--   @if (Session::get('lang') == 'en')-->
                 <!--   <a href="#!" class="modal-open direct mt-15 the-btn orang mb-15" data-modal-open=".direct-messege">Speak directly</a>-->
                 <!--       @else-->
                 <!--        <a href="#!" class="modal-open direct mt-15 the-btn orang mb-15" data-modal-open=".direct-messege">التحدث-->
                 <!--       المباشر</a>-->
                 <!--       @endif-->
                 <!--@endif-->
                    <div class="google-ads">
                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                    </div>

                    <div class="google-ads">
                        <img src="{{ asset('front-assets/images/ads.png')}}" alt="">
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>

        </div>


    </div>
    
    
    
    <div class="my-modal share-now">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb">شاركها مع اصدقائك</h1>
                    
                    <a class="social-share facebook"><i class="fa fa-facebook"></i> facebook</a>
                    <a class="social-share twitter"><i class="fa fa-twitter"></i> twitter </a>
                    <a class="social-share google"><i class="fa fa-google"></i> Google+ </a>
               
               
               
                </div>
            </div>
            
              <div class="my-modal other">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb">اكتب سبب الابلاغ عن الاعلان</h1>
                    
                    
                    <textarea placeholder="سبب البلاغ ..." style="outline: none;
    background: #fff;
    border: #aaa 1px solid;
    box-shadow: none;
    border-radius: 5px;
    min-height: 100px;
    padding: 5px;"></textarea>
                    <button style="    outline: none;
    border: none;
    background: #048bfb;
    color: #fff;
    font-weight: 900;
    padding: 10px 25px;
    border-radius: 5px;">تبليغ</button>
               
               
                </div>
            </div>
            
            <div class="my-modal goreg">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb" style="text-align:center">لتتمكن من ارسال رساله الي المعلن عليك تسجيل حساب جديد</h1>
                    
                    <br><br><br>
                    
                    <div style="text-align:center">
                    <a href="#!" class="butn blue">سجل الان</a>
                    <a href="#!" class="closer butn grey" style="position: relative;
    top: auto;
    right: auto;
    width: auto;
    height: auto;
    background-image: none;
    color: #fff;
">اغلاق</a>
</div>
                    
              
                </div>
            </div>
            
            <a href="#!" class="modal-open" id="other" data-modal-open=".other" style="display:none"></a>
            <a href="#!" class="modal-open" id="goreg" data-modal-open=".goreg" style="display:none"></a>
            
            
            

    
@endsection
