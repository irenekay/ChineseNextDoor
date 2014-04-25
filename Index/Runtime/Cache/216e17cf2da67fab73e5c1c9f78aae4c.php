<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo (L("Chinese_next_door")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
</head>
<body style="height:auto !important; min-height:600px; _height:700px; overflow-y: hidden;">
    <div class="wraper">
        <div class="heads">
           <div class="logo"> <a href="/"><img src="__PUBLIC__/images/t_logo.gif"></a> </div>
            <div>
                <div class="h_title"><a href="__APP__/Content">Chinese next door</a>->
                    <?php if($act == about): echo (L("about")); ?>
                    <?php elseif($act == contact): echo (L("contact_us")); ?>
                    <?php elseif($act == privacy): echo (L("privacy_policy")); ?>
                    <?php elseif($act == terms): echo (L("terms_of_use")); endif; ?>
                </div>
                <div id="top_banner" class="h_right"> </div>
                <div style="clear: both;"></div>
            </div>
        </div>
        <div class="content">
            <div class="sid_nav">
                <ul>
                    <li><a href="__APP__/About/index/act/about" id="id_about"><?php echo (L("about")); ?></a></li>
                    <li><a href="__APP__/About/index/act/contact" id="id_contact"><?php echo (L("contact_us")); ?></a></li>
                    <li><a href="__APP__/About/index/act/privacy" id="id_privacy"><?php echo (L("privacy_policy")); ?></a></li>
                    <li><a href="__APP__/About/index/act/terms" id="id_terms"><?php echo (L("terms_of_use")); ?></a></li>
                </ul>
            </div>
            <div class="conr">
                <?php if($act == about): ?><h2 class="rtit_about"><?php echo (L("Description")); ?></h2>
                    <div class="anbotcom">
                        <p><?php echo (L("next_door")); ?>（<a href="http://www.bilinabroad.com/">www.bilinabroad.com</a>）<?php echo (L("content_description")); ?></p>
                        <p><strong><?php echo (L("website_creation")); ?> </strong></p>
                        <p><?php echo (L("content_creation")); ?></p>
                        <p><strong><?php echo (L("mission")); ?> </strong></p>
                        <p><?php echo (L("ontent_mission")); ?></p>
                    </div>
                <?php elseif($act == contact): ?>
                    <h2 class="rtit_about"><?php echo (L("contact_us")); ?></h2>
                    <div class="anbotcom">
                        <p><?php echo (L("contact_tel")); ?></p>
                        <p><?php echo (L("contact_email")); ?></p>
                        <p><?php echo (L("contact_cooperation")); ?></p>
                        <p><?php echo (L("contact_opinion")); ?></p>
                        <p><?php echo (L("contact_convenience")); ?></p>
                    </div>
                <?php elseif($act == privacy): ?>
                    <h2 class="rtit_about"><?php echo (L("privacy_policy")); ?></h2>
                    <div class="anbotcom">
                        <p><?php echo (L("privacy_1")); ?></p>
                        <p><?php echo (L("privacy_2")); ?></p>
                        <p><?php echo (L("privacy_3")); ?></p>
                        <p><?php echo (L("privacy_4")); ?></p>
                        <p>Bilinabroad has established this privacy policy to explain to you how your information is protected, which may be updated by craigslist from time to time. Bilinabroad will provide notice of materially significant changes to this privacy policy by posting notice on the bilinabroad site.</p>
                    </div>
                <?php elseif($act == terms): ?>
                    <h2 class="rtit_about"><?php echo (L("terms_of_use")); ?></h2>
                    <div class="anbotcom">
                        <p><?php echo (L("terms_of_use_1")); ?></p>
                        <p><?php echo (L("terms_of_use_2")); ?></p>
                        <p><?php echo (L("terms_of_use_3")); ?></p>
                        <p><?php echo (L("terms_of_use_4")); ?></p>
                    </div><?php endif; ?>
            </div>
        </div>
    </div>
    <div class="bottom">
        <p>
            <a href="__APP__/About/index/act/about"><?php echo (L("about")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/contact">&nbsp;&nbsp;<?php echo (L("contact_us")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/privacy">&nbsp;&nbsp;<?php echo (L("privacy_policy")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/terms">&nbsp;&nbsp;<?php echo (L("terms_of_use")); ?></a>
        </p>
    </div>
</div>
    <script language="JavaScript" type="text/javascript">
            function begin(){
                var par = '<?php echo $act ?>';
                if (par=="about") 
                    document.getElementById("id_about").className = "par";
                else if(par=="contact")
                    document.getElementById("id_contact").className = "par";
                else if (par=="privacy") 
                    document.getElementById("id_privacy").className = "par";
                else if (par=="terms")
                    document.getElementById("id_terms").className = "par";
            }
            window.onload = begin;
    </script>
</body>
</html>