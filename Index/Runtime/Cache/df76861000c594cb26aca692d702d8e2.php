<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo ($postTitle); ?>_<?php echo ($classname); ?>_<?php echo ($location); ?>_<?php echo (L("title_detailitem")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <link id="artDialogSkin" href="__PUBLIC__/css/blue.css" rel="stylesheet" type="text/css" />
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-49818260-1', 'bilinabroad.com');
      ga('send', 'pageview');

    </script>
</head>
<body id="other">
    <div class="header">
        <div class="head clearfix">
            <div class="city">
                <a title="" href="__APP__/Content" class="fc-city">
                    <?php echo (session('cityname')); ?>
                </a>
                <a href="__APP__?deliver=1" class="cc-city"><?php echo (L("change_city")); ?></a>
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
    <div class="top">
        <div class="logo">
            <a href="__APP__/Content">
                <img src="__PUBLIC__/images/logo_small.jpg" />
            </a>
        </div>
        <div class="split">
            <span>>&nbsp;<a href="__APP__/Specific/group/classid/<?php echo ($classid); ?>"><?php echo ($classname); ?></a></span>
            <span>>&nbsp;<a href="__APP__/Specific/index/typeid/<?php echo ($typeid); ?>"><?php echo ($typename); ?></a></span>
        </div>
    </div>
    <div class="main">
        <div class="category1">
            <div class="left">
                <table class="detailitem"> 
                    <tr><th>&nbsp;<?php echo (L("title")); ?></th>
                        <td><?php echo ($postTitle); ?></td></tr> 
                    <tr><th>&nbsp;<?php echo (L("location")); ?></th>
                        <td> <?php echo ($cityName); ?> > <?php echo ($location); ?></td>
                    </tr> 
                    <tr><th>&nbsp;<?php echo (L("contactor")); ?></th><td><?php echo ($contactor); ?>
                        <button class="button blue" id="btnAccusation" onclick="i();">Accusation</button></td>
                    </tr> 
                    <tr><th>&nbsp;<?php echo (L("tel")); ?></th><td><?php echo ($telphone); ?></td></tr> 
                    <tr><th>&nbsp;<?php echo (L("email")); ?></th><td><?php echo ($email); ?><button class="button blue" onclick="showdiv(event);">Reply</button></td>
                        <div id="msgBox" class="msgBoxDiv" style="display: none;">
                            <div class="box">
                                <div class="boxTitle">
                                    <div class="rtop">
                                        <div class="r1"></div>
                                        <div class="r2"></div>
                                        <div class="r3"></div>
                                        <div class="r4"></div>
                                    </div>
                                    <div class="title"><?php echo (L("reply_mail")); ?></div>
                                    <div class="close" onclick="closeMesgBox()">×</div>
                                </div>
                                <div class="content" style="height:280px;">
                                    <div style="height:20px;"></div>
                                    <div class="item">
                                        <a href="https://mail.google.com/" target="_blank">GMail</a>
                                    </div>
                                    <div class="item"><a href="https://login.yahoo.com/" target="_blank"><?php echo (L("yahoo")); ?></a></div>
                                    <div class="item"><a href="https://login.live.com/" target="_blank">Hotmail,Outlook,Live Mail</a></div>
                                    <div class="item"><a href="https://my.screenname.aol.com/" target="_blank"><?php echo (L("aolMail")); ?></a></div>
                                    <div class="item"><a href="http://mail.126.com/" target="_blank"><?php echo (L("126mail")); ?></a></div>
                                    <div class="item"><a href="http://mail.163.com/" target="_blank"><?php echo (L("163mail")); ?></a></div>
                                    <div class="item"><a href="https://mail.qq.com/" target="_blank"><?php echo (L("qqmail")); ?></a></div>
                                </div>
                                <div class="rbottom">
                                    <div class="r4"></div>
                                    <div class="r3"></div>
                                    <div class="r2"></div>
                                    <div class="r1"></div>
                                </div>
                            </div>
                        </div>
                    </tr> 
                    <tr><th>&nbsp;<?php echo (L("posted")); ?></th><td><?php echo ($createTime); ?></td></tr> 
                    <tr>
                        <th>&nbsp;<?php echo (L("favoirte")); ?></th>
                        <td>
                            <a href="javascript:vo(0)" onclick="favourite();return false;">
                                <img src="__PUBLIC__/images/lovegray.png" height="30" width="30" id="id_love"/>
                            </a>
                        </td>
                    </tr> 
                    <tr class="des"><th>&nbsp;<?php echo (L("description")); ?></th>
                        <td><?php echo ($contents); ?></td>
                    </tr> 
                    <?php if(!empty($images)): ?><tr class="pic"><th>&nbsp;<?php echo (L("pictures")); ?></th>
                            <?php if(is_array($images)): foreach($images as $key=>$value): ?><td><img src='<?php echo ($value); ?>'></td><?php endforeach; endif; ?>
                        </tr><?php endif; ?>
                    <tr>
                        <th>&nbsp;<?php echo (L("share")); ?></th>
                        <td>
                            <script type="text/javascript">
                                (function(){
                                    var p = {
                                        url:location.href,
                                        showcount:'0',/*是否显示分享总数,显示：'1'，不显示：'0' */
                                        desc:'',/*默认分享理由(可选)*/
                                        summary:'',/*分享摘要(可选)*/
                                        title:'',/*分享标题(可选)*/
                                        site:'华人比邻网',/*分享来源 如：腾讯网(可选)*/
                                        pics:'', /*分享图片的路径(可选)*/
                                        style:'102',
                                        width:88,
                                        height:30
                                    };
                                    p.title = '<?php echo $postTitle?>';
                                    p.pics = '<?php echo $shareImage?>';
                                    p.desc = '华人比邻《'+'<?php echo $postTitle?>'+'》，欢迎关注！';
                                    var s = [];
                                    for(var i in p){
                                        s.push(i + '=' + encodeURIComponent(p[i]||''));
                                    }
                                    document.write(['<a version="1.0" class="qzOpenerDiv" href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?',s.join('&'),'" target="_blank">分享</a>'].join(''));
                                    })();
                            </script>
                            <script src="http://qzonestyle.gtimg.cn/qzone/app/qzlike/qzopensl.js#jsdate=20111201" charset="utf-8"></script>
                            <input type="hidden" id="id_summery" value="<?php echo ($shareSummery); ?>">

                            <br/>
                            <?php if(empty($shareImage)): ?><wb:publish default_text="<?php echo ($contents_share); ?>" button_size="middle" button_text="分享" >微博分享</wb:publish>
                            <?php else: ?> <wb:publish default_text="<?php echo ($contents_share); ?>" button_size="middle" button_text="分享" default_image="<?php echo ($shareImage); ?>">微博分享</wb:publish><?php endif; ?>
                            
                        </td>
                    </tr> 
                </table>
            </div>
        </div>
    </div>
    <div id="footer">
        <p>
            <?php echo (L("copyright")); ?>
            <span>
                <a href="__APP__/About/index/act/about"><?php echo (L("about")); ?> </a>
                <a href="__APP__/About/index/act/contact"> <?php echo (L("contact_us")); ?> </a>
                <a href="__APP__/About/index/act/privacy"> <?php echo (L("privacy_policy")); ?> </a>
                <a href="__APP__/About/index/act/terms"> <?php echo (L("terms_of_use")); ?></a>
                <?php if(($_SESSION['cityname']== 'boston') OR ($_SESSION['cityname']== '波士顿') ): ?><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=447e193ad02f2c2f44ba9ed92455b7e71b5b73bf81f88b2d6136a96e8c4aa3f9"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="比邻波士顿租房买车群" title="比邻波士顿租房买车群"></a><?php endif; ?>
            </span>
        </p>
    </div>
    <script type="text/javascript" src="__PUBLIC__/js/base.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/prototype.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/mootools.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/Ajax/ThinkAjax.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/artDialog.js"></script>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
    <script language="JavaScript" type="text/javascript">
        var temp1 = 0;
        var temp2 = 0;
        var myDialog;
        function showdiv(event) { 
            var blah = document.getElementById("msgBox");
            var theEvent = event ? event : window.event;
            //alert(window.event.clientX);
            blah.style.left=theEvent.clientX+20+'px';
            blah.style.top=theEvent.clientY+20+'px';
            if(temp1==0){
                blah.style.display ="block";
                temp1 = 1;
            }   
            else{
                blah.style.display ="none";
                temp1 = 0;
            }
        } 
        function closeMesgBox(){
            var blah = document.getElementById("msgBox");
            blah.style.display='none';
            temp1 = 0;
        }
        function i(){
        var _this = document.getElementById('btnAccusation');  
            if(temp2==0){
                str="<div style='font-size:14px;'><?php echo (L("enter_reason")); ?></font><br/><textarea id='M_dfd' name='text4' cols='40' rows='6'></textarea><br />";
                str+="<?php echo (L("suggestion")); ?></br>";
                str+="<div style='margin-left:50px;'><form id='someForm' action='' ><input  type='radio'  name='radiogroup'  value='Warning' checked/><?php echo (L("warning")); ?>";
                str+="<input  type='radio'  name='radiogroup'  value='Shutdown' /><?php echo (L("shut_down")); ?></form></div></div>";
                myDialog=art.dialog({id:'menu', title:'Accusation', content:str,
                    cancelVal: 'Cancel',
                    cancel:function(){_this.innerHTML = 'Accusation';temp2=0;},
                    button:[{name:'Ok',callback:function(){  
                            var reason=document.getElementById('M_dfd').value;
                            var button1 = document.getElementById("someForm")[0];
                            var typeid = '<?php echo $typeid?>';
                            var id = '<?php echo $id?>';
                            //alert(typeid);
                            //alert(id);
                            if(button1.checked)    advice="Warning";
                            else    advice="Shut down";
                            ThinkAjax.send('__URL__/accusation','ajax=1&reason='+reason+'&advice='+advice+'&typeid='+typeid+'&id='+id,returnfun,"");
                            }
                        }]
                });  
                _this.innerHTML = 'Accusation';
                temp2=1;
            }
            else{
                myDialog.close();
                temp2=0;
            }
            // return false;
        };
        function returnfun(data,status){
            temp2=0;
            if (status==0){
                alert("Accusation data into database Failed!");
            }
            else{
                ss="<div style='color:gray;font-style:italic;font-size:14px;'><?php echo (L("thanks")); ?></div>";
                art.dialog({content:ss, lock:true, time:1});
            }
        }
        function favourite(){
            var userId = '<?php echo session('userid');?>';
            if (userId=="") {
                alert("Please login the website!");
                return;
            }
            var imageType = document.getElementById( "id_love").src;
            var index = imageType.lastIndexOf("/");
            var imageName = imageType.substring(index+1); 
            var id = '<?php echo $id;?>';
            var typeId = '<?php echo $typeid;?>';
            if (imageName=="lovegray.png") {
                ThinkAjax.send('__URL__/collect','ajax=1&red=0&typeid='+typeId+'&id='+id,returnpages,"");
            }else{
                ThinkAjax.send('__URL__/collect','ajax=1&red=1&typeid='+typeId+'&id='+id,returnpages,"");
            }
        }
        function returnpages(data,status){
            if (status==0){
                alert("Post collect Failed!");
            }
            else{
                if (data==1)
                    document.getElementById( "id_love").src="__PUBLIC__/images/lovered.png";
                else
                    document.getElementById( "id_love").src="__PUBLIC__/images/lovegray.png";
            }
        }
        function loginfo(){
            var sessinf = '<?php echo session('username');?>';
            if(sessinf.length > 0){
                document.getElementById( "id_signin").style.display = "none";
                document.getElementById( "id_signup").style.display = "none";
                document.getElementById( "id_username").style.display = "";
                document.getElementById( "id_logout").style.display = "";
            }
            var collect = '<?php echo $collectpost;?>';
            if (collect==1) {
                document.getElementById( "id_love").src="__PUBLIC__/images/lovered.png"
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
            ThinkAjax.send('__URL__/setglobal','ajax=1&k='+k,returnfun1,"");
        }
        function returnfun1(data,status){
            window.location.reload(); 
        }
    </script>
</body>
</html>