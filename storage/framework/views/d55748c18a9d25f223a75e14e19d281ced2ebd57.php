                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col l3">
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
                                <?php if(\App\Post_Photos::where('post_id', $post['id'])->count()): ?>
                                <img src="<?php echo e(Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                <?php endif; ?>
                                <div class="price"><?php echo e($post->price); ?>

                                <?php if(Session::get('lang') == 'en'): ?>
                                    <span>R.S</span>
                                <?php else: ?>
                                    <span>ر.س</span>
                                <?php endif; ?>
                                </div>
                            </div>
                            <h1 title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></h1>
                             <?php if(Session::get('lang') == 'en'): ?>
                            <small>City <?php echo e($post->city); ?></small>
                            <?php else: ?>
                            <small>مدينة <?php echo e($post->city); ?></small>
                            <?php endif; ?>
                            <?php if($post->liked == 1): ?>
                                <div class="watch-icon active">
                            <?php else: ?>
                                <div class="watch-icon">
                            <?php endif; ?>
                                <input type="hidden" name="liked" class="liked" value="<?php echo e($post->liked); ?>">
                                <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post->id); ?>">
                                <?php if(Auth::check()): ?>
                                    <i class="fa fa-star"></i>
                                 <?php endif; ?>
                            </div>
                        </a>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
