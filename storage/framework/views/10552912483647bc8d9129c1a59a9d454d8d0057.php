<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">

    <div class="profile-tabs">
        <a href="<?php echo e(route ('ads')); ?>" class="active">إدارة الاعلانات</a>
        <a href="<?php echo e(route ('messages')); ?>">الرسائل</a>
        <a href="<?php echo e(route ('savedsearch')); ?>">عمليات بحث محفوظة</a>
        <a href="<?php echo e(route ('profile')); ?>">الملف الشخصي</a>
    </div>

    <div class="profile-body">

        <div class="profile-posts-tabs">
            <div class="profile-posts-tab active" data-tab-target=".all-ads">
                كل الاعلانات (<?php echo e(count($stopped) + count($active) + count($archived)); ?>)
            </div>
            <div class="profile-posts-tab" data-tab-target=".now-ads">
                اعلانات حالية (<?php echo e(count($active)); ?>)
            </div>
            <div class="profile-posts-tab" data-tab-target=".ex-ads">
                اعلانات منتهيه (<?php echo e(count($archived)); ?>)
            </div>
            <div class="profile-posts-tab" data-tab-target=".spam-ads">
                اعلانات موقوفة (<?php echo e(count($stopped)); ?>)
            </div>
            <div class="profile-posts-tab" data-tab-target=".hol-ads">
                الرغبات (<?php echo e(count($favorites)); ?>)
            </div>
        </div>

        <div class="profile-screens">

            <div class="boxed-ads <?php echo e(count($stopped) + count($active) + count($archived) ? '':'no-data'); ?> in-profile all-ads active">
                <?php $__currentLoopData = $active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item" style="margin-bottom:30px;">
                        <div class="image-box">
                            <img src="<?php echo e(asset($post->img)); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        </br>
                        <small style="display:block; margin-top:13px;"> اخر تحديث\<?php echo e($post->updated_at); ?></smal>
                        <div class="post-tools">
                                   <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $archived; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e($post->img); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $stopped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e($post->img); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($stopped) + count($active) + count($archived) == 0): ?>
                        <div class="centerd">
                            <h2>لاتوجد اعلانات حالية</h2>
                        </div>
                <?php endif; ?>
            </div>

            <div class="boxed-ads <?php echo e(count($active) ? '':'no-data'); ?> in-profile now-ads">
                <?php $__currentLoopData = $active; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e($post->img); ?>" alt="">
                            <div class="price"><?php echo e($post->price); ?>

                                <span>ر.س</span>
                            </div>
                        </div>
                        <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                        <small>مدينة الرياض</small>
                        <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($active) == 0): ?>
                         <div class="centerd">
                            <h2>لاتوجد اعلانات حالية</h2>
                        </div>
                <?php endif; ?>
            </div>

            <div class="boxed-ads <?php echo e(count($archived) ? '':'no-data'); ?> in-profile ex-ads">
                    <?php $__currentLoopData = $archived; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- ad item -->
                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                            <div class="image-box">
                                <img src="<?php echo e($post->img); ?>" alt="">
                                <div class="price"><?php echo e($post->price); ?>

                                    <span>ر.س</span>
                                </div>
                            </div>
                            <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                            <small>مدينة الرياض</small>
                            <div class="post-tools">
                                        <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($archived) == 0): ?>
                        <div class="centerd">
                                <h2>لاتوجد اعلانات منتهيه</h2>
                        </div>
                    <?php endif; ?>
            </div>
            <div class="boxed-ads <?php echo e(count($stopped) ? '':'no-data'); ?> in-profile spam-ads">
                    <?php $__currentLoopData = $stopped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- ad item -->
                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                            <div class="image-box">
                                <img src="<?php echo e($post->img); ?>" alt="">
                                <div class="price"><?php echo e($post->price); ?>

                                    <span>ر.س</span>
                                </div>
                            </div>
                            <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                            <small>مدينة الرياض</small>
                            <div class="post-tools">
                                    <span title="تعديل الاعلان" onclick="event.preventDefault(); location.href='<?php echo e(Url('editads').'/'.$post->id); ?>';" class="fa fa-pencil"></span>
                                   <span title="حذف الاعلان" onclick="event.preventDefault(); location.href='post/<?php echo e($post->id); ?>/delete';" class="fa fa-times"></span>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(count($stopped) == 0): ?>
                        <div class="centerd">
                                <h2>لاتوجد اعلانات موقوفة</h2>
                        </div>
                    <?php endif; ?>
            </div>

            <div class="boxed-ads <?php echo e(count($favorites) ? '':'no-data'); ?> in-profile hol-ads">
                <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- ad item -->
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e($post->img); ?>" alt="">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($favorites) == 0): ?>
                    <div class="centerd">
                        <h2>لاتوجد قائمة رغبات</h2>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>