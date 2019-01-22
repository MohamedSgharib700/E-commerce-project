<?php $__env->startSection('content'); ?>
<div class="big-head top-100 bottom-50 centerd">
            <h1>تسجيل عضوية جديدة</h1>
    </div>

      <!-- register -->
      <div class="big-container register bottom-100 centerd">

        <div class="boxed-container">

            <div class="row no-margin center-border bottom-50">
                <span class="has-or">أو</span>

                <div class="box-head">
                    <p>من خلال التسجيل في الموقع انا اوافق علي 
                        <a href="<?php echo e(route('conditions')); ?>" target="_blank">شروط الاستخدام</a>
                        و
                        <a href="<?php echo e(route('privacypolicy')); ?>" target="_blank">سياسة الخصوصية</a>
                        واوافق علي تلقي العروض من موقع قلف روتس
                    </p>
                </div>

                <div class="col l6">
                    <form class="normal-inputs form-80 top-25 bottom-25" role="form" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div>
                        <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus placeholder="اسم المستخدم">
                        <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div>
                        <input id="phone" type="text" class="form-control" name="phone" value="<?php echo e(old('phone')); ?>" required placeholder="هاتف المستخدم">
                        <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required placeholder="البريد الاليكتروني">
                        <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <input id="password" type="password" class="form-control" name="password" required placeholder="كلمة المرور">
                        <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="إعادة كلمة المرور">
                        </div>
                        <div>
                        <input type="submit"  value="تسجيل الحساب">
                        </div>
                        <a href="<?php echo e(route ('login')); ?>">هل لديك حساب مسجل؟</a>
                    </form>
                </div>
                
                <div class="col l6 centerd vcenter">

                    <a href="<?php echo e(route('fbredirect')); ?>" class="zoom blocked"><img src="<?php echo e(asset('front-assets/images/facebook-reg.jpg')); ?>" alt=""></a>
                    <a href="<?php echo e(route('gplusredirect')); ?>" class="zoom blocked"><img src="<?php echo e(asset('front-assets/images/google-reg.jpg')); ?>" alt=""></a>
                
                </div>

                <div class="clearfix"></div>
            </div>

        </div>

        

      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>