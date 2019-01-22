@extends('layouts.user')
@section('content')
    <div class="big-head top-100 bottom-50 centerd">
        <h1 class="gray">انشر اعلانك</h1>
      @if(Auth::user()->type == 0)   
        <small class="nc mt-15">اختر باقة الاعلان</small>
      @else
         <small class="nc mt-15">  </small
      @endif
    </div>

    <!-- register -->
    <ul>
           @if($errors->any())   
             @foreach($errors->all() as $error)
                 <li> {{$error}} </li>
             @endforeach
           @endif
         </ul>   
    <div class="big-container bottom-100">
        <form method="POST" action="{{Url('/newpost')}}" enctype="multipart/form-data">
            {{ csrf_field() }} 
         
            <input type="hidden" name="category_id" value="{{$category_id}}">

            <div class="row no-margin centerd">
                @if(Auth::user()->type == 0)   
                    @include('includes.packages')
                @else
                    <input type="hidden" name="pack" value="4" class="o-extra3">
                @endif
                <div class="clearfix"></div>
            </div>

            <!--<div class="nc top-25 bottom-25">-->
            <!--    سوف يستمر الاعلان الخاص بك حتي 30 يوم من تاريخ النشر-->
            <!--</div>-->
            @if($ancestor->id == 1)
                @include('components.add_car')
            @elseif($ancestor->id == 92)
                @include('components.add_rent')
            @elseif($ancestor->id == 123)
                @include('components.add_job')
            @elseif($ancestor->id == 272)
                @include('components.add_device')
            @elseif($ancestor->id == 392)
                @include('components.add_house')
            @elseif($ancestor->id == 396)
                @include('components.add_land')
            @else
                @include('components.add_product')
            @endif
            <input type = "hidden" name"filters" value ="filters">
            <div class="strip-head blue to-back">بيانات البائع</div>
            <div class="to-back-body">
                <div class="row no-margin">
                    <div class="col l6">
                     @if(Auth::user()->type == 1 || Auth::user()->type ==2)
                        <input type="text" name="seller_name" value="{{Auth::user()->name}}" placeholder="اسم البائع*">
                        <input type="email" name="seller_email" value="{{Auth::user()->email}}" placeholder="البريد الاليكتروني*">
                        @if(Auth::user()->type == 1 ||Auth::user()->type == 2 )
                        <input type="text" name="seller_number" value="{{Auth::user()->getCommerical->phone_number}}" required oninvalid="this.setCustomValidity('من فضلك ادخل رقم هاتفك');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')" placeholder="رقم الاتصال">
                        <input type="text" name="seller_number" value="{{Auth::user()->getCommerical->whatsapp_number}}" placeholder="رقم الواتس اب">
                        @endif
                        <input class="my-lat" type="hidden">
                        <input class="my-long" type="hidden">
                        <div class="input-wrap">
                            <input type="text" name="address" value="{{Auth::user()->getCommerical->address}}" required oninvalid="this.setCustomValidity('من فضلك ادخل العنوان');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')" placeholder="العنوان*">
                      @else
                         <input type="text" name="seller_name" value="{{Auth::user()->name}}"  placeholder="اسم البائع*">
                        <input type="email" name="seller_email" value="{{Auth::user()->email}}"  placeholder="البريد الاليكتروني*">
                        <input type="text" name="seller_number" value="{{Auth::user()->phone}}" required oninvalid="this.setCustomValidity('من فضلك ادخل رقم هاتفك');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')" placeholder="رقم الاتصال">
                        @if(Auth::user()->type == 1 ||Auth::user()->type == 2 )
                        <input type="text" name="seller_number" required oninvalid="this.setCustomValidity('من فضلك ادخل رقم هاتفك');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')" placeholder="رقم الاتصال">
                        <input type="text" name="seller_number"  placeholder="رقم الواتس اب">
                        @endif
                        <input class="my-lat" type="hidden">
                        <input class="my-long" type="hidden">
                        <div class="input-wrap">
                            <input type="text" name="address" required oninvalid="this.setCustomValidity('من فضلك ادخل العنوان');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')" placeholder="العنوان*">
                       @endif
                            <a href="#!" class="get-location"><i class="fa fa-map-marker" required></i>تحديد الموقع الجغرافي</a>
                        </div>
                        
                       <div class="city-select-button">
                            <!-- hidden input to catch the id -->
                            <input name="search_city" id="city-id" type="text" hidden>
                            <!-- select head in the search bar start -->
                            <div class="select-city">
                                <span class="city-title">المدن</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <!-- select head in the search bar end -->


                            <!-- dropdown wrapper start -->
                            <div class="select-box-city">
                                <!-- select all cats -->
                                <div class="city-select-group" data-cat-id="0">
                                         <span class="gettitle">المدن</span>
                                </div>
                                <!-- select group level 1 start  -->
                                
                                <!-- select group level 1 end  -->

                                <!-- select group level 1 start  -->
                            @foreach(\App\Filters::where('group_id',2)->get() as $city)
                                <div class="city-select-group" data-cat-id="5">
                                    <span class="gettitle">{{$city->name}}</span>
                                    <div class="group-toggle-city"><i class="fa fa-caret-down"></i></div>
                                    <!-- select group level 2 start  -->
                                    <div class="group-box-city">
                                        <!-- item -->
                                     @foreach(\App\Filters::where('parent_id',$city->id)->get() as $subCity)
                                        <div class="select-city-item-level1" data-cat-id="6">
                                            <span class="gettitle">{{$subCity->name}}</span>
                                        </div>
                                     @endforeach  
                                    </div>
                                    <!-- select group level 2 end  -->
                                </div>
                                <!-- select group level 1 end  -->
                            @endforeach
                             
                            </div>
                            <!-- dropdown wrapper start -->

                        </div>
                        
                       
                                <!--<select class="s-select xlarge hidden child-city" id="sub2" style="-->
                                <!--    margin: 0;-->
                                <!--    margin-bottom:  15px;-->
                                <!--">-->
                                <!--    <option selected disabled>2 اختر المنطقة</option>-->
                                <!--    <option>2 اسم المنطقة</option>-->
                                <!--    <option>اسم المنطقة 2</option>-->
                                <!--</select>-->


                    </div>
                    <div class="col l6">
                        <div class="note">
                            <img src="{{ asset('front-assets/images/info.jpg')}}" alt="">
                            تأكد من ادخال جميع البيانات بشكل صحيح واضافة بيانات الاتصال بشكل واضح ومفصل ذلك سوف يساعد
                            ويسهل
                            التواصل بين عملائك
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

            @include('includes.uploadrepeater')

            <div class="strip-head blue to-back">انهاء الاعلان</div>
            <div class="to-back-body">
                <div class="row no-margin">
                    <div class="col l6">

                     @if(Auth::user()->type == 0 || Auth::user()->type == 2)      
                        <div class="pay-box not-payed extra1">
                            <img src="{{ asset('front-assets/images/extra1.jpg')}}" alt="">
                            <div class="pay-text">
                                <h3>لون مميز
                                    <select name="isColored">
                                        <option value="7">7 ايام (10) ريال</option>
                                        <option value="14">14 ايام (18) ريال</option>
                                        <option value="21">21 ايام (25) ريال</option>
                                    </select>
                                </h3>
                                <p>
                                    ميز اعلانك بلون مميز يختلف عن باقي الاعلانات ليظهر بشكل جذاب ويلفت الانتباه
                                </p>
                            </div>
                            <div class="pay-select">
                                <input type="checkbox" name="isColoredDecision" onclick="showpay();">
                                <div class="pay-btn">اضافة</div>
                            </div>
                        </div>
                       
                        <div class="pay-box not-payed extra2">
                            <img src="{{ asset('front-assets/images/extra2.jpg')}}" alt="">
                            <div class="pay-text">
                                <h3>عرض في الرئيسية
                                    <select name="isinMain">
                                        <option value="7">7 ايام (10) ريال</option>
                                        <option value="14">14 ايام (18) ريال</option>
                                        <option value="21">21 ايام (25) ريال</option>
                                    </select>
                                </h3>
                                <p>
                                    استخدم هذه الخاصية لعرض المنتج الخاص بك في الصفحه الرئيسية لقلف روتس وتمتع بملاين
                                    المشاهدات لاعلانك
                                </p>
                            </div>
                            <div class="pay-select">
                                <input type="checkbox" name="isinMainDecision" onclick="showpay();">
                                <div class="pay-btn">اضافة</div>
                            </div>
                        </div>

                        <div class="pay-box not-payed extra3">
                            <img src="{{ asset('front-assets/images/extra3.jpg')}}" alt="">
                            <div class="pay-text">
                                <h3>ضمن افضل الاعلانات
                                    <select name="isinTop">
                                        <option value="7">7 ايام (10) ريال</option>
                                        <option value="14">14 ايام (18) ريال</option>
                                        <option value="21">21 ايام (25) ريال</option>
                                    </select>
                                </h3>
                                <p>
                                    اضف المنتج الخاص بك ضمن افضل اعلانات القسم ليظهر بشكل مميز فوق نتائج البحث داخل
                                    القسم
                                </p>
                            </div>
                            <div class="pay-select">
                                <input type="checkbox" name="isinTopDecision" onclick="showpay();">
                                <div class="pay-btn">اضافة</div>
                            </div>
                        </div>
                       @endif 
                        @if(Auth::user()->type == 0 || Auth::user()->type == 1)   
                        <div class="top-50 nc bolded">كوبون الخصم</div>

                        <div class="pay-box not-payed">
                            <div class="nc">
                                اذا كان لديك كوبون للخصم يمكنك استخدامة لتخفيض قيمة مدفوعاتك
                            </div>
                            <div>
                                <div class="copon nc bolded">ادخل كوبون الخصم</div>
                                <div class="copon"><input type="text"></div>
                                <div class="copon">
                                    <button class="upload-btn butn blue">تطبيق</button>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                  @if(Auth::user()->type == 0 || Auth::user()->type == 2)   
                    <div class="col l6">
                        <div class="note">
                            <img src="{{ asset('front-assets/images/info.jpg')}}" alt="">
                            ميز اعلانك باستخدام المجموعه التي تناسبك من الخصائص المميزة لعرض الاعلان كما يمكن التحكم في
                            فترة
                            عرضها
                        </div>
                    </div>
                  @endif
                    <div class="clearfix"></div>
                </div>
            </div>
            
            
            <div id="choose" style="display:none">
                <div class="strip-head blue to-back">وسائل الدفع</div>
                <div class="to-back-body">
                        <div class="pay-wrap">

                        <div class="pay-box">
                            <img src="front-assets/images/pay1.jpg" alt="">
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
                                <img src="front-assets/images/pay2.jpg" alt="">
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
            </div>
            

            <label class="checkbox full-width top-50">
                <input type="checkbox" required oninvalid="this.setCustomValidity('يجب الموافقة علي بنود الشروط والاحكام');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/> <span></span>
                أوافق علي <a href="{{ route ('conditions')}}" target="_blank">الشروط والاحكام</a> الخاصة بالنشر علي موقع قلف روتس
            </label>

            <div class="top-50 bottom-50 rightness">
                <input class="normal-submit" type="submit" value="تأكيد البيانات">
            </div>


        </form>


    </div>


    <div class="global-overlay"></div>


    <div class="my-modal pack1">
        <div class="closer"></div>
        <div class="my-modal-body">
            <h1 class="no-margin nb centerd">الباقة المجانية</h1>
            <img src="{{ asset('front-assets/images/pack-img1.jpg')}}" alt="">
            <div class="centerd">
                <br>
                <button class="in-modal the-btn blue pack1-on">اشترك الان</button>
                <button class="in-modal the-btn gray close-me pack1-off">شكرا لا اريد</button>
            </div>
        </div>
    </div>

    <div class="my-modal pack2">
        <div class="closer"></div>
        <div class="my-modal-body">
            <h1 class="no-margin nb centerd">الباقة الاضافية</h1>
            <img src="{{ asset('front-assets/images/pack-img2.jpg')}}" alt="">
            <div class="centerd">
                <br>
                <button class="in-modal the-btn blue pack2-on">اشترك الان</button>
                <button class="in-modal the-btn gray close-me pack2-off">شكرا لا اريد</button>
            </div>
        </div>
    </div>

    <div class="my-modal pack3">
        <div class="closer"></div>
        <div class="my-modal-body">
            <h1 class="no-margin nb centerd">الباقة المميزة</h1>
            <img src="{{ asset('front-assets/images/pack-img3.jpg')}}" alt="">
            <div class="centerd">
                <br>
                <button class="in-modal the-btn blue pack3-on">اشترك الان</button>
                <button class="in-modal the-btn gray close-me pack3-off">شكرا لا اريد</button>
            </div>
        </div>
    </div>

    <div class="my-modal pack4">
        <div class="closer"></div>
        <div class="my-modal-body">
            <h1 class="no-margin nb centerd">الباقة الكاملة</h1>
            <img src="{{ asset('front-assets/images/pack-img4.jpg')}}" alt="">
            <div class="centerd">
                <br>
                <button class="in-modal the-btn blue pack4-on">اشترك الان</button>
                <button class="in-modal the-btn gray close-me pack4-off">شكرا لا اريد</button>
            </div>
        </div>
    </div>
@endsection
@section('shenFooter')
<script type="text/javascript">
$(document).on('change','select[name=Brand]',function(){
    var brandId = $(this).find(':selected').data('catid');
    $('select[name=Model]').append('<option selected>الموديل</option>')
    $('select[name=Model] option').each(function(){
        if($(this).data('parent') == brandId){
            $(this).show()
        }else{
            $(this).hide()
        }
    });
});


$(document).on('click','#searchButton',function(e){
    e.preventDefault();
    var dataSerialize = $(this).closest('form').serialize(),
    url = "{{url('search')}}";
    $.get(url,dataSerialize,function(data){
        $('.boxed-ads').empty();
        $('div[align=center]').hide();
        $('.boxed-ads').append(data.html);
        // console.log(data);
    });
});


</script>
@endsection