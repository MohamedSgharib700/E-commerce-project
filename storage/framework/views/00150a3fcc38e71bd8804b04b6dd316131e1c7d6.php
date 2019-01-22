<!DOCTYPE html>
<?php if(Session::get('lang') == 'en'): ?>
<html lang="en">
<?php else: ?>
<html lang="ar">
<?php endif; ?>
<head>
    <!-- Page Title -->
    <title>GulfRoots <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Copyright (c) Viralcorners">
    <meta name="keywords" content="The keywords here"/>
    <meta name="description" content="The description here"/>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('favicon/apple-touch-icon.png')); ?>">
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon/favicon-32x32.png')); ?>" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo e(asset('favicon/favicon-16x16.png')); ?>" sizes="16x16">
    <link rel="manifest" href="<?php echo e(asset('favicon/manifest.json')); ?>">
    <link rel="mask-icon" href="<?php echo e(asset('favicon/safari-pinned-tab.svg')); ?>" color="#fa5b31">
    <meta name="theme-color" content="#078aff">
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&amp;subset=arabic"
          rel="stylesheet">

    <!-- Main Style -->
    <link href="<?php echo e(asset('front-assets/css/style.min.ar.css')); ?>" rel="stylesheet">
    <link rel="stylesheet"
          href="//cdnjs.cloudflare.com/ajax/libs/authy-forms.css/2.2/form.authy.min.css">
                    <style>
            header nav>ul>li ul {
                width: 490px;
            }
            header nav>ul>li ul li a {
                font-size:12px;
            }
            .wtc {
                color:#fff;
            }
            .bc {
                color:#1c6bb0 !important;
            }
            .show-all {
    height: 32px;
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    background: linear-gradient(transparent, #ecebe7);
    z-index: 1;
    font-size: 12px;
    padding-top: 12px;
    cursor: pointer;
    display:none;
}
.has-down {
    max-height: 258px;
    overflow: hidden;
    margin-bottom: 25px;
    position: relative;
}
          </style>
    <!-- JS Files -->
    <!-- <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/authy-forms.js/2.2/form.authy.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="white-header">
<!-- Header Strat -->
<header>
        <?php if(auth()->guard()->guest()): ?>
        <div class="header-box">
            <div class="header-top">
                <div class="row no-margin">
                    <div class="col l6">
                        <!-- /Logo/ -->
                        <a class="logo" href="<?php echo e(route('landing')); ?>">
                            <img src="<?php echo e(asset('front-assets/images/logo.png')); ?>" alt="GulfRoots">
                        </a>
                    </div>
                    <div class="col l2 user-area">
                        <a href="<?php echo e(route('login')); ?>">تسجيل الدخول</a>
                        <a href="<?php echo e(route('register')); ?>">التسجيل</a>
                    </div>
                    <div class="col l4 user-ctrl">
                        <div class="account-box">
                            <div class="account-head">
                                <img src="<?php echo e(asset('front-assets/images/user.jpg')); ?>" alt="">
                                حسابي
                                <i class="fa fa-caret-down"></i>
                            </div>
                            <div class="account-drop">
                                <ul>
                                  <li><a href="<?php echo e(route ('register')); ?>">أدراة اﻷعلانات</a></li>
                                  <li><a href="<?php echo e(route ('register')); ?>">الرسائل</a></li>
                                  <li><a href="<?php echo e(route ('register')); ?>">البحث المحفوظة</a></li>
                                  <li><a href="<?php echo e(route ('register')); ?>">الملف الشخصى</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="add-ad">
                            <a class="butn blue" style="padding:0 25px;" href="<?php echo e(route('register')); ?>">
                                <i class="fa fa-plus"></i> &nbsp;
                                اضف اعلان</a>
                        </div>
                        <div class="add-ad">
                            <?php if(Session::get('lang') == 'en'): ?>
                        <a class='dropdown-button butn orange wtc' href='' data-activates='dropdown1'>language</a>
                             <!-- Dropdown Structure -->
                           <!--  <ul id='dropdown1' class='dropdown-content'> -->
                           <ul id='dropdown1' class='dropdown-content'>
                            <li><a class="bc" href="lang/ar"><img src="<?php echo e(asset('images/ksa.gif')); ?>" alt=""></a></li>
                            <li><a class="bc" href="lang/en"><img src="<?php echo e(asset('images/en.jpg')); ?>" alt=""></a></li>
                             </ul>
                             <?php else: ?>
                             <a class='dropdown-button butn orange wtc' href='' data-activates='dropdown1'>اللغة</a>
                            <!-- Dropdown Structure -->
                            <!--  <ul id='dropdown1' class='dropdown-content'> -->
                           <ul id='dropdown1' class='dropdown-content'>
                            <li><a class="bc" href="lang/ar"><img src="<?php echo e(asset('images/ksa.gif')); ?>" alt=""></a></li>
                            <li><a class="bc" href="lang/en"><img src="<?php echo e(asset('images/en.jpg')); ?>" alt=""></a></li>
                             </ul>
                             <?php endif; ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            <div class="header-box">
                <div class="header-top">
                    <div class="row no-margin">
                        <div class="col l6">
                            <!-- /Logo/ -->
                            <a class="logo" href="<?php echo e(route('landing')); ?>">
                                <img src="<?php echo e(asset('front-assets/images/logo.png')); ?>" alt="GulfRoots">
                            </a>
                        </div>
                        <div class="col l2 user-area">
                        </div>
                        <div class="col l4 user-ctrl">
                            <div class="account-box">
                                <div class="account-head">
                                    <img src="<?php echo e(Auth::user()->profile_picture); ?>" alt="">
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                        <?php echo e(Auth::user()->name); ?> <span></span>
                                    </a>
                                    <i class="fa fa-caret-down"></i>
                                </div>
                                <div class="account-drop">
                                    <ul>
                                      <li><a href="<?php echo e(route ('ads')); ?>">أدراة اﻷعلانات</a></li>
                                      <li><a href="<?php echo e(route ('messages')); ?>">الرسائل</a></li>
                                      <li><a href="<?php echo e(route ('savedsearch')); ?>">البحث المحفوظة</a></li>
                                      <li><a href="<?php echo e(route ('profile')); ?>">الملف الشخصى</a></li>
                                        <li><a href="<?php echo e(route('logout')); ?>"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                تسجيل الخروج
                                            </a>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="add-ad">
                                <a class="butn blue" href="<?php echo e(Url('newad')); ?>">اضف اعلان</a>
                            </div>
                            <div class="add-ad">
                            <?php if(Session::get('lang') == 'en'): ?>
                        <a class='dropdown-button butn orange wtc' href='' data-activates='dropdown1'>language</a>
                             <!-- Dropdown Structure -->
                           <!--  <ul id='dropdown1' class='dropdown-content'> -->
                           <ul id='dropdown1' class='dropdown-content'>
                            <li><a class="bc" href="lang/ar">AR</a></li>
                            <li><a class="bc" href="lang/en">EN</a></li>
                             </ul>
                             <?php else: ?>
                             <a class='dropdown-button butn orange wtc' href='' data-activates='dropdown1'>اللغة</a>
                            <!-- Dropdown Structure -->
                            <!--  <ul id='dropdown1' class='dropdown-content'> -->
                           <ul id='dropdown1' class='dropdown-content'>
                            <li><a class="bc" href="lang/ar">AR</a></li>
                            <li><a class="bc" href="lang/en">EN</a></li>
                             </ul>
                             <?php endif; ?>
                        </div> 
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Menu Start -->
        <nav>
            <ul class="start <?php echo e(Request::is('/categories*')?"active":""); ?>">
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($category['id']); ?>"><?php echo e($category['name_ar']); ?></a>
                        <ul class="level2">
                            <?php $__currentLoopData = $category['subcategories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($subcat['id']); ?>"><?php echo e($subcat['name_ar']); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </nav>
        <!-- Menu End -->
</header>
<!-- Header End -->
<!-- search & spesial products -->

<div class="normal-body">

<div class="big-container">

    <?php echo $__env->make('includes.searchbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('includes.specialcategories', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="">
    <?php echo $__env->yieldContent('content'); ?>
</div>

</div>
</div>

<!-- end body -->

<!-- Fixed Footer Start -->
<footer>
    <div class="big-container">
        <div class="footer-top">
            تطبيقات قلف روتس الخاصة بالهواتف الذكية
            <a href="#!"><img src="<?php echo e(asset('images/apple.jpg')); ?>" alt=""></a>
            <a href="#!"><img src="<?php echo e(asset('images/google.jpg')); ?>" alt=""></a>
        </div>

        <div class="footer-map">
            <div class="row no-margin">
              <div class="col l3">
                  <h3>الدعم والمساعدة</h3>
                  <a href="<?php echo e(route('about')); ?>">عن قلف روتس</a>
                  <a href="<?php echo e(route('customerservice')); ?>">خدمة العملاء</a>
                  <a href="<?php echo e(route('help')); ?>">المساعدة</a>
                  <a href="<?php echo e(route('protectionadvices')); ?>">نصائح الحماية والخصوصية</a>
                  <a href="<?php echo e(route('contactus')); ?>">اتصل بنا</a>
              </div>
              <div class="col l3">
                  <h3>اتفاقية الاستخدام</h3>
                  <a href="<?php echo e(route('conditions')); ?>">الشروط والاحكام</a>
                  <a href="<?php echo e(route('privacypolicy')); ?>">سياسة الخصوصية</a>
                  <a href="<?php echo e(route('publishingpolicy')); ?>">سياسية النشر</a>
                  <a href="<?php echo e(route('savedata')); ?>">سياسة حفظ البيانات</a>
              </div>
                <div class="col l3">
                    <h3>الوصول السريع</h3>
                    <a href="<?php echo e(route('password.request')); ?>">استرجاع كلمة المرور</a>
                    <a href="<?php echo e(url('companies')); ?>">خدمات الشركات</a>
                    <a href="<?php echo e(url('families')); ?>">خدمات اﻷسر</a>
                    <a href="<?php echo e(url('individuals')); ?>">خدمات الافراد</a>
                </div>
                <div class="col l3" class="start <?php echo e(Request::is('/categories*')?"active":""); ?>">
                    <h3>الاقسام الاكثر شهرة</h3>
                    <?php if(count($categories) > 0): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(Url('/')); ?>/categories/<?php echo e($category['id']); ?>"><?php echo e($category['name_ar']); ?></a>
                            <?php if($category['id'] === 5): ?>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
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
                    جميع الحقوق محفوظة لدي قلف روتس
                </div>
                <div class="col l6 lefted">
                    <div class="footer-social">
                        <a href="#!" target="_blank"><i class="fa fa-snapchat"></i></a>
                        <a href="https://www.youtube.com/channel/UCXHF7I8njk6vykrScQ1UiSw" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        <a href="https://www.instagram.com/gulfroots_/?utm_source=ig_profile_share&igshid=1fy4azbgtdz5q" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#!" target="_blank"><i class="fa fa-google-plus"></i></a>
                        <a href="https://twitter.com/gulfroots?s=08" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/GulfrootsSA/" target="_blank"><i class="fa fa-facebook"></i></a>
                        
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
<?php if(Auth::check()): ?>
<div class="hidden">
    <span id="userId" data-userid="<?php echo e(Auth::user()->id); ?>"></span>
</div>
<?php endif; ?>
<script defer src="<?php echo e(Url('/')); ?>/front-assets/js/ui.min.js"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script defer src="<?php echo e(Url('/')); ?>/front-assets/js/live-chat.js"></script>


</body>
</html>
