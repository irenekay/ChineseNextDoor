<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (L("title_account")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <script language="JavaScript" type="text/javascript">
        function logout()
        {
            if(QC.Login.check()){
                QC.Login.signOut();
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
        <div class="nav">
            <ul class="nav-cont">
                <a class="item" href="__APP__/Vip"><?php echo (L("my_post_list")); ?></a>
                <a class="item" href="__APP__/Collect"><?php echo (L("favor_post")); ?></a>
                <a class="item" style="background-color: #0000FF;" href="#"><?php echo (L("account_info")); ?></a>
            </ul>
        </div>
        <div class="globalContainer"> 
            <div class="glob_top">
                <span class="buttons" id="id_displaypost"><a class="btn-b" href="__APP__/Account"><?php echo (L("personalinfo")); ?></a></span>
                <span class="buttons" id="id_verifypost"><a class="btn-b" href="__APP__/Account/index/source/midify_password"><?php echo (L("change_Password")); ?></a></span>
            </div>
            <div class="account_content" style="font-family: Candara,Verdana,Arial; width: 800px;">
                <form method="post" id="modifyform">
                    <?php if(empty($source)): ?><div class="error-box">
                            <span id="tips" class="validatorMsg validatorError"></span>
                        </div>
                        <div class="reg-field">
                            <label for="username"><?php echo (L("username")); ?></label>
                            <input type="text" onblur="resUser()" onfocus="clsUser()" name="username" class="input-text" id="id_user" value="<?php echo (session('username')); ?>">
                            <span class="msg-box" id="tip_username">  
                            </span>
                        </div>
                        <div class="reg-submit" id="reg-submit">
                            <input type="button" onclick="modifyAccount()" value="<?php echo (L("modify")); ?>" id="reg_submit" class="reg-btn">
                        </div>
                    <?php else: ?>
                        <div class="error-box" style="padding: 0 0 5px 187px;">
                            <span id="tips" class="validatorMsg validatorError"></span>
                        </div>
                        <div class="reg-field">
                            <label style="width: 180px;"><?php echo (L("old_password")); ?></label>
                            <input type="password" onblur="resPassword()" onfocus="clsPassword()" name="password" class="input-text" id="id_password">
                            <span class="msg-box" id="tip_password">  
                            </span>
                        </div>
                        <div class="reg-field">
                            <label style="width: 180px;"><?php echo (L("new_password")); ?></label>
                            <input type="password" onblur="resNewPassword()" onfocus="clsNewPassword()" name="newPassword" class="input-text" id="id_newpassword">
                            <span class="msg-box" id="tip_newpassword">  
                            </span>
                        </div>
                        <div class="reg-field">
                            <label style="width: 180px;"><?php echo (L("confirm_password")); ?></label>
                            <input type="password" onblur="resNewPassword1()" onfocus="clsNewPassword1()" class="input-text" id="id_newpassword1">
                            <span class="msg-box" id="tip_newpassword1">  
                            </span>
                        </div>
                        <div class="reg-submit" id="reg-submit" style="padding: 15px 0 0 195px;">
                            <input type="button" onclick="modifyPassword()" value="<?php echo (L("modify")); ?>" id="reg_submit" class="reg-btn">
                        </div><?php endif; ?>
                </form>
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
    <script src="__PUBLIC__/uploadify/jquery.min.js" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
        var i = 3;
        var intervalid;

        var existuser = false;
        var echek1 = false;
        var echek2 = false;
        var echek3 = false;
        function clsUser(){
            document.getElementById( "id_user" ).className = "border-focus input-text"; 
        } 
        function resUser(){
            var user = document.getElementById("id_user");
            if (user.value.length == 0) {
                existuser = false;
                //user.className = "border-error input-text"; 
                document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("name_not_empty")); ?></span>';
            }else if (user.value == "<?php echo session('username')?>") {
                existuser = true;
                document.getElementById( "id_user" ).className = "input-text"; 
                document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
            }else{
                //ThinkAjax.send('__URL__/checkUserName','ajax=1&username='+user.value,userCheckResult,"returnUser");
                var url = '__URL__/checkUserName';
                $.post(url,{'username':user.value},function(ret){      //ajax后台
                    if (ret.status==0){
                        existuser = false;
                        document.getElementById( "id_user" ).className = "border-error input-text"; 
                        document.getElementById("tip_username").innerHTML='<span id="returnUser" class="validatorMsg validatorError">'+ret.info+'</span>';
                    }else{
                        existuser = true;
                        document.getElementById( "id_user" ).className = "input-text"; 
                        document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                    }
                },'json');                                      //josn格式
            };
        }
        /*function userCheckResult(data,status){
            if (status==0){
                existuser = false;
                document.getElementById( "id_user" ).className = "border-error input-text"; 
                document.getElementById("tip_username").innerHTML='<span id="returnUser" class="validatorMsg validatorError"></span>';
            }else{
                existuser = true;
                document.getElementById( "id_user" ).className = "input-text"; 
                document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
            };  
        }*/
        function my_check(){
            if(!existuser){
                resUser();
            }
            if (existuser) {
                return true;
            }else{
                return false;
            }
        }
        function modifyAccount(){
            if (my_check()) {
                //ThinkAjax.sendForm('modifyform','__URL__/modifyUser',returnpage,"tips");
                var url = '__URL__/modifyUser';
                var user = document.getElementById("id_user");
                $.post(url,{'username':user.value},function(ret){      //ajax后台
                    if (ret.status==0){
                        document.getElementById("tips").innerHTML= ret.info;
                    }else{
                        document.getElementById("tips").innerHTML=ret.info;
                    }
                },'json');                                      //josn格式
            }
        }
        /*function returnpage(data,status){
            if (status==0){
                document.getElementById("tips").style.display="";
            }
            else{
                document.getElementById("tips").style.display="";
            }
        }*/

        function clsPassword(){
            document.getElementById( "id_password" ).className = "border-focus input-text"; 
        }
        function resPassword(){
            var obj = document.getElementById("id_password");
            obj.className = "border-error input-text";
            if (obj.value.length == 0) {
                echek1 = false;
                document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("password_not_blank")); ?></span>';
            }else{
                obj.className = "input-text"; 
                document.getElementById("tip_password").innerHTML='';
                echek1 = true;
            }
        }
        function clsNewPassword(){
            document.getElementById( "id_newpassword" ).className = "border-focus input-text"; 
        }
        function resNewPassword(){
            var obj = document.getElementById("id_newpassword");
            obj.className = "border-error input-text";
            if (obj.value.length == 0) {
                echek2 = false;
                document.getElementById("tip_newpassword").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("not_blank")); ?></span>';
            }else{
                obj.className = "input-text";
                document.getElementById("tip_newpassword").innerHTML='';
                echek2 = true;
            }
        }
        function clsNewPassword1(){
            document.getElementById( "id_newpassword1" ).className = "border-focus input-text"; 
        }
        function resNewPassword1(){
            var obj = document.getElementById("id_newpassword1");
            obj.className = "border-error input-text"; 
            if (obj.value.length == 0) {
                echek3 = false;
                document.getElementById("tip_newpassword1").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("repeat_password")); ?></span>';
            }else if(id_newpassword.value!=id_newpassword1.value) {
                echek3 = false;
                document.getElementById("tip_newpassword1").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("different")); ?></span>';
            }else{
                obj.className = "input-text"; 
                document.getElementById("tip_newpassword1").innerHTML='';
                echek3 = true;
            } 
        }
        function checkpassword(){
            if(!echek1){
                resPassword();
            }
            if(!echek2){
                resNewPassword();
            }
            if(!echek3){
                resNewPassword1();
            }
            if (echek1 && echek2 && echek3) {
                return true;
            }else{
                return false;
            }
        }
        function modifyPassword(){
            if (checkpassword()) {
                //ThinkAjax.sendForm('modifyform','__URL__/modifyPassword',returnpagepaswd,"tips");
                var url = '__URL__/modifyPassword';
                var password = document.getElementById("id_password").value;
                var newPassword = document.getElementById("id_newpassword").value;
                $.post(url,{'password':password,'newPassword':newPassword},function(ret){      //ajax后台
                    if (ret.status==0){
                        document.getElementById("tips").innerHTML= ret.info;
                    }else{
                        intervalid = setInterval("fun()", 1000);
                        document.getElementById("tips").innerHTML=ret.info;
                    }
                },'json');                                      //josn格式
            }
        }
        function fun() {
            if (i == 0) {
                window.location.href = "__APP__/Content";
                clearInterval(intervalid);
            }
            document.getElementById("tips").innerHTML = "<?php echo (L("success_modify")); ?>"+i+"<?php echo (L("seconds")); ?>";
            i--;
        }
        function loginfo(){
            var sessinf = '<?php echo session('username');?>';
            if(sessinf.length > 0){
                document.getElementById( "id_username").style.display = "";
                document.getElementById( "id_logout").style.display = "";
            }
            var source = '<?php echo $source;?>';
            if (source =="midify_password") {
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