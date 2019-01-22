<?php $__env->startSection('title', $user['name']); ?>
<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">

<div class="user-side inside">
            <div class="user-info-box">
                    <img src="<?php echo e(asset('imagesProfile/'.$users->profile_picture)); ?>" alt="">
                    <div class="user-data">
                        <a href="#!"><?php echo e($users->name); ?></a>
                        <span><?php echo e($users->created_at); ?></span>
                        <!--<div class="on">متصل الان</div>-->
                    </div>
                </div>
</div>


<div class="strip-head blue on-top">

    <!--<div style="float:left; white-space:nowrap">-->
    <!--    الترتيب حسب -->
    <!--    <select style="width: auto;-->
    <!--    vertical-align: middle;-->
    <!--    height: 28px;-->
    <!--    padding: 0;-->
    <!--    font-size: 13px;-->
    <!--    color: #9e9e9e;-->
    <!--    font-weight: 600;-->
    <!--    outline: none;">-->
    <!--        <option>الاحدث اولا</option>-->
    <!--        <option>الاقدم اولا</option>-->
    <!--        <option>الاعلي سعرا</option>-->
    <!--        <option>الاقل سعرا</option>-->
    <!--    </select>-->
    <!--</div>-->
</div>

                        <div class="row no-margin ads-list">
                          <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                                <div class="col l12">
                                    <!-- ad item -->
                                    <a href="<?php echo e(url('posts')); ?>/<?php echo e($post->id); ?>" class="ad-item">
                                        <div class="image-box">
                                            <img src="<?php echo e(Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)); ?>" alt="">
                                            <div class="price boxed-only">
                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="سيارة بمواصفات خاصة" class="boxed-only"><?php echo e($post->title); ?></h1>
                                        <div class="post-data normal-only">
                                            <h1 title="سيارة بمواصفات خاصة"><?php echo e($post->title); ?></h1>
                                            <div class="price"><?php echo e($post->price); ?>

                                                    <span>ر.س</span>
                                            </div>
                                            <div class="desc">
                                                <?php echo e($post->description); ?>

                                            </div>
                                        </div>
                                        <small class="boxed-only">مدينة الرياض</small>
                                        <div class="info normal-only">
                                            <h3>السعودية
                                                <small>الرياض</small>
                                            </h3>
                                            <!--<div class="time">منذ 15 دقيقة</div>-->
                                        </div>
                                        <!--<div class="watch-icon active">-->
                                        <!--    <i class="fa fa-star"></i>-->
                                        <!--</div>-->
                                    </a>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                        </div>





        

      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>