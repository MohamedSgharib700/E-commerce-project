@extends('layouts.user')

@section('content')
<style>
    .in-readonly {
        pointer-events: none;
        user-select: none;
    }
</style>
    <div class="normal-body">

        <div class="company-top">
            <div class="big-container">
                <div class="row no-margin">
                    <div class="col l6">
                        <h1>لماذا قلف روتس للأسر المنتجة؟</h1>
                        <p>
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>
                    </div>
                    <div class="col l6">
                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/8tPnX7OPo0Q" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="big-container">
            <form id="validpost" class="has-range" role="form" method="POST" action="{{ route('commercialuserregister') }}">
                {{ csrf_field() }}
                        <h2 class="mini-head">باقة الاسر المنتجة</h2>
                        <p class="mini-prag">
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                            نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي نص تجريبي
                        </p>

                     <h1 class="top-range">اختر الفتره</h1>
                    <input class="range-time2" type="range" max="100" min="25" step="25" dir="rtl" value="25">
                    <div class="ranger">
                        <div class="row">
                            <div class="col l3">شهر</div>
                            <div class="col l3">3 شهور</div>
                            <div class="col l3">6 شهور</div>
                            <div class="col l3">سنة</div>
                        </div>
                    </div>

                    <input type="hidden" class="pack-calc" value="150">
                    <div class="centerd packed">
                        <div>تكلفة الباقة المختارة</div>
                        <div class="pack-num"><span>150</span>ريال</div>
                    </div>


                    <div class="strip-head blue to-back">بيانات الاسرة</div>
                    <div class="to-back-body">
                        <div class="row no-margin">
                            <div class="col l6">
                                
                                 <div>
                                     
                                <input  type="hidden" class="form-control" name="type" value="2" required >
                                
                                </div>
                                
                                <div>
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="اسم الاسرة*">
                                @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="البريد الاليكتروني*">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('country_code') ? ' has-error' : '' }}">
                                <input id="authy-countries" type="text" class="form-control" name="country_code" value="{{ old('country_code') }}" required placeholder="كود الدولة">
                                @if ($errors->has('country_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country_code') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                                <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" required placeholder="رقم الاتصال*">
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="كلمة المرور*">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="إعادة كلمة المرور*">
                                </div>
                                 <input type="text" placeholder="رقم الواتس اب">
                                <input type="text" placeholder="العنوان">
                                <div class="file-upload">
                                    <input type="text" placeholder="شعار المشروع" class=" in-readonly" required><input class="hidden-upload" type="file">
                                    <button class="open-file">رفع</button>
                                </div>
                                <input type="text" placeholder="اوقات العمل">
                                <input type="text" placeholder="الموقع الاليكتروني او رابط معروف او رابط التواصل الاجتماعي">
                                
                             <!--   <div class="input-wrap">
                                        <input type="text" placeholder="الموقع الجغرافي*">
                                    <a href="#!"><i class="fa fa-map-marker"></i>تحديد الموقع الجغرافي</a>
                                </div> -->
                            </div>
                            <div class="col l6">
                                <div class="note">
                                    <img src="{{ asset('front-assets/images/info.jpg')}}" alt="">
                                    تأكد من ادخال جميع البيانات بشكل صحيح واضافة بيانات الاتصال بشكل واضح ومفصل ذلك سوف يساعد ويسهل التواصل بينك وبين عملاءك
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>



                    <div class="strip-head blue to-back">وسائل الدفع</div>
                    <div class="to-back-body">
                        <div class="pay-wrap">

                        <div class="pay-box">
                            <img src="{{ asset('front-assets/images/pay1.jpg')}}" alt="">
                            <div class="pay-text">
                                <h3>البطاقة الاليكترونية</h3>
                                <p>
                                        الدفع من خلال البطاقات الاليكترونية المقدمة من البنوك والتي تحتوي علي رصيد قابل للسحب وهي الطريقة الاشهر علي شبكة الانترنت وتتطلب بعض الوقت
                                </p>
                            </div>
                            <div class="pay-select">
                                <input type="radio" name="pay">
                                <div class="pay-btn">أختر</div>
                            </div>
                        </div>
                        <div class="pay-box">
                                <img src="{{ asset('front-assets/images/pay2.jpg')}}" alt="">
                                <div class="pay-text">
                                    <h3>سداد</h3>
                                    <p>
                                            الدفع عن طريق خدمة سداد للمدفوعات الاليكترونية والتي تقدم حلول الدفع المباشر بكل سهولة وامان وهي طريقة شائعه في الاستخدام واثبتت فاعليتها خلال السنوات السابقة                                    </p>
                                </div>
                                <div class="pay-select">
                                    <input type="radio" name="pay">
                                    <div class="pay-btn">أختر</div>
                                </div>
                        </div>
                        

                        </div>
                    </div>

                    <label class="checkbox full-width top-50">
                            <input type="checkbox" required name="agree"><span></span>
                            أوافق علي <a href="#!">الشروط والاحكام</a> الخاصة بالنشر علي موقع قلف روتس
                    </label>

                    <div class="top-50 bottom-50 rightness">
                        <input class="normal-submit" type="submit" value="تأكيد البيانات">
                    </div>
            </form>
        </div>
    </div>
@endsection
