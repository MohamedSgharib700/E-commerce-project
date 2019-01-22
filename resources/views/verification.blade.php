@extends('layouts.user')
@section('content')
<div class="big-head top-100 bottom-50 centerd">
        <h1>تم تسجيل الحساب بنجاح</h1>
</div>
  <!-- register -->
  <div class="big-container register bottom-100 centerd">
    <div class="boxed-container">
        <div class="row no-margin top-50 bottom-50">
          @if(Session::get('lang') == 'en')
           <div class="thanks-box">
 Thank you for registering at Gulf Rotes. We have sent an email confirmation message to your account to confirm your account. You can now try to sign in on our website with your new account.
                <a href="{{route ('landing')}}" class="butn blue">Back to home page</a>
            </div>
          @else
            <div class="thanks-box">
  شكرا لك علي التسجيل في قلف روتس, تم ارسال رساله تأكيد علي البريد الاليكتروني برجاء المراجعه لتأكيد الحساب الخاص بك,ويمكنك الان تجربة تسجيل الدخول علي موقعنا بحسابك الجديد.
                <a href="{{route ('landing')}}" class="butn blue">عودة للصفحة الرئيسية</a>
            </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
  </div>
@endsection
