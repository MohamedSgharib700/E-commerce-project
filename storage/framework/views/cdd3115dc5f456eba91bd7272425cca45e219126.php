
<div class="strip-head blue to-back">تفاصيل الاعلان</div>
<div class="to-back-body ad-check">
    <div class="row no-margin borderd">
        <div class="col l6">
            <div class="top-group">
            <input type="text" name="price" class="in-mini" placeholder="السعر">
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
                        <input type="text"  class="in-mini" placeholder="ريال سعودي">
                </div>
            </div>
            <div>
                الحالة :  &nbsp;
                <label class="checkbox blued">
                        <input type="radio" name="filter[status]" value="جديد"><span></span> جديد
                </label>
                <label class="checkbox blued">
                        <input type="radio" name="filter[status]" value="مستعمل"><span></span> مستعمل
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
            <input type="text" name="type" placeholder="الماركة">
            </div>

            <div class="col l6">
                <br><br>
            </div>

            </div>
            <div class="col l4">

            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row no-margin">
        <div class="col l6">
        <br>
        <input type="text" name="title" placeholder="عنوان">
        <input type="text" name="short" placeholder="وصف مختصر للاعلان">
        <textarea name="description[]" placeholder="وصف الاعلان"></textarea>
        <div class="pay-box not-payed">
                <img src="<?php echo e(asset('front-assets/images/urgant.jpg')); ?>" alt="">
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
                <img src="<?php echo e(asset('front-assets/images/info.jpg')); ?>" alt="">
                تأكد من ادخال عنوان ووصف الاعلان بشكل واضح ومميز واحرص ان يكون الوصف مفصلا واضحا بكل تفاصيل
                المنتج
        </div>
        </div>
        <div class="clearfix"></div>
</div>
</div>