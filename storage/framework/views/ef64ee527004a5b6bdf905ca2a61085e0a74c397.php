<?php $__env->startSection('title', ' - ' . $category->name); ?>
<?php $__env->startSection('content'); ?>
    <?php if($category->sub_id == null): ?>
    <div class="cat-banner" style="background-image:url('<?php echo e(asset($category->photo)); ?>')">
       <!-- <h1><?php echo e($category->name); ?></h1> -->
    </div>
    <?php endif; ?>
    <!-- normal body -->
    <div class="normal-body">
        <div class="big-container">
            <?php echo $__env->make('includes.searchbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- link map -->
            <?php if(Session::get('lang') == 'en'): ?>
            <div class="link-map">
                <div class="map-item"><a href="<?php echo e(route('landing')); ?>">Home</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_en']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="link-map">
                <div class="map-item"><a href="<?php echo e(route('landing')); ?>">الرئيسية</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_ar']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <!-- search data -->
            <div class="row no-margin top-25">

                <div class="col l9">

                    <!-- top search -->
                    <div class="top-cat-search">
                        
                        <?php if(Session::get('lang') == 'en'): ?>
                        <div class="row no-margin">
                        <form method="GET" class="search" action="<?php echo e(Url('search')); ?>" id="form2">
                            <?php echo e(csrf_field()); ?>

                        <input type="hidden" class="applied-filters" name="applied_filters" value="<?php echo e(isset($applied_ret) ? $applied_ret : ''); ?>">
                        <input type="hidden" name="search_city" value="">
                        <input type="hidden" name="sort" value="">
                        <input id="cat-id" type="text" name="cat-id" value="1" hidden>   
                            <div class="col l6 m12">
                                <input type="text" placeholder="Maximum price" name="maxi_price" value="<?php echo e(isset($request['maxi-price']) ? $request['maxi-price'] : ''); ?>" id="maxi">
                            </div>
                            <div class="col l6 m12">
                                <input type="text" placeholder="Minimum price" name="mini_price" value="<?php echo e(isset($request['mini-price']) ? $request['mini-price'] : ''); ?>" id="mini">
                            </div>
                            <?php $arr = $filters['type']?>
                            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <?php if($loop->index > 0 && $loop->index < 7 && $key != "type" && $arr[$key] == 1): ?>
                                <div class="col l6 m12">
                                    <select name="filters[<?php echo e($key); ?>]">
                                        <option><?php echo e($key); ?></option>
                                        <?php dd($filter); ?>
                                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key == 'الماركة'): ?>
                                                <option data-catid="<?php echo e($val['id']); ?>" value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php elseif($key == 'الموديل'): ?>
                                                <option data-parent="<?php echo e($val['parent_id']); ?>" value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col l6 m12">
                                <input type="text" placeholder="Word Search..." name="search_query">
                            </div>
                            
                            <div class="col l12 m12 lefted">
                                <!-- <a href="#!">بحث متقدم</a> -->
                                <input type="submit" value="Search">
                            </div>
                        </form>

                        </div>
                        <?php else: ?>
                        
                        <div class="row no-margin">
                        <form method="GET" class="search" action="<?php echo e(Url('search')); ?>" id="form2">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="searchcar" value="1">
                        <input type="hidden" class="applied-filters" name="applied_filters" value="<?php echo e(isset($applied_ret) ? $applied_ret : ''); ?>">
                        <input type="hidden" name="search_city" value="">
                        <input type="hidden" name="sort" value="">
                        <input id="cat-id" type="text" name="cat-id" value="1" hidden>  
                        
                        <?php 
                                $arr = $filters['type'];
                                $namesArr = ['city','License','Brand','Model','production'];
                                $num = 0;
                            ?>
                        
                         <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <?php if($loop->index > 0 && $loop->index < 7 && $key != "type" && $arr[$key] == 1): ?>
                                <div class="col l6 m12">
                                    <select name="<?php echo e($namesArr[$num++]); ?>">
                                        <option value=""><?php echo e($key); ?></option>    
                                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key == 'الماركة'): ?>
                                                <option data-catid="<?php echo e($val['id']); ?>" value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php elseif($key == 'الموديل'): ?>
                                                <option data-parent="<?php echo e($val['parent_id']); ?>" value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php else: ?>
                                                <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="col l6 m12">
                                <input type="text" placeholder="السعر الاعلي" name="maxi_price" value="<?php echo e(isset($request['maxi-price']) ? $request['maxi-price'] : ''); ?>" id="maxi">
                            </div>
                            <div class="col l6 m12">
                                <input type="text" placeholder="السعر الادني" name="mini_price" value="<?php echo e(isset($request['mini-price']) ? $request['mini-price'] : ''); ?>" id="mini">
                            </div>
                            
                           
                            <div class="col l6 m12">
                                <input type="text" placeholder="كلمة البحث..." name="search_query">
                            </div>
                            
                            <div class="col l12 m12 lefted">
                                <!-- <a href="#!">بحث متقدم</a> -->
                                <input type="submit" id="searchButton" value="إبحث">
                            </div>
                        </form>

                        </div>
                      <?php endif; ?>
                    </div>


                    <div class="centerd">
                            <img src="assets/images/width-ads.jpg" alt="">
                    </div>
                    
                    <br>

                    <div>
                        
                        <?php if(Session::get('lang') == 'en'): ?>
                        <div class="row no-margin boxed-ads">
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
                                    <?php if($post->isColored): ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item heigh-light">
                                    <?php else: ?>
                                        <a href="<?php echo e(Url('posts').'/'.$post->id); ?>" class="ad-item">
                                    <?php endif; ?>
                                    <?php if($post->isUrgent): ?>
                                        <div class="important"><span></span><div>Urgent</div></div>
                                    <?php endif; ?>
                                        <div class="image-box">
                                            <?php if(\App\Post_Photos::where('post_id', $post['id'])->count()): ?>
                                             <img src="<?php echo e(Url($post->img)); ?>" alt="">
                                            <?php else: ?>
                                             <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                            <?php endif; ?>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>R.s</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->short_des); ?>"><?php echo e($post->short_des); ?></h1>
                                        <small>City <?php echo e($post->city); ?></small>
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
                        <div class="centerd">
                                <img src="assets/images/width-ads.jpg" alt="">
                        </div>


                                              
                    </div>
                    
                    <?php else: ?>
                    <div class="row no-margin boxed-ads">
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
                                            <img src="<?php echo e(Url($post->img)); ?>" alt="">
                                         <?php else: ?>
                                            <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                         <?php endif; ?>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <span>ر.س</span>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->short_des); ?>"><?php echo e($post->short); ?></h1>
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
                            <?php echo e($posts->links()); ?>

                         </div>
                        <div class="centerd">
                                <img src="assets/images/width-ads.jpg" alt="">
                        </div>


                                              
                    </div>
                    <?php endif; ?>
                    
                </div>



               <?php if(Session::get('lang') == 'en'): ?>  
                <div class="col l3">

                    <!-- cars side -->

                    <!-- side ad -->
                    <div class="google-ads">
                            <img src="assets/images/ads.png" alt="">
                    </div>

                    <!-- side links -->
                <?php if(Auth::user()): ?>
                    <a class="side-link blue" href="<?php echo e(Url('newad/1')); ?>">
                       Are you an individual?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                      </br>
                    <a class="side-link orang" href="<?php echo e(Url('newad/1')); ?>">
                        Are you a company?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                <?php else: ?>
                    <a class="side-link blue" href="<?php echo e(route('login')); ?>">
                       Are you an individual?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                      </br>
                    <a class="side-link orang" href="<?php echo e(route('login')); ?>">
                        Are you a company?
                        <small>Now you can buy and sell products easily</small>
                    </a>
                <?php endif; ?>
                    <!-- search side -->
                <!--    <div class="side-search-box">-->
                <!--        <form method="GET" action="<?php echo e(Url('search')); ?>">-->
                <!--        <input type="hidden" class="applied-filters" name="applied_filters" value="<?php echo e(isset($applied_ret) ? $applied_ret : ''); ?>">-->
                <!--        <input type="hidden" name="search_city" value="">-->
                <!--        <input type="hidden" name="search_query" value="">-->
                <!--        <input type="hidden" name="cat-id" value="1">-->
                <!--        <input type="hidden" name="sort" value="">-->
                <!--        <input type="hidden" placeholder="Maximum price" name="maxi_price" value="<?php echo e(isset($request['maxi-price']) ? $request['maxi-price'] : ''); ?>">-->
                <!--        <input type="hidden" placeholder="Minimum price" name="mini_price" value="<?php echo e(isset($request['mini-price']) ? $request['mini-price'] : ''); ?>">-->
                <!--        <p>Browse products</p>-->
                <!--        <small>Product Browse Filter</small>-->
                <!--            <?php $arr = $filters['type']?>-->
                <!--            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                <?php if($loop->index > 0 && $loop->index < 6 && $key != "type" && $arr[$key] == 1): ?>-->
                <!--                    <select name="filters[<?php echo e($key); ?>]">-->
                <!--                        <option><?php echo e($key); ?></option>    -->
                <!--                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>-->
                <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                    </select>-->
                <!--                <?php elseif($key != "type" && $arr[$key] == 4): ?>-->
                <!--                    <select name="filters[<?php echo e($key); ?>]">-->
                <!--                        <option><?php echo e($key); ?></option>    -->
                <!--                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>-->
                <!--                            <?php $ops = explode(',', $val['values'])?>-->
                <!--                            <?php $__currentLoopData = $ops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($op); ?>"><?php echo e($op); ?>  </option>-->
                <!--                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                    </select>-->
                <!--                <?php endif; ?>-->
                <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--        <input type="submit" value="Search">-->
                <!--        </form>-->
                <!--    </div>-->

                <!--</div>-->
                <?php else: ?>
                <div class="col l3">

                    <!-- cars side -->

                    <!-- side ad -->
                    <div class="google-ads">
                            <img src="assets/images/ads.png" alt="">
                    </div>

                    <!-- side links -->
          <?php if(Auth::user()): ?>
             <?php if(Auth::user()->type == 0): ?>
                    <a class="side-link blue" href="<?php echo e(Url('newad/1')); ?>">
                        هل انت فرد؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
                <?php else: ?>    
                    <a class="side-link orang" href="<?php echo e(Url('newad/1')); ?>">
                        هل انت شركة؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
             <?php endif; ?>
            <?php else: ?>
               
                    <a class="side-link blue" href="<?php echo e(route('login')); ?>">
                        هل انت فرد؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
                
                    <a class="side-link orang" href="<?php echo e(route('login')); ?>">
                        هل انت شركة؟
                        <small>الان يمكنك بيع وشراء المنتجات بسهولة</small>
                    </a>
               
            <?php endif; ?>
                    <!-- search side -->
                <!--    <div class="side-search-box">-->
                <!--        <form method="GET" action="<?php echo e(Url('search')); ?>">-->
                <!--        <input type="hidden" class="applied-filters" name="applied_filters" value="<?php echo e(isset($applied_ret) ? $applied_ret : ''); ?>">-->
                <!--        <input type="hidden" name="search_city" value="">-->
                <!--        <input type="hidden" name="search_query" value="">-->
                <!--        <input type="hidden" name="cat-id" value="1">-->
                <!--        <input type="hidden" name="sort" value="">-->
                <!--        <input type="hidden" placeholder="السعر الاقصي" name="maxi_price" value="<?php echo e(isset($request['maxi-price']) ? $request['maxi-price'] : ''); ?>">-->
                <!--        <input type="hidden" placeholder="السعر الادني" name="mini_price" value="<?php echo e(isset($request['mini-price']) ? $request['mini-price'] : ''); ?>">-->
                <!--        <p>تصفح المنتجات</p>-->
                <!--        <small>فلتر خاص بتصفح المنتجات</small>-->
                <!--            <?php $arr = $filters['type']?>-->
                <!--            <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                <?php if($loop->index > 0 && $loop->index < 6 && $key != "type" && $arr[$key] == 1): ?>-->
                <!--                    <select name="filters[<?php echo e($key); ?>]">-->
                <!--                        <option><?php echo e($key); ?></option>    -->
                <!--                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>-->
                <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                    </select>-->
                <!--                <?php elseif($key != "type" && $arr[$key] == 4): ?>-->
                <!--                    <select name="filters[<?php echo e($key); ?>]">-->
                <!--                        <option><?php echo e($key); ?></option>    -->
                <!--                        <?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($val['name']); ?>"><?php echo e($val['name']); ?></option>-->
                <!--                            <?php $ops = explode(',', $val['values'])?>-->
                <!--                            <?php $__currentLoopData = $ops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $op): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--                            <option value="<?php echo e($op); ?>"><?php echo e($op); ?>  </option>-->
                <!--                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--                    </select>-->
                <!--                <?php endif; ?>-->
                <!--            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--        <input type="submit" value="إبحث">-->
                <!--        </form>-->
                <!--    </div>-->

                <!--</div>-->
                <?php endif; ?>

                <div class="clearfix"></div>
            </div>

        </div>

        
    </div>


    <div class="white-wrap">
        <div class="big-container">
           <?php if(Session::get('lang') == 'en'): ?>
            <!-- link filter -->
            <div class="link-filter">
                <h2>Browse through the car type</h2>
                <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#"><img src="<?php echo e(asset($ca->icon)); ?>" alt="<?php echo e($ca->name_en); ?>"></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <a href="#">
                    <img src="<?php echo e(asset('images/car1.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car2.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car3.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car4.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car5.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car6.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car7.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car8.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car9.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car10.jpg')); ?>" alt="">
                </a> --> 

            </div>
            <?php else: ?>
            <div class="link-filter">
                <h2>تصفح من خلال نوع السياره</h2>
                <?php $__currentLoopData = $car; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#"><img src="<?php echo e(asset($ca->icon)); ?>" alt="<?php echo e($ca->name); ?>"></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <a href="#">
                    <img src="<?php echo e(asset('images/car1.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car2.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car3.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car4.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car5.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car6.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car7.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car8.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car9.jpg')); ?>"alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/car10.jpg')); ?>" alt="">
                </a> --> 

            </div>
            <?php endif; ?>

           <?php if(Session::get('lang') == 'en'): ?>
            <h2>Browse through brands type</h2>

            <div class="link-logo">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#"><img src="<?php echo e(asset($ca->icon)); ?>" alt="<?php echo e($ca->name_en); ?>"></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <a href="#">
                    <img src="<?php echo e(asset('images/cars1.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars2.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars3.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars4.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars5.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars6.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars7.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars8.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars9.jpg')); ?>" alt="">
                </a> -->

            </div>
