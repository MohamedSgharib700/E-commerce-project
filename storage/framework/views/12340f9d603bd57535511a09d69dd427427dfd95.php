<!-- spical inside -->
<div class="spical-inside">
    <div class="spical-head start <?php echo e(Request::is('/categories*')?"active":""); ?>">
        <?php if(Session::get('lang') == 'en'): ?>
        Featured Sections</div>
        <?php else: ?>
      الأقسام المميزه</div>
      <?php endif; ?>
       <?php if(Session::get('lang') == 'en'): ?>
    <?php if(count($specialcategories) > 0): ?>
        <?php $__currentLoopData = $specialcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($special['id']); ?>"><?php echo e($special['name_en']); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php endif; ?>
    
    <?php else: ?>
    
    <?php if(count($specialcategories) > 0): ?>
        <?php $__currentLoopData = $specialcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($special['id']); ?>"><?php echo e($special['name_ar']); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
    <?php endif; ?>
    
    <?php endif; ?>
</div>
