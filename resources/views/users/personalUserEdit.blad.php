@extends('layouts.user')
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

  <div class="profile-tabs">
      <a href="{{route ('ads')}}">إدارة الاعلانات</a>
      <a href="{{route ('messages')}}">الرسائل</a>
      <a href="{{route ('savedsearch')}}">عمليات بحث محفوظة</a>
      <a href="{{route ('profile')}}" class="active">الملف الشخصي</a>
  </div>

  <div class="profile-body">
    <!-- {!! Form::model($user,['url' => Url('/post'), 'method' => 'POST']) !!} -->
    <form method="POST" action="{{route('user',['user'=> $user->id]) }}" accept-charset="UTF-8" class="ajax-form-request">
     {{ csrf_field() }}
          <div class="row no-margin table-head">
              <div>
                      صورة الملف الشخصي
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <img class="circl" src="{{ asset('front-assets/images/user.jpg')}}" alt="">
                         <div class="file-upload">
                                    
                                    <input class="hidden-upload" type="file" name="image">
                                    <button class="open-file">تعديل الصورة</button>
                                </div>
          </div>
          </div>
          <div class="row no-margin table-head">
              <div>
                  تغيير كلمة المرور
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="password" name"password"  placeholder="كلمة المرور">
          <!--<input type="password" name"password" placeholder="اعادة كلمة المرور">-->
          <button class="the-btn blue no-border">حفظ</button>
          </div>
          </div>
          <div class="row no-margin table-head">
              <div>
                  تغيير البريد الاليكتروني
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="email" name"email"  placeholder="البريد الاليكتروني">
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          <button class="the-btn blue no-border">حفظ</button>
          </div>
          </div>
      <div class="row no-margin table-head">
              <div>
                  تغيير البيانات الشخصية
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input type="text" name"name"  placeholder="اسم المستخدم">
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          <button class="the-btn blue no-border">حفظ</button>
          </div>
          </div>
         <!-- {!! Form::close() !!} -->
    </form>
  </div>
</div>
@endsection
