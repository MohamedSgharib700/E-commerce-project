<!-- filter start -->
<div class="main-filter">
    <form method="GET" action="<?php echo e(Url('search')); ?>" id="form1">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" class="applied-filters" name="applied_filters" value="<?php echo e(isset($applied_ret) ? $applied_ret : ''); ?>">
    <input type="hidden" class="mini_price" id="mini_price" name="mini_price" value="<?php echo e(isset($request['mini_price']) ? $request['mini_price'] : ''); ?>">
    <input type="hidden" class="maxi_price" id="maxi_price" name="maxi_price" value="<?php echo e(isset($request['maxi_price']) ? $request['maxi_price'] : ''); ?>">
    <input type="hidden" class="sort" id="sort" name="sort" value="<?php echo e(isset($request['sort']) ? $request['sort'] : ''); ?>">
        <!-- select dropdown start -->
    <div class="select-cat">
        <!-- hidden input to catch the id -->
        <input id="cat-id" type="text" name="cat-id" value="<?php echo e(isset($parents[0]['id']) ? $parents[0]['id'] : 'bars'); ?>" hidden>
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
        <input type="text" placeholder="" id="search_query" name="search_query">
    </div>

    <!-- city box -->
    <div class="city-box">
        <div class="city-form">
        <i  class="fa fa-map-marker"></i>
        <?php if(Session::get('lang') == 'en'): ?>
        <input type="text" placeholder="City" name="search_city">
        <select name="search_distance">
            <option selected>0 KG</option>
            <option>5 KG</option>
            <option>10 KG</option>
            <option>20 KG</option>
            <option>40 KG</option>
            <option>80 KG</option>
            <option>100 KG</option>
        </select> 
        <?php else: ?>
                <!-- city select button start -->
                        <div class="city-select-button">
                            <!-- hidden input to catch the id -->
                            <input name="search_city" id="city-id" type="text" hidden>
                            <!-- select head in the search bar start -->
                            <div class="select-city">
                                <span class="city-title">المدن</span>
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <!-- select head in the search bar end -->


                            <!-- dropdown wrapper start -->
                            <div class="select-box-city">
                                <!-- select all cats -->
                                <div class="city-select-group" data-cat-id="0">
                                         <span class="gettitle">المدن</span>
                                </div>
                                <!-- select group level 1 start  -->
                                
                                <!-- select group level 1 end  -->

                                <!-- select group level 1 start  -->
                            <?php $__currentLoopData = \App\Filters::where('group_id',2)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="city-select-group" data-cat-id="5">
                                    <span class="gettitle"><?php echo e($city->name); ?></span>
                                    <div class="group-toggle-city"><i class="fa fa-caret-down"></i></div>
                                    <!-- select group level 2 start  -->
                                    <div class="group-box-city">
                                        <!-- item -->
                                     <?php $__currentLoopData = \App\Filters::where('parent_id',$city->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="select-city-item-level1" data-cat-id="6">
                                            <span class="gettitle"><?php echo e($subCity->name); ?></span>
                                        </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </div>
                                    <!-- select group level 2 end  -->
                                </div>
                                <!-- select group level 1 end  -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                            </div>
                            <!-- dropdown wrapper start -->

                        </div>
                        <!-- city select button end -->


                      <select>
                          <option selected>0 كم</option>
                          <option>5 كم</option>
                          <option>10 كم</option>
                          <option>20 كم</option>
                          <option>40 كم</option>
                          <option>80 كم</option>
                          <option>100 كم</option>
                      </select>
                  <!-- submit -->
        <?php endif; ?>
        </div>
    </div>
     <?php if(Session::get('lang') == 'en'): ?>
    <!-- submit -->
    <input type="submit" value="search">
    <?php else: ?>
    <input id="searchBar" type="submit" value="إبحث">
    <?php endif; ?>
    </form>
</div>
<!-- filter end -->