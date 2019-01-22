<footer>
    
    <div class="big-container">
        <div class="footer-top">
             <?php if(Session::get('lang') == 'en'): ?>
            Applications of gulf Rotes
            <a href="#!"><img src="<?php echo e(asset('front-assets/images/apple.jpg')); ?>" alt=""></a>
            <a href="#!"><img src="<?php echo e(asset('front-assets/images/google.jpg')); ?>" alt=""></a>
            <?php else: ?>
            تطبيقات قلف روتس الخاصة بالهواتف الذكية
            <a href="#!"><img src="<?php echo e(asset('front-assets/images/apple.jpg')); ?>" alt=""></a>
            <a href="#!"><img src="<?php echo e(asset('front-assets/images/google.jpg')); ?>" alt=""></a>
            <?php endif; ?>
        </div>

    <div class="footer-map">
        <div class="row no-margin">
          <div class="col l3">
              <?php if(Session::get('lang') == 'en'): ?>
              <h3>Support and help</h3>
              <a href="<?php echo e(route('about')); ?>">About Gulf Rot</a>
              <a href="<?php echo e(route('customerservice')); ?>">customers service</a>
              <a href="<?php echo e(route('help')); ?>">Help</a>
              <a href="<?php echo e(route('protectionadvices')); ?>">Protection and privacy tips</a>
              <a href="<?php echo e(route('contactus')); ?>">call us</a> 
              
              <?php else: ?>
              <h3>الدعم والمساعدة</h3>
              <a href="<?php echo e(route('about')); ?>">عن قلف روتس</a>
              <a href="<?php echo e(route('customerservice')); ?>">خدمة العملاء</a>
              <a href="<?php echo e(route('help')); ?>">المساعدة</a>
              <a href="<?php echo e(route('protectionadvices')); ?>">نصائح الحماية والخصوصية</a>
              <a href="<?php echo e(route('contactus')); ?>">اتصل بنا</a>
              <?php endif; ?>
          </div>
          <div class="col l3">
               <?php if(Session::get('lang') == 'en'): ?>
                <h3>Usage Agreement</h3>
              <a href="<?php echo e(route('conditions')); ?>">Terms and Conditions</a>
              <a href="<?php echo e(route('privacypolicy')); ?>">Privacy policy</a>
              <a href="<?php echo e(route('publishingpolicy')); ?>">Posting Policy</a>
              <a href="<?php echo e(route('savedata')); ?>">Data retention policy</a>
               
              <?php else: ?>
                <h3>اتفاقية الاستخدام</h3>
              <a href="<?php echo e(route('conditions')); ?>">الشروط والاحكام</a>
              <a href="<?php echo e(route('privacypolicy')); ?>">سياسة الخصوصية</a>
              <a href="<?php echo e(route('publishingpolicy')); ?>">سياسية النشر</a>
              <a href="<?php echo e(route('savedata')); ?>">سياسة حفظ البيانات</a>
              <?php endif; ?>
          </div>
            <div class="col l3">
                 <?php if(!Auth::user()): ?>
                <?php if(Session::get('lang') == 'en'): ?>
                <h3>Quick access</h3>
                <a href="<?php echo e(route('password.request')); ?>">Recover password</a>
                <a href="<?php echo e(url('companyregister')); ?>">Corporate Services</a>
                <a href="<?php echo e(url('commercialuserregister')); ?>">Family Services</a>
                <a href="<?php echo e(url('personalregister')); ?>">Personnel Services</a>
                
                <?php else: ?>
                <h3>الوصول السريع</h3>
                <a href="<?php echo e(route('password.request')); ?>">استرجاع كلمة المرور</>
               
                <a href="<?php echo e(url('companyregister')); ?>">خدمات الشركات</a>
                <a href="<?php echo e(url('commercialuserregister')); ?>">خدمات اﻷسر</a>
                <a href="<?php echo e(url('personalregister')); ?>">خدمات الافراد</a>
                <?php endif; ?>
                <?php else: ?>
                 <?php if(Session::get('lang') == 'en'): ?>
                <h3>Quick access</h3>
                <a href="<?php echo e(Url('newad')); ?>">Add ads</a>
                <a href="<?php echo e(route ('ads')); ?>">Ads management</a>
                <a href="<?php echo e(route ('messages')); ?>">Messages</a>
                
                <?php else: ?>
                
                <h3>الوصول السريع</h3>
                <a href="<?php echo e(Url('newad')); ?>">أضف اعلانك</>
                <a href="<?php echo e(route ('ads')); ?>">أدارة الاعلانات</a>
                <a href="<?php echo e(route ('messages')); ?>">الرسائل</a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php  $categories = \App\Categories::all();  ?>
            <div class="col l3" class="start <?php echo e(Request::is('/categories*')?"active":""); ?>">
            <?php if(Session::get('lang') == 'en'): ?>
                <h3>Most Popular Sections</h3>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($category['id']); ?>"><?php echo e($category['name_en']); ?></a>
                    <?php if($category['id'] === 5): ?>
                    <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php else: ?>
                <h3>الاقسام الاكثر شهرة</h3>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($category['id']); ?>"><?php echo e($category['name_ar']); ?></a>
                    <?php if($category['id'] === 5): ?>
                    <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    </div>

    <div class="footer-bottom">
        <div class="big-container">
            <div class="row no-margin">
                <div class="col l6">
                    <?php if(Session::get('lang') == 'en'): ?>
                    All Rights Reserved gulf roots . 
                    <?php else: ?>
                    جميع الحقوق محفوظة لدي قلف روتس
                    <?php endif; ?>
                </div>
                <div class="col l6 lefted">
                    <div class="footer-social">
                        <a href="#!" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-facebook"></i></a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>
<!-- Fixed Footer End -->

<!-- global overlay -->
<div class="global-overlay"></div>
<?php if(Auth::check()): ?>
<div class="my-modal direct-messege">
    <div class="closer"></div>
    <div class="my-modal-body">
        <form>
            <div class="massege-box" style="max-height: 350px;height: 321px">
                <center>
                    <img src="<?php echo e(Request::root()); ?>/front-assets/images/chat-loading.gif" style="width: 220px">
                </center>
            </div>
        </form>
    </div>
</div>

<!-- live chat -->
<div class="live-chat">
    <span>--</span>
    <i class="fa fa-commenting"></i>
</div>

<!-- chat list -->
<div class="chatlist">
    <div class="list-over">
        <?php $messages = \App\Http\Controllers\MessageController::inbox(); ?>
        <?php if(count($messages)): ?>
        <?php  $num = 0;  ?>
        <?php $__currentLoopData = $messages->sortByDesc('updated_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('conv')); ?>/<?php echo e($msg->user_id == Auth::user()->id ? $msg->UserTo->id : $msg->User->id); ?>" data-modal-open=".direct-messege" class="modal-open has-message openUserConv" style="<?php if($msg->user_to == Auth::user()->id && $msg->status == 1): ?> background-color: #fdebeb;font-weight: bold; <?php endif; ?>">
            <span><?php if($msg->user_to == Auth::user()->id && $msg->status == 1): ?> 1 <?php else: ?> 0 <?php endif; ?></span>
            <img src="http://beta.gulfroots.com/front-assets/images/user.jpg" alt="">
            <?php echo e(str_limit($msg->user_id == Auth::user()->id ? $msg->UserTo->name : $msg->User->name,15)); ?>

        </a>
        <?php  $num++  ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <a href="#!">
            <span>0</span>
            لا توجد لديك  اى رسائل بعد 
        </a>
        <?php endif; ?>
    </div>
</div>      
<?php endif; ?>
<!-- jQuery plugins -->
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script defer src="<?php echo e(Url('/')); ?>/front-assets/js/ui.min.js"></script>
<script defer src="<?php echo e(Url('/')); ?>/front-assets/js/live-chat.js"></script>
<script defer src="<?php echo e(Url('/')); ?>/front-assets/js/filters.js"></script>
<?php if(Auth::check()): ?>
<div class="hidden">
    <span id="userId" data-userid="<?php echo e(Auth::user()->id); ?>"></span>
</div>
<?php endif; ?>

</body>
</html>
