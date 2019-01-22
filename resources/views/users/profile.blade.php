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
    <form method="POST" action="{{Url('userUpdate')}}" accept-charset="UTF-8" enctype="multipart/form-data">
{{ csrf_field() }}
          <div class="row no-margin table-head">
              <div>
                       صورة الملف الشخصي 
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
         @if($users->profile_picture == null)
           <img src="{{ asset('front-assets/images/user.jpg')}}" alt="">
          @else
           <img class="circl" src="{{asset('imagesProfile/'. $users->profile_picture)}}" alt="">
         @endif
                         <div class="file-upload">
                                    
                                    <input class="hidden-upload" type="file" value="{{$users->profile_picture}}" name="images">
                                    <!--<button class="open-file">تعديل الصورة</button>-->
                                </div>
          </div>
          </div>
         @if(Auth::user()->email_token == null || Auth::user()->type == 0)
          <div class="row no-margin table-head">
              <div>
                  تغيير كلمة المرور
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="password" name="password"  value=""  placeholder="********">
          <!--<input type="password" name"password" placeholder="اعادة كلمة المرور">-->
          
          </div>
          </div>
          <div class="row no-margin table-head">
              <div>
                  تغيير البريد الاليكتروني
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="email" name="email" value="{{$users->email}}" placeholder="البريد الاليكتروني">
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          
          </div>
          </div>
         @else
          <div class="row no-margin table-head">
              <div>
                   البريد الاليكتروني
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
              <label for="email">{{$users->email}}</label>
          
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          
          </div>
          </div>
         @endif
      <div class="row no-margin table-head">
              <div>
                  تغيير البيانات الشخصية
              </div>
          </div>
         
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
        @if($users->type == 0)
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <input type="text" name="name" value="{{$users->name}}"  placeholder="اسم المستخدم">
              <input type="text" name="phone_number" value="{{$users->phone}}"  placeholder="رقم التواصل ">
            @else
              <input type="text" name="phone_number" value="{{$users->getCommerical->phone_number}}"  placeholder="رقم التواصل ">
              <input type="text" name="commercial_record_number" value="{{$users->getCommerical->commercial_record_number	}}"  placeholder="رقم السجل التجاري  ">
              <input type="text" name="maaroof_url" value="{{$users->getCommerical->maaroof_url}}"  placeholder=" رابط الموقع الالكتروني">
            @endif
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          <button class="the-btn blue no-border">حفظ</button>
          </div>
          </div>
         <!-- {!! Form::close() !!} -->
  </div>
 </form>
</div>
@endsection
