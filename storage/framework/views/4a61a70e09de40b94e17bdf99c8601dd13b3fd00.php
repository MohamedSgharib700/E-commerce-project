<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">

    <div class="profile-tabs">
        <a href="<?php echo e(Url('user/'.$user['id'].'/ads')); ?>" class="active">الاعلانات</a>
        <a href="<?php echo e(Url('user/'.$user['id'])); ?>">الملف الشخصي</a>
    </div>

    <div class="profile-body">

        <div class="profile-posts-tabs">
            <div class="profile-posts-tab active" data-tab-target=".now-ads">
                اعلانات حالية (<?php echo e(count($active)); ?>)
            </div>
            <div class="profile-posts-tab" data-tab-target=".ex-ads">
                اعلانات منتهيه (<?php echo e(count($archived)); ?>)
            </div>
        </div>

        <div class="profile-screens">
            <div class="boxed-ads <?php echo e(count($archived) ? '':'no-data'); ?> in-profile ex-ads">
                <?php $__currentLoopData = $archived; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($post->isArchived == 1): ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e(asset($post->img)); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        <?php if($post->liked == 1): ?>
                            <div class="watch-icon active">
                        <?php else: ?>
                            <div class="watch-icon">
                        <?php endif; ?>
                            <input type="hidden" name="liked" class="liked" value="<?php echo e($post->liked); ?>">
                            <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post->id); ?>">
                            <i class="fa fa-star"></i>
                        </div>
                    </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($archived) == 0): ?>
                    <div class="centerd">
                            <h2>لاتوجد اعلانات منتهيه</h2>
                    </div>
                <?php endif; ?>
            </div>
            <div class="boxed-ads in-profile <?php echo e(count($active) ? '':'no-data'); ?> now-ads active">
                <?php $__currentLoopData = $active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($post->isArchived == 0): ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e(asset($post->img)); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        <?php if($post->liked == 1): ?>
                            <div class="watch-icon active">
                        <?php else: ?>
                            <div class="watch-icon">
                        <?php endif; ?>
                            <input type="hidden" name="liked" class="liked" value="<?php echo e($post->liked); ?>">
                            <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post->id); ?>">
                            <i class="fa fa-star"></i>
                        </div>
                    </a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($active) == 0): ?>
                <div class="centerd">
                        <h2>لاتوجد اعلانات حاليه</h2>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>