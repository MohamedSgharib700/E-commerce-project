<div class="mini-tab-box tamany">
    <div class="swiper-container" dir="rtl">
            <div class="swiper-wrapper">
            <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- slide start -->
                <?php if($key % 2 == 0): ?>
                <div class="swiper-slide">
                <?php endif; ?>
                    <!-- ad item -->
                    <?php if($post->isColored): ?>
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item heigh-light">
                    <?php else: ?>
                    <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                    <?php endif; ?>
                    <?php if($post->isUrgent): ?>
                    <div class="important"><span></span><div>عاجل</div></div>
                    <?php endif; ?>
                        <div class="image-box">
                            <img src="<?php echo e(Url($post->img)); ?>" alt="">
                        </div>
                        <div class="post-data">
                            <h1 title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></h1>
                            <div class="price"><?php echo e($post->price); ?>

                                    <span>ر.س</span>
                            </div>
                            <small class="boxed-only">مدينة <?php echo e($post->city); ?></small>
                        </div>
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
                <?php if($key % 2 != 0): ?>
                </div>
                <?php endif; ?>
                <!-- slide end -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(count($favorites) != 0 && count($favorites) % 2 != 0): ?>
            </div>
            <?php endif; ?>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
    </div>
</div>