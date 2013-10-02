<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>كلامنا</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/style.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/form.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="<?php echo static_url(); ?>layout/css/alerts.css" type="text/css" media="screen" />	
        <?php echo $_styles; ?>

        <script src="<?php echo static_url(); ?>layout/js/jquery-1.7.2.min.js"></script>
        <script src="<?php echo static_url(); ?>layout/js/site_url_global.js"></script>
        <script src="<?php echo static_url(); ?>layout/js/jquery.validate.min.en.js"></script>
        <?php echo $_scripts; ?>
    </head>

    <body class="hacen">

        <div id="wrapper">

            <div id="container">

                <div id="content-wrapper" style="padding:0">
                    <?php
                    $admin = $this->session->userdata('is_login');
                    if ($admin) {
                        ?>
                        <div id="top-menu">

                            <div class="links">
                                <a href="">الرئيسية</a>
                                | 
                                <a href="<?php echo site_url('admin/site/about_us'); ?>">عن الموقع</a>
                                | 
                                <a href="<?php echo site_url('admin/site/sayings'); ?>">أقوال مأثورة</a>
                                | 
                                <a href="">اتصل بنا</a>
                            </div>
                            <div class="account-actions">
                                <div class="links">
                                    <a href="<?php echo site_url('admin/login/logout'); ?>">تسجيل الخروج</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div id="inner-page-content">

                        <div class="inside-top-screen">                            
                            <div id="content">


                                <div class="welcome-inside-message">                                    
                                </div>
                            </div>
                        </div>
                        <div id="content">
                            <?php
                            if ($this->session->flashdata('message')) {
                                $message = $this->session->flashdata('message');
                                ?>
                                <div class="<?php echo $message['type'] ?>">
                                    <?php echo $message['body']; ?>
                                </div>
                                <div class="clear" style="height: 20px;"></div>
                                <?php
                            }
                            ?>   
                            <?php echo $content; ?>
                        </div>


                        <div class="horizontal-seperator"></div>
                        <img style="margin-right: 388px;
                             margin-top: 13px;
                             margin-bottom: 12px;" src="<?php echo static_url(); ?>layout/images/footer.png" />
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>