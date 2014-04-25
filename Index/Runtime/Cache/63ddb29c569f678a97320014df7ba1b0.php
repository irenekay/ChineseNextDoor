<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (L("title_findpwd")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
</head>
<body style="height:auto !important; min-height:600px; _height:700px; overflow-y: hidden;">
	<div class="header">
        <div class="headregister clearfix">
            <div class="city">
                <a title="" href="__APP__/Content" class="fc-city"><?php echo (session('cityname')); ?></a>&nbsp;
                <a href="__APP__?deliver=1" class="cc-city">[<?php echo (L("changeCity")); ?>]</a>
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
            <form id="FindPasswordform" method="post">
                <div class="error-box" >
                    <span class="validatorMsg" id="tips"></span>
                </div>
                <div class="reg-field">
                    <label><?php echo (L("email")); ?></label>
                    <input id="id_email" class="input-text"  tabindex="1" type="text" name="email" style="color: rgb(136, 136, 136);" onfocus="clsEmail()"  onblur="resEmail()">
                </div>
                <div class="reg-field">
                    <label><?php echo (L("username")); ?></label>
                    <input id="id__username" class="input-text"  tabindex="2" type="text" name="username" style="color: rgb(136, 136, 136);" onfocus="clsUserName()"  onblur="resUserName()">
                </div>
                <div id="reg-submit" class="reg-submit">
                    <input type="button" class="reg-btn" id="reg_submit" value="<?php echo (L("findPassword")); ?>" onclick="find()">
                 </div>
            </form>
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
        function clsEmail(){
            document.getElementById( "id_email" ).className = "border-focus input-text"; 
        } 
        function resEmail(){
            document.getElementById( "id_email" ).className = "input-text"; 
        }
        function clsUserName(){
            document.getElementById( "id__username" ).className = "border-focus input-text"; 
        }
        function resUserName(){
            document.getElementById( "id__username" ).className = "input-text"; 
        }
        function find(){
            //ThinkAjax.sendForm('FindPasswordform','__URL__/find',returnpage,"tips");
            document.getElementById("tips").className = "validatorMsg validatorError"; 
            document.getElementById("tips").style.display="";
            document.getElementById("tips").innerHTML = "waiting...";
            var url = '__URL__/find';
            var username = document.getElementById("id__username").value;
            var email = document.getElementById("id_email").value;
            $.post(url,{'username':username,'email':email},function(ret){      //ajax后台
                    if (ret.status==0){
                        document.getElementById("tips").className = "validatorMsg validatorError"; 
                        document.getElementById("tips").style.display="";
                        document.getElementById("tips").innerHTML = ret.info;
                    }else{
                        document.getElementById("tips").className = "validatorMsg validatorError"; 
                        document.getElementById("tips").style.display="";
                        document.getElementById("tips").innerHTML = ret.info;
                    }
                },'json');                                      //josn格式
        }
        /*function returnpage(data,status){
            if (status==0){
                document.getElementById("tips").style.display="";
            }
            else{
                document.getElementById("tips").style.display="";
            }
        }*/

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