@extends('layouts.user')
@section('content')
<div class="big-head top-100 bottom-50 centerd">
        <h1>تم تسجيل الحساب بنجاح</h1>
</div>
  <!-- register -->
  <div class="big-container register bottom-100 centerd">
    <div class="boxed-container">
        <div class="row no-margin top-50 bottom-50">
            <div class="thanks-box">
              التحقق من بريدك الإلكتروني برجاء الضغط هنا
                <a href="{{route ('login')}}" class="butn blue">تسجيل الدخول </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
  </div>
@endsection
