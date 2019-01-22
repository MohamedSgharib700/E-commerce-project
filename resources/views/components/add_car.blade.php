<div class="strip-head blue to-back">تفاصيل الاعلان</div>

<div class="to-back-body ad-check">
    <div class="row no-margin borderd">
        <div class="col l6">
            <div class="top-group">
            <input type="text" name="price" value="{{old('price')}}" class="in-mini" placeholder="السعر" required="price" oninvalid="this.setCustomValidity('من فضلك ادخل السعر');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/>   
            <label class="checkbox blued">
            <input type="radio" name="filter[price]" value="محدد"><span></span> محدد
                </label>
                <label class="checkbox blued">
                        <input type="radio" class="show-price" name="filter[price]" value="قابل للتفاوض"><span></span> قابل للتفاوض
                </label>
                <label class="checkbox blued">
                        <input type="radio" name="filter[price]" value="مجانا"><span></span> مجانا
                </label>
                <label class="checkbox blued">
                        <input type="radio" name="filter[price]" value="تبادل"><span></span> تبادل
                </label>
                <div class="price-hidden">
                        هل تريد وضع حد ادني للتفاوض؟    &nbsp;
                        <input type="text"  name="minimum" class="in-mini" placeholder="ريال سعودي">
                </div>
            </div>
            <div>
                الحالة :  &nbsp;
                <label class="checkbox blued">
                        <input type="radio" class="group1" name="Pnew" value="0"><span></span> جديد
                </label>
                <label class="checkbox blued">
                        <input type="radio" class="group1" name="Pused" value="1"><span></span> مستعمل
                </label>
        </div>

        </div>
        <div class="col l6">

        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row no-margin borderd">
            <div class="col l8">
                <br>
                <div class="col l6">
            <div>
                نوع البائع :  &nbsp;<label class="checkbox blued">
                        <input type="radio" class="group2" name="sellerS" value="بائع خاص"><span></span> بائع خاص
                </label>
                <label class="checkbox blued">
                        <input type="radio" class="group2" name="sellerC" value="تاجر مورد"><span></span> تاجر مورد
                </label>
            </div>
            <br>
               <?php 
                   $arr = $filters['type'];
                   $namesArr = ['city','License','Brand','Model','production'];
                   $num = 0;
               ?>
                <select name="Brand"class="s-select xlarge">
                <option>الماركة</option>
                @foreach($filters['الماركة'] as $value)
                    <option data-catid="{{$value['id']}}" value="{{$value['name']}}">{{$value['name']}}</option>
                @endforeach
                </select>
                <select name="Model"class="s-select xlarge">
                <option>الموديل</option>
                @foreach($filters['الموديل'] as $value)
                    <option data-parent="{{$value['parent_id']}}" value="{{$value['name']}}">{{$value['name']}}</option>
                @endforeach
                </select>
                <select name="filters[production]" class="s-select xlarge">
                <option>تاريخ الصنع</option>
                @foreach($filters['تاريخ الصنع'] as $value)
                    <option value="{{$value['name']}}">{{$value['name']}}</option>
                @endforeach
                </select>
                <select name="filters[License]" class="s-select xlarge">
                    <option>الإستماره</option>
                    <option value="سارى">سارى</option>
                    <option value="منتهى">منتهى</option>
                </select>
                <input type="text" name="filters[Mileage]" placeholder="الممشي" class="xlarge">

                <!--<select name="filters[color]" class="s-select xlarge">-->
                <!--    <option>اللون</option>-->
                <!--    @foreach($filters['اللون'] as $value)-->
                <!--        <option value="{{$value['name']}}">{{$value['name']}}</option>-->
                <!--    @endforeach-->
                <!--</select>-->
                <input type="text" name="filters[color]" placeholder="اللون" class="xlarge"
            
            </div></div>

            <div class="col l6">
                <br><br>
                    <select name="filters[TypeCar]"class="s-select xlarge">
                    <option>نوع السيارة</option>
                    @foreach($filters['نوع السيارة'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
                    <select name="filters[EngineCapacity]"class="s-select xlarge">
                    <option>سعة المحرك</option>
                    @foreach($filters['سعة المحرك'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
                    <select name="filters[MotionVector]"class="s-select xlarge">
                    <option>ناقل الحركة</option>
                    @foreach($filters['ناقل الحركة'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
                    <select name="filters[Fuel]"class="s-select xlarge">
                    <option>نوع الوقود</option>
                    @foreach($filters['نوع الوقود'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
                    <select name="filters[Sunroof]"class="s-select xlarge">
                    <option>فتحة السقف</option>
                    @foreach($filters['فتحة السقف'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
                    <select name="filters[Traction]"class="s-select xlarge">
                    <option>نوع الدفع</option>
                    @foreach($filters['نوع الجر'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                    </select>
            </div>

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row no-margin">
        <div class="col l6">
        <br>
        <input type="text" name="title" placeholder="عنوان" required="title" oninvalid="this.setCustomValidity('من فضلك ادخل عنوان الاعلان');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/> 
        <input type="text" name="short" placeholder="وصف مختصر للاعلان"  required="required" oninvalid="this.setCustomValidity('من فضلك ادخل الوصف المختصر');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/> 
        <textarea name="description[]" placeholder="وصف الاعلان"  required="required" oninvalid="this.setCustomValidity('من فضلك ادخل تفاصيل الاعلان ');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/></textarea>
        <div class="pay-box not-payed">
                <img src="{{ asset('front-assets/images/urgant.jpg')}}" alt="">
                <div class="pay-text">
                <h3>علامة عاجل <span>20 ريال</span></h3>
                <p>
                        اختر اضافة علامة عاجل ليظهر الاعلان الخاص بك بشكل اكثر تميزا وبطريقة تجذب
                        الانتباه </p>
                </div>
                <div class="pay-select">
                <input type="checkbox" name="isUrgent">
                <div class="pay-btn">اضافة</div>
                </div>
        </div>

        </div>
        <div class="col l6">
        <br>
        <div class="note">
                <img src="{{ asset('front-assets/images/info.jpg')}}" alt="">
                تأكد من ادخال عنوان ووصف الاعلان بشكل واضح ومميز واحرص ان يكون الوصف مفصلا واضحا بكل تفاصيل
                المنتج
        </div>
        </div>
        <div class="clearfix"></div>
</div>
</div>

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