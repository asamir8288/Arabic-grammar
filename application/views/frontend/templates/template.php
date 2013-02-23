<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>كلامنا</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="<?php echo static_url();?>layout/css/style.css" type="text/css" media="screen" />	
        <link rel="stylesheet" href="<?php echo static_url();?>layout/css/form.css" type="text/css" media="screen" />	
        <?php echo $_styles;?>
        
        <script src="<?php echo static_url();?>layout/js/jquery-1.7.2.min.js"></script>
        <?php echo $_scripts;?>
    </head>

    <body class="hacen">

        <div id="wrapper">

            <div id="container">

                <div id="content-wrapper" style="padding:0">

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
                            <?php echo $content;?>
                        </div>
                        
                        <div class="clear" style="height: 15px;"></div>
                        
                        <div class="horizontal-seperator"></div>
                        
                        <div id="footer">
                            <a href="">دار العالم العربي</a>
                            <a href="">اتصل بنا</a>
                            <a href="<?php echo site_url('signup');?>">انضم الينا</a>
                        </div>
                    </div>
                    <div class="clear" style="height: 25px;"></div>

                </div>
            </div>
        </div>
    </body>
</html>