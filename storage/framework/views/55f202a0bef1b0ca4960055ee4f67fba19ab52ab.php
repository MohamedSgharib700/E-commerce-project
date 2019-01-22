<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">

  <div class="profile-tabs">
      <a href="<?php echo e(route ('ads')); ?>">إدارة الاعلانات</a>
      <a href="<?php echo e(route ('messages')); ?>">الرسائل</a>
      <a href="<?php echo e(route ('savedsearch')); ?>" class="active">عمليات بحث محفوظة</a>
      <a href="<?php echo e(route ('profile')); ?>">الملف الشخصي</a>
  </div>

  <div class="profile-body">

<?php if(auth()->guard()->check()): ?>
            <!-- slide start -->
            <?php  $num = 0;  ?>
            <?php $__currentLoopData = \App\SavedSearch::where('user_id',Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $savedsearch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="row no-margin table-row">
          <div class="col l7">
              <div class="bolded b-blued">
                  
                 <a href="<?php echo e($savedsearch->searchUrl); ?>" class="ad-item">  <?php echo e($savedsearch->searchWord); ?> </a>
                   
              </div>
          </div>
          <div class="col l4">حاله ارسال البريد
              <select class="s-select">
                  <option>يوميا</option>
                  <option>اسبوعيا</option>
                  <option>شهريا</option>
                  <option>ابدا</option>
              </select>
          </div>
          <div class="col l1">
              <div class="table-tools">
                  <a href="savedsearch/<?php echo e($savedsearch->id); ?>/delete"><i class="fa fa-times big-f"></i></a>
              </div>
          </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="lefted">
      <button class="butn blue mt-25 no-border modal-open" data-modal-open=".profile-messege">معاينة حفظ عملية البحث</button>
      <a href="savedsearch/<?php echo e($savedsearch->id); ?>/delete">
      <button class="butn greay gr mt-25 no-border">حذف الجميع</button>
      </a>
</div>
  </div>
<?php endif; ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>