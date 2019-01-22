<div class="strip-head blue to-back">تفاصيل الاعلان</div>
        <div class="to-back-body ad-check">
                <div class="row no-margin borderd">
                <div class="col l6">
                        <div class="top-group">
                         <input type="text" name="price" value="{{old('price')}}" class="in-mini" placeholder="السعر" required="price" oninvalid="this.setCustomValidity('من فضلك ادخل السعر');" onvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"/> 
                        <label class="checkbox blued">
                                <input type="radio" name="price"><span></span> محدد
                        </label>
                        <label class="checkbox blued">
                                <input type="radio" class="show-price" name="price"><span></span> قابل للتفاوض
                        </label>
                        <label class="checkbox blued">
                                <input type="radio" name="price"><span></span> تبادل
                        </label>
                        <div class="price-hidden">
                        هل تريد وضع حد ادني للتفاوض؟    &nbsp;
                        <input type="text" name="minimum" class="in-mini" placeholder="ريال سعودي">
                        </div>
                        </div>


                </div>
                <div class="col l6">

                </div>
                <div class="clearfix"></div>
                </div>

                <div class="row no-margin borderd">
                        <div class="col l6">
                        <br>
                        <select name="filters[نوع الشقة]"class="s-select xlarge">
                        <option>نوع الشقة</option>
                        @foreach($filters['نوع الشقة'] as $value)
                                <option value="{{$value['name']}}">{{$value['name']}}</option>
                        @endforeach
                        </select><select name="filters[عدد الغرف]"class="s-select xlarge">
                        <option>عدد الغرف</option>
                        @foreach($filters['عدد الغرف'] as $value)
                                <option value="{{$value['name']}}">{{$value['name']}}</option>
                        @endforeach
                        </select><select name="filters[عدد الافراد]"class="s-select xlarge">
                        <option>عدد الافراد</option>
                        @foreach($filters['عدد الافراد'] as $value)
                                <option value="{{$value['name']}}">{{$value['name']}}</option>
                        @endforeach
                        </select>

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