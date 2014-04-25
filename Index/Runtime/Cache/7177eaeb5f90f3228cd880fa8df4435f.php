<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lt IE 9]>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js">
        </script>
    <![endif]-->
    <title>【<?php echo (session('cityname')); echo (L("title_content")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
    <!--[if lt IE 9]>
        <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
        <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
    <script language="JavaScript" type="text/javascript">
        /*function postCheck(userid){
            if (userid.length == 0) {
                document.getElementById( "id_postad" ).href="__APP__/Login";
            }
        }*/
        function search(){
                var obj = document.getElementById("id_searchtext");
                if (obj.value == '') {
                    obj.focus();
                }else{
                    var lang = '<?php echo cookie('think_language')?>';
                    if (lang == 'en-us') {
                        window.location.href="__APP__/Specific/search/range/All/detail/"+obj.value;
                    }else{
                        window.location.href="__APP__/Specific/search/range/所有/detail/"+obj.value;
                    }
                    
                }
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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49818260-1', 'bilinabroad.com');
      ga('send', 'pageview');

    </script>
</head>
<body id="content">
    <?php include_once("../../Common/analyticstracking.php") ?>
	<div class="header">
        <div class="head clearfix">
            <div class="city">
                <a title="" href="__APP__/Content/" class="fc-city">
                    <?php echo (session('cityname')); ?>
                </a>&nbsp;
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
                    <a title="Sign in" href="__APP__/Login/" class="column"><?php echo (L("sign_in")); ?></a>
                </div>
                <div class="fl" id="id_signup">
                    <a title="Sign up" href="__APP__/Register/" class="column"><?php echo (L("register")); ?></a>
                </div>
                <div class="fl" id="id_username" style="display: none;">
                    <a title="Enter the member center" href="__APP__/Vip/" class="column"><?php echo (session('username')); ?></a>
                </div>
                <div class="fl" id="id_logout" style="display: none;">
                    <a  href="__APP__/Logout?next=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>" onclick="logout()" class="column"><?php echo (L("log_out")); ?></a>
                </div>
            </div>
        </div>
	</div>
    <div id="setLan">
                <div class="vfl">
                    <a title="English" href="#" class="column"><?php echo (L("eng")); ?></a>
                </div>
                <div class="vfl">
                    <a title="Chinese" href="#" class="column"><?php echo (L("chin")); ?></a>
                </div>
    </div>
    <div class="top-search">
        <div class="logo">
            <a href="__APP__/Content">
                <img src="__PUBLIC__/images/logo.jpg" />
            </a>
        </div>
        
        <div class="searcharea">
            <form class="form-wrapper cf">
                <input id="id_searchtext" type="text" placeholder="<?php echo (L("search_here")); ?>" required>
                <button type="button" onclick="search()"><?php echo (L("search")); ?></button>
            </form> 
        </div>
        <div class="edit-eara">
            <a href="__APP__/Choiceitem" class="btn-post" id="id_postad"><?php echo (L("post_an_ad")); ?></a> <!--onclick="return postCheck('<?php echo ($userid); ?>')"-->
            <a  href="__APP__/Vip" class="btn-del"><?php echo (L("modify_delete")); ?></a>
        </div>
    </div>
    <div class="nav">
        <ul class="nav-cont">
            <a href="__APP__/Content" class="item"><?php echo (L("home")); ?></a>
            <a href="__APP__/Specific/group/typeid/C01012/" class="item"><?php echo (L("family_plan")); ?></a>
            <a href="__APP__/Specific/index/typeid/C04001/" class="item"><?php echo (L("house_renting")); ?></a>
            <a href="__APP__/Specific/group/classid/C03000/" class="item"><?php echo (L("sales")); ?></a>
            <a href="__APP__/Specific/index/typeid/C07001/" class="item"><?php echo (L("internships")); ?></a>
			<a href="__APP__/Specific/index/typeid/C01006/" class="item"><?php echo (L("traveling")); ?></a>
			<a href="__APP__/Specific/index/typeid/C03007/" class="item"><?php echo (L("secondary")); ?></a>
        </ul>
    </div>
    <div class="category">
        <div class="first">
            <?php if(is_array($array1)): foreach($array1 as $k=>$value1): ?><div class="part">
                    <div class="partname"><img src="__PUBLIC__/images/<?php echo getIcon($k);?>"/>
                        <a href="__APP__/Specific/group/classid/<?php echo getClassId($k);?>"><span><?php echo ($k); ?></span></a></div>
                    <?php if(is_array($value1)): $i = 0; $__LIST__ = $value1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="part_content">
						<a href="__APP__/Specific/index/typeid/<?php echo ($value["typeId"]); ?>">
							<span><?php echo ($value["typeName"]); ?></span></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div><?php endforeach; endif; ?>
        </div>
        <div class="second">
            <?php if(is_array($array2)): foreach($array2 as $k=>$value1): ?><div class="part">
                    <div class="partname"><img src="__PUBLIC__/images/<?php echo getIcon($k);?>"/>
                        <a href="__APP__/Specific/group/classid/<?php echo getClassId($k);?>"><span><?php echo ($k); ?></span></a></div>
                    <?php if(is_array($value1)): $i = 0; $__LIST__ = $value1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="part_content">
						<a href="__APP__/Specific/index/typeid/<?php echo ($value["typeId"]); ?>">
							<span><?php echo ($value["typeName"]); ?></span></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div><?php endforeach; endif; ?>
        </div>
        <div class="third">
            <?php if(is_array($array3)): foreach($array3 as $k=>$value1): ?><div class="part">
                    <div class="partname"><img src="__PUBLIC__/images/<?php echo getIcon($k);?>"/>
                        <a href="__APP__/Specific/group/classid/<?php echo getClassId($k);?>"><span><?php echo ($k); ?></span></a></div>
                    <?php if(is_array($value1)): $i = 0; $__LIST__ = $value1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><div class="part_content">
						<a href="__APP__/Specific/index/typeid/<?php echo ($value["typeId"]); ?>">
							<span><?php echo ($value["typeName"]); ?></span></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <div id="footer">
        <p>
            <?php echo (L("copyright")); ?>
            <span>
                <a href="__APP__/About/index/act/about/"><?php echo (L("about")); ?> |</a>
                <a href="__APP__/About/index/act/contact/"> <?php echo (L("contact_us")); ?> |</a>
                <a href="__APP__/About/index/act/privacy/"> <?php echo (L("privacy_policy")); ?> |</a>
                <a href="__APP__/About/index/act/terms/"> <?php echo (L("terms_of_use")); ?></a>
                <?php if(($_SESSION['cityname']== 'boston') OR ($_SESSION['cityname']== '波士顿') ): ?><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=447e193ad02f2c2f44ba9ed92455b7e71b5b73bf81f88b2d6136a96e8c4aa3f9"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="比邻波士顿租房买车群" title="比邻波士顿租房买车群"></a><?php endif; ?>
            </span>
        </p>
    </div>
</body>
</html>