<div class="mini-tab-box ma7foz">
    <div class="swiper-container" dir="rtl">
        <div class="swiper-wrapper">
            <?php if(auth()->guard()->check()): ?>
            <!-- slide start -->
            <?php  $num = 0;  ?>
            <?php $__currentLoopData = \App\SavedSearch::where('user_id',Auth::user()->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $saved): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($num % 2 == 0): ?>
                <div class="swiper-slide">
                <?php endif; ?>
                    <!-- ad item -->
                    <a href="<?php echo e($saved->searchUrl); ?>" class="ad-item">
                        <div class="image-box">
                            <img src="<?php echo e(asset('images/dca2e6d461d197443d6751d1d4b3335b.jpg')); ?>" alt="">
                        </div>
                        <div class="post-data">
                            <h1 title="<?php echo e($saved->searchWord); ?>"><?php echo e($saved->searchWord); ?></h1>
                        </div>
                        
                    </a>
                <?php if($num % 2 != 0): ?>
                </div>
                <?php endif; ?>
                <?php  $num ++;  ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php if(\App\SavedSearch::where('user_id',Auth::user()->id)->count() % 2 != 0): ?>
                </div>
            <?php endif; ?>
            <!-- slide end -->
            <?php endif; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>