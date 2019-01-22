<?php $__env->startSection('content'); ?>
    <div class="big-head top-100 bottom-50 centerd">
        <h1>انشر اعلانك</h1>
        <small class="nc mt-15">اختر قسم الاعلان</small>
    </div>

    <!-- register -->
    <div class="big-container bottom-100 centerd">

        <!-- dropdown wrapper -->
        <div class="select-box links">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(Url('newad')); ?>/<?php echo e($category['id']); ?>"><i class="fa fa-<?php echo e($category['icon']); ?>"></i><?php echo e($category['name_ar']); ?>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- select dropdown end -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>