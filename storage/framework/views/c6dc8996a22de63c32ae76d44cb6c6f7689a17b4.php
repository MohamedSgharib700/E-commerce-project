<?php $__env->startSection('content'); ?>
<div class="big-head top-100 bottom-50 centerd">
            <h1>تسجيل الدخول</h1>
    </div>

      <!-- register -->
      <div class="big-container register bottom-100 centerd">
        <div class="boxed-container">
            <div class="row no-margin center-border top-50 bottom-50">
                <span class="has-or">أو</span>
                <div class="col l6">
                    <form class="normal-inputs form-80 top-25 bottom-25" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"></label>
                            <div class="col-md-6">
                                <input id="email" placeholder="البريد الاليكتروني" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"></label>

                            <div class="col-md-6">
                                <input id="password" placeholder="كلمة المرور" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <label class="checkbox width-50 inlined mb-15 login">
                            <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>><span></span>
                            تذكرني
                        </label>
                        <div class="width-50 lefted inlined mb-15">
                            <a class="thin" href="<?php echo e(route('password.request')); ?>">نسيت كلمة المرور؟</a>
                        </div>
                        <input type="submit" value="تسجيل الدخول">
                        <a href="<?php echo e(route('register')); ?>">ليس لديك حساب؟</a>
                    </form>
                </div>
                <div class="col l6 centerd vcenter2">
                    <a href="<?php echo e(route('fbredirect')); ?>" class="zoom blocked"><img src="<?php echo e(asset('images/facebook-log.jpg')); ?>" alt=""></a>
                    <a href="<?php echo e(route('gplusredirect')); ?>" class="zoom blocked"><img src="<?php echo e(asset('images/google-log.jpg')); ?>" alt=""></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>