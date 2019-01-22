<?php $__env->startSection('title', ''); ?>
<?php $__env->startSection('content'); ?>
<!-- Home -->
<div class="home-screen">
  <div class="screen" style="background-image:url('<?php echo e(asset('front-assets/images/slider-home.jpg')); ?>')" >
    <h1 class="no-margin">
        <?php if(Session::get('lang') == 'en'): ?>
         .... Everything you want and much more 
      <small> Just on gulf Roots</small>
      <?php else: ?>
      كل ما تريدة واكثر بكثير .... 
      
      <small>  فقط علي قلف روتس</small>
    </h1>
    <?php endif; ?>
  </div>
</div>
<div class="home-body">
  <div class="big-container">
      <?php echo $__env->make('includes.searchbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      <!-- home tabs -->
      <div class="home-tabs">
          <div class="row no-margin">
           <?php if(Session::get('lang') == 'en'): ?>
            <div class="home-tab col l3 active" data-tab-target=".new-ads">
               Latest Ads
            </div>
            <div class="home-tab col l3" data-tab-target=".prev-ads">
                Previous views
            </div>
            <div class="home-tab col l3" data-tab-target=".watch-ads">
               Wish List
            </div>
            <div class="home-tab col l3" data-tab-target=".search-ads">
                Previous searches
            </div>
            <?php else: ?>
            <div class="home-tab col l3 active" data-tab-target=".new-ads">
                أحدث الاعلانات
            </div>
            <div class="home-tab col l3" data-tab-target=".prev-ads">
                مشاهدات سابقة
            </div>
            <div class="home-tab col l3" data-tab-target=".watch-ads">
                قائمة الرغبات
            </div>
            <div class="home-tab col l3" data-tab-target=".search-ads">
                عمليات بحث سابقة
            </div>
            <?php endif; ?>

          </div>
      </div>


      <!-- home tabs screens -->
      
      
      <div class="home-tabs-screens">
        <!-- new ads tab -->
        <div class="home-tab-screen new-ads  active">
            <div  class="row no-margin boxed-ads">
                            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                  <!--<?php  $postss = \App\Posts::where('isApproved',1)->paginate(14);  ?>-->
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                        <?php if($key == 3): ?>
                                <div class="col l3">
                                    <div class="google-ads">
                                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                                    </div>
                                </div>
                            <?php endif; ?>
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
                                <div class="watch-icon active" >
                            <?php else: ?>
                                <div class="watch-icon" >
                            <?php endif; ?>
                                <input type="hidden" name="liked" class="liked" value="<?php echo e($post->liked); ?>">
                                <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post->id); ?>">
                                 
                                   <i class="fa fa-star"></i>
                                
                            </div>
                        </a>
                        
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               </table>
               <div align="center">
               <!--<?php echo e($posts->links()); ?>-->
               </div>
               </div>
               <!--<div class="centerd">-->
               <!--         <br>-->
               <!--         <a href="#!" class="butn blue">شاهد المزيد</a>-->
               <!--     </div>-->
                   <center>
                    <button type="button" class="butn blue" id="loadMore">شاهد المزيد</button>
                </center>
            </div>
        </div>
        <!-- prev ads tab -->
        <div class="home-tab-screen prev-ads">
                <div class="row no-margin boxed-ads">
                <?php if(count($lastseen) > 0): ?>
                    <?php $__currentLoopData = $lastseen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col l3">
                            <!-- ad item -->
                            <?php if($post['isColored']): ?>
                                <a href="<?php echo e(Url('posts').'/'.$post['id']); ?>" class="ad-item heigh-light">
                            <?php else: ?>
                                <a href="<?php echo e(Url('posts').'/'.$post['id']); ?>" class="ad-item">
                            <?php endif; ?>
                            <?php if($post['isUrgent']): ?>
                                <div class="important"><span></span><div>عاجل</div></div>
                            <?php endif; ?>
                                <div class="image-box">
                                    <img src="<?php echo e($post['img']); ?>" alt="">
                                    <div class="price"><?php echo e($post['price']); ?>

                                        <span>ر.س</span>
                                    </div>
                                </div>
                                <h1 title="<?php echo e($post['title']); ?>"><?php echo e($post['title']); ?></h1>
                                <small>مدينة <?php echo e($post['city']); ?></small>
                                <?php if($post['liked'] == 1): ?>
                                    <div class="watch-icon active">
                                <?php else: ?>
                                    <div class="watch-icon">
                                <?php endif; ?>
                                    <input type="hidden" name="liked" class="liked" value="<?php echo e($post['liked']); ?>">
                                    <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post['id']); ?>">
                                    <i class="fa fa-star"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد مشاهدات سابقة</h2>
                    <h4>ابدأ بالتصفح اﻵن</h4>

                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
                </div>
        </div>

        <!-- watch ads tab -->
        <div class="home-tab-screen watch-ads">
            <?php if(auth()->guard()->guest()): ?>
                <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد قائمة رغبات</h2>
                    <h4>ابدأ بالتسجيل واضافة منتجات لتظهر في القائمة</h4>

                </div>
                <div class="clearfix"></div>
            <?php else: ?>
                <div class="row no-margin boxed-ads">
                <?php if(count($favorites) > 0): ?>
                    <?php $__currentLoopData = $favorites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col l3">
                            <!-- ad item -->
                            <?php if($post['isColored']): ?>
                                <a href="<?php echo e(Url('posts').'/'.$post['id']); ?>" class="ad-item heigh-light">
                            <?php else: ?>
                                <a href="<?php echo e(Url('posts').'/'.$post['id']); ?>" class="ad-item">
                            <?php endif; ?>
                            <?php if($post['isUrgent']): ?>
                                <div class="important"><span></span><div>عاجل</div></div>
                            <?php endif; ?>
                                <div class="image-box">
                                    <img src="<?php echo e($post['img']); ?>" alt="">
                                    <div class="price"><?php echo e($post['price']); ?>

                                        <span>ر.س</span>
                                    </div>
                                </div>
                                <h1 title="<?php echo e($post['title']); ?>"><?php echo e($post['title']); ?></h1>
                                <small>مدينة <?php echo e($post['city']); ?></small>
                                <?php if($post['liked'] == 1): ?>
                                    <div class="watch-icon active">
                                <?php else: ?>
                                    <div class="watch-icon">
                                <?php endif; ?>
                                    <input type="hidden" name="liked" class="liked" value="<?php echo e($post['liked']); ?>">
                                    <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post['id']); ?>">
                                    <i class="fa fa-star"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="row no-margin boxed-ads no-data">

                    <h2>لاتوجد قائمة رغبات</h2>

                    </div>
                    <div class="clearfix"></div>
                <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- search ads tab -->
        <div class="home-tab-screen search-ads">

            <div class="row no-margin boxed-ads no-data">

                <h2>لاتوجد عمليات بحث سابقة</h2>
                <h4>ابدأ باضافه عمليات البحث السابقه من خلال اختيار كلمة البحث والضغط علي مفتاح إبحث.</h4>

            </div>

        </div>


        <!-- <div class="centerd top-50">
                <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
        </div> -->

      </div>


  </div>

