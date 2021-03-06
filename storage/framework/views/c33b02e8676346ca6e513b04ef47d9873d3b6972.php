<div class="strip-head blue to-back">تفاصيل الاعلان</div>
    <div class="to-back-body ad-check">
        <div class="row no-margin borderd">
            <div class="col l6">
                <!--filters-->
                <div class="top-group">
                <select name="filter[نوع مقدم الطلب]"class="s-select xlarge">
                    <option>الاعلان بواسطة</option>
                    <?php $__currentLoopData = $filters['نوع مقدم الطلب']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value['name']); ?>"><?php echo e($value['name']); ?></option>  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <select name="filter[نوع العمل]"class="s-select xlarge">
                    <option>نوع الوظيفة</option>
                    <?php $__currentLoopData = $filters['نوع العمل']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value['name']); ?>"><?php echo e($value['name']); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <?php $__currentLoopData = $filters['نوع الراتب']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label class="checkbox blued">
                                <input type="radio" name="filter[نوع الراتب]" value="<?php echo e($value['name']); ?>"><span></span> <?php echo e($value['name']); ?>

                        </label><br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="col l9">
                                <div class="gray" style="margin-bottom: 5px">متوسط الراتب</div>
                                من    &nbsp;
                        <input type="text"  name="price" class="in-mini" placeholder="ريال سعودي">
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