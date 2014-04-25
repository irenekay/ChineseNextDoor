<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo (session('cityname')); ?>&nbsp;<?php echo ($typename); echo (L("title_post")); ?></title>
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/uploadify/uploadify.css">
</head>
<body style="height:auto !important; min-height:600px; _height:700px; ">
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
                    <a title="Sign in" href="__APP__/Login" class="column">Sign in</a>
                </div>
                <div class="fl" id="id_signup">
                    <a title="Sign up" href="__APP__/Register" class="column">Register</a>
                </div>
                <div class="fl" id="id_username" style="display: none;">
                    <a title="Enter the member center" href="__APP__/Vip" class="column"><?php echo (session('username')); ?></a>
                </div>
                <div class="fl" id="id_logout" style="display: none;">
                    <a href="__APP__/Logout?next=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$_SERVER['QUERY_STRING']; ?>" onclick="logout()" class="column"><?php echo (L("logOut")); ?></a>
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
    <div class="post-wrapper">
        <div class="post-div"> 
            <h4 class="reg-title"><?php echo (L("title")); echo ($classname); ?>-><?php echo ($typename); ?></h4>
        </div>
        <div class="add-detail">
            <form id="postadform" method="post" action="__URL__/storepost" enctype="multipart/form-data" >
                <span id="alert"></span>
                <table cellspacing="0" cellpadding="0" border="0">
                    <tbody>
                        <tr>
                            <th>
                                <span class="star">*</span>
                                <?php echo (L("postTitle")); ?>
                            </th>
                            <td width="846">
                                <input type="text" size="51" name="title" class="input-style" id="id_title" onclick="clsTitle()" onblur="resTitle()" value="<?php echo ($postTitle); ?>">
                                <span id="tip_validator_title">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="star">*</span>
                                <?php echo (L("location")); ?>
                            </th>
                            <td width="846">
                                <!--<select class="select-style" name="district_id" id="id_adress" style="width:120px;"></select>-->
                                <input type="text" size="30"  class="input-style input-address" name="adredetl" id="id_adredetl" onclick="clsAdress()"  onblur="resAdress()" value="<?php echo ($location); ?>">
                                <span id="tip_validator_adress">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th valign="top">
                                <span class="star">*</span>
                                <?php echo (L("postDescrip")); ?>
                            </th>
                            <td width="846"> 
                               <textarea id="id_description" cols="70" rows="12"  style="color:black;" name="description" onclick="clsDescription()" onblur="resDescription()"><?php echo ($contents); ?></textarea>
                               <span id="tip_validator_description"></span>
                            </td>
                        </tr>
                        <tr>
                            <th valign="top">
                                <span class="star"></span>
                                <?php echo (L("phpto")); ?>
                            </th>
                            <td width="846">
                                <!--<input name="image" id="image" type="file" />-->
                                <input id="file_upload" name="file_upload" type="file" multiple="true">
                                <div id="image"></div>
                                <input type="hidden" id="url" value="__URL__">
                                <input type="hidden" id="root" value="__ROOT__">
                                <input type="hidden" id="public" value="__PUBLIC__">
                                <input type="hidden" id="id_imageurl">
                                <input type="hidden" id="id_typeId" value="<?php echo ($typeId); ?>">
                                <input type="hidden" id="id_tablename" value="<?php echo ($tableName); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="star"></span>
                                <?php echo (L("tel")); ?>
                            </th>
                            <td width="846">
                                <input type="text" size="20" class="input-style" id="id_telephone" name="telephone" value="<?php echo ($telphone); ?>">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="star"></span>
                                <?php echo (L("email")); ?>
                            </th>
                            <td width="846">
                                <input type="text" size="20" class="input-style" name="email" id="id_email" onclick="clsEmail()" onblur="resEmail()" value="<?php echo (session('email')); ?>">
                                <span id="tip_validator_email"></span>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="star"></span>                           
                                <?php echo (L("popular")); ?>
                            </th>
                            <td width="846">
                                <input type="checkbox" id="checkbox1">
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <span class="star"></span>
                            </th>
                            <td width="846">
                                <input type="button" id="id_postad" value="<?php echo (L("post")); ?>" class="bigbtn_bri" style="margin-top: 30px;" onclick="postad()">
                                <input type="button" id="id_modifyad" style="display:none;" value="Modify" class="bigbtn_bri" style="margin-top: 30px;" onclick="modifyad()">
                            </td>
                        </tr>
                    </tbody>
                </table>
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
    <script src="__PUBLIC__/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>   
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script> 
    <script src=" http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=1699908978" type="text/javascript" charset="utf-8"></script>
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
        function clsTitle(){
            document.getElementById( "id_title" ).className = "input-style border-focus"; 
            document.getElementById("tip_validator_title").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillTitle")); ?></span>';
        }
        function resTitle(){
            var title = document.getElementById("id_title");
            if (title.value.length == 0) {
                title.className = "input-style border-error"; 
                document.getElementById("tip_validator_title").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("titleEmpty")); ?></span>';
                return false;
            }
            else{
                title.className = "input-style"; 
                document.getElementById("tip_validator_title").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                return true;
            }
        }
        function clsAdress(){
            document.getElementById( "id_adredetl" ).className = "input-style border-focus"; 
            document.getElementById("tip_validator_adress").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillLocation")); ?></span>';
        }
        function resAdress(){
            var location = document.getElementById("id_adredetl");
            if (location.value.length == 0) {
                location.className = "input-style border-error"; 
                document.getElementById("tip_validator_adress").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("locationEmpty")); ?></span>';
                return false;
            }
            else{
                location.className = "input-style"; 
                document.getElementById("tip_validator_adress").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                return true;
            }
        }
        function clsDescription(){
            document.getElementById("tip_validator_description").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillDescrip")); ?></span>';
        }
        function resDescription(){
            var description = document.getElementById("id_description");
            if (description.value.length == 0) {
                description.className = "border-error"; 
                document.getElementById("tip_validator_description").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("descripEmpty")); ?></span>';
                return false;
            }
            else{
                description.className = "border-normal"; 
                document.getElementById("tip_validator_description").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                return true;
            }
        }
        function clsEmail(){
            document.getElementById( "id_email" ).className = "input-style border-focus"; 
            document.getElementById("tip_validator_email").innerHTML='<span class="validatorMsg validatorFocus"><?php echo (L("fillEmail")); ?></span>';
        }
        function resEmail(){
            var email = document.getElementById("id_email");
            /*if (email.value.length == 0) {
                email.className = "input-style border-error"; 
                document.getElementById("tip_validator_email").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("emailEmpty")); ?></span>';
                return false;
            }*/
            if (email.value.length == 0) {
                email.className = "input-style"; 
                document.getElementById("tip_validator_email").innerHTML='';
                return true;
            }
            else if (!checkEmail()) {  
                email.className = "input-style border-error"; 
                document.getElementById("tip_validator_email").innerHTML='<span class="validatorMsg validatorError"><?php echo (L("emailError")); ?></span>';
                return false;
            }
            else{
                email.className = "input-style"; 
                document.getElementById("tip_validator_email").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
                return true;
            }
        }
        //验证邮箱格式
        function checkEmail(){
            var temp = document.getElementById("id_email");
            //对电子邮件的验证
            var myreg = /^([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
            if(!myreg.test(temp.value)){
                //myreg.focus();
                return false;
            }
            else
                return true;
        }
        function post_check(){
            var title = document.getElementById("id_title");
            var location = document.getElementById("id_adredetl");
            var description = document.getElementById("id_description");
            var email = document.getElementById("id_email");
            if (resTitle() & resAdress() & resDescription() & resEmail())
                return true;
            else{
                if (!resTitle())
                    title.focus();
                else if(!resAdress())
                    location.focus();
                else if (!resDescription())
                    description.focus();
                else if (!resEmail())
                    email.focus();
                return false;
            }
        }
        function returnpage(data,status){
            if (status==0){
                document.getElementById("alert").innerHTML='<p class="alert" id="tips"></p>';
            }else{
                document.getElementById("alert").innerHTML='<p class="alert" id="tips"></p>';
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
            var id = '<?php echo $id;?>';
            if (id!="") {
                document.getElementById("id_postad").style.display = "none";
                document.getElementById("id_modifyad").style.display = "";
            }

            var imageUrl = '<?php echo $imageUrl;?>';
            if (imageUrl!="") {
                var images = new Array();
                images = imageUrl.split("&");
                for(i=0;i<images.length;i++){
                    var n=parseInt(Math.random()*100);                              //100以内的随机数
                    //alert(n+data);
                    //插入到image标签内，显示图片的缩略图
                    $('#image').append('<div id="'+n+'" class="photo"><a href="__ROOT__/Public/images/'+$('#id_tablename')[0].value+'/'+images[i]+'"    target="_blank"><img src="__ROOT__/Public/images/'+$('#id_tablename')[0].value+'/'+images[i]+'"  height=80 width=80 /></a><a href="javascript:vo(0)" class="del" onclick=deletes("'+n+'","/Public/images/'+$('#id_tablename')[0].value+'/'+images[i]+'");return false;>&nbsp</a></div>');
                    var str = $('#id_imageurl')[0].value;
                    if (str.indexOf(images[i])==-1) {
                        $('#id_imageurl')[0].value = $('#id_imageurl')[0].value+images[i]+'&';
                    };
                }   
            }

            var populCheck = '<?php echo $popular;?>';
            if(populCheck==1)
                document.getElementById("checkbox1").checked = true;
        }
        window.onload = loginfo;
    </script>
    <script type="text/javascript">
        var i = 3;
        var intervalid;
        function modifyad(){
            if (post_check()) {
                $("#alert").empty();
                var info=$('#url').val();  //获取url
                var url=info+"/modifyad";
                var title = $('#id_title')[0].value;
                var typeId = $('#id_typeId')[0].value;
                var adredetl = $('#id_adredetl')[0].value;
                var description = $('#id_description')[0].value;
                var telephone = $('#id_telephone')[0].value;
                var email = $('#id_email')[0].value;
                var imageurl = $('#id_imageurl')[0].value;
                var sessionid = '<?php echo session_id();?>';//$('#id_session')[0].value;
                var id = '<?php echo $id;?>';
                //alert(sessionid);
                var popularize = 0;
                var ck = document.getElementById("checkbox1");
                if (ck.checked) {popularize = 1;}
                $.post(url,{'title':title,'typeId':typeId,'adredetl':adredetl,'description':description,'telephone':telephone,'email':email,'imageurl':imageurl,'sessionid':sessionid,'id':id,'popularize':popularize},function(ret){      //ajax后台
                        if (ret.status==0){
                            var html = '<p class="alert" id="tips">'+ret.info+'</p>';
                            $('#alert').prepend(html);
                        }else{
                            var strs= new Array(); //定义一数组
                            strs=ret.data.split("&"); //字符分割      
                            var funstr = 'funModify("'+strs[0]+'","'+strs[1]+'")';
                            intervalid = setInterval(funstr, 1000);
                        }
                    },'json');                                      //josn格式
            } 
        }
        function postad(){
            if (post_check()) {
                $("#alert").empty();
                var info=$('#url').val();  //获取url
                var url=info+"/storeposts";
                var title = $('#id_title')[0].value;
                var typeId = $('#id_typeId')[0].value;
                var adredetl = $('#id_adredetl')[0].value;
                var description = $('#id_description')[0].value;
                var telephone = $('#id_telephone')[0].value;
                var email = $('#id_email')[0].value;
                var imageurl = $('#id_imageurl')[0].value;
                var sessionid = '<?php echo session_id();?>';//$('#id_session')[0].value;
                //alert(sessionid);
                var popularize = 0;
                var ck = document.getElementById("checkbox1");
                if (ck.checked) {popularize = 1;}
                $.post(url,{'title':title,'typeId':typeId,'adredetl':adredetl,'description':description,'telephone':telephone,'email':email,'imageurl':imageurl,'sessionid':sessionid,'popularize':popularize},function(ret){      //ajax后台
                        if (ret.status==0){
                            var html = '<p class="alert" id="tips">'+ret.info+'</p>';
                            $('#alert').prepend(html);
                        }else{
                            var strs= new Array(); //定义一数组
                            strs=ret.data.split("&"); //字符分割      
                            var funstr = 'fun("'+strs[0]+'","'+strs[1]+'")';
                            intervalid = setInterval(funstr, 1000);
                        }
                    },'json');                                      //josn格式
            } 
        }
        function funModify(typeId,id) {
            if (i == 0) {
                window.location.href = '__APP__/Detailitem/index/typeId/'+typeId+'/id/'+id;
                clearInterval(intervalid);
            }
            if (i==3){
                var html = '<p class="alert" id="tips"><?php echo (L("modifySucess1")); ?>'+i+'<?php echo (L("postSucess")); ?></p>';
                $('#alert').prepend(html);
            }else{
                var jump = '<?php echo (L("modifySucess1")); ?>'+i+'<?php echo (L("postSucess")); ?>';
                document.getElementById("tips").innerHTML = jump;
            }
            i--;
        }
        function fun(typeId,id) {
            if (i == 0) {
                window.location.href = '__APP__/Detailitem/index/typeId/'+typeId+'/id/'+id;
                clearInterval(intervalid);
            }
            if (i==3){
                var html = '<p class="alert" id="tips"><?php echo (L("postSucess1")); ?>'+i+'<?php echo (L("postSucess")); ?></p>';
                $('#alert').prepend(html);
            }else{
                var jump = '<?php echo (L("postSucess1")); ?>'+i+'<?php echo (L("postSucess")); ?>';
                document.getElementById("tips").innerHTML = jump;
            }
            i--;
        }
        function deletes(delName,delId){        
            var imagename = delId.substr(delId.lastIndexOf('/')+1);
            var strmage = document.getElementById("id_imageurl").value;
            var strs = new Array();
            var result = '';
            strs = strmage.split("&");
            for(i=0;i<strs.length-1;i++){
                if(strs[i]!=imagename)
                    result = result+strs[i]+'&';
            }
            document.getElementById("id_imageurl").value = result;

            //alert(delId);
            var info=$('#url').val();  //获取url
            var d='#'+delName;
            var id = '<?php echo $id;?>';
            //alert(d);
            var url=info+"/delete";        //删除图片的路径
             $.post(url,{'name':delId,'tableName':$('#id_tablename')[0].value,'id':id},function(data){      //ajax后台
                $(d).html(data.info);                       //输出后台返回信息
                $(d).remove();
            },'json');                                      //josn格式
        }
        function del(delName,delId){        //点击删除链接，ajax
            //var num = delId.lastIndexOf('/');
            var imagename = delId.substr(delId.lastIndexOf('/')+1);
            var strmage = document.getElementById("id_imageurl").value;
            var strs = new Array();
            var result = '';
            strs = strmage.split("&");
            for(i=0;i<strs.length-1;i++){
                if(strs[i]!=imagename)
                    result = result+strs[i]+'&';
            }
            document.getElementById("id_imageurl").value = result;

            //alert(delId);
            var info=$('#url').val();  //获取url
            var d='#'+delName;
            //alert(d);
            var url=info+"/del";        //删除图片的路径
             $.post(url,{'name':delId},function(data){      //ajax后台
                $(d).html(data.info);                       //输出后台返回信息
                //$(d).hide(0);                               //自动隐藏
                $(d).remove();
            },'json');                                      //josn格式
        }
        $(function() {
            $('#file_upload').uploadify({
                'formData'     : {
                    'timestamp' : '<?php echo ($time); ?>',            //时间
                    'token'     : '<?php echo (md5($time )); ?>',      //加密字段
                    'url'       : $('#url').val()+'/upload/',   //url
                    'imageUrl'  : $('#root').val(),              //root
                    'tableName'    : $('#id_tablename')[0].value
                },

                'fileTypeDesc' : 'Image Files',                 //类型描述
                //'removeCompleted' : false,    //是否自动消失
                'fileTypeExts' : '*.gif; *.jpg; *.png',     //允许类型
                'fileSizeLimit' : '3MB',                    //允许上传最大值
                'swf'      : $('#public').val()+'/uploadify/uploadify.swf', //加载swf
                'uploader' : $('#url').val()+'/uploadify',                  //上传路径
                'buttonText' :'Upload Photos',                                   //按钮的文字

                'onUploadSuccess' : function(file, data, response) {            //成功上传返回
                var n=parseInt(Math.random()*100);                              //100以内的随机数
                    //alert(n+data);
                    //插入到image标签内，显示图片的缩略图
                    $('#image').append('<div id="'+n+'" class="photo"><a href="__ROOT__/Public/images/'+$('#id_tablename')[0].value+'/'+data+'"    target="_blank"><img src="__ROOT__/Public/images/'+$('#id_tablename')[0].value+'/'+data+'"  height=80 width=80 /></a><a href="javascript:vo(0)" class="del" onclick=del("'+n+'","/Public/images/'+$('#id_tablename')[0].value+'/'+data+'");return false;>&nbsp</a></div>');
                    $('#id_imageurl')[0].value = $('#id_imageurl')[0].value+data+'&';
                }

            });
        });
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
</body>
</html>