</div>
<div class="top-cats">

    <div class="big-container">

        <div class="top-head centerd">
            <?php if(Session::get('lang') == 'en'): ?>
            <h2>Featured Sections</h2>
            <h5>Browse through the most popular and popular sections</h5>
            
        </div>

        <div class="row no-margin bottom-50">

             <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/1}}"><img src="<?php echo e(asset('front-assets/images/cat1.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/193}}"><img src="<?php echo e(asset('front-assets/images/cat2.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/123}}"><img src="<?php echo e(asset('front-assets/images/cat3.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/272}}"><img src="<?php echo e(asset('front-assets/images/cat4.jpg')); ?>" alt=""></a>
            </div>

            <div class="clearfix"></div>
            <?php else: ?>
            
            <h2>الأقسام المميزة</h2>
            <h5>تصفح من خلال الاقسام المميزة والاكثر شعبية</h5>
        </div>

        <div class="row no-margin bottom-50">

            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/1}}"><img src="<?php echo e(asset('front-assets/images/cat1.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/193}}"><img src="<?php echo e(asset('front-assets/images/cat2.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/123}}"><img src="<?php echo e(asset('front-assets/images/cat3.jpg')); ?>" alt=""></a>
            </div>
            <div class="col l3 centerd">
                    <a href="<?php echo e(Url('/')); ?>/categories/272}}"><img src="<?php echo e(asset('front-assets/images/cat4.jpg')); ?>" alt=""></a>
            </div>

            <div class="clearfix"></div>
        <?php endif; ?>
        </div>

    </div>

</div>
    <div class="spical-cats white-bg">
        <div class="big-container">
        <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>

      <!-- home slider -->
      <div class="home-slider">
            <div class="swiper-container" dir="rtl">
                <div class="swiper-wrapper">
                   <?php if(Session::get('lang') == 'en'): ?>
                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>Buy and sell safely</h2>
                                    <h5>
                                       You can purchase and sell with all confidentiality and safety
 We provide high security and protection of data, transactions and privacy to the seller and buyer at the same time<br>
                                        
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="<?php echo e(asset('front-assets/images/home-slider.jpg')); ?>" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->

                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>Buy and sell safely</h2>
                                    <h5>
                                       You can purchase and sell with all confidentiality and safety
 We provide high security and protection of data, transactions and privacy to the seller and buyer at the same time<br>
                                        
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="<?php echo e(asset('front-assets/images/home-slider.jpg')); ?>" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->
                    
                    <?php else: ?>
                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>الشراء والبيع بكل امان</h2>
                                    <h5>
                                        يمكنك مع قلف روتس الشراء والبيع بكل سرية وامان<br>
                                        نوفر وسائل عالية من الامان والحماية للبيانات والتعاملات والخصوصية للبائع
                                        والمشتري في وقت واحد
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="<?php echo e(asset('front-assets/images/home-slider.jpg')); ?>" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->

                    <!-- slide start -->
                    <div class="swiper-slide" style="background-color:#078aff">
                        <div class="big-container">
                            <div class="row no-margin">
                                <div class="col l1"></div>
                                <div class="col l5">
                                    <h2>الشراء والبيع بكل امان</h2>
                                    <h5>
                                        يمكنك مع قلف روتس الشراء والبيع بكل سرية وامان<br>
                                        نوفر وسائل عالية من الامان والحماية للبيانات والتعاملات والخصوصية للبائع
                                        والمشتري في وقت واحد
                                    </h5>
                                </div>
                                <div class="col l5 lefted">
                                    <img src="<?php echo e(asset('front-assets/images/home-slider.jpg')); ?>" alt="">
                                </div>
                                <div class="col l1"></div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- slide end -->
                <?php endif; ?>

                </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
            </div>
      </div>
      
<script type="text/javascript">
var page = 1;

$(document).on("click","#loadMore",function() {
   page=page+1;
   loadMoreData(page);
});

function loadMoreData(page){
    var url = "<?php echo e(url('/?page=')); ?>"+page;
    $.get(url,function(data){
        if(data.html == ''){
            $('#loadMore').hide();
        }
        console.log(data.html);
$('.box-body').append(data.html);
    })
}

$(document).on("change","#search_query", function(){
    if($('#search_query').val() = '') {
      alert('يجب ان تكون قيمة الاحد الادني اقل من الحد الاقصي.');
    }
});


</script>
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>