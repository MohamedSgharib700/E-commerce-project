<?php $__env->startSection('content'); ?>
<!-- profile -->
<div class="big-container register bottom-100 top-100">
  <div class="profile-tabs">
      <a href="<?php echo e(route ('ads')); ?>">إدارة الاعلانات</a>
      <a href="<?php echo e(route ('messages')); ?>" class="active">الرسائل</a>
      <a href="<?php echo e(route ('savedsearch')); ?>">عمليات بحث محفوظة</a>
      <a href="<?php echo e(route ('profile')); ?>">الملف الشخصي</a>
  </div>
  <div class="profile-body">
      <div class="row no-margin table-head">
          <div class="col l1">&nbsp;</div>
          <div class="col l2">أسم المرسل</div>
          <div class="col l5">الرسالة</div>
          <div class="col l3">تاريخ الارسال</div>
          <div class="col l1">التحكم</div>
      </div>
      <div class="row no-margin table-row">
        <?php $__currentLoopData = $inboxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inbox): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       
          <div class="col l1">
              <label class="checkbox blued">
                  <input type="checkbox" name="status"><span></span>
              </label>
          </div>
          <div class="col l2"> <?php echo e($inbox->sender_name); ?></div>
          <div class="col l5"><input type="hidden" class="msgs-id" value=""><a class="modal-open open-msgs" data-modal-open=".profile-messege"><?php echo e($inbox->messages); ?></a></div>
          <div class="col l3"><?php echo e(date('d/m/Y', strtotime($inbox->created_at))); ?></div>
        
          <div class="col l1">
              <div class="table-tools">
                  <a href="deleteMess/<?php echo e($inbox->id); ?>"><i class="fa fa-times"></i></a>
              </div>
          </div>
         
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <div>
      <button class="butn blue mt-25 no-border">حذف المحدد</button>
  </div>
</div>
<!-- global overlay -->
<div class="global-overlay"></div>
<div class="my-modal profile-messege">
    <div class="closer"></div>
    <div class="my-modal-body">
        <form role="form" method="POST" action="<?php echo e(Url('/replyMess')); ?>">
          <?php echo csrf_field(); ?>

            <div class="maseges-container">
            </div>
            <div class="send-bar">
                <textarea name="messages" id="message-data" class="send-massege" placeholder="اكتب رسالتك"></textarea>
                
                <input type="hidden" name="sender_name" value="<?php echo e($userAuth['name']); ?>">
                <input type="hidden" name="sender_phone" value="<?php echo e($userAuth['contact_number']); ?>">
                <input type="hidden" name="sender_id" value="<?php echo e($userAuth['id']); ?>">
                <input type="hidden" name="sentTo_id" value="">
               
                <button class="send-btn" type="submit">ارسال</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>