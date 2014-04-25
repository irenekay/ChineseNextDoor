<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo ($classname); ?>_<?php echo (session('cityname')); echo (L("title_specific")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49818260-1', 'bilinabroad.com');
      ga('send', 'pageview');

    </script>
</head>
<body style="height:auto !important; min-height:900px; _height:900px;">
    <?php include_once("../../Common/analyticstracking.php") ?>
    <div class="header">
        <div class="head clearfix">
            <div class="city">
                <a title="" href="__APP__/Content" class="fc-city">
                    <?php echo (session('cityname')); ?>
                </a>
                <a href="__APP__?deliver=1" class="cc-city">[<?php echo (L("changeCity")); ?>]</a>
            </div>
            <div class="nav_top">
                <ul>
                    <a href="__APP__/Specific/group/classid/C01000" class="column"><?php echo (L("family_plan")); ?></a>
                    <a href="__APP__/Specific/index/typeid/C04001" class="column"><?php echo (L("house_renting")); ?></a>
                    <a href="__APP__/Specific/group/classid/C03000" class="column"><?php echo (L("sales")); ?></a>
                    <a href="__APP__/Specific/index/typeid/C07001" class="column"><?php echo (L("internships")); ?></a>
                    <a href="__APP__/Specific/index/typeid/C01006" class="column"><?php echo (L("traveling")); ?></a>
                    <a href="__APP__/Specific/index/typeid/C03007" class="column"><?php echo (L("secondary")); ?></a>
                </ul>
            </div>
            <div class="language">
                <a title="" href="#" onclick="setGlobal(1)" class="fc-city">
                    中文
                </a>&nbsp;|&nbsp;
                <a onclick="setGlobal(0)" href="#" class="cc-city">English</a>
            </div>
            <div class="head-r clearfix">
                <div class="fl" id="id_signin">
                    <a title="Sign in" href="__APP__/Login" class="column"><?php echo (L("signIn")); ?></a>
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
    <div class="top">
        <div class="logo">
            <a href="__APP__/Content">
                <img src="__PUBLIC__/images/logo_small.jpg" />
            </a>
        </div>
        <div class="split">
            <?php if(!empty($classid)): ?><span>>&nbsp;<a href="__APP__/Specific/group/classid/<?php echo ($classid); ?>"><?php echo ($classname); ?></a></span><?php endif; ?>
            <?php if(!empty($typename)): ?><span>>&nbsp;<a href="__APP__/Specific/index/typeid/<?php echo ($typeid); ?>"><?php echo ($typename); ?></a></span><?php endif; ?>
        </div>
        <div class="edit-eara">
            <a href="__APP__/Choiceitem/index" class="btn-post"><?php echo (L("butPost")); ?></a>
            <a  href="__APP__/Vip" class="btn-del"><?php echo (L("butModifyPost")); ?></a>
        </div>
    </div>
    <div class="searchbox">
        <div class="content">
            <label><?php echo (L("search")); ?>:</label>
            <input class="input-text" type="text" name="search" id="id_searchtext" value="<?php echo ($detail); ?>">
            <label><?php echo (L("in")); ?>:</label>
            <select name="select" id="id_select"> 
                <option value="0"><?php echo (L("all")); ?></option>
                <option value="1"><?php echo (L("community")); ?></option>
                <option value="2"><?php echo (L("liftService")); ?></option>
                <option value="3"><?php echo (L("secondSales")); ?></option> 
                <option value="4"><?php echo (L("housing")); ?></option> 
                <option value="5"><?php echo (L("cars")); ?></option> 
                <option value="6"><?php echo (L("recreation")); ?></option> 
                <option value="7"><?php echo (L("jobs")); ?></option> 
                <option value="8"><?php echo (L("discount")); ?></option> 
                <option value="9"><?php echo (L("consulting")); ?></option> 
                <option value="10"><?php echo (L("speedDating")); ?></option>  
                <option value="11"><?php echo (L("healthcare")); ?></option> 
            </select> 
            <input type="button" class="reg-btn" id="reg_submit" value="<?php echo (L("butSearch")); ?>" onclick="search()">
            <?php echo (L("hasImg")); ?><input type="checkbox" onclick="imageClick()" id="id_checkbox">
        </div>
    </div>
    <div class="main">
        <div class="category1">
            <div class="left">
                <?php if(is_array($list)): foreach($list as $key=>$value): ?><div class="postitem">
                        <div style="margin-top:5px;height:20px;">
                        <div class="item_title">
                            <a href="__APP__/Detailitem/index/typeId/<?php echo ($value["typeid"]); ?>/id/<?php echo ($value["id"]); ?>"><?php echo ($value["postTitle"]); ?></a>
                        </div>
                        <div class="pic">
                            <span name="pic11" id="pic11"> <?php echo picContent($value['pic']);?></span>
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
                <?php if(empty($list)): ?><div class="tip">No Posts</div><?php endif; ?>
            </div>
            <div class="right">
                <div class="rightblock">
                    <div class="righttitle"><?php echo (L("advertis")); ?></div>
                    <div class="topline"></div>
                </div>
                <?php if(is_array($promotlist)): foreach($promotlist as $key=>$value): ?><div class="promoteitem">
                        <div style="margin-top:5px;height:20px;">
                            <div class="promoteitem_title">
                                <a href="__APP__/Detailitem/index/typeId/<?php echo ($value["promotypeid"]); ?>/id/<?php echo ($value["promotid"]); ?>"><?php echo ($value["promotetitle"]); ?></a>
                            </div>
                        </div>
                        <div class="promoteitem_location"><?php echo ($value["promotlocation"]); ?></div>
                    </div><?php endforeach; endif; ?>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>
            <?php echo (L("copyright")); ?>
            <span>
                <a href="__APP__/About/index/act/about"><?php echo (L("about")); ?> |</a>
                <a href="__APP__/About/index/act/contact"><?php echo (L("contact_us")); ?> |</a>
                <a href="__APP__/About/index/act/privacy"><?php echo (L("privacy_policy")); ?> |</a>
                <a href="__APP__/About/index/act/terms"><?php echo (L("terms_of_use")); ?></a>
                <?php if(($_SESSION['cityname']== 'boston') OR ($_SESSION['cityname']== '波士顿') ): ?><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=447e193ad02f2c2f44ba9ed92455b7e71b5b73bf81f88b2d6136a96e8c4aa3f9"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="比邻波士顿租房买车群" title="比邻波士顿租房买车群"></a><?php endif; ?>
            </span>
        </p>
    </div>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
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
        function logout(){
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
        function search(){
            //alert(getSelectedText('id_select'));
            var obj = document.getElementById("id_searchtext");
            if (obj.value == '') {
                obj.focus();
            }else{
                window.location.href="__APP__/Specific/search/range/"+getSelectedText('id_select')+"/detail/"+obj.value;
            }
        }
        function getSelectedText(name){
            var obj=document.getElementById(name);
            for(i=0;i<obj.length;i++){
                if(obj[i].selected==true){
                    return obj.options[i].text;//obj[i].innerText;
                }
            }
        }
        function imageClick(){
            var image = '<?php echo $image;?>';
            var nowUrl = "<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>";
            if (image!=1)
                var url = nowUrl+"/image/1";
            else
                var url = nowUrl.substring(0,nowUrl.length-8);
            window.location.href= url;
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
            var item = '<?php echo $classname;?>';
            switch(item){
                case 'Community':
                    document.getElementById("id_select")[1].selected=true;
                    break;
                case 'Life Service':
                    document.getElementById("id_select")[2].selected=true;
                    break;
                case 'Second-hand Sales':
                    document.getElementById("id_select")[3].selected=true;
                    break;
                case 'Housing':
                    document.getElementById("id_select")[4].selected=true;
                    break;
                case 'Cars':
                    document.getElementById("id_select")[5].selected=true;
                    break;
                case 'Recreation':
                    document.getElementById("id_select")[6].selected=true;
                    break;
                case 'Jobs':
                    document.getElementById("id_select")[7].selected=true;
                    break;
                case 'discount in city':
                    document.getElementById("id_select")[8].selected=true;
                    break;
                case 'Consulting':
                    document.getElementById("id_select")[9].selected=true;
                    break;
                case 'Speed Dating':
                    document.getElementById("id_select")[10].selected=true;
                    break;
                case 'Healthcare':
                    document.getElementById("id_select")[11].selected=true;
                    break;
                case '社区':
                    document.getElementById("id_select")[1].selected=true;
                    break;
                case '生活服务':
                    document.getElementById("id_select")[2].selected=true;
                    break;
                case '二手销售':
                    document.getElementById("id_select")[3].selected=true;
                    break;
                case '房屋':
                    document.getElementById("id_select")[4].selected=true;
                    break;
                case '车辆买卖':
                    document.getElementById("id_select")[5].selected=true;
                    break;
                case '休闲娱乐':
                    document.getElementById("id_select")[6].selected=true;
                    break;
                case '求职':
                    document.getElementById("id_select")[7].selected=true;
                    break;
                case '同城打折':
                    document.getElementById("id_select")[8].selected=true;
                    break;
                case '咨询':
                    document.getElementById("id_select")[9].selected=true;
                    break;
                case '交友':
                    document.getElementById("id_select")[10].selected=true;
                    break;
                case '医疗健康':
                    document.getElementById("id_select")[11].selected=true;
                    break;
            }
            var image = '<?php echo $image;?>';
            if (image==1) {
                document.getElementById("id_checkbox").checked = true;
            };
        }
        window.onload = loginfo;
    </script>
</body>
</html>