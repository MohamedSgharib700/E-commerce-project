<?php $__env->startSection('content'); ?>
<!-- normal body -->
<style>
    
    .popup-box {
    position:static;
}
    .pop-over {
    position: fixed;
    width: 100%;
    height: 100%;
    display: block;
    background: #000;
    top: 0;
    left: 0;
    z-index: 999;
    opacity: .5;
}
.pop-wrap {
    background: #fff;
    position: fixed;
    width: 90%;
    left: 50%;
    transform: translate(-50%,-50%);
    top: 50%;
    max-width: 500px;
    z-index: 999;
    text-align: center;
    border-radius: 10px;
    padding: 40px;
}
.ok {
    cursor:pointer;
}

</style>
<!-- link map -->
<div class="link-map">
<div class="map-item"><a href="index.html">الرئيسية</a></div>
<div class="map-item"> خدمة العملاء:</div>
</div>

<div class="page-container nc">

    <div class="popup-box">
                       <div class="pop-over"></div>
                       <div class="pop-wrap">
                           <p>سعدنا بتواصلك. رسالتك محل اهتمامنا</p>
                           <div class="ok butn blue">اغلاق</div>
                       </div>
                   </div>
    
<h1 class="nb bolded"> خدمة العملاء:</h1>

    
    <div>
        نحن هنا من اجلك <br> تواصل معنا
    </div><br>
    
    <div class="to-back-body" style="
    padding: 40px 0;
">
        
        <div class="row">
            
            <div class="col l6">
                <input type="text" name="" placeholder="الاسم الاول">
            </div>
            
            <div class="col l6">
                <input type="text" name="" placeholder="اسم العائلة">
            </div>
            
            <div class="col l6">
                
                <select name="" class="s-select xlarge">
                    <option>الموضوع</option>
                    <option value="طلب مساعدة">طلب مساعدة</option>
                    <option value="اقتراح">اقتراح</option>
                    <option value="شكوي">شكوي</option>
                </select>
            </div>
            
            <div class="col l12">
                <textarea name="" placeholder="التفاصيل"></textarea>
                <button class="butn blue upload-btn">ارسال</button>
            </div>
            
        </div>
        
    </div>
    

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>