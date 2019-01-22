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
                    <input type="radio" name="filter[price]" value="تبادل"><span></span> تبادل
            </label>
            <div class="price-hidden">
                هل تريد وضع حد ادني للتفاوض؟    &nbsp;
                <input type="text"  class="in-mini" placeholder="ريال سعودي">
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
            
            <input type="text" name="description[]" placeholder="الحد الشمالي" class="xlarge half">

            <input type="text" name="description[]" placeholder="الحد الجنوبي" class="xlarge half">

            <input type="text" name="description[]" placeholder="الحد الشرقي" class="xlarge half">

            <input type="text" name="description[]" placeholder="الحد الغربي" class="xlarge half">

            <input type="text" name="filter[area]" placeholder="المساحة" class="xlarge half">

            

            </div>
            <div class="col l6">
                <br>
                <div style="float:left; text-align:left">
                <div class="land-view">
                    <img src="assets/images/add-land.jpg" alt="">
                    <input type="text" placeholder="الطول الشمالي" class="top-size">
                    <input type="text" placeholder="الطول الشرقي" class="right-size">
                    <input type="text" placeholder="الطول الجنوبي" class="bottom-size">
                    <input type="text" placeholder="الطول الغربي" class="left-size">
                </div>
                <div class="butn blue modal-open" data-modal-open=".land-modal" style="cursor: pointer;margin-top:10px; margin-left:65px">معاينة مثال</div>
                </div>
                <br><br>

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