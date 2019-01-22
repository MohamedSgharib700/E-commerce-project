@extends('layouts.app')
@section('title', ' - ' . $category->name)
@section('content')
    @if($category->sub_id == null)
    <div class="cat-banner" style="background-image:url('{{ asset($category->photo)}}')">
       <!-- <h1>{{$category->name}}</h1> -->
    </div>
    @endif
    <!-- normal body -->
    <div class="normal-body">
        <div class="big-container">
            @include('includes.searchbar')
            @include('includes.specialcategories')
            <!-- link map -->
            @if (Session::get('lang') == 'en')
            <div class="link-map">
                <div class="map-item"><a href="{{route('landing')}}">Home</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_en']}}</a></div>
                @endforeach
            </div>
            @else
            <div class="link-map">
                <div class="map-item"><a href="{{route('landing')}}">الرئيسية</a></div>
                @foreach($parents as $cat)
                    <div class="map-item"><a href="{{ Url('categories/'.$cat['id']) }}">{{$cat['name_ar']}}</a></div>
                @endforeach
            </div>
            @endif
            <!-- search data -->
            <div class="row no-margin top-25">

                <div class="col l9">

                    <!-- top search -->
                    <div class="top-cat-search">
                        
                        @if (Session::get('lang') == 'en')
                        <div class="row no-margin">
                        <form method="GET" class="search" action="{{Url('search')}}" id="form2">
                            {{csrf_field()}}
                        <input type="hidden" class="applied-filters" name="applied_filters" value="{{$applied_ret or ''}}">
                        <input type="hidden" name="search_city" value="">
                        <input type="hidden" name="sort" value="">
                        <input id="cat-id" type="text" name="cat-id" value="1" hidden>   
                            <div class="col l6 m12">
                                <input type="text" placeholder="Maximum price" name="maxi_price" value="{{$request['maxi-price'] or ''}}" id="maxi">
                            </div>
                            <div class="col l6 m12">
                                <input type="text" placeholder="Minimum price" name="mini_price" value="{{$request['mini-price'] or ''}}" id="mini">
                            </div>
                            <?php $arr = $filters['type']?>
                            @foreach($filters as $key=>$filter)
                            
                                @if($loop->index > 0 && $loop->index < 7 && $key != "type" && $arr[$key] == 1)
                                <div class="col l6 m12">
                                    <select name="filters[{{$key}}]">
                                        <option>{{$key}}</option>
                                        <?php dd($filter); ?>
                                        @foreach($filter as $val)
                                            @if($key == 'الماركة')
                                                <option data-catid="{{$val['id']}}" value="{{$val['name']}}">{{$val['name']}}</option>
                                            @elseif($key == 'الموديل')
                                                <option data-parent="{{$val['parent_id']}}" value="{{$val['name']}}">{{$val['name']}}</option>
                                            @else
                                                <option value="{{$val['name']}}">{{$val['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            @endforeach
                            <div class="col l6 m12">
                                <input type="text" placeholder="Word Search..." name="search_query">
                            </div>
                            
                            <div class="col l12 m12 lefted">
                                <!-- <a href="#!">بحث متقدم</a> -->
                                <input type="submit" value="Search">
                            </div>
                        </form>

                        </div>
                        @else
                        
                        <div class="row no-margin">
                        <form method="GET" class="search" action="{{Url('search')}}" id="form2">
                            {{csrf_field()}}
                            <input type="hidden" name="searchcar" value="1">
                        <input type="hidden" class="applied-filters" name="applied_filters" value="{{$applied_ret or ''}}">
                        <input type="hidden" name="search_city" value="">
                        <input type="hidden" name="sort" value="">
                        <input id="cat-id" type="text" name="cat-id" value="1" hidden>  
                        
                        <?php 
                                $arr = $filters['type'];
                                $namesArr = ['city','License','Brand','Model','production'];
                                $num = 0;
                            ?>
                        
                         @foreach($filters as $key=>$filter)
                            
                                @if($loop->index > 0 && $loop->index < 7 && $key != "type" && $arr[$key] == 1)
                                <div class="col l6 m12">
                                    <select name="{{$namesArr[$num++]}}">
                                        <option value="">{{$key}}</option>    
                                        @foreach($filter as $val)
                                            @if($key == 'الماركة')
                                                <option data-catid="{{$val['id']}}" value="{{$val['name']}}">{{$val['name']}}</option>
                                            @elseif($key == 'الموديل')
                                                <option data-parent="{{$val['parent_id']}}" value="{{$val['name']}}">{{$val['name']}}</option>
                                            @else
                                                <option value="{{$val['name']}}">{{$val['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            @endforeach
                            <div class="col l6 m12">
                                <input type="text" placeholder="السعر الاعلي" name="maxi_price" value="{{$request['maxi-price'] or ''}}" id="maxi">
                            </div>
                            <div class="col l6 m12">
                                <input type="text" placeholder="السعر الادني" name="mini_price" value="{{$request['mini-price'] or ''}}" id="mini">
                            </div>
                            
                           
                            <div class="col l6 m12">
                                <input type="text" placeholder="كلمة البحث..." name="search_query">
                            </div>
                            
                            <div class="col l12 m12 lefted">
                                <!-- <a href="#!">بحث متقدم</a> -->
                                <input type="submit" id="searchButton" value="إبحث">
                            </div>
                        </form>

                        </div>
                      @endif
                    </div>


                    <div class="centerd">
                            <img src="assets/images/width-ads.jpg" alt="">
                    </div>
                    
                    <br>

                    <div>
                        
                        @if (Session::get('lang') == 'en')
                        <div class="row no-margin boxed-ads">
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
                                    @if($post->isColored)
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item heigh-light">
                                    @else
                                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                                    @endif
                                    @if($post->isUrgent)
                                        <div class="important"><span></span><div>Urgent</div></div>
                                    @endif
                                        <div class="image-box">
                                            @if(\App\Post_Photos::where('post_id', $post['id'])->count())
                                             <img src="{{Url($post->img)}}" alt="">
                                            @else
                                             <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                            @endif
                                            <div class="price">{{$post->price}}
                                                <span>R.s</span>
                                            </div>
                                        </div>
                                        <h1 title="{{$post->short_des}}">{{$post->short_des}}</h1>
                                        <small>City {{$post->city}}</small>
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
                        <div class="centerd">
                                <img src="assets/images/width-ads.jpg" alt="">
                        </div>


                                              
                    </div>
                    
                    @else
                    <div class="row no-margin boxed-ads">
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
                                            <img src="{{Url($post->img)}}" alt="">
                                         @else
                                            <img src="{{ asset('front-assets/images/placeholder.png')}}" alt="">
                                         @endif
                                            <div class="price">{{$post->price}}
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="{{$post->short_des}}">{{$post->short}}</h1>
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
                            {{ $posts->links() }}
                         </div>
                        <div class="centerd">
                                <img src="assets/images/width-ads.jpg" alt="">
                        </div>


                                              
                    </div>
                    @endif
                    
                </div>



               @if (Session::get('lang') == 'en')  
                <div class="col l3">

                    <!-- cars side -->

                    <!-- side ad -->
                    <div class="google-ads">
                            <img src="assets/images/ads.png" alt="">
                    </div>

                    <!-- side links -->
                @if(Auth::user())
                    <a class="side-link blue" href="{{Url('newad/1')}}">
                       Are you an individual?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                      </br>
                    <a class="side-link orang" href="{{Url('newad/1')}}">
                        Are you a company?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                @else
                    <a class="side-link blue" href="{{route('login')}}">
                       Are you an individual?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                      </br>
                    <a class="side-link orang" href="{{route('login')}}">
                        Are you a company?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                @endif
                    <!-- search side -->
                <!--    <div class="side-search-box">-->
                <!--        <form method="GET" action="{{Url('search')}}">-->
                <!--        <input type="hidden" class="applied-filters" name="applied_filters" value="{{$applied_ret or ''}}">-->
                <!--        <input type="hidden" name="search_city" value="">-->
                <!--        <input type="hidden" name="search_query" value="">-->
                <!--        <input type="hidden" name="cat-id" value="1">-->
                <!--        <input type="hidden" name="sort" value="">-->
                <!--        <input type="hidden" placeholder="Maximum price" name="maxi_price" value="{{$request['maxi-price'] or ''}}">-->
                <!--        <input type="hidden" placeholder="Minimum price" name="mini_price" value="{{$request['mini-price'] or ''}}">-->
                <!--        <p>Browse products</p>-->
                <!--        <small>Product Browse Filter</small>-->
                <!--            <?php $arr = $filters['type']?>-->
                <!--            @foreach($filters as $key=>$filter)-->
                <!--                @if($loop->index > 0 && $loop->index < 6 && $key != "type" && $arr[$key] == 1)-->
                <!--                    <select name="filters[{{$key}}]">-->
                <!--                        <option>{{$key}}</option>    -->
                <!--                        @foreach($filter as $val)-->
                <!--                            <option value="{{$val['name']}}">{{$val['name']}}</option>-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                @elseif($key != "type" && $arr[$key] == 4)-->
                <!--                    <select name="filters[{{$key}}]">-->
                <!--                        <option>{{$key}}</option>    -->
                <!--                        @foreach($filter as $val)-->
                <!--                            <option value="{{$val['name']}}">{{$val['name']}}</option>-->
                <!--                            <?php $ops = explode(',', $val['values'])?>-->
                <!--                            @foreach($ops as $op)-->
                <!--                            <option value="{{$op}}">{{$op}}  </option>-->
                <!--                            @endforeach-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                @endif-->
                <!--            @endforeach-->
                <!--        <input type="submit" value="Search">-->
                <!--        </form>-->
                <!--    </div>-->

                <!--</div>-->
                @else
                <div class="col l3">

                    <!-- cars side -->

                    <!-- side ad -->
                    <div class="google-ads">
                            <img src="assets/images/ads.png" alt="">
                    </div>

                    <!-- side links -->
          @if(Auth::user())
             @if(Auth::user()->type == 0)
                    <a class="side-link blue" href="{{Url('newad/1')}}">
                        هل انت فرد؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
                @else    
                    <a class="side-link orang" href="{{Url('newad/1')}}">
                        هل انت شركة؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
             @endif
            @else
               
                    <a class="side-link blue" href="{{route('login')}}">
                        هل انت فرد؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
                
                    <a class="side-link orang" href="{{route('login')}}">
                        هل انت شركة؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
               
            @endif
                    <!-- search side -->
                <!--    <div class="side-search-box">-->
                <!--        <form method="GET" action="{{Url('search')}}">-->
                <!--        <input type="hidden" class="applied-filters" name="applied_filters" value="{{$applied_ret or ''}}">-->
                <!--        <input type="hidden" name="search_city" value="">-->
                <!--        <input type="hidden" name="search_query" value="">-->
                <!--        <input type="hidden" name="cat-id" value="1">-->
                <!--        <input type="hidden" name="sort" value="">-->
                <!--        <input type="hidden" placeholder="السعر الاقصي" name="maxi_price" value="{{$request['maxi-price'] or ''}}">-->
                <!--        <input type="hidden" placeholder="السعر الادني" name="mini_price" value="{{$request['mini-price'] or ''}}">-->
                <!--        <p>تصفح المنتجات</p>-->
                <!--        <small>فلتر خاص بتصفح المنتجات</small>-->
                <!--            <?php $arr = $filters['type']?>-->
                <!--            @foreach($filters as $key=>$filter)-->
                <!--                @if($loop->index > 0 && $loop->index < 6 && $key != "type" && $arr[$key] == 1)-->
                <!--                    <select name="filters[{{$key}}]">-->
                <!--                        <option>{{$key}}</option>    -->
                <!--                        @foreach($filter as $val)-->
                <!--                            <option value="{{$val['name']}}">{{$val['name']}}</option>-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                @elseif($key != "type" && $arr[$key] == 4)-->
                <!--                    <select name="filters[{{$key}}]">-->
                <!--                        <option>{{$key}}</option>    -->
                <!--                        @foreach($filter as $val)-->
                <!--                            <option value="{{$val['name']}}">{{$val['name']}}</option>-->
                <!--                            <?php $ops = explode(',', $val['values'])?>-->
                <!--                            @foreach($ops as $op)-->
                <!--                            <option value="{{$op}}">{{$op}}  </option>-->
                <!--                            @endforeach-->
                <!--                        @endforeach-->
                <!--                    </select>-->
                <!--                @endif-->
                <!--            @endforeach-->
                <!--        <input type="submit" value="إبحث">-->
                <!--        </form>-->
                <!--    </div>-->

                <!--</div>-->
                @endif

                <div class="clearfix"></div>
            </div>

        </div>

        
    </div>


    <div class="white-wrap">
        <div class="big-container">
           @if (Session::get('lang') == 'en')
            <!-- link filter -->
            <div class="link-filter">
                <h2>Browse through the car type</h2>
                @foreach($car as $ca)
                <a href="#"><img src="{{asset($ca->icon)}}" alt="{{$ca->name_en}}"></a>
                @endforeach
                <!-- <a href="#">
                    <img src="{{asset('images/car1.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car2.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car3.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car4.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car5.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car6.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car7.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car8.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car9.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car10.jpg')}}" alt="">
                </a> --> 

            </div>
            @else
            <div class="link-filter">
                <h2>تصفح من خلال نوع السياره</h2>
                @foreach($car as $ca)
                <a href="#"><img src="{{asset($ca->icon)}}" alt="{{$ca->name}}"></a>
                @endforeach
                <!-- <a href="#">
                    <img src="{{asset('images/car1.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car2.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car3.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car4.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car5.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car6.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car7.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car8.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car9.jpg')}}"alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/car10.jpg')}}" alt="">
                </a> --> 

            </div>
            @endif

           @if (Session::get('lang') == 'en')
            <h2>Browse through brands type</h2>

            <div class="link-logo">
                @foreach($cars as $ca)
                <a href="#"><img src="{{asset($ca->icon)}}" alt="{{$ca->name_en}}"></a>
                @endforeach
                <!-- <a href="#">
                    <img src="{{asset('images/cars1.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars2.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars3.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars4.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars5.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars6.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars7.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars8.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars9.jpg')}}" alt="">
                </a> -->

            </div>
<!-- 
            <div class="centerd">
            <div class="show-all" data-orignal="شاهد الجميع" data-swap="اخفاء الجميع">شاهد الجميع</div>
            </div>


            <div class="mark-links">
                <div class="row no-margin">
                    
                    <div class="col l3 m4 s2">
                        <h2>أ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ب</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ت</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ث</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div><div class="clearfix"></div>
                    <div class="col l3 m4 s2">
                        <h2>ج</h2>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ح</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>خ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    

                </div>
            </div> -->

        </div>
        @else
        <div class="link-logo">
                @foreach($cars as $ca)
                <a href="#"><img src="{{asset($ca->icon)}}" alt="{{$ca->name_en}}"></a>
                @endforeach
                <!-- <a href="#">
                    <img src="{{asset('images/cars1.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars2.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars3.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars4.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars5.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars6.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars7.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars8.jpg')}}" alt="">
                </a>
                <a href="#">
                    <img src="{{asset('images/cars9.jpg')}}" alt="">
                </a> -->

            </div>
<!-- 
            <div class="centerd">
            <div class="show-all" data-orignal="شاهد الجميع" data-swap="اخفاء الجميع">شاهد الجميع</div>
            </div>


            <div class="mark-links">
                <div class="row no-margin">
                    
                    <div class="col l3 m4 s2">
                        <h2>أ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ب</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ت</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ث</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div><div class="clearfix"></div>
                    <div class="col l3 m4 s2">
                        <h2>ج</h2>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ح</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>خ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    

                </div>
            </div> -->

        </div>
        @endif
    </div>

@endsection

@section('shenFooter')
<script type="text/javascript">
$(document).on('change','select[name=Brand]',function(){
    var brandId = $(this).find(':selected').data('catid');
    $('select[name=Model]').append('<option selected>الموديل</option>')
    $('select[name=Model] option').each(function(){
        if($(this).data('parent') == brandId){
            $(this).show()
        }else{
            $(this).hide()
        }
    });
});


$(document).on('click','#searchButton',function(e){
    e.preventDefault();
    var dataSerialize = $(this).closest('form').serialize(),
    url = "{{url('search')}}";
    $.get(url,dataSerialize,function(data){
        $('.boxed-ads').empty();
        $('div[align=center]').hide();
        $('.boxed-ads').append(data.html);
        // console.log(data);
    });
});


</script>
@endsection