<!-- 
            <div class="centerd">
            <div class="show-all" data-orignal="شاهد الجميع" data-swap="اخفاء الجميع">شاهد الجميع</div>
            </div>


            <div class="mark-links">
                <div class="row no-margin">
                    
                    <div class="col l3 m4 s2">
                        <h2>أ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ب</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ت</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ث</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div><div class="clearfix"></div>
                    <div class="col l3 m4 s2">
                        <h2>ج</h2>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ح</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>خ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    

                </div>
            </div> -->

        </div>
        <?php else: ?>
        <div class="link-logo">
                <?php $__currentLoopData = $cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="#"><img src="<?php echo e(asset($ca->icon)); ?>" alt="<?php echo e($ca->name_en); ?>"></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <!-- <a href="#">
                    <img src="<?php echo e(asset('images/cars1.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars2.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars3.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars4.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars5.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars6.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars7.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars8.jpg')); ?>" alt="">
                </a>
                <a href="#">
                    <img src="<?php echo e(asset('images/cars9.jpg')); ?>" alt="">
                </a> -->

            </div>
<!-- 
            <div class="centerd">
            <div class="show-all" data-orignal="شاهد الجميع" data-swap="اخفاء الجميع">شاهد الجميع</div>
            </div>


            <div class="mark-links">
                <div class="row no-margin">
                    
                    <div class="col l3 m4 s2">
                        <h2>أ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ب</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ت</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ث</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div><div class="clearfix"></div>
                    <div class="col l3 m4 s2">
                        <h2>ج</h2>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>ح</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    <div class="col l3 m4 s2">
                        <h2>خ</h2>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                        <a href="#!">اسم الماركة</a>
                    </div>
                    

                </div>
            </div> -->

        </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('shenFooter'); ?>
<script type="text/javascript">
$(document).on('change','select[name=Brand]',function(){
    var brandId = $(this).find(':selected').data('catid');
    $('select[name=Model]').append('<option selected>الموديل</option>')
    $('select[name=Model] option').each(function(){
        if($(this).data('parent') == brandId){
            $(this).show()
        }else{
            $(this).hide()
        }
    });
});


$(document).on('click','#searchButton',function(e){
    e.preventDefault();
    var dataSerialize = $(this).closest('form').serialize(),
    url = "<?php echo e(url('search')); ?>";
    $.get(url,dataSerialize,function(data){
        $('.boxed-ads').empty();
        $('div[align=center]').hide();
        $('.boxed-ads').append(data.html);
        // console.log(data);
    });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>