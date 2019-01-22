    <div class="closer"></div>
    <div class="my-modal-body">
        <h1 class="no-margin nb">التحدث المباشر مع : <?php echo e($user_to->name); ?></h1>
        <div class="massege-box">
            <ul>
                <?php if(count($messages)): ?>
                <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($msg->user_id != Auth::user()->id): ?>
                <li><span><?php echo e($user_to->name); ?> :</span> <?php echo e($msg->body); ?></li>
                <?php else: ?>
                <li><span>انت :</span> <?php echo e($msg->body); ?></li>
                <?php endif; ?>
                <?php  $num++;  ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <center><div class="alert alert-info"> يمكنك بدء المحادثه الآن </div></center>
                <?php endif; ?>                    
            </ul>
        </div>
        <form action="<?php echo e(url('sendMsg/'.$id)); ?>" method="post" name="postform" id="chatPostform">
            <div class="send-bar">
                <?php echo e(csrf_field()); ?>

                <input name="body" id="msgBody" type="text" placeholder="اكتب رسالتك">
                <input type="hidden" name="user_to" value="<?php echo e($id); ?>">
                <button id="sendMsg" type="submit" name="submit">ارسال</button>
            </div>
        </form>
    </div>