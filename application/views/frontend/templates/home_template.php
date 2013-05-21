<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>كلامنا</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/style.css" type="text/css" media="screen" />	        
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/home.css" type="text/css" media="screen" />	        
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/jquery.formgraytext.css" type="text/css" media="screen" />	        
        <script src="<?php echo static_url(); ?>layout/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo static_url(); ?>layout/js/jquery.formgraytext.js"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#username, #password').formGrayText(); 
            });
        </script>
    </head>

    <!-- BEGIN body -->
    <body class="hacen">

        <div id="wrapper">

            <div id="container">                

                <div id="content-wrapper" style="padding:0">
                    <div id="top-menu">
                        <div class="links">
                            <a href="<?php echo site_url('/'); ?>">الرئيسية</a>
                            | 
                            <a href="<?php echo site_url('about-us'); ?>">عن الموقع</a>
                            | 
                            <a href="<?php echo site_url('contact-us'); ?>">اتصل بنا</a>
                        </div>
                        <div class="account-actions">
                            <div class="links">
                                <a href="">دخول</a> | <a href="<?php echo site_url('signup'); ?>">تسجيل</a>
                            </div>
                        </div>
                    </div>

                    <div id="homepage-content">

                        <div class="welcome-screen">
                            <div class="welcome-screen-description-left">
                               من أقوال القدماء
<br />
                               <p>
                                    <?php echo nl2br($sayings['content']); ?>
                                </p>
                            </div>
                            <img style="margin-right: 56px;margin-top: 49px;" src="<?php echo static_url(); ?>layout/images/welcome-screen.png" />
                            <p class="welcome-screen-description">أهلا وسهلا بكم فى كلامنا.كوم أكبر مدرسة تفاعلية متكاملة على شبكة الإنترنت لتعليم النحو العربى كاملا لكافة الأعمار والمراحل السنية
                                <br/>
                                كلامنا.كوم أنشأته وتديره دار العالم العربى للطباعة والنشر بدولة الإمارات العربية المتحدة ويقدم خدماته مجانا لراغبى تعلم قواعد النحو والصرف العربى حول العالم
                            </p>  

                        </div>

                        <div class="home-content">
                            <div class="home-registration-info">
                                للاستفادة من خدمات الموقع يجب إنشاء حساب جديد مجانى أو تسجيل الدخول إذا كان لديك حساب بالفعل 
                            </div>

                            <div class="box">
                                <?php echo form_open(site_url('login/index')); ?>
                                <ul>
                                    <li class="field-group">                                    
                                        <input title="اسم المستخدم" type="text" name="email" id="username" />
                                    </li>

                                    <li class="field-group">
                                        <input title ="كلمة المرور" type="password" name="password" id="password" />
                                    </li>
                                    <li>
                                        <?php echo form_submit('submit', ' ', 'class="login-btn"'); ?>
                                        <spv><a href="" style="font-size: 12px;">هل نسيت كلمة السر؟</a></spv>
                                    </li>
                                </ul>
                                <?php echo form_close(); ?>
                            </div>
                            <div class="box-separator"></div>
                            <div class="box">
                                <ul>
                                    <li class="field-group">                                    
                                        هذه أول زيارة لي للموقع وأرغب في إنشاء
                                        حساب جديد
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('signup'); ?>" id="signup-btn"></a>
                                    </li>
                            </div>
                        </div>

                        <div class="clear"></div>
                        <div class="horizontal-seperator" style="margin-top: 80px;"></div>
                        <div id="footer">
                            <a href="">دار العالم العربي</a>
                            <a href="">اتصل بنا</a>
                            <a href="<?php echo site_url('signup'); ?>">انضم الينا</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>