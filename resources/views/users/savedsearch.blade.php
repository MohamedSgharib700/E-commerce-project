@extends('layouts.user')
@section('content')
<!-- profile -->
<div class="big-container register bottom-100 top-100">

  <div class="profile-tabs">
      <a href="{{route ('ads')}}">إدارة الاعلانات</a>
      <a href="{{route ('messages')}}">الرسائل</a>
      <a href="{{route ('savedsearch')}}" class="active">عمليات بحث محفوظة</a>
      <a href="{{route ('profile')}}">الملف الشخصي</a>
  </div>

  <div class="profile-body">

@auth
            <!-- slide start -->
            @php $num = 0; @endphp
            @foreach(\App\SavedSearch::where('user_id',Auth::user()->id)->get() as $savedsearch)
      <div class="row no-margin table-row">
          <div class="col l7">
              <div class="bolded b-blued">
                  
                 <a href="{{$savedsearch->searchUrl}}" class="ad-item">  {{$savedsearch->searchWord}} </a>
                   
              </div>
          </div>
          <div class="col l4">حاله ارسال البريد
              <select class="s-select">
                  <option>يوميا</option>
                  <option>اسبوعيا</option>
                  <option>شهريا</option>
                  <option>ابدا</option>
              </select>
          </div>
          <div class="col l1">
              <div class="table-tools">
                  <a href="savedsearch/{{$savedsearch->id}}/delete"><i class="fa fa-times big-f"></i></a>
              </div>
          </div>
      </div>
      @endforeach
<div class="lefted">
      <button class="butn blue mt-25 no-border modal-open" data-modal-open=".profile-messege">معاينة حفظ عملية البحث</button>
      <a href="savedsearch/{{$savedsearch->id}}/delete">
      <button class="butn greay gr mt-25 no-border">حذف الجميع</button>
      </a>
</div>
  </div>
@endauth


</div>
@endsection
