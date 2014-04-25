<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo (L("title_choicedetail")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        function logout()
        {
            if(QC.Login.check()){
                QC.Login.signOut();
            } 
            if (WB2.checkLogin()) {
                var myCookie = '<?php echo cookie('weibojs_1699908978')?>';
                myCookie = myCookie.split('&')[0].split('=')[1];
                WB2.anyWhere(function(W){
                    // 获取评论列表
                    W.parseCMD("/account/end_session.json", function(sResult, bStatus){
                        if(bStatus==true) {
                            //alert(sResult);
                        }
                    },{
                        access_token:myCookie
                    },{
                        method:'get'
                    });
                }); 
            }
        }
        function setGlobal(k){
            //ThinkAjax.send('__URL__/setglobal','ajax=1&k='+k,returnfun1,"");
            var url = '__URL__/setglobal';
            $.post(url,{'lang':k},function(ret){      //ajax后台
                    if (ret.status==0){
                    }else{
                        window.location.reload(); 
                    }
                },'json');                                      //josn格式
        }
    </script>
</head>
<body style="height:auto !important; min-height:600px; _height:700px;">
	<div class="login_header">
        <div class="headregister clearfix">
            <div class="city">
                <a title="" href="__APP__/Content" class="fc-city"><?php echo (session('cityname')); ?></a>&nbsp;
                <a href="__APP__?deliver=1" class="cc-city"><?php echo (L("change_city")); ?></a>
            </div>
            <div class="language">
                <a title="" href="#" onclick="setGlobal(1)" class="fc-city">
                    中文
                </a>&nbsp;|&nbsp;
                <a onclick="setGlobal(0)" href="#" class="cc-city">English</a>
            </div>
            <div class="head-r clearfix">
                <div class="fl" id="id_signin">
                    <a title="Sign in" href="__APP__/Login" class="column"><?php echo (L("sign_in")); ?></a>
                </div>
                <div class="fl" id="id_signup">
                    <a title="Sign up" href="__APP__/Register" class="column"><?php echo (L("register")); ?></a>
                </div>
                <div class="fl" id="id_username" style="display: none;">
                    <a title="Enter the member center" href="__APP__/Vip" class="column"><?php echo (session('username')); ?></a>
                </div>
                <div class="fl" id="id_logout" style="display: none;">
                    <a href="__APP__/Logout?next=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>" onclick="logout()" class="column"><?php echo (L("log_out")); ?></a>
                </div>
            </div>
        </div>
	</div>
    <div class="register-top-search">
        <h1 class="logo">
            <a href="__APP__/Content">
                <img width="200" height="67" src="__PUBLIC__/images/logo.jpg" />
            </a>
        </h1>
    <div class="choiceitem-register-wrapper">
        <div class="login-div"> 
            <h4 class="reg-title"><?php echo (L("cnd_post_select")); ?></h4>
        </div>
        <div class="reg-left">
            <form id="registerform" method="post">
                <?php if(is_array($array)): $i = 0; $__LIST__ = $array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?><div class="reg-field">
                        <input class="radio-text" type="radio" name="radiobutton" value=<?php echo ($vo["typeId"]); ?> onclick="clickRadio('<?php echo ($vo["typeId"]); ?>')">
                        <label><?php echo ($vo["type"]); ?></label><?php endif; ?>     
                    <?php if(($mod) == "1"): ?><input class="radio-text" type="radio" name="radiobutton" value=<?php echo ($vo["typeId"]); ?> onclick="clickRadio('<?php echo ($vo["typeId"]); ?>')">
                        <label><?php echo ($vo["type"]); ?></label>  
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php if(count($array) & 1): ?></div><?php endif; ?>
                <!-- 
                <div id="reg-submit" class="reg-submit">
                    <input type="submit" class="reg-btn" id="reg_submit" value="Next">
                </div>
                -->
            </form>
        </div>
    </div>
</div>
    <script type="text/javascript">
        function clickRadio(typeid)
        {
            window.location.href="__APP__/Post/index/typeid/"+typeid;
        }
        function loginfo(){
            var sessinf = '<?php echo session('username');?>';
            if(sessinf.length > 0){
                //alert(sessinf);
                document.getElementById( "id_signin").style.display = "none";
                document.getElementById( "id_signup").style.display = "none";
                document.getElementById( "id_username").style.display = "";
                document.getElementById( "id_logout").style.display = "";
            }
        }
        window.onload = loginfo;
    </script>
</body>
</html>