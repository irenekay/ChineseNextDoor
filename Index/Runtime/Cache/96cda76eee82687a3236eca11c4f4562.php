<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (L("title_login")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        function clsUserName(){
            var emailelement = document.getElementById("focus_username");
            document.getElementById( "focus_username" ).className = "border-focus input-text"; 
            emailelement.style.color="rgb(51, 51, 51)";
            if(emailelement.value == emailelement.defaultValue) 
                emailelement.value = '';
        } 
        function resUserName(){
            var emailelement = document.getElementById("focus_username");
            if(emailelement.value == '') {
                emailelement.style.color="rgb(136, 136, 136)";
                emailelement.value = "Login E-mail/User name";
            }
            document.getElementById( "focus_username" ).className = "input-text"; 
        }
        function clsPassword(){
            document.getElementById( "focus_password" ).className = "border-focus input-text"; 
        } 
        function resPassword(){
            document.getElementById( "focus_password" ).className = "input-text"; 
        }
        function clsVerify(){
            document.getElementById( "focus_verify" ).className = "border-focus input-text"; 
        }
        function resVerify(){
            document.getElementById( "focus_verify" ).className = "input-text"; 
        }
        function login_check(){
            var usernameEle = document.getElementById("focus_username");
            var psaawordEle = document.getElementById("focus_password");
            if (usernameEle.value=='' || usernameEle.value=="Login E-mail/User name") {
                document.getElementById("tips").className = "validatorMsg validatorError"; 
                document.getElementById("tips").innerHTML='<?php echo (L("usernameError")); ?>';
                usernameEle.focus();
                return (false);
            }
            if (psaawordEle.value=='') {
                document.getElementById("tips").className = "validatorMsg validatorError"; 
                document.getElementById("tips").innerHTML='<?php echo (L("passwordEmpty")); ?>';
                psaawordEle.focus();
                return (false);
            }
            return (true);
        }

        function login(){
            if(login_check()){
                var username = document.getElementById("focus_username").value;
                var password = document.getElementById("focus_password").value;
                var verify = document.getElementById("focus_verify").value;
                var setcookie = 0;
                var ck = document.getElementById("checkbox1");
                if (ck.checked) {setcookie = 1;}
                var url = '__URL__/login';
                $.post(url,{'username':username,'password':password,'verify':verify,'setcookie':setcookie},function(ret){      //ajax后台
                        if (ret.status==0){
                            document.getElementById("tips").innerHTML = ret.info;
                            document.getElementById("tips").className = "validatorMsg validatorError"; 
                            if(ret.data==1)
                                document.getElementById("focus_verify").focus();
                            else if(ret.data==2)
                                document.getElementById("focus_username").focus();
                            else if(ret.data==3)
                                document.getElementById("focus_password").focus();
                            fleshVerify();
                        }else{
                            window.location ='__APP__/Content';
                        }
                    },'json');                                      //josn格式
            }
        }
        function returnpage(data,status){
            if (status==0){
                if(data==1)
                    document.getElementById("focus_verify").focus();
                else if(data==2)
                    document.getElementById("focus_username").focus();
                else if(data==3)
                    document.getElementById("focus_password").focus();
                fleshVerify();
            }else{
                window.location ='__APP__/Content'; //'<?=$_SERVER['HTTP_REFERER']?>';
            }
        }
        function fleshVerify(){ 
            //重载验证码
            var time = new Date().getTime();
            document.getElementById('verifyImg').src= '__URL__/verify/'+time;
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
                document.getElementById( "id_username").style.display = "";
                document.getElementById( "id_logout").style.display = "";
            }
        }
        window.onload = loginfo;
    </script>
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
                <div class="fl">
                    <a href="__APP__/Content" class="column"><?php echo (L("home")); ?></a>
                </div>
                <div class="fl">
                    <a title="Register" href="__APP__/Register" class="column"><?php echo (L("reg")); ?></a>
                </div>
                <div class="fl" id="id_username" style="display: none;">
                    <a title="Enter the member center" href="__APP__/Vip" class="column"><?php echo (session('reg')); ?></a>
                </div>
                <div class="fl" id="id_logout" style="display: none;">
                    <a href="__APP__/Logout?next=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>" class="column">log out</a>
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
        <div class="login-reg-left">
            <form id="loginform" name="loginform" method="post" action="__URL__/login">
                <div class="error-box" >
                    <span class="validatorMsg" id="tips"></span>
                </div>
                <div class="reg-field">
                    <label for="username"><?php echo (L("nickName")); ?>:</label>
                    <input id="focus_username" class="input-text"  tabindex="1" type="text" name="username" value="Login E-mail/User name" style="color: rgb(136, 136, 136);" onfocus="clsUserName()"  onblur="resUserName()">
                </div>
                <div class="reg-field">
                    <label for="password"><?php echo (L("password")); ?>:</label>
                    <input id="focus_password" class="input-text"  tabindex="2" type="password" name="password" onfocus="clsPassword()" onblur="resPassword()">
                </div>
                <div class="reg-field">
                    <label for="password"><?php echo (L("verifi")); ?>:</label>
                    <input id="focus_verify" class="input-text" tabindex="3" type="text" name="verify" onfocus="clsVerify()" onblur="resVerify()">
                </div>
                <div class="varify-box" >
                    <img id="verifyImg" SRC="__URL__/verify/" border="0" alt="点击刷新验证码" onclick="fleshVerify()">
                </div>
                <div class="varify-box" style="height: 20px;padding-top:10px;">
                    <!--<input type="checkbox" name="setcookie" value="1">-->
                    <input type="checkbox" name="setcookie" id="checkbox1">
                    <label style="color: #808080;font-size: 14px;"><?php echo (L("autoLogin")); ?></label>
                </div>
                <div id="reg-submit" class="reg-submit">
                    <input type="button" class="reg-btn" id="reg_submit" value="<?php echo (L("signIn")); ?>" onclick="login()">
                    <a href="__APP__/Findpassword"><?php echo (L("findPw")); ?></a>
                    
                 </div>
            </form>
        </div>
        <div class="login-reg-right">
            <div class="block_top"><?php echo (L("noRegister")); ?></div><a href="__APP__/Register"><img src="__PUBLIC__/images/<?php echo getImgs("reg");?> "/></a>
            <div class="block_down">
            <span><?php echo (L("loginSty")); ?>
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
</body>
</html>