<?php $__env->startSection('content'); ?>
    <div class="big-head top-100 bottom-50 centerd">
        <h1>انشر اعلانك</h1>
        <small class="nc mt-15">اختر قسم الاعلان</small>
    </div>

    <!-- register -->
    <!-- register -->
    <div class="big-container bottom-100 centerd">

        <!-- dropdown wrapper -->
        <div class="select-box links get-back">

            <!-- select group level 1 start  -->
            <div>
                <?php if(count($categories) > 0): ?>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category['id'] == $ancestor): ?>
                            <i class="<?php echo e($category['icon']); ?>"></i> <?php echo e($category['name_ar']); ?>

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

        <!-- dropdown wrapper -->
        <form id="form1" role="form" method="POST" action="<?php echo e(Url('newad')); ?>">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="subcategory_id" value="<?php echo e($category_id); ?>">
            <input type="hidden" id="SupplyOrDemand" name="SupplyOrDemand" value="">
            <div class="select-box links">
                <!-- select start  -->
                    <a onclick="document.getElementById('SupplyOrDemand').value='Supply';document.getElementById('form1').submit();"><i></i> للعرض</a>
                <!-- select end  -->

                <!-- select start  -->
                    <a onclick="document.getElementById('SupplyOrDemand').value='Demand';document.getElementById('form1').submit();"><i></i> للطلب</a>
                <!-- select end  -->
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>