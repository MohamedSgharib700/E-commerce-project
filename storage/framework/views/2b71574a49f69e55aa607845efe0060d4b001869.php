<?php $__env->startSection('content'); ?> 
<div class="big-head top-100 bottom-50 centerd">
        <h1>استرجاع كلمة المرور</h1>
</div>
      <!-- register -->
      <div class="big-container register bottom-100 centerd">
        <div class="boxed-container">
            <div class="row no-margin top-50 bottom-50">
                <div class="thanks-box">
                   من فضلك ادخل البريد الاليكتروني المسجل بالحساب الخاص بك
                   <div class="tiny-form xx">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                       <form class="" role="form" method="POST" action="<?php echo e(route('password.email')); ?>">
                          <?php echo e(csrf_field()); ?>

                            <div class="row no-margin">
                                <div class="col l9 rightness" class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                                        <input id="email" placeholder="البريد الاليكتروني" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>
                                        <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                                </div>
                                <div class="col l3">
                                    <input class="blue rudis ln-45 bolded no-border full-width opa" type="submit" value="ارسال">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                       </form>
                   </div>
                    <a href="<?php echo e(route ('landing')); ?>" class="butn blue">عودة للصفحة الرئيسية</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>