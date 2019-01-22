 
<?php $__env->startSection('content'); ?>
    <!-- normal body -->
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ar_AR/sdk.js#xfbml=1&version=v2.12';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<style>
.popup-box {
    position:static;
}
    .pop-over {
    position: fixed;
    width: 100%;
    height: 100%;
    display: block;
    background: #000;
    top: 0;
    left: 0;
    z-index: 999;
    opacity: .5;
}
.pop-wrap {
    background: #fff;
    position: fixed;
    width: 90%;
    left: 50%;
    transform: translate(-50%,-50%);
    top: 50%;
    max-width: 500px;
    z-index: 999;
    text-align: center;
    border-radius: 10px;
    padding: 40px;
}
.ok {
    cursor:pointer;
}
a.social-share {
    display: inline-block;
    background: #048bfb;
    padding: 5px 15px;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}
</style>
    <div class="normal-body">
       
        <div class="big-container">

            <?php echo $__env->make('includes.searchbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- link map -->
             <?php if(Session::get('lang') == 'en'): ?>
            <div class="link-map">
                <div class="map-item"><a href="<?php echo e(route ('landing')); ?>">Home</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_en']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="map-item"><?php echo e($post['title']); ?></div>
                <div class="map-item"> Ad number : <?php echo e($post['id']); ?></di
            </div>
            <?php else: ?>
            <div class="link-map">
                <div class="map-item"><a href="<?php echo e(route ('landing')); ?>">الرئيسية</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_ar']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="map-item"><?php echo e($post['title']); ?></div>
              
                <div class="map-item"> رقم الاعلان : <?php echo e($post['id']); ?></div>
            </div>
            <?php endif; ?>
           
              
            <!-- search data -->
            <div class="row no-margin top-25">
              <?php if(Session::has('message')): ?>
                   <div class="<?php echo e(Session::get('alert-class', 'popup-box')); ?>">
                       <div class="pop-over"></div>
                       <div class="pop-wrap">
                           <p><?php echo e(Session::get('message')); ?></p>
                           <div class="ok butn blue">اغلاق</div>
                       </div>
                   </div>  
                   <?php endif; ?>
                <div class="col l9">
                   
                    <div class="single-box">
                        <?php if($post['liked'] == 1): ?>
                            <div class="watch-icon active">
                        <?php else: ?>
                            <div class="watch-icon">
                        <?php endif; ?>
                            <input type="hidden" name="liked" class="liked" value="<?php echo e($post['liked']); ?>">
                            <input type="hidden" name="post_id" class="post_id" value="<?php echo e($post['id']); ?>">
                            <i class="fa fa-star"></i>
                        </div>
                        <?php if(Session::get('lang') == 'en'): ?>
                        <h1><?php echo e($post['short']); ?></h1>
                        <h3> <?php echo e($post['price']); ?> <span>Real</span></h3>
                        <?php else: ?>
                        <h1><?php echo e($post['short']); ?></h1>
                        <h3> <?php echo e($post['price']); ?> <span>ريال</span></h3>
                        <?php endif; ?>
                        <div class="row no-margin borderd">
                            <div class="col l6">
                                <?php if(Session::get('lang') == 'en'): ?>
                                <i class="fa fa-map-marker"></i>
                                <?php echo e($post['address']); ?> | <span dir="ltr">Watch <?php echo e(Counter::showAndCount('posts', $post['id'])); ?> </span>
                                <?php else: ?>
                                <i class="fa fa-map-marker"></i>
                                <?php echo e($post['address']); ?> | <span dir="ltr">مشاهدة <?php echo e(Counter::showAndCount('posts', $post['id'])); ?> </span>
                                <?php endif; ?>
                            </div>
                            <div class="col l6 lefted">
                                <?php if(Session::get('lang') == 'en'): ?>
                                 <?php if(Auth::user()): ?>
                                  <a href="<?php echo e(Url('newad') .'/'. $post['category_id']); ?>">
                                    <i class="fa fa-plus crcl"></i> Add your ad
                                  </a>
                                 <?php else: ?>
                                  <a href="<?php echo e(route('login')); ?>">
                                    <i class="fa fa-plus crcl"></i> Add your ad
                                  </a>
                                 <?php endif; ?>
                                <?php else: ?>
                                 <?php if(Auth::user()): ?>
                                   <a href="<?php echo e(Url('newad') .'/'. $post['category_id']); ?>">
                                    <i class="fa fa-plus crcl"></i> اضف اعلان مشابة
                                </a>
                                 <?php else: ?>
                                   <a href="<?php echo e(route('login')); ?>">
                                    <i class="fa fa-plus crcl"></i> اضف اعلان مشابة
                                   </a>
                                 <?php endif; ?>
                                <?php endif; ?>
                                |
                                <?php if(Session::get('lang') == 'en'): ?>
                                <a href="#!" class="modal-open" data-modal-open=".share-now">
                                    <i class="fa fa-share crcl"></i> sharing
                                </a>
                                <?php else: ?>
                               <a href="#!" class="modal-open" data-modal-open=".share-now">
                                    <i class="fa fa-share crcl"></i> مشاركة
                                </a>
                                <?php endif; ?>
                                |
                                <?php if(Session::get('lang') == 'en'): ?>
                                <a href="#!" class="show-drop">
                                    <i class="fa fa-ban"></i>Report responsible announcement

                                </a>
                                <?php else: ?>
                                <a href="#!" class="show-drop">
                                    <i class="fa fa-ban"></i> ابلغ عن اعلان مسئ
                                </a>
                                <?php endif; ?>
                                <div class="report-box my-drop">
                                     <?php if(Session::get('lang') == 'en'): ?>
                                    <form method="POST" action="<?php echo e(Url('report/'.$post['id'])); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="1"><span></span> Duplicate Advertisement
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="2"><span></span> False announcement
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="3"><span></span> Wrong classification
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="4"><span></span> unavailable
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="5"><span></span> Advertiser does not deriveيب
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="6"><span></span> Other
                                        </label>
                                        <input type="submit" value="Report">
                                    </form>
                                    <?php else: ?>
                                    <form method="POST" action="<?php echo e(Url('report/'.$post['id'])); ?>">
                                        <?php echo e(csrf_field()); ?>

                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="1"><span></span> اعلان مكرر
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="2"><span></span> اعلان زائف
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="3"><span></span> تصنيف خاطئ
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="4"><span></span> غير متاحة
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="5"><span></span> المعلن لا يستجيب
                                        </label>
                                        <label class="checkbox blued">
                                            <input type="checkbox" name="type" value="6"><span></span> اخري
                                        </label>
                                        <input type="submit" value="تبليغ">
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <?php $__currentLoopData = $post_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide" style="background-image:url('<?php echo e(asset($photo->photolink)); ?>')"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                            <?php $__currentLoopData = $post_photos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $photo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide" style="background-image:url('<?php echo e(asset($photo->photolink)); ?>')"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    </div>


                    <div class="centerd top-25 bottom-25">
                        <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                    </div>

                    <div class="product-info">

                        <div class="row no-margin">
                            <div class="col l7">
                                <?php if(Session::get('lang') == 'en'): ?>
                                <h2>Product Description</h2>
                                <p>
                                  <?php echo e($post['description']); ?>

                                </p>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php else: ?>
                                    <h2>وصف المنتج</h2>
                                <p>
                                  <?php echo e($post['description']); ?>

                                </p>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <?php endif; ?>
                            </div>
                            <div class="col l5">
                                <div class="product-det">
                                    <?php if(Session::get('lang') == 'en'): ?>
                                    <div>
                                        Date of announcement
                                        <span><?php echo e(strftime("%b %d %Y",strtotime($post['created_at']))); ?></span>
                                    </div>
                                    <div>
                                        Modified date
                                        <span><?php echo e(strftime("%b %d %Y",strtotime($post['updated_at']))); ?></span>
                                    </div>
                                    <div>
                                       Case
                                        <span><?php echo e($post['status']); ?></span>
                                    </div>
                                    <?php else: ?>
                                    <div>
                                        تاريخ الاعلان
                                        <span><?php echo e(strftime("%b %d %Y",strtotime($post['created_at']))); ?></span>
                                    </div>
                                    <div>
                                        تاريخ التعديل
                                        <span><?php echo e(strftime("%b %d %Y",strtotime($post['updated_at']))); ?></span>
                                    </div>
                                    <div>
                                        الحالة
                                        <span><?php echo e($post['status']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php if(count($latest) > 1): ?>
                    <?php if(Session::get('lang') == 'en'): ?>
                    <div class="strip-head blue on-top">Latest ads for this seller</div>
                    <?php else: ?>
                     <div class="strip-head blue on-top">احدث الاعلانات لهذا البائع</div>
                     <?php endif; ?>

                    <div class="row no-margin ads-list">
                        <?php $__currentLoopData = $latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($listing->id != $post['id']): ?>
                                <div class="col l4">
                                    <!-- ad item -->
                                    <a href="<?php echo e(Url('posts').'/'.$listing->id); ?>" class="ad-item">
                                        <div class="image-box">
                                            <?php if(\App\Post_Photos::where('post_id', $listing['id'])->count()): ?>
                                <img src="<?php echo e(Url(\App\Post_Photos::where('post_id', $listing['id'])->first()->photolink)); ?>" alt="">
                                <?php else: ?>
                                <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                <?php endif; ?>
                                            <div class="price boxed-only"><?php echo e($listing->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($listing->title); ?>" class="boxed-only"><?php echo e($listing->title); ?></h1>
                                        <div class="post-data normal-only">
                                            <h1 title="<?php echo e($listing->title); ?>"><?php echo e($listing->title); ?></h1>
                                            <div class="price"><?php echo e($listing->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                            <div class="desc">
                                                <?php echo e($listing->description); ?>

                                            </div>
                                        </div>
                                        <small class="boxed-only"><?php echo e($listing->city); ?></small>
                                        <div class="info normal-only">
                                            <h3><?php echo e($listing->country); ?>

                                                <small><?php echo e($listing->city); ?></small>
                                            </h3>
                                            <div class="time"><?php echo e(strftime("%b %d %Y",strtotime($listing->created_at))); ?></div>
                                        </div>
                                        <?php if($listing->liked == 1): ?>
                                            <div class="watch-icon active">
                                        <?php else: ?>
                                            <div class="watch-icon">
                                        <?php endif; ?>
                                            <input type="hidden" name="liked" class="liked" value="<?php echo e($listing->liked); ?>">
                                            <input type="hidden" name="post_id" class="post_id" value="<?php echo e($listing->id); ?>">
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </a>
                                </div>
                            <?php endif; ?>    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                    
                    <!--Ads 1-->
                    
                    <div class="centerd">
                        <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                    </div>
                    
                    <?php if(count($alike) > 0): ?>
                     <?php if(Session::get('lang') == 'en'): ?>
                    <div class="strip-head on-top">Similar ads</div>
                    <?php else: ?>
                    <div class="strip-head on-top">اعلانات متشابهه</div>
                    <?php endif; ?>
                    
                    <div class="row no-margin ads-list">
                        <?php $__currentLoopData = $alike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $listing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col l4">
                                <!-- ad item -->
                                <a href="<?php echo e(Url('posts').'/'.$listing->id); ?>" class="ad-item">
                                    <div class="image-box">
                                        <img src="<?php echo e(asset($listing->img)); ?>" alt="">
                                        <div class="price boxed-only"><?php echo e($listing->price); ?>

                                            <span>ر.س</span>
                                        </div>
                                    </div>
                                    <h1 title="<?php echo e($listing->title); ?>" class="boxed-only"><?php echo e($listing->title); ?></h1>
                                    <div class="post-data normal-only">
                                        <h1 title="<?php echo e($listing->title); ?>"><?php echo e($listing->title); ?></h1>
                                        <div class="price"><?php echo e($listing->price); ?>

                                            <span>ر.س</span>
                                        </div>
                                        <div class="desc">
                                            <?php echo e($listing->description); ?>

                                        </div>
                                    </div>
                                    <small class="boxed-only"><?php echo e($listing->city); ?></small>
                                    <div class="info normal-only">
                                        <h3><?php echo e($listing->country); ?>

                                            <small><?php echo e($listing->city); ?></small>
                                        </h3>
                                        <div class="time"><?php echo e(strftime("%b %d %Y",strtotime($listing->created_at))); ?></div>
                                    </div>
                                    <?php if($listing->liked == 1): ?>
                                        <div class="watch-icon active">
                                    <?php else: ?>
                                        <div class="watch-icon">
                                    <?php endif; ?>
                                        <input type="hidden" name="liked" class="liked" value="<?php echo e($listing->liked); ?>">
                                        <input type="hidden" name="post_id" class="post_id" value="<?php echo e($listing->id); ?>">
                                        <i class="fa fa-star"></i>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                   

                  <?php if(Auth::user()): ?>
                    <div class="strip-head on-top">
                        <?php if(Session::get('lang') == 'en'): ?>
                        <div class="mini-tabs">
                            <div class="tab-button active" data-tab-btn=".m25ran">Recently Viewed</div>
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
                
                <!--Ads 2-->
                    <div class="centerd">
                        <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                    </div>

                </div>

                <div class="col l3">

                    <div class="user-side">
                        <div class="user-info-box">
                       <?php if( $seller->profile_picture != null): ?>
                            <img src="<?php echo e(asset('imagesProfile/'.$seller->profile_picture)); ?>" alt="">
                        <?php else: ?>
                         <img src="<?php echo e(asset('front-assets/images/user.jpg')); ?>" alt="">
                       <?php endif; ?>
                            <div class="user-data">
                                <a href="<?php echo e(Url('user/'.$seller->id)); ?>"><?php echo e($seller->name); ?></a>
                                <span><?php echo e(strftime("%b %d %Y",strtotime($seller->created_at))); ?></span>
                                
                                 <!--<div class="on">متصل الان</div> -->
                            </div>
                        </div>
                        <?php if(Auth::check()): ?>
                        <a href="<?php echo e(url('conv')); ?>/<?php echo e($seller->id); ?>" data-modal-open=".direct-messege" class="modal-open openUserConv" style="color: #fff;">
                            <div class="send-masseg mt-25 the-btn blue">
                             <?php if(Session::get('lang') == 'en'): ?>
                             send a message
                             <?php else: ?>
                            ارسل رسالة
                            <?php endif; ?>
                            </div>
                        </a>
                        <?php endif; ?>
                        <div class="my-modal normal-messege">
                        <div class="closer"></div>
                        <div class="my-modal-body">
                            <?php if(Session::get('lang') == 'en'): ?>
                            <h1 class="no-margin nb">Send a message to me : </h1>
                            <?php else: ?>
                            <h1 class="no-margin nb">ارسل رسالة الي : </h1>
                            <?php endif; ?>
                            <form class="frmSendMessge" role="form" method="POST" action="<?php echo e(action('MessagesController@SendMessage')); ?>">
                              <?php echo csrf_field(); ?>

                              <?php if(Session::get('lang') == 'en'): ?>
                              <input type="text" placeholder="Title">
                              <textarea name="message-data" id="message-data" class="send-massege" placeholder="Enter"></textarea>
                              <input type="hidden" name="_id" value="<?php echo e($seller->id); ?>">
                              <button class="send-btn" type="submit">Send</button>
                              <?php else: ?>
                              <input type="text" placeholder="عنوان الرساله">
                              <textarea name="message-data" id="message-data" class="send-massege" placeholder="اكتب رسالتك"></textarea>
                              <input type="hidden" name="_id" value="<?php echo e($seller->id); ?>">
                              <button class="send-btn" type="submit" class="redirect-register">ارسال</button>
                              <?php endif; ?>
                            </form>
                        </div>
                        </div>

                       <?php if(Session::get('lang') == 'en'): ?>
                        <a href="http://api.whatsapp.com/send?phone=<?php echo e($seller->whatsapp_number); ?>" target="_blank" class="whats mt-15 the-btn gray">Continue through Watts</a>
                        <a href="http://api.whatsapp.com/send?phone=<?php echo e($seller->whatsapp_number); ?>" target="_blank" class="whats mt-15 the-btn gray" style="background: #1ec10c;">Continue through Watts</a>
                        <?php else: ?>
                          <?php if($seller->whatsapp_number == null): ?>
                        <a href="" class="whats mt-15 the-btn gray">تواصل خلال واتس اب</a>
                          <?php else: ?>
                        <a href="http://api.whatsapp.com/send?phone=<?php echo e($seller->whatsapp_number); ?>" target="_blank" class="whats mt-15 the-btn gray" style="background: #1ec10c;">تواصل خلال واتس اب</a>
                          <?php endif; ?>
                        <?php endif; ?>

                        <div class="borderd mt-15 show-num">
                            <?php if(Session::get('lang') == 'en'): ?>
                            Show number
                            <?php else: ?>
                            اظهر الرقم
                            <?php endif; ?>
                            <span>
                                
                            <?php echo e(substr($seller->whatsapp_number, 0, 3)); ?>******
                            </span>
                            <span>
                                <?php echo e($seller->whatsapp_number); ?>

                            </span>
                        </div>


                        <div class="borderd">
                            
                                <?php if(Session::get('lang') == 'en'): ?>
                                <h3 class="centerd">are you busy?
                                    <small>Leave your data and we will contact you again</small>
                                </h3>
                                <input placeholder="Name" type="text">
                                <input placeholder="Phone" type="text">
                                <textarea placeholder="Notes"></textarea>
                                <input type="submit" value="Send">
                                <?php else: ?>
                                <h3 class="centerd">هل انت مشغول؟
                                    <small>اترك بياناتك وسوف نعاود الاتصال بك</small>
                                </h3>
                                <form method="post" action="<?php echo e(Url('/send')); ?>" accept-charset="UTF-8">
                                     <?php echo e(csrf_field()); ?>

                                     
                                    <div>
                                     <input name="sender_name" placeholder="الاسم" type="text" required>
                                     <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                    </div>
                                     <input name="sender_phone" placeholder="رقم الجوال" type="text" required>
                                     <?php if($errors->has('sender_phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('sender_phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                     <textarea name="messages" required placeholder="ملاحظات"></textarea> 
                                     <input name="sender_id" type="hidden" value="<?php echo e($userAuth['id']); ?>" > 
                                     <input name ="sentTo_id" type="hidden" value="<?php echo e($post['user_id']); ?>" >
                                     
                                <input type="submit" value="ارسال">
                                </form>
                                <?php endif; ?>
                           
                        </div>

                        <div class="borderd ebay">
                            
                            <?php if(Session::get('lang') == 'en'): ?>
                              <?php if($seller->type == 1 || $seller->type == 2): ?>
                                 <a href="<?php echo e($seller->getCommerical->maaroof_url); ?>" class="map-opener modal-open" data-modal-open=".location">
                                   <i class="fa fa-map-marker"></i> Link the merchant</a>
                              <?php else: ?>
                                 <a href="<?php echo e($seller->getCommerical->maaroof_url); ?>" class="map-opener modal-open" data-modal-open=".location">
                                   <i class="fa fa-map-marker"></i> There is no website link for the merchant</a>
                              <?php endif; ?>
                            <?php else: ?>
                              <?php if($seller->type == 1 || $seller->type == 2): ?>
                                <a href="<?php echo e($seller->getCommerical->maaroof_url); ?>" class="map-opener modal-open" data-modal-open=".location">
                                <i class="fa fa-map-marker"></i> رابط موع التاجر  <a>
                              <?php else: ?>
                               
                              <?php endif; ?>
                            <?php endif; ?>
                            
                 
                            <?php if(Session::get('lang') == 'en'): ?>
                            <div class="centerd bolded nc top-25">
                              Make a presentation
                                <div class="input-ebay mt-15">
                                    <form>
                                        <input type="text" placeholder="0">
                                        <button type="submit">Push</button>
                                    </form>
                                </div>

                            </div>
                            <?php else: ?>
                            <div class="centerd bolded nc top-25">
                                قم بتقديم سعر
                                <div class="input-ebay mt-15">
                                    <form>
                                        <input type="text" placeholder="0">
                                        <button type="submit">ادفع</button>
                                    </form>
                                </div>

                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if(Session::get('lang') == 'en'): ?>
                        <div class="mt-15">
                            <div class="bolded nb">times of work</div>
                            <div class="nc">
                            <?php if($seller->type == 1 || $seller->type == 2): ?>
                              <?php echo e($seller->getCommerical->contact_number); ?>

                            <?php else: ?>
                             
                            <?php endif; ?>
                            </div>
                        </div>
                        <?php else: ?>
                        <div class="mt-15">
                            <?php if($seller->type == 1 || $seller->type == 2): ?>
                            <div class="bolded nb">مواعيد العمل</div>
                            <div class="nc">
                              <?php echo e($seller->getCommerical->contact_number); ?>

                            <?php else: ?>
                             
                            <?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                 <!--<?php if(Auth::check()): ?>-->
                 <!--   <?php if(Session::get('lang') == 'en'): ?>-->
                 <!--   <a href="#!" class="modal-open direct mt-15 the-btn orang mb-15" data-modal-open=".direct-messege">Speak directly</a>-->
                 <!--       <?php else: ?>-->
                 <!--        <a href="#!" class="modal-open direct mt-15 the-btn orang mb-15" data-modal-open=".direct-messege">التحدث-->
                 <!--       المباشر</a>-->
                 <!--       <?php endif; ?>-->
                 <!--<?php endif; ?>-->
                    <div class="google-ads">
                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                    </div>

                    <div class="google-ads">
                        <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>

        </div>


    </div>
    
    
    
    <div class="my-modal share-now">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb">شاركها مع اصدقائك</h1>
                    
                    <a class="social-share facebook"><i class="fa fa-facebook"></i> facebook</a>
                    <a class="social-share twitter"><i class="fa fa-twitter"></i> twitter </a>
                    <a class="social-share google"><i class="fa fa-google"></i> Google+ </a>
               
               
               
                </div>
            </div>
            
              <div class="my-modal other">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb">اكتب سبب الابلاغ عن الاعلان</h1>
                    
                    
                    <textarea placeholder="سبب البلاغ ..." style="outline: none;
    background: #fff;
    border: #aaa 1px solid;
    box-shadow: none;
    border-radius: 5px;
    min-height: 100px;
    padding: 5px;"></textarea>
                    <button style="    outline: none;
    border: none;
    background: #048bfb;
    color: #fff;
    font-weight: 900;
    padding: 10px 25px;
    border-radius: 5px;">تبليغ</button>
               
               
                </div>
            </div>
            
            <div class="my-modal goreg">
                <div class="closer"></div>
                <div class="my-modal-body">
                    <h1 class="no-margin nb" style="text-align:center">لتتمكن من ارسال رساله الي المعلن عليك تسجيل حساب جديد</h1>
                    
                    <br><br><br>
                    
                    <div style="text-align:center">
                    <a href="#!" class="butn blue">سجل الان</a>
                    <a href="#!" class="closer butn grey" style="position: relative;
    top: auto;
    right: auto;
    width: auto;
    height: auto;
    background-image: none;
    color: #fff;
">اغلاق</a>
</div>
                    
              
                </div>
            </div>
            
            <a href="#!" class="modal-open" id="other" data-modal-open=".other" style="display:none"></a>
            <a href="#!" class="modal-open" id="goreg" data-modal-open=".goreg" style="display:none"></a>
            
            
            

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>