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
                
                    <h3>مرحبا بك,<a href="#"  data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span ></span>
                                </a></h3>
                    شكرا لك علي التسجيل في قلف روتس.
                    <a href="{{route ('landing')}}" class="butn blue">عودة للصفحة الرئيسية</a>
                
                </div>

                <div class="clearfix"></div>
            </div>

        </div>

        

      </div>

@endsection
