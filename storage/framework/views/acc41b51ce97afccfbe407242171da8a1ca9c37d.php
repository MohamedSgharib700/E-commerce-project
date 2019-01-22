<div class="strip-head blue to-back">تفاصيل الاعلان</div>
<div class="to-back-body ad-check">
    <div class="row no-margin borderd">
        <div class="col l6">
            <div class="top-group">
            <input type="text" name="price" class="in-mini" placeholder="السعر">
            <label class="checkbox blued">
                    <input type="radio" name="filter[price]"><span></span> محدد
            </label>
            <label class="checkbox blued">
                    <input type="radio" class="show-price" name="filter[price]"><span></span> قابل للتفاوض
            </label>
            <!--<label class="checkbox blued">-->
            <!--        <input type="radio" name="filter[price]"><span></span> تبادل-->
            <!--</label>-->
            <div class="price-hidden">
                هل تريد وضع حد ادني للتفاوض؟    &nbsp;
                <input type="text" name="filter[price]"  class="in-mini" placeholder="ريال سعودي">
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
            <!--<select class="s-select xlarge half">-->
            <!--        <option>الغرف</option>-->
            <!--        <option>100</option>-->
            <!--        <option>200</option>-->
            <!--</select>-->
            <!--<select class="s-select xlarge half">-->
            <!--        <option>الحمامات</option>-->
            <!--        <option>500</option>-->
            <!--        <option>600</option>-->
            <!--</select>-->

            <!--<select class="s-select xlarge half">-->
            <!--        <option>الاستقبال</option>-->
            <!--        <option>500</option>-->
            <!--        <option>600</option>-->
            <!--</select>-->

            <!--<select class="s-select xlarge half">-->
            <!--        <option>الطابق</option>-->
            <!--        <option>500</option>-->
            <!--        <option>600</option>-->
            <!--</select>-->
            <?php if($category_id == 393 || $category_id == 394 || $category_id == 395 || $category_id == 396 || $category_id == 414): ?>
               <input type="text" name="filter[rooms]" placeholder="الغرف" class="xlarge half">
               <input type="text" name="filter[area]" placeholder="المساحة" class="xlarge half">
            <?php else: ?>
               <input type="text" name="filter[rooms]" placeholder="الغرف" class="xlarge half">
               <input type="text" name="filter[bathrooms]" placeholder="الحامات" class="xlarge half">
               <input type="text" name="filter[reception]" placeholder="الاستقبال" class="xlarge half">
               <input type="text" name="filter[floor]" placeholder="الطابق" class="xlarge half">
               <input type="text" name="filter[area]" placeholder="المساحة" class="xlarge half">
            <?php endif; ?>
            

            

            </div>
            <div class="col l6">

            </div>
            <div class="clearfix"></div>
        </div>

    <div class="row no-margin">
            <div class="col l6">
                <br>
                <input type="text" name="title"  placeholder="عنوان الاعلان">
                <input type="text" name="short"  placeholder="وصف مختصر للاعلان">
                <textarea name="description" placeholder="وصف الاعلان"></textarea>
                <div class="pay-box not-payed">
                        <img src="assets/images/urgant.jpg" alt="">
                        <div class="pay-text">
                            <h3>علامة عاجل <span>20 ريال</span></h3>
                            <p>
                                    اختر اضافة علامة عاجل ليظهر الاعلان الخاص بك بشكل اكثر تميزا وبطريقة تجذب الانتباه                                                </p>
                        </div>
                        <div class="pay-select">
                            <input type="checkbox">
                            <div class="pay-btn">اضافة</div>
                        </div>
                </div>
                
            </div>
            <div class="col l6">
                <br>
                    <div class="note">
                            <img src="assets/images/info.jpg" alt="">
                            تأكد من ادخال عنوان ووصف الاعلان بشكل واضح ومميز واحرص ان يكون الوصف مفصلا واضحا بكل تفاصيل المنتج                                        </div>
            </div>
            <div class="clearfix"></div>
        </div>
</div>