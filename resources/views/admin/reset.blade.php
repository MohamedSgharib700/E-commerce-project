
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Login | Gulf Roots</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{Url('/')}}/backend/assets/admin/pages/css/login2.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{Url('/')}}/backend/assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/global/css/plugins-md.css" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="{{Url('/')}}/backend/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="{{Url('/')}}/backend/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login" style="color: #497b9b;">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGO -->
    <div class="logo">
        <h1 style="color: #fff">
            Gulf Roots
        </h1>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        {!! Form::open(['action'=>'Admin\AdminAuthController@reset']) !!}
            <div class="form-title">
                <span class="form-title">Forget Password ?</span>
                <span class="form-subtitle">Enter your e-mail to reset it.</span>
            </div>
            <div class="form-group">
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            </div>
            <div class="form-actions">
                <button type="button" id="back-btn" class="btn btn-default">Back</button>
                <button type="submit" class="btn btn-primary uppercase pull-right">Submit</button>
            </div>
        {!! Form::close() !!}
        <!-- END FORGOT PASSWORD FORM -->
    </div>
    <div class="copyright hide">
         2014 © Metronic. Admin Dashboard Template.
    </div>
    <!-- END LOGIN -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
    <script src="{{Url('/')}}/backend/assets/global/plugins/respond.min.js"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/excanvas.min.js"></script> 
    <![endif]-->
    <script src="{{Url('/')}}/backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{Url('/')}}/backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{Url('/')}}/backend/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="{{Url('/')}}/backend/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
    jQuery(document).ready(function() {     
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Login.init();
        Demo.init();
    });

    </script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>