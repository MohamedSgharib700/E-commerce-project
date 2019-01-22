                            <?php $__currentLoopData = $postsss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 2): ?>
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                                <div class="col l4">
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
                                            <img src="<?php echo e(Url(count($post->images) ? $post->images->first()->photolink : '')); ?>" alt="">
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->short); ?>"><?php echo e($post->short); ?></h1>
                                        <small>مدينة <?php echo e($post->city); ?></small>
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
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
