<?php $__env->startSection('content'); ?>
    <div class="big-head top-100 bottom-50 centerd">
        <h1>انشر اعلانك</h1>
        <small class="nc mt-15">اختر قسم الاعلان</small>
    </div>

    <!-- register -->
    <div class="big-container bottom-100 centerd">

        <!-- dropdown wrapper -->
        <div class="select-box links get-back">

            <!-- select group level 1 start  -->
            <div>
                <?php if(count($categories) > 0): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category['id'] == $ancestor): ?>
                            <i class="fa fa-<?php echo e($category['icon']); ?>"></i> <?php echo e($category['name_ar']); ?>

                            <a href="<?php echo e(Url('newad')); ?>"><i class="fa fa-times"></i></a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- select group level 1 end  -->

        </div>
    </div>

    <?php if(count($subcategoriesALL) > 0 && count($parents) > 0): ?>
        <div class="big-container bottom-100 centerd">
            <div class="top-25 bottom-25">
                <small class="nc mt-15">اختر القسم الفرعي</small>
            </div>
            <div class="select-box links">
                <!-- dropdown wrapper -->
                    <?php $__currentLoopData = $subcategoriesALL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($subcategory['id'] == $parent): ?>
                                <a href="<?php echo e(Url('newad')); ?>/<?php echo e($subcategory['id']); ?>">
                                    <i class="<?php echo e($subcategory['icon']); ?>"></i><?php echo e($subcategory['name_ar']); ?>

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="big-container bottom-100 centerd">
        <div class="top-25 bottom-25">
            <small class="nc mt-15">اختر القسم الفرعي</small>
        </div>
        <div class="select-box links">
            <!-- dropdown wrapper -->
                <?php if(count($subcategories) > 0): ?>
                    <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($subcategory['parent_id'] == $category_id): ?>
                            <a href="<?php echo e(Url('newad')); ?>/<?php echo e($subcategory['id']); ?>">
                                <i class="<?php echo e($subcategory['icon']); ?>"></i><?php echo e($subcategory['name_ar']); ?>

                            </a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>