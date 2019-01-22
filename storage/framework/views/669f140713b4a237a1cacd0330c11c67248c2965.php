<?php $__env->startSection('content'); ?>
<div class="big-head top-100 bottom-50 centerd">
            <h1>اختر نوع الحساب</h1>
    </div>

      <!-- register -->
      <div class="big-container register-select bottom-100 centerd">

        <a href="<?php echo e(url('personalregister')); ?>" class="zoom">
            <img src="<?php echo e(asset('front-assets/images/personal.jpg')); ?>" alt="">
            <h3>تسجيل حساب شخصي <small>حساب خاص بالافراد</small></h3>
        </a>
        <a href="<?php echo e(url('companyregister')); ?>" class="zoom">
            <img src="<?php echo e(asset('front-assets/images/company2.jpg')); ?>" alt="">
            <h3>تسجيل حساب شركات <small>حساب خاص بالشركات</small></h3>
        </a>
        <a href="<?php echo e(url('commercialuserregister')); ?>" class="zoom">
            <img src="<?php echo e(asset('front-assets/images/family.jpg')); ?>" alt="">
            <h3>تسجيل حساب عائلي <small>حساب خاص بتجار المستقبل والاسر المنتجة</small></h3>
        </a>

      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>