<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (L("title_reg")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
</head>
<body style="height:auto !important; min-height:600px; _height:700px; overflow-y: hidden;">
<div class="login_header">
    <div class="headregister clearfix">
        <div class="city">
            <a title="" href="__APP__/Content" class="fc-city"><?php echo (session('cityname')); ?></a>&nbsp;
            <a href="__APP__?deliver=1" class="cc-city">[<?php echo (L("changeCity")); ?>]</a>
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
<div class="register-top-search">
    <h1 class="logo">
        <a href="__APP__/Content">
                <img width="200" height="67" src="__PUBLIC__/images/logo.jpg" />
        </a>
    </h1>
    <div class="register-wrapper">
    <div class="login-div"> 
        <h4 class="reg-title"><?php echo (L("title")); ?></h4>
    </div>
    <div class="reg-left">
        <form id="registerform" method="post" action="__URL__/insert">
            <div class="error-box" >
                    <span class="validatorMsg validatorError" id="tips" style="display:none"></span>
            </div>
            <div class="reg-field">
                <label><?php echo (L("userName")); ?>:</label>
                <input id="focus_username" class="input-text" type="text" name="username" onfocus="clsUserName()" onblur="resUserName()">
                <span id="tip_username" class="msg-box" >
                </span>
            </div>
            <div class="reg-field">
                <label><?php echo (L("email")); ?>:</label>
                <input id="focus_email" class="input-text" type="text" name="emailAdress" onfocus="clsEmail()" onblur="resEmail()">
                <span id="tip_email" class="msg-box" >
                </span>
            </div>
            <div class="reg-field">
                <label><?php echo (L("createPwd")); ?>:</label>
                <input id="focus_password" class="input-text" type="password" name="password" onfocus="clsPassword()" onblur="resPassword()">
                <span id="tip_password" class="msg-box" >
                </span>
            </div>
            <div class="reg-field">
                <label><?php echo (L("confirmPwd")); ?>:</label>
                <input id="focus_password2" class="input-text" type="password" name="password2" onfocus="clsConfirmPassword()" onblur="resConfirmPassword()">
                <span id="tip_password2" class="msg-box" >
                </span>
            </div>
            <!-- <div class="reg-field">
                <label for="confirm-password">Vefify Code:</label>
                <img src="<?php echo U('Index/Register/verify');?>" />
                <img src='Index/Public/verify' />
            </div> -->
            <div id="reg-submit" class="reg-submit">
                <input type="button" class="reg-btn" id="reg_submit" value="<?php echo (L("next")); ?>" onclick="insertRegister()">
             </div>

        </form>
    </div>
    <div class="login-reg-right">
            <div class="block_top"><?php echo (L("haveRegister")); ?></div><a href="__APP__/Login"><img src="__PUBLIC__/images/<?php echo getImgs("login");?>"/></a>
            <div class="block_down">
            <span><?php echo (L("loginType")); ?></span>
            <span id="qqLoginBtn"></span>
            <br/>
            <!--<div id="wb_connect_btn"></div>-->
            <script type="text/javascript">
                var cbLoginFun = function(oInfo, oOpts){
                    QC.Login.getMe(function(openId, accessToken){
                        var url = '__URL__/getUserInfo';
                        $.post(url,{'nickname':oInfo.nickname,'openId':openId,'accessToken':accessToken},function(ret){      //ajax后台
                            window.location ='__APP__/Content';
                        },'json');                                      //josn格式
                    });
                };
                  //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
               QC.Login({
                   //btnId：插入按钮的节点id，必选
                   btnId:"qqLoginBtn",    
                   //用户需要确认的scope授权项，可选，默认all
                   scope:"all",
                   //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
                   size: "A_M"
               },cbLoginFun);

                WB2.anyWhere(function(W){
                    W.widget.connectButton({
                        id: "wb_connect_btn",
                        type: '3,5',
                        forcelogin:'true',
                        callback : {
                            login:function(o){
                                var url = '__URL__/getWeiboUserInfo';
                                $.post(url,{'nickname':o.screen_name,'id':o.id},function(ret){      //ajax后台
                                    window.location ='__APP__/Content';
                                },'json');                                      //josn格式
                            },
                            logout:function(){
                                alert('logout');
                            }
                        }
                    });
                });

            </script>
            </div>
    </div>

    </div>
    <div class="bottom">
        <p>
            <a href="__APP__/About/index/act/about"><?php echo (L("about")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/contact">&nbsp;&nbsp;<?php echo (L("contact")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/privacy">&nbsp;&nbsp;<?php echo (L("privacy")); ?>&nbsp;&nbsp;|</a>
            <a href="__APP__/About/index/act/terms">&nbsp;&nbsp;<?php echo (L("termUse")); ?></a>
        </p>
    </div>
</div>
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        var existuser = false;
        var existeml = false;
        var existpass = false;
        var existpass2 = false;
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
        function clsUserName(){
            document.getElementById( "focus_username" ).className = "border-focus input-text"; 
            document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillName")); ?></span>'; 
        }
        function resUserName(){
            var user = document.getElementById("focus_username");
            user.className = "border-error input-text"; 
            if (user.value.length == 0) {
                existuser = false;
                document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("nameEmpty")); ?></span>';
            }else{
                //ThinkAjax.send('__URL__/checkUserName','ajax=1&username='+user.value,userCheckResult,"returnUser");
                var url = '__URL__/checkUserName';
                $.post(url,{'username':user.value},function(ret){      //ajax后台
                    if (ret.status==0){
                        existuser = false;
                        document.getElementById( "focus_username" ).className = "border-error input-text"; 
                        document.getElementById("tip_username").innerHTML='<span id="returnUser" class="validatorMsg validatorError">'+ret.info+'</span>';
                    }else{
                        existuser = true;
                        document.getElementById( "focus_username" ).className = "input-text"; 
                        document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                    }
                },'json');                                      //josn格式
            };
        }
        function clsEmail(){
            document.getElementById( "focus_email" ).className = "border-focus input-text"; 
            document.getElementById("tip_email").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillEmail")); ?></span>';    
        } 
        function resEmail(){
            var email = document.getElementById("focus_email");
            email.className = "border-error input-text"; 
            if (email.value.length == 0) {
                existeml = false;
                document.getElementById("tip_email").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("emailEmpty")); ?></span>';
            }
            else if (!checkEmail()) {
                existeml = false;              
                document.getElementById("tip_email").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("emailError")); ?></span>';
            }else{
                //ThinkAjax.send('__URL__/checkTitle','ajax=1&email='+email.value,emailCheckResult,"resultreturn");
                var url = '__URL__/checkTitle';
                $.post(url,{'email':email.value},function(ret){      //ajax后台
                    if (ret.status==0){
                        existeml = false;
                        document.getElementById( "focus_email" ).className = "border-error input-text"; 
                        document.getElementById("tip_email").innerHTML='<span id="resultreturn" class="validatorMsg validatorError">'+ret.info+'</span>';
                    }else{
                        existeml = true;
                        document.getElementById( "focus_email" ).className = "input-text"; 
                        document.getElementById("tip_email").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                    }
                },'json');                                      //josn格式
            };
        } 
        /*function emailCheckResult(data,status){
            if (status==0){
                existeml = false;
                document.getElementById( "focus_email" ).className = "border-error input-text"; 
                document.getElementById("tip_email").innerHTML='<span id="resultreturn" class="validatorMsg validatorError">This e-mail has been registered</span>';
            }else{
                existeml = true;
                document.getElementById( "focus_email" ).className = "input-text"; 
                document.getElementById("tip_email").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
            };  
        }*/
        function clsPassword(){
            document.getElementById( "focus_password" ).className = "border-focus input-text"; 
            document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillPwd")); ?></span>';
        } 
        function resPassword(){
            var pass = document.getElementById("focus_password");
            pass.className = "border-error input-text"; 
            if (pass.value.length == 0) {
                existpass = false;
                 document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("pwdEmpty")); ?></span>';
            }
            else{
                existpass = true;
                pass.className = "input-text"; 
                document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
            };
        } 
        function clsConfirmPassword(){
            document.getElementById( "focus_password2" ).className = "border-focus input-text"; 
            document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillConfirmPwd")); ?></span>';
        } 
        function resConfirmPassword(){
            var repass = document.getElementById("focus_password2");
            var pass = document.getElementById("focus_password");
            repass.className = "border-error input-text"; 
            if (repass.value.length == 0) {
                existpass2 = false;
                document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("confirmPwdEmpty")); ?></span>';
            }
            else if(pass.value!=repass.value) {
                existpass2 = false;
                document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("twoPwdDiff")); ?></span>';
            }
            else{
                existpass2 = true;
                repass.className = "input-text"; 
                document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
            };
        } 

        //验证邮箱格式
        function checkEmail(){
            var temp = document.getElementById("focus_email");
            //对电子邮件的验证
            var myreg = /^([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            if(!myreg.test(temp.value)){
                //myreg.focus();
                return false;
            }
            else
                return true;
        }
        function my_check(){
            if(!existuser){
                resUserName();
            }
            if (!existeml) {
                resEmail();
            };
            if (!existpass) {
                resPassword();
            };
            if (!existpass2) {
                resConfirmPassword();
            };
            if (existuser && existeml && existpass && existpass2) {
                return (true);
            }else{
                return (false);
            }
        }
        function insertRegister(){
            if (my_check()) {
                //ThinkAjax.sendForm('registerform','__URL__/insert',returnpage,"tips");
                document.getElementById("tips").style.display="";
                document.getElementById("tips").innerHTML = "Waiting...";
                var username = document.getElementById("focus_username").value;
                var emailAdress = document.getElementById("focus_email").value;
                var password = document.getElementById("focus_password").value;
                var url = '__URL__/insert';
                $.post(url,{'username':username,'emailAdress':emailAdress,'password':password},function(ret){      //ajax后台
                        if (ret.status==0){
                            document.getElementById("tips").style.display="";
                            document.getElementById("tips").innerHTML = ret.info;
                        }else{
                            document.getElementById("tips").style.display="";
                            document.getElementById("tips").innerHTML = ret.info;
                            //intervalid = setInterval("fun()", 1000);
                            //document.getElementById("tips").style.display="";
                        }
                    },'json');                                      //josn格式
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