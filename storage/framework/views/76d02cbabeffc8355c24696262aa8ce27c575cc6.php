<div class="col l3">
    <!-- side filters start -->
    <div class="side-filters">
        <?php if(Session::get('lang') == 'en'): ?>
        <h2>Filter results</h2>
        <?php else: ?>
        <h2>تصفية النتائج</h2>
        <?php endif; ?>
        <?php if(Session::get('lang') == 'en'): ?>
        <div class="side-filter-level1 active">
            <div class="show-all bc">See all categoories <i class="fa fa-arrow-down"></i></div>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="filter-title active">
                    <span><?php echo e($cat['name_en']); ?></span>
                    <i class="fa fa-caret-down"></i>
                </div>
            <?php if($loop->index == count($parents) - 1): ?>
                <ul div class="filter-level1-data active">
                    <li><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>" class="active">all sections</a></li>
                    <?php $__currentLoopData = $cat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category['parent_id'] == $cat['id']): ?>
                            <li><a href="<?php echo e(Url('categories/'.$category['id'])); ?>"><?php echo e($category['name_en']); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>                            
            <?php else: ?>
                <ul div class="filter-level1-data active">
                    <li><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>">جميع الاقسام</a></li>
                </ul>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        <?php else: ?>
         <div class="side-filter-level1 active">
             <div class="show-all bc">شاهد جميع الاقسام <i class="fa fa-arrow-down"></i></div>
            <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="filter-title active">
                    <span><?php echo e($cat['name_ar']); ?></span>
                    <i class="fa fa-caret-down"></i>
                </div>
            <?php if($loop->index == count($parents) - 1): ?>
                <ul div class="filter-level1-data active">
                    <li><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>" class="active">جميع الاقسام</a></li>
                    <?php $__currentLoopData = $cat['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category['parent_id'] == $cat['id']): ?>
                            <li><a href="<?php echo e(Url('categories/'.$category['id'])); ?>"><?php echo e($category['name_ar']); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>                            
            <?php else: ?>
                <ul div class="filter-level1-data active">
                    <li><a href="<?php echo e(Url('categories/'.$cat['id'])); ?>">جميع الاقسام</a></li>
                </ul>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
        
        <?php if(Session::get('lang') == 'en'): ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>By price</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form>
                        <input type="text" placeholder="lowest price" id="mini">
                        <input type="text" placeholder="maximum price" id="maxi">
                        <input type="submit" value="تصفية" onclick="document.getElementById('maxi_price').value=document.getElementById('maxi').value;
                        document.getElementById('maxi_price').value=document.getElementById('maxi').value;
                        document.getElementById('form1').submit();">
                    </form>
                </li>
            </ul>
        </div>
        <?php else: ?>
        <div class="side-filter-level1 active">
            <?php if(Request::is('categories/123')): ?>
            <div class="filter-title active">
               
        
                <span>حسب الراتب</span>
                
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form method="GET" class="search" action="<?php echo e(Request::url()); ?>" >
                        <input type="text" name="mini_price" placeholder="الراتب الادني" id="mini">
                        <input type="text" name="maxi_price" placeholder="الراتب الاقصي" id="maxi">
                        <input type="submit" value="تصفية" name="searchButton">
                    </form>
                </li>
            </ul>
            <?php else: ?>
            <div class="filter-title active">
               
        
                <span>حسب السعر</span>
                
                <i class="fa fa-caret-down"></i>
            </div>
            <ul div class="filter-level1-data active">
                <li>
                    <form method="GET" class="search" action="<?php echo e(Request::url()); ?>" >
                        <input type="text" name="mini_price" placeholder="السعر الادني" id="mini">
                        <input type="text" name="maxi_price" placeholder="السعر الاقصي" id="maxi">
                        <input type="submit" value="تصفية" name="searchButton">
                    </form>
                </li>
            </ul>
           <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <!--<div class="side-filter-level1">-->
        <!--                    <div class="filter-title active">-->
        <!--                        <span>الاماكن</span>-->
        <!--                        <i class="fa fa-caret-down"></i>-->
        <!--                    </div>-->
        <!--                    <ul class="filter-level1-data active">-->
        <!--                        <li class="has-sub">-->
        <!--                            <div class="filter-title active">-->
        <!--                                <span>السعودية</span>-->
        <!--                                <i class="fa fa-caret-down"></i>-->
        <!--                            </div>-->
        <!--                            <ul class="filter-level2-data active">-->
        <!--                                <li><a href="#!" class="active">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                            </ul>-->
        <!--                        </li>-->
        <!--                        <li class="has-sub">-->
        <!--                            <div class="filter-title">-->
        <!--                                <span>الامارات</span>-->
        <!--                                <i class="fa fa-caret-down"></i>-->
        <!--                            </div>-->
        <!--                            <ul class="filter-level2-data">-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                                <li><a href="#!">رابط</a></li>-->
        <!--                            </ul>-->
        <!--                        </li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        
        <?php if(Session::get('lang') == 'en'): ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Ads Type</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">All ads</a></li>
                <li><a href="#!">Regular Paid Ads</a></li>
                <li><a href="#!">Featured paid ads</a></li>
                <li><a href="#!">Urgent paid ads</a></li>
                <li><a href="#!">Colored paid ads</a></li>
                <li><a href="#!">Best ads</a></li>
            </ul>
        </div>
        <?php else: ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>نوع الاعلان</span>
                <i class="fa fa-caret-down"></i>
            </div>
            
            
            <ul class="filter-level1-data active">
                <li><a href="<?php echo e(Request::url()); ?>" class="active">جميع الاعلانات</a></li>
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&isTop=1'); ?>">افضل الاعلانات</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?isTop=1&searchButton=تصفية'); ?>">افضل الاعلانات</a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&isUrgent=0&isTop=0&isinMain=0&isColored=0'); ?>">اعلانات مدفوعة عادية</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?&isUrgent=0&isTop=0&isinMain=0&isColored=0&searchButton=تصفية'); ?>">أعلانات مدفوعة عادية </a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&isTop=1'); ?>">اعلانات مدفوعة مميزة</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?isTop=1&searchButton=تصفية'); ?>">اعلانات مدفوعة مميزة</a></li>
                <?php endif; ?>
               
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&isUrgent=1'); ?>">اعلانات مدفوعة عاجلة</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?isUrgent=1&searchButton=تصفية'); ?>">أعلانات مدفوعه عاجلة </a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&isColored=1'); ?>">اعلانات مدفوعة ملونة</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?isColored=1&searchButton=تصفية'); ?>">أعلانات مدفوعه ملونة </a></li>
                <?php endif; ?>
                
                <!--<li><a href="#!">افضل الاعلانات</a></li>-->
            </ul>
        </div>
        <?php endif; ?>
     <?php if(! Request::is('categories/10')): ?>
        <?php $__currentLoopData = $filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name=>$values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($name != 'type'): ?>
            <div class="side-filter-level1 active">
                <div class="show-all bc">شاهد الجميع <i class="fa fa-arrow-down"></i></div>
                <div class="filter-title active">
                    <span><?php echo e($name); ?></span>
                    <i class="fa fa-caret-down"></i>
                </div>
                <ul class="filter-level1-data active">
                    <li>
                    <?php // dd(Request::fullUrl()); ?>
                        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($_GET)): ?>
                        <li><a href="<?php echo e(Request::fullUrl().'&city='.$value['id']); ?>"><?php echo e($value['name']); ?></a></li>
                        <?php else: ?>
                        <li><a href="<?php echo e(Request::fullUrl().'?city='.$value['id'].'&searchButton=تصفية'); ?>"><?php echo e($value['name']); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                </ul>
            </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       <?php endif; ?>  
        <?php if(Session::get('lang') == 'en'): ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Type of sale</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">All ads</a></li>
                <li><a href="#!">Offer/a></li>
                <li><a href="#!">Order</a></li>
            </ul>
        </div>
        <?php else: ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>نوع البيع</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="<?php echo e(Request::url()); ?>" class="active">جميع الاعلانات</a></li>
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&saleType=0'); ?>">عرض</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?saleType=0&searchButton=تصفية'); ?>">عرض </a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&saleType=1'); ?>">طلب</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?saleType=1&searchButton=تصفية'); ?>">طلب </a></li>
                <?php endif; ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(Session::get('lang') == 'en'): ?>
        <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>Type of offer</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="#!" class="active">جميع الاعلانات</a></li>
                <li><a href="#!">Negotiable</a></li>
                <li><a href="#!">Final</a></li>
            </ul>
        </div>
        <?php else: ?>
        <div class="side-filter-level1 active">
          <?php if(!Request::is('categories/123')): ?>
            <div class="filter-title active">
                <span>نوع العرض</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="<?php echo e(Request::url()); ?>" class="active">جميع الاعلانات</a></li>
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&offerType=0'); ?>">قابل للتفاوض</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?offerType=0&searchButton=تصفية'); ?>">قابل للتفاوض </a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&offerType=1'); ?>">نهائي</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?offerType=1&searchButton=تصفية'); ?>">نهائي </a></li>
                <?php endif; ?>
                
            </ul>
            <?php endif; ?>
        </div>
           <?php if(Request::is('categories/42')): ?>
           <div class="side-filter-level1 active">
            <div class="filter-title active">
                <span>حالة المنتج</span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="filter-level1-data active">
                <li><a href="<?php echo e(Request::url()); ?>" class="active">جميع الاعلانات</a></li>
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&offerType=0'); ?>">جديد </a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?offerType=0&searchButton=تصفية'); ?>"> جديد </a></li>
                <?php endif; ?>
                
                <?php if(count($_GET)): ?>
                <li><a href="<?php echo e(Request::fullUrl().'&offerType=1'); ?>">مستعمل</a></li>
                <?php else: ?>
                <li><a href="<?php echo e(Request::fullUrl().'?offerType=1&searchButton=تصفية'); ?>">مستعمل </a></li>
                <?php endif; ?>
                
            </ul>
         </div>
         <?php endif; ?>
        <?php endif; ?>
        <div class="google-ads">
            <img src="<?php echo e(asset('images/ads.png')); ?>" alt="">
        </div>
        <div class="google-ads">
            <img src="<?php echo e(asset('images/ads.png')); ?>" alt="">
        </div>
    </div>
    <!-- side filters end -->
</div>

