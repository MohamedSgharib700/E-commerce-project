@extends('layouts.user')
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

    <div class="profile-tabs">
        <a href="{{Url('user/'.$user['id'].'/ads')}}" class="active">الاعلانات</a>
        <a href="{{Url('user/'.$user['id'])}}">الملف الشخصي</a>
    </div>

    <div class="profile-body">

        <div class="profile-posts-tabs">
            <div class="profile-posts-tab active" data-tab-target=".now-ads">
                اعلانات حالية ({{count($active)}})
            </div>
            <div class="profile-posts-tab" data-tab-target=".ex-ads">
                اعلانات منتهيه ({{count($archived)}})
            </div>
        </div>

        <div class="profile-screens">
            <div class="boxed-ads {{count($archived) ? '':'no-data'}} in-profile ex-ads">
                @foreach($archived as $post)
                    @if($post->isArchived == 1)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{ asset($post->img) }}" alt="">
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
                    @endif
                @endforeach
                @if(count($archived) == 0)
                    <div class="centerd">
                            <h2>لاتوجد اعلانات منتهيه</h2>
                    </div>
                @endif
            </div>
            <div class="boxed-ads in-profile {{count($active) ? '':'no-data'}} now-ads active">
                @foreach($active as $post)
                    @if($post->isArchived == 0)
                    <!-- ad item -->
                    <a href="{{Url('posts').'/'.$post->id}}" class="ad-item">
                        <div class="image-box">
                            <img src="{{ asset($post->img) }}" alt="">
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
                    @endif
                @endforeach
                @if(count($active) == 0)
                <div class="centerd">
                        <h2>لاتوجد اعلانات حاليه</h2>
                </div>
                @endif
            </div>
        </div>

    </div>

</div>
@endsection
