<?php $__env->startSection('title', 'نتائج البحث'); ?>
<?php $__env->startSection('content'); ?>
<script async defer>
    var searchkey = '<?php echo e($_REQUEST['search_query']); ?>';
</script>
    <!-- normal body -->
    <div class="normal-body">

        <div class="big-container">

            <!-- filter start -->
            <div class="main-filter">
                <form method="GET" class="search" action="search" id="form1">
                    <?php echo e(csrf_field()); ?> 
                <input type="hidden" id="applied_filters" class="applied-filters" name="applied_filters" value="<?php echo e(isset($_REQUEST['applied_filters']) ? $_REQUEST['applied_filters'] : ''); ?>">
                <input type="hidden" id="seller_type" class="seller_type" name="seller_type" value="<?php echo e(isset($_REQUEST['seller_type']) ? $_REQUEST['seller_type'] : ''); ?>">
                <input type="hidden" id="ad_type" class="ad_type" name="ad_type" value="<?php echo e(isset($_REQUEST['ad_type']) ? $_REQUEST['ad_type'] : ''); ?>">
                <input type="hidden" id="status" class="status" name="status" value="<?php echo e(isset($_REQUEST['status']) ? $_REQUEST['status'] : ''); ?>">
                <input type="hidden" class="mini_price" id="mini_price" name="mini_price" value="<?php echo e(isset($_REQUEST['mini_price']) ? $_REQUEST['mini_price'] : ''); ?>">
                <input type="hidden" class="maxi_price" id="maxi_price" name="maxi_price" value="<?php echo e(isset($_REQUEST['maxi_price']) ? $_REQUEST['maxi_price'] : ''); ?>">
                <input type="hidden" class="sort" id="sort" name="sort" value="<?php echo e(isset($_REQUEST['sort']) ? $_REQUEST['sort'] : ''); ?>">
                 <!--select dropdown start -->
                <div class="select-cat">
                    <!-- hidden input to catch the id -->
                    <input id="cat-id" type="text" name="cat-id" value="<?php echo e($_REQUEST['cat-id']); ?>" hidden>
                    <!-- select icon in the search bar -->
                    <div class="select-head">
                        <div class="select-icon">
                            <i class="fa fa-<?php echo e(isset($parents[0]['icon']) ? $parents[0]['icon'] : 'bars'); ?>"></i>
                        </div>
                        <i class="fa fa-caret-down"></i>
                    </div>
                    <!-- dropdown wrapper -->
                    <div class="select-box">
                        <!-- select all cats -->
                        <div class="select-group" data-cat-icon="bars" data-cat-id="0">
                                <i class="fa fa-bars"></i> جميع الاقسام
                        </div>

                        <!-- select group level 1 start  -->
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- select group level 1 start  -->
                            <div class="select-group" data-cat-icon="<?php echo e($category['icon']); ?>" data-cat-id="<?php echo e($category['id']); ?>">
                                <i class="fa fa-<?php echo e($category['icon']); ?>"></i> <?php echo e($category['name_ar']); ?>

                                <?php $__currentLoopData = $category['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($subcat['parent_id'] == $category['id']): ?>
                                    <div class="group-toggle"><i class="fa fa-caret-down"></i></div>
                                    <!-- select group level 2 start  -->
                                    <div class="group-box">
                                        <!-- group item -->
                                        <div class="select-item-level1" data-cat-id="<?php echo e($subcat['id']); ?>">
                                            <?php echo e($subcat['name_ar']); ?>

                                            <?php $__currentLoopData = $subcat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subOfsubcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($subcat['id'] == $subOfsubcat['parent_id']): ?>
                                                <div class="group-toggle"><i class="fa fa-caret-down"></i></div>
                                                <!-- select group level 3 start  -->
                                                <div class="group-box2">
                                                    <!-- group item -->
                                                    <div class="select-item-level2" data-cat-id="<?php echo e($subOfsubcat['id']); ?>">
                                                        <?php echo e($subOfsubcat['name_ar']); ?>

                                                    </div>
                                                </div>
                                                <!-- select group level 3 end  -->
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                    <!-- select group level 2 end  -->
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <!-- select group level 1 end  -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <!-- select group level 1 end  -->
                    </div>
                </div>
                <!-- select dropdown end -->

                <!-- search bar -->
                <div class="main-search">
                    <input type="text" placeholder="ابحث عن ..."  value="<?php echo e($_REQUEST['search_query']); ?>"  name="search_query">
                </div>

                <!-- saved search -->
                <?php if(auth()->guard()->guest()): ?>
                <?php else: ?>
                    <?php if($_REQUEST['search_query']): ?>
                    <div class="hide-on-med-and-down saved-search-box">
                        <i class="fa fa-save"></i>
                        حفظ نتائج البحث
                        <i class="fa fa-caret-down"></i>
                    </div>

                    <div class="saved-search-drop">
                        <p>احفظ عملية البحث لمراجعتها فيما بعد.</p>
                        <button id="saved-searchResults">حفظ</button>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
                <!-- city box -->
                <div class="city-box">
                    <div class="city-form">
                    <i  class="fa fa-map-marker"></i>
                    <input type="text" placeholder="المدينة" value="<?php echo e($_REQUEST['search_city']); ?>" name="search_city">
                    <select name="search_distance" onchange="document.getElementById('form1').submit();">
                        <option selected>0 كم</option>
                        <option>5 كم</option>
                        <option>10 كم</option>
                        <option>20 كم</option>
                        <option>40 كم</option>
                        <option>80 كم</option>
                        <option>100 كم</option>
                    </select>
                    </div>
                </div>

                <!-- submit -->
                <input type="submit" value="إبحث">
                </form>
            </div>
            <!-- filter end -->

            <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!-- link map -->
            <div class="link-map">
                <div class="map-item"><a href="index.html">الرئيسية</a></div>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="map-item"><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>"><?php echo e($cat['name_ar']); ?></a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <!-- search data -->
            <div class="row no-margin top-25">

                <div class="col l3">
                    <!-- side filters start -->
                    <div class="side-filters">
                        <h2>تصفية النتائج</h2>

                        <div class="side-filter-level1 active">
                        <?php if(count($parents) > 0): ?>
                            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="filter-title active">
                                    <span><?php echo e($cat['name_ar']); ?></span>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                            <?php if($loop->last): ?>
                                <ul div class="filter-level1-data active">
                                    <li><a id="abdallah" href="" class="active" onclick="document.getElementById('form1').submit();">جميع الاقسام</a></li>
                                    <?php $__currentLoopData = $cat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a id="abdallah" href="" class="" onclick="document.getElementById('cat-id').value=<?php echo e($ca['id']); ?>;document.getElementById('form1').submit();"><?php echo e($ca['name_ar']); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>                            
                            <?php else: ?>
                                <ul div class="filter-level1-data active">
                                    <li><a id="abdallah" href="" onclick="document.getElementById('cat-id').value=<?php echo e($cat['id']); ?>;document.getElementById('form1').submit();">جميع الاقسام</a></li>
                                </ul>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        </div>


                        <div class="side-filter-level1 active">
                            <div class="filter-title active">
                                <span>حسب السعر</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul div class="filter-level1-data active">
                                <li>
                                    <form id="abdallah">
                                        <input type="text" placeholder="السعر الادني" value="<?php echo e(isset($_REQUEST['mini_price']) ? $_REQUEST['mini_price'] : ''); ?>" id="mini">
                                        <input type="text" placeholder="السعر الاقصي" value="<?php echo e(isset($_REQUEST['maxi_price']) ? $_REQUEST['maxi_price'] : ''); ?>" id="maxi">
                                        <input type="submit" value="تصفية" onclick="document.getElementById('mini_price').value=document.getElementById('mini').value;
                                        document.getElementById('maxi_price').value=document.getElementById('maxi').value;
                                        document.getElementById('form1').submit();">
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="side-filter-level1 active">
                            <div class="filter-title active">
                                <span>نوع الاعلان</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul class="filter-level1-data active">

                                <li>                                    
                                     <button class="filterButton" onclick="Filter('all');">كل الإعلانات</button>
                                </li>

                                
                                
                               <li>                                    
                                    <button class="filterButton" onclick="Filter('isinMain');">اعلانات مدفوعة مميزة</button>
                                </li>

                               <li>                                    
                                     <button class="filterButton" onclick="Filter('isUrgent');">اعلانات مدفوعة عاجلة</button>
                                </li>
 
                               <li>                                    
                                    <button class="filterButton" onclick="Filter('isColored');">اعلانات مدفوعة ملونة</button>
                                </li>   

                               <li>                                    
                                    <button class="filterButton"  onclick="Filter('isTop');">أفضل الإعلانات</button>
                                </li>            
                         
                                <!-- <li><a href="#!" class="active">جميع الاعلانات</a></li>
                                <li><a href="#!">اعلانات مدفوعة عادية</a></li>
                                <li><a href="#!">اعلانات مدفوعة مميزة</a></li>
                                <li><a href="#!">اعلانات مدفوعة عاجلة</a></li>
                                <li><a href="#!">اعلانات مدفوعة ملونة</a></li>
                                <li><a href="#!">افضل الاعلانات</a></li> -->
                            </ul>
                        </div>

                        
                        <div class="side-filter-level1 active">
                            <div class="filter-title active">
                                <span>نوع البيع</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul class="filter-level1-data active">
                                <li>                                        
                                    <button class="filterButton" onclick="sellerType('all');">جميع الاعلانات</button>
                                </li>
                                <li>
                                    <button class="filterButton" onclick="sellerType(0);">عرض</button>
                                </li>
                                <li>
                                     <button class="filterButton" onclick="sellerType(1);">طلب</button>
                                </li>
                                <!-- <li><a href="#!" class="active">جميع الاعلانات</a></li>
                                <li><a href="#!">عرض</a></li>
                                <li><a href="#!">طلب</a></li> -->
                            </ul>
                        </div>


                        <div class="side-filter-level1 active">
                            <div class="filter-title active">
                                <span>نوع العرض</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul class="filter-level1-data active">
                                
                                <li>                                        
                                    <button class="filterButton" onclick="adType('all');">جميع الاعلانات</button>
                                </li>
                                <li>
                                    <button class="filterButton" onclick="adType(0);">قابل للتفاوض</button>
                                </li>
                                <li>
                                     <button class="filterButton" onclick="adType(1);">نهائي</button>
                                </li>
                                <!--<li><a href="#!" class="active">جميع الاعلانات</a></li>
                                <li><a href="#!">قابل للتفاوض</a></li>
                                <li><a href="#!">نهائي</a></li>-->
                            </ul>
                        </div>

                        <div class="side-filter-level1 active">
                            <div class="filter-title active">
                                <span>نوع الحالة</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <ul class="filter-level1-data active">
                                <li>                                        
                                    <button class="filterButton" onclick="status('all');">جميع الاعلانات</button>
                                </li>
                                <li>
                                    <button class="filterButton" onclick="status(0);">جديد</button>
                                </li>
                                <li>
                                     <button class="filterButton" onclick="status(1);">مستعمل</button>
                                </li>
                                <!--<li><a href="#!" class="active">جميع الاعلانات</a></li>
                                <li><a href="#!">جديد</a></li>
                                <li><a href="#!">مستعمل</a></li>-->
                            </ul>
                        </div>

                        <div class="google-ads">
                            <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                        </div>

                        <div class="google-ads">
                            <img src="<?php echo e(asset('front-assets/images/ads.png')); ?>" alt="">
                        </div>

                    </div>
                    <!-- side filters end -->
                </div>

                <div class="col l9">
                    <div class="controler-wraper">
                        <div class="control-box">
                            <div class="views-box">
                                <div class="switch-view list-view active">
                                    <i class="fa fa-bars"></i> عرض قائمة
                                </div>
                                <div class="switch-view grid-view">
                                    <i class="fa fa-th-large"></i> عرض شبكي
                                </div>
                            </div>
                            <div class="sort-box">
                                <select onchange="document.getElementById('sort').value=this.value;document.getElementById('form1').submit();">
                                    <option value="0">الاكثر تشابه</option>
                                    <option value="1"<?php echo e((isset($_REQUEST['sort']) and $_REQUEST['sort'] == 1) ? 'selected' : ''); ?>>الاحدث اولا</option>
                                    <option value="2"<?php echo e((isset($_REQUEST['sort']) and $_REQUEST['sort'] == 2) ? 'selected' : ''); ?>>الاقل سعر</option>
                                    <option value="3"<?php echo e((isset($_REQUEST['sort']) and $_REQUEST['sort'] == 3) ? 'selected' : ''); ?>>الاعلي سعر</option>
                                </select>
                            </div>
                        </div>
                        
                       <?php if($_REQUEST['search_query'] == null): ?>
                           <div class="row no-margin boxed-ads no-data">

                                    <h2>من فضلك ادخل كلمة البحث</h2>

                               </div>
                         <?php else: ?> 
                         <div class="centerd">
                            <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                        </div>
                        <div class="strip-head blue on-top">افضل الاعلانات</div>

                        <div class="row no-margin ads-list">
                            <?php $__currentLoopData = $tops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col l4">
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
                                         <?php if(\App\Post_Photos::where('post_id', $post['id'])->count()): ?>
                                            <img src="<?php echo e(Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)); ?>" alt="">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                        <?php endif; ?>
                                            <div class="price boxed-only"><?php echo e($post['price']); ?>

                                               <?php if(Session::get('lang') == 'en'): ?>
                                                 <span>R.S</span>
                                                 <?php else: ?>
                                                 <span>ر.س</span>
                                               <?php endif; ?>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post['title']); ?>" class="boxed-only"><?php echo e($post['title']); ?> </h1>
                                        <div class="post-data normal-only">
                                            <h1 title="<?php echo e($post['title']); ?>">
                                            <?php echo e($post['title']); ?> 
                                            </h1>
                                            <div class="price"><?php echo e($post['price']); ?>

                                               <?php if(Session::get('lang') == 'en'): ?>
                                                 <span>R.S</span>
                                                 <?php else: ?>
                                                 <span>ر.س</span>
                                               <?php endif; ?>
                                            </div>
                                            <div class="desc">
                                                <?php echo e($post['description']); ?>

                                            </div>
                                        </div>
                                        <small class="boxed-only"><?php echo e($post['city']); ?></small>
                                        <div class="info normal-only">
                                            <h3><?php echo e($post['country']); ?>

                                                <small><?php echo e($post['city']); ?></small>
                                            </h3>
                                            <div class="time"> <?php echo e(strftime("%b %d %Y",strtotime($post['created_at']))); ?></div>
                                        </div>
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
                        </div>
                       <!-- <div class="centerd">
                        <br>
                        <a href="#!" class="butn blue">شاهد المزيد</a>
                        <br><br>
                    </div> -->
                    
                        <div class="centerd">
                            <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                        </div>
                     
                        <?php if(count($postss) > 0): ?>
                        <div class="strip-head on-top">احدث الاعلانات</div>

                        <div class="row no-margin ads-list">
                            
                                <?php $__currentLoopData = $postss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                           <img src="<?php echo e(Url(\App\Post_Photos::where('post_id', $post['id'])->first()->photolink)); ?>" alt="">
                                         <?php else: ?>
                                           <img src="<?php echo e(asset('front-assets/images/placeholder.png')); ?>" alt="">
                                         <?php endif; ?>
                                            <div class="price boxed-only"><?php echo e($post->price); ?>

                                                <?php if(Session::get('lang') == 'en'): ?>
                                                 <span>R.S</span>
                                                 <?php else: ?>
                                                 <span>ر.س</span>
                                               <?php endif; ?>
                                            </div>
                                        </div>
                                        <h1 title="<?php echo e($post->title); ?>" class="boxed-only"><?php echo e($post->title); ?> </h1>
                                        <div class="post-data normal-only">
                                            <h1 title="<?php echo e($post->title); ?>">
                                            <?php echo e($post->title); ?> 
                                            </h1>
                                            <div class="price"><?php echo e($post->price); ?>

                                                <?php if(Session::get('lang') == 'en'): ?>
                                                 <span>R.S</span>
                                                 <?php else: ?>
                                                 <span>ر.س</span>
                                               <?php endif; ?>
                                            </div>
                                            <div class="desc">
                                                <?php echo e($post->description); ?>

                                            </div>
                                        </div>
                                        <small class="boxed-only">مدينة <?php echo e($post->city); ?></small>
                                        <div class="info normal-only">
                                            <h3><?php echo e($post->country); ?>

                                                <small><?php echo e($post->city); ?></small>
                                            </h3>
                                            <div class="time"> <?php echo e(strftime("%b %d %Y",strtotime($post->created_at))); ?></div>
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
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                      <!--  <div class="centerd">
                        <br>
                        <a href="#!" class="butn blue">شاهد المزيد</a>
                        <br><br>
                    </div> -->
                            <?php elseif(count($top) == 0 && count($posts) == 0): ?>
                                <div class="row no-margin boxed-ads no-data">

                                    <h2>لاتوجد نتائج للبحث</h2>

                                </div>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        <div class="centerd">
                            <img src="<?php echo e(asset('front-assets/images/width-ads.jpg')); ?>" alt="">
                        </div>

                        <?php if(auth()->guard()->guest()): ?>
                        <?php else: ?>
                        <div class="strip-head on-top">
                            <div class="mini-tabs">
                                <div class="tab-button active" data-tab-btn=".m25ran">شوهد مؤخرا</div>
                                <div class="tab-button" data-tab-btn=".tamany">قائمة التمني</div>
                                <div class="tab-button" data-tab-btn=".ma7foz">بحث محفوظ</div>
                            </div>
                        </div>
                        <div class="tabs-body">

                            <?php echo $__env->make('includes.lastseenslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <?php echo $__env->make('includes.favoriteslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                            <?php echo $__env->make('includes.savedsearchslider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        </div>
                        <?php endif; ?>

                    <?php endif; ?>

                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

        </div>


    </div>
    
<script>

    function Filter(filter) {
        document.getElementById('applied_filters').value=filter;
        document.getElementById('form1').submit();
    }

    function sellerType(type) {
        document.getElementById('seller_type').value=type;
        document.getElementById('form1').submit();
    }

    function adType(type) {
        document.getElementById('ad_type').value=type;
        document.getElementById('form1').submit();
    }

    function status(status) {
        document.getElementById('status').value=status;
        document.getElementById('form1').submit();
    }


</script> 

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
<script>
$(document).on('click', '.saved-search-drop button:not(.colse-drop)', function(e) {
    e.preventDefault();
    alert('1234');
});
</script>  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>