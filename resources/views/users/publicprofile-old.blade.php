@extends('layouts.user')
@section('title', $user['name'])
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

  <div class="profile-tabs">
      <a href="{{Url('user/'.$user['id'].'/ads')}}">الاعلانات</a>
      <a href="{{Url('user/'.$user['id'])}}" class="active">الملف الشخصي</a>
  </div>

  <div class="profile-body">
          <div class="row no-margin table-head">
              <div>
                      صورة الملف الشخصي
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
            @if($user['isCommercial'])
            <img src="{{$user['logo']}}" alt="">            
            @else
            <img src="{{$user['profile_picture']}}" alt="">
            @endif
          </div>
          </div>
  </div>
</div>
@endsection
