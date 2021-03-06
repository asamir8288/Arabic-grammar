<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>كلامنا</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/style.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/form.css" type="text/css" media="screen" />	
        <?php echo $_styles; ?>

        <script src="<?php echo static_url(); ?>layout/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo static_url(); ?>layout/js/menu.js"></script>
        <?php echo $_scripts; ?>
    </head>

    <body class="hacen">

        <div id="wrapper">

            <div id="container">

                <div id="content-wrapper" style="padding:0">
                    <div id="top-menu" class="top_menu">
                        <?php
                        $user_info = $this->session->userdata('user_info');
                        if ($user_info) {
                            ?>
                            <div class="links">
                                <a href="<?php echo site_url();?>">الرئيسية</a>
                                | 
                                <a menu_id="db"  class="sub" href="<?php echo site_url('exam/listall'); ?>">اختبارات</a>
                                <ul class="submenu" id="db" style="display: none;">
                                    <li class="submenu_header"></li>
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'exam/listall'; ?>">اختار اختبار جديد</a></li>
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'exam/my_exams'; ?>">قائمة اختباراتي الحالية</a></li>                                   
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'exam/my_previous_exams'; ?>">قائمة اختباراتي السابقة</a></li>                                  
                                </ul>
                                | 
                                <a menu_id="db1"  class="sub" href="<?php echo site_url('assessment/listall'); ?>">تدريبات</a>
                                <ul class="submenu" id="db1" style="display: none;">
                                    <li class="submenu_header"></li>
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'assessment/listall'; ?>">اختار تدريب جديد</a></li>
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'assessment/my_assessments'; ?>">قائمة تدريباتي الحالية</a></li>                                   
                                    <li class="submenu_bg" style="width: 180px;"><a href="<?php echo site_url() . 'assessment/previous_assessments'; ?>">قائمة تدريباتي السابقة</a></li>                                  
                                </ul>
                            </div>
                            <div class="account-actions">
                                <div class="links">
                                    <a href="<?php echo site_url('login/logout'); ?>">تسجيل الخروج</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="links">
                                <a href="<?php echo site_url('/'); ?>">الرئيسية</a>
                                | 
                                <a href="<?php echo site_url('about-us'); ?>">عن الموقع</a>
                                | 
                                <a href="<?php echo site_url('contact-us'); ?>">اتصل بنا</a>
                            </div>
                            <div class="account-actions">
                                <div class="links">
                                <a href="<?php echo site_url('/'); ?>">دخول</a> | <a href="<?php echo site_url('signup'); ?>">تسجيل</a>
                            </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div id="inner-page-content">

                        <div class="inside-top-screen">
                            <div id="content">
                                <div class="welcome-inside-message"></div>
                                <div class="social-network">
                                    <a href="" class="facebook"></a>
                                    <a href="" class="twitter"></a>
                                    <a href="" class="google"></a>
                                    <a href="" class="linkedin"></a>
                                </div>                                
                            </div>
                        </div>
                        <div id="content">
                            <?php echo $content; ?>
                        </div>

                        <div class="clear" style="height: 15px;"></div>

                        <div class="horizontal-seperator"></div>

                        <div id="footer">
                            <a href="">دار العالم العربي</a>
                            <a href="">اتصل بنا</a>
                            <?php
                            $user_info = $this->session->userdata('user_info');
                            if ($user_info) {
                                ?>
                                <a href="<?php echo site_url('dashboard'); ?>">الرئيسية</a>
                            <?php } else { ?>
                                <a href="<?php echo site_url('signup'); ?>">انضم الينا</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clear" style="height: 25px;"></div>

                </div>
            </div>
        </div>
    </body>
</html>