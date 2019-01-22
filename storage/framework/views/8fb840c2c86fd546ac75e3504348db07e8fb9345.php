<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">

  <div class="profile-tabs">
      <a href="<?php echo e(route ('ads')); ?>">إدارة الاعلانات</a>
      <a href="<?php echo e(route ('messages')); ?>">الرسائل</a>
      <a href="<?php echo e(route ('savedsearch')); ?>">عمليات بحث محفوظة</a>
      <a href="<?php echo e(route ('profile')); ?>" class="active">الملف الشخصي</a>
  </div>

  <div class="profile-body">
    <!-- <?php echo Form::model($user,['url' => Url('/post'), 'method' => 'POST']); ?> -->
    <form method="POST" action="<?php echo e(Url('userUpdate')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

          <div class="row no-margin table-head">
              <div>
                       صورة الملف الشخصي 
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
         <?php if($users->profile_picture == null): ?>
           <img src="<?php echo e(asset('front-assets/images/user.jpg')); ?>" alt="">
          <?php else: ?>
           <img class="circl" src="<?php echo e(asset('imagesProfile/'. $users->profile_picture)); ?>" alt="">
         <?php endif; ?>
                         <div class="file-upload">
                                    
                                    <input class="hidden-upload" type="file" value="<?php echo e($users->profile_picture); ?>" name="images">
                                    <!--<button class="open-file">تعديل الصورة</button>-->
                                </div>
          </div>
          </div>
         <?php if(Auth::user()->email_token == null || Auth::user()->type == 0): ?>
          <div class="row no-margin table-head">
              <div>
                  تغيير كلمة المرور
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="password" name="password"  value=""  placeholder="********">
          <!--<input type="password" name"password" placeholder="اعادة كلمة المرور">-->
          
          </div>
          </div>
          <div class="row no-margin table-head">
              <div>
                  تغيير البريد الاليكتروني
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
          <input type="email" name="email" value="<?php echo e($users->email); ?>" placeholder="البريد الاليكتروني">
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          
          </div>
          </div>
         <?php else: ?>
          <div class="row no-margin table-head">
              <div>
                   البريد الاليكتروني
              </div>
          </div>
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
              <label for="email"><?php echo e($users->email); ?></label>
          
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          
          </div>
          </div>
         <?php endif; ?>
      <div class="row no-margin table-head">
              <div>
                  تغيير البيانات الشخصية
              </div>
          </div>
         
          <div class="row no-margin">
          <div class="col l5 mt-15 mb-15">
        <?php if($users->type == 0): ?>
          <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
              <input type="text" name="name" value="<?php echo e($users->name); ?>"  placeholder="اسم المستخدم">
              <input type="text" name="phone_number" value="<?php echo e($users->phone); ?>"  placeholder="رقم التواصل ">
            <?php else: ?>
              <input type="text" name="phone_number" value="<?php echo e($users->getCommerical->phone_number); ?>"  placeholder="رقم التواصل ">
              <input type="text" name="commercial_record_number" value="<?php echo e($users->getCommerical->commercial_record_number); ?>"  placeholder="رقم السجل التجاري  ">
              <input type="text" name="maaroof_url" value="<?php echo e($users->getCommerical->maaroof_url); ?>"  placeholder=" رابط الموقع الالكتروني">
            <?php endif; ?>
         <!-- <input type="email" placeholder="اعادة البريد الاليكتروني" value="">-->
          <button class="the-btn blue no-border">حفظ</button>
          </div>
          </div>
         <!-- <?php echo Form::close(); ?> -->
  </div>
 </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>