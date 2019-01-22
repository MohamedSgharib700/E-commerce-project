@extends('layouts.user')
@section('title', $user['name'])
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

<div class="user-side inside">
            <div class="user-info-box">
                    <img src="{{asset('imagesProfile/'.$users->profile_picture)}}" alt="">
                    <div class="user-data">
                        <a href="#!">{{$users->name}}</a>
                        <span>{{$users->created_at}}</span>
                        <!--<div class="on">متصل الان</div>-->
                    </div>
                </div>
</div>


<div class="strip-head blue on-top">

    <!--<div style="float:left; white-space:nowrap">-->
    <!--    الترتيب حسب -->
    <!--    <select style="width: auto;-->
    <!--    vertical-align: middle;-->
    <!--    height: 28px;-->
    <!--    padding: 0;-->
    <!--    font-size: 13px;-->
    <!--    color: #9e9e9e;-->
    <!--    font-weight: 600;-->
    <!--    outline: none;">-->
    <!--        <option>الاحدث اولا</option>-->
    <!--        <option>الاقدم اولا</option>-->
    <!--        <option>الاعلي سعرا</option>-->
    <!--        <option>الاقل سعرا</option>-->
    <!--    </select>-->
    <!--</div>-->
</div>

                        <div class="row no-margin ads-list">
                          @foreach( $posts as $post )      
                                <div class="col l12">
                                    <!-- ad item -->
                                    <a href="{{url('posts')}}/{{$post->id}}" class="ad-item">
                                        <div class="image-box">
                                            <img src="{{Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)}}" alt="">
                                            <div class="price boxed-only">
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="سيارة بمواصفات خاصة" class="boxed-only">{{$post->title}}</h1>
                                        <div class="post-data normal-only">
                                            <h1 title="سيارة بمواصفات خاصة">{{$post->title}}</h1>
                                            <div class="price">{{$post->price}}
                                                    <span>ر.س</span>
                                            </div>
                                            <div class="desc">
                                                {{$post->description}}
                                            </div>
                                        </div>
                                        <small class="boxed-only">مدينة الرياض</small>
                                        <div class="info normal-only">
                                            <h3>السعودية
                                                <small>الرياض</small>
                                            </h3>
                                            <!--<div class="time">منذ 15 دقيقة</div>-->
                                        </div>
                                        <!--<div class="watch-icon active">-->
                                        <!--    <i class="fa fa-star"></i>-->
                                        <!--</div>-->
                                    </a>
                                </div>

                            @endforeach   

                        </div>





        

      </div>

@endsection
