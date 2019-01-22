    <?php $tmp = 'layouts.app' ?>


 <?php if(Session::get('lang') == 'en'): ?>
<?php $__env->startSection('title', ' - ' . $category->name_en); ?>
<?php else: ?>
<?php $__env->startSection('title', ' - ' . $category->name_ar); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <?php if(count($parents) == 1): ?>
    <?php if(Session::get('lang') == 'en'): ?>
        <div class="cat-banner" style="background-image:url('<?php echo e(asset($parents[0]['photo'])); ?>')">
           <!--  <h1><?php echo e($parents[0]['name_en']); ?></h1> -->
        </div>
        <?php else: ?>
        <div class="cat-banner" style="background-image:url('<?php echo e(asset($parents[0]['photo'])); ?>')">
            <!-- <h1><?php echo e($parents[0]['name_ar']); ?></h1>  -->
        </div>
        <?php endif; ?>
    <?php endif; ?> 
    
    <!--  script -->
    <script id="privet-filters" type="application/json"><?php echo json_encode($filters, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_FORCE_OBJECT); ?></script>
    <!-- normal body -->
    <div class="normal-body">
        <div class="big-container">
            <?php echo $__env->make('includes.searchbarMainCat', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- link map -->
            <div class="link-map">
                <?php if(Session::get('lang') == 'en'): ?>
                <div class="map-item"><a href="<?php echo e(route('landing')); ?>">Home</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_en']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php else: ?>
                <div class="map-item"><a href="<?php echo e(route('landing')); ?>">الرئيسية</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_ar']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <!-- search data -->
            <div class="row no-margin top-25">
                <?php echo $__env->make('sidebars.category', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="col l9">
                    
                    
                    
                    
                    
                    
                    <div>
                        
                        <div class="control-box">
                            <div class="views-box">
                                <div class="switch-view list-view">
                                    <i class="fa fa-bars"></i> عرض قائمة
                                </div>
                                <div class="switch-view grid-view active">
                                    <i class="fa fa-th-large"></i> عرض شبكي
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="row no-margin ads-list boxed-ads">
            <?php if(count($postss) > 0 || count($posts) > 0 ||  count($searchResult) > 0): ?>                
                    <?php if( isset($_GET['searchButton'] ) ): ?>
                    
                    <?php $__currentLoopData = $postss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 2): ?>
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                                <div class="col l4">
                                    <!-- ad item -->
                                    <?php if($post['isColored'] == 1): ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item heigh-light">
                                    <?php else: ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                                    <?php endif; ?>
                                    <?php if($post->isUrgent): ?>
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    <?php endif; ?>
                                        <div class="image-box">
                                          <?php if(empty( $post->images->first()->photolink)): ?>
                                           <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                          <?php else: ?>
                                          <img src="<?php echo e(Url($post->images->first()->photolink)); ?>" alt="">
                                          <?php endif; ?>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></h1>
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
                            <div class="clearfix"></div>
                        </div>
                        <br>
                        <div align="center">
                            <?php echo e($postss->links()); ?>

                         </div>
                          <?php elseif(isset($_GET['search_querys'] )): ?>
                    <?php $__currentLoopData = $searchResult; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 2): ?>
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                                <div class="col l4">
                                    <!-- ad item -->
                                    <?php if($post['isColored'] == 1): ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item heigh-light">
                                    <?php else: ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                                    <?php endif; ?>
                                    <?php if($post->isUrgent): ?>
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    <?php endif; ?>
                                        <div class="image-box">
                                          <?php if(empty( $post->images->first()->photolink)): ?>
                                           <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                          <?php else: ?>
                                          <img src="<?php echo e(Url($post->images->first()->photolink)); ?>" alt="">
                                          <?php endif; ?>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></h1>
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
                            
                              <div class="clearfix"></div>
                               </div>
                               <br>
                           <?php if(count($searchResult) == 0): ?>
                             <div class="row no-margin boxed-ads no-data">
                               <h2> لايوجد اعلان بهذا الاسم في هذا القسم </h2>
                             </div>
                           <?php endif; ?>
                       <?php else: ?>
                    
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($key == 2): ?>
                                <div class="col l4">
                                    <div class="google-ads">
                                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
                                <div class="col l4">
                                    <!-- ad item -->
                                    <?php if($post['isColored'] == 1): ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item heigh-light">
                                    <?php else: ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                                    <?php endif; ?>
                                    <?php if($post->isUrgent): ?>
                                        <div class="important"><span></span><div>عاجل</div></div>
                                    <?php endif; ?>
                                        <div class="image-box">
                                            <?php if(\App\Post_Photos::where('post_id', $post['id'])->count()): ?>
                                             <img src="<?php echo e(Url($post->img)); ?>" alt="">
                                            <?php else: ?>
                                             <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                            <?php endif; ?>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <div class="post-data normal-only">
                                            <h1 title="<?php echo e($post['title']); ?>">
                                            <?php echo e($post['title']); ?> 
                                            </h1>
                                            <div class="info normal-only">
                                            <h3><?php echo e($post['country']); ?>

                                                <small><?php echo e($post['city']); ?></small>
                                            </h3>
                                            <div class="time"> <?php echo e(strftime("%b %d %Y",strtotime($post['created_at']))); ?></div>
                                        </div>
                                            <div class="price boxed-only"><?php echo e($post['price']); ?>

                                               <?php if(Session::get('lang') == 'en'): ?>
                                                 <span>R.S</span>
                                                 <?php else: ?>
                                                 <span>ر.س</span>
                                               <?php endif; ?>
                                            </div>
                                            <div class="desc" style="overflow:hidden">
                                                <?php echo e($post['description']); ?>

                                            </div>
                                        </div>
                                        <h1 class="boxed-only" title="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></h1>
                                        <small class="boxed-only">مدينة <?php echo e($post->city); ?></small>
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
                            <div class="clearfix"></div>
                              </div>
                             <br>
                           <div align="center">
                             <?php echo e($posts->links()); ?>

                           </div>
                        <?php endif; ?>
                      <?php else: ?>
                            <div class="row no-margin boxed-ads no-data">
                               <h2>لم يتم نشر اعلانات بعد في هذا القسم</h2>
                            </div>
                     <?php endif; ?>
                            <div class="clearfix"></div>
                            
                            <div class="centerd top-50 bottom-50">
                            
                          <!--  <?php if(Session::get('lang') == 'en'): ?>
                                <a href="#!" class="butn blue">See more</a>
                                <?php else: ?>
                                <a href="#!" class="butn blue"> شاهد المزيد</a>
                                <?php endif; ?> -->
                            </div>
                        </div>
                        <div class="centerd">
                        <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                </div>


                <?php if(auth()->guard()->guest()): ?>
                <?php else: ?>
                <div class="strip-head on-top">
                    <?php if(Session::get('lang') == 'en'): ?>
                    <div class="mini-tabs">
                        <div class="tab-button active" data-tab-btn=".m25ran">Recently seen</div>
                        <div class="tab-button" data-tab-btn=".tamany">Wish list</div>
                        <div class="tab-button" data-tab-btn=".ma7foz">Saved search</div>
                    </div>
                    <?php else: ?>
                    <div class="mini-tabs">
                        <div class="tab-button active" data-tab-btn=".m25ran">شوهد مؤخرا</div>
                        <div class="tab-button" data-tab-btn=".tamany">قائمة التمني</div>
                        <div class="tab-button" data-tab-btn=".ma7foz">بحث محفوظ</div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="tabs-body">

                    <?php echo $__env->make('includes.lastseenslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->make('includes.favoriteslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <?php echo $__env->make('includes.savedsearchslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>
                <?php endif; ?>


                <!--<div class="centerd">-->
                <!--        <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">-->
                <!--</div>-->

</div>
</div>

<div class="clearfix"></div>
</div>

</div>


</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make($tmp, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>