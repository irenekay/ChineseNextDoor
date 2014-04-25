<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (L("title_collect")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
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
            <!--   <div class="fl">
                    <a href="__APP__/Content" class="column">Home</a>
                </div>--> 
                <div class="fl" id="id_username" style="display: none;">
                    <a title="Enter the member center" href="#" class="column"><?php echo (session('username')); ?></a>
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
                <img width="190" height="75" src="__PUBLIC__/images/logo.jpg" />
            </a>
        </h1>
        <a class="btn-post-vip" style="float: right; margin-top:-50px; text-decoration: none;" href="/index.php/Choiceitem"><?php echo (L("post_an_ad")); ?></a>
       <!-- <div class="edit-eara">
            <a class="btn-post" href="/index.php/Choiceitem">Post an ad</a>
        </div>-->
        <div class="nav">
            <ul class="nav-cont">
                <a class="item" href="__APP__/Vip"><?php echo (L("my_post_list")); ?></a>
                <a class="item" style="background-color: #0000FF;" href="__APP__/Collect"><?php echo (L("favor_post")); ?></a>
                <a class="item" href="__APP__/Account"><?php echo (L("account_info")); ?></a>
            </ul>
        </div>
        <div class="globalContainer"> 
            <?php if(is_array($list)): foreach($list as $key=>$value): ?><div class="postitem" >
                        <div style="margin-top:5px;height:20px;">
                            <div class="item_title">
                             <a href="javascript:vo(0)" onclick='checkDel("<?php echo ($value["typeid"]); ?>","<?php echo ($value["id"]); ?>")'><?php echo ($value["postTitle"]); ?></a>
                            </div>
                            <div class="pic">
                                <span name="pic11" id="pic11"> <?php echo picContent($value['pic']);?></span>
                            </div>
                            <div class="modify_del">
                                <a href="javascript:vo(0)" onclick="firm('<?php echo ($value["typeid"]); ?>','<?php echo ($value["id"]); ?>')"><?php echo (L("delete")); ?></a>
                            </div>
                        </div>
                        <div class="item_content">
                            <?php echo ($value["contents"]); ?>
                        </div>
                        <div class="time">
                            [<?php echo ($value["createTime"]); ?>]    
                        </div>
                    </div><?php endforeach; endif; ?>
            <?php echo ($page); ?>
            <?php if(empty($list)): ?><div class="tip"><?php echo (L("no_favorite")); ?></div><?php endif; ?>
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
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        function checkDel(typeid,id){
            var url = '__URL__/checkDel';
            $.post(url,{'typeid':typeid,'id':id},function(ret){      //ajax后台
                if (ret.status==0){
                    window.location.href="__APP__/Detailitem/index/typeId/"+typeid+"/id/"+id;
                }else{
                    alert("This post has been deleted!");
                }
            },'json');                                      //josn格式
        }
        function firm(typeid,id){
            if(confirm("<?php echo (L("unsubscribe")); ?>")){
                var nowUrl = "<?php echo $_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>";
                var index = nowUrl.lastIndexOf("page")
                var num = nowUrl.substring(index+5,index+6); 
                if (index != -1) 
                    window.location.href="__APP__/Collect/delete/typeid/"+typeid+"/id/"+id+/page/+num;
                else
                    window.location.href="__APP__/Collect/delete/typeid/"+typeid+"/id/"+id;
            }
        }
        function loginfo(){
            var sessinf = '<?php echo session('username');?>';
            if(sessinf.length > 0){
                document.getElementById( "id_username").style.display = "";
                document.getElementById( "id_logout").style.display = "";
            }
            var source = document.getElementById("id_source").value;
            if (source =="verify_post") {
                document.getElementById("id_displaypost").className = "buttons";
                document.getElementById("id_verifypost").className = "buttons on";
            }else{
                document.getElementById("id_displaypost").className = "buttons on";
                document.getElementById("id_verifypost").className = "buttons";
            }
        }
        window.onload = loginfo;
    </script>
</body>
</html>