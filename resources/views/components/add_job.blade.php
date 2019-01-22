<div class="strip-head blue to-back">تفاصيل الاعلان</div>
    <div class="to-back-body ad-check">
        <div class="row no-margin borderd">
            <div class="col l6">
                <!--filters-->
                <div class="top-group">
                <select name="filter[نوع مقدم الطلب]"class="s-select xlarge">
                    <option>الاعلان بواسطة</option>
                    @foreach($filters['نوع مقدم الطلب'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>  
                    @endforeach
                </select>
                <select name="filter[نوع العمل]"class="s-select xlarge">
                    <option>نوع الوظيفة</option>
                    @foreach($filters['نوع العمل'] as $value)
                        <option value="{{$value['name']}}">{{$value['name']}}</option>
                    @endforeach
                </select>

                <div class="row no-margin">
                    <div class="col l3">
                    
                    <div class="gray" style="margin-bottom: 5px">اضافه صورة</div>
                    <div class="upload-image one-up active">
                        <input type="file" name="img[]" class="single-upload">
                        <i class="fa fa-times"></i>
                        <span></span>
                    </div>
                    <!-- <button class="butn blue no-border" style="
                    line-height: 35px;
                    padding: 0 30px;
                    margin-top:5px;
                ">اضافة</button> -->
                    </div>
                    <div class="col l9">
                            <div class="gray" style="margin-bottom: 5px">ثلاثة سطور عن الوظيفة</div>
                            <input type="text" name="description[]" class="x-small">
                            <input type="text" name="description[]" class="x-small">
                            <input type="text" name="description[]" class="x-small">
                    </div>
                </div>
                <br>
                <div class="row no-margin">
                        <div class="col l3">
                        
                        <div class="gray" style="margin-bottom: 5px">نوع التعاقد</div>
                        @foreach($filters['نوع الراتب'] as $value)
                        <label class="checkbox blued">
                                <input type="radio" name="filter[نوع الراتب]" value="{{$value['name']}}"><span></span> {{$value['name']}}
                        </label><br>
                        @endforeach
                        </div>
                        <div class="col l9">
                                <div class="gray" style="margin-bottom: 5px">متوسط الراتب</div>
                                من    &nbsp;
                        <input type="text" name="price" value="{{old('price')}}" class="in-mini" placeholder="السعر" required="price" oninvalid="this.setCustomValidity('من فضلك ادخل السعر');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/> 
                        <br>
                                الي    &nbsp;
                        <input type="text"  name="filter[price]" class="in-mini" placeholder="ريال سعودي">
                        </div>
                    </div>

            
                </div>


            </div>
            <div class="col l6">

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