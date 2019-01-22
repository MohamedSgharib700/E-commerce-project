@extends('layouts.user')
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

    <div class="profile-tabs">
        <a href="{{route ('ads')}}" class="active">إدارة الاعلانات</a>
        <a href="{{route ('messages')}}">الرسائل</a>
        <a href="{{route ('savedsearch')}}">عمليات بحث محفوظة</a>
        <a href="{{route ('profile')}}">الملف الشخصي</a>
    </div>

    <div class="profile-body">

        <div class="profile-posts-tabs">
            <div class="profile-posts-tab active" data-tab-target=".all-ads">
                كل الاعلانات ({{count($stopped) + count($active) + count($archived)}})
            </div>
            <div class="profile-posts-tab" data-tab-target=".now-ads">
                اعلانات حالية ({{count($active)}})
            </div>
            <div class="profile-posts-tab" data-tab-target=".ex-ads">
                اعلانات منتهيه ({{count($archived)}})
            </div>
            <div class="profile-posts-tab" data-tab-target=".spam-ads">
                اعلانات موقوفة ({{count($stopped)}})
            </div>
            <div class="profile-posts-tab" data-tab-target=".hol-ads">
                الرغبات ({{count($favorites)}})
            </div>
        </div>

        <div class="profile-screens">

            <div class="boxed-ads {{count($stopped) + count($active) + count($archived) ? '':'no-data'}} in-profile all-ads active">
                @foreach($active as $post)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item" style="margin-bottom:30px;">
                        <div class="image-box">
                            <img src="{{asset($post->img)}}" alt="">
                            <div class="price">{{$post->price}}
                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                        <small>مدينة الرياض</small>
                        </br>
                        <small style="display:block; margin-top:13px;"> اخر تحديث\{{$post->updated_at}}</smal>
                        <div class="post-tools">
                                   <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                @endforeach
                @foreach($archived as $post)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{$post->img}}" alt="">
                            <div class="price">{{$post->price}}
                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                @endforeach
                @foreach($stopped as $post)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{$post->img}}" alt="">
                            <div class="price">{{$post->price}}
                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                @endforeach
                @if(count($stopped) + count($active) + count($archived) == 0)
                        <div class="centerd">
                            <h2>لاتوجد اعلانات حالية</h2>
                        </div>
                @endif
            </div>

            <div class="boxed-ads {{count($active) ? '':'no-data'}} in-profile now-ads">
                @foreach($active as $post)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{$post->img}}" alt="">
                            <div class="price">{{$post->price}}
                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                @endforeach
                @if(count($active) == 0)
                         <div class="centerd">
                            <h2>لاتوجد اعلانات حالية</h2>
                        </div>
                @endif
            </div>

            <div class="boxed-ads {{count($archived) ? '':'no-data'}} in-profile ex-ads">
                    @foreach($archived as $post)
                        <!-- ad item -->
                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                            <div class="image-box">
                                <img src="{{$post->img}}" alt="">
                                <div class="price">{{$post->price}}
                                    <span>ر.س</span>
                                </div>
                            </div>
                            <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                            <small>مدينة الرياض</small>
                            <div class="post-tools">
                                        <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                            </div>
                        </a>
                    @endforeach
                    @if(count($archived) == 0)
                        <div class="centerd">
                                <h2>لاتوجد اعلانات منتهيه</h2>
                        </div>
                    @endif
            </div>
            <div class="boxed-ads {{count($stopped) ? '':'no-data'}} in-profile spam-ads">
                    @foreach($stopped as $post)
                        <!-- ad item -->
                        <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                            <div class="image-box">
                                <img src="{{$post->img}}" alt="">
                                <div class="price">{{$post->price}}
                                    <span>ر.س</span>
                                </div>
                            </div>
                            <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                            <small>مدينة الرياض</small>
                            <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='{{Url('editads').'/'.$post->id}}';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/{{$post->id}}/delete';" class="fa fa-times"></span>
                            </div>
                        </a>
                    @endforeach
                    @if(count($stopped) == 0)
                        <div class="centerd">
                                <h2>لاتوجد اعلانات موقوفة</h2>
                        </div>
                    @endif
            </div>

            <div class="boxed-ads {{count($favorites) ? '':'no-data'}} in-profile hol-ads">
                @foreach($favorites as $post)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{$post->img}}" alt="">
                            <div class="price">{{$post->price}}
                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                        <small>مدينة الرياض</small>
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
                @endforeach
                @if(count($favorites) == 0)
                    <div class="centerd">
                        <h2>لاتوجد قائمة رغبات</h2>
                    </div>
                @endif
            </div>

        </div>

    </div>

</div>
@endsection
