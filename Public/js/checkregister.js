
var existeml = false;
var existpass = false;
var existpass2 = false;
function clsUserName(){
    document.getElementById( "focus_username" ).className = "border-focus input-text"; 
    document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorFocus">请填写用户注册邮箱</span>';    
} 
function resUserName(){
    var username = document.getElementById("focus_username").value;
    document.getElementById( "focus_username" ).className = "border-error input-text"; 
    if (document.registerform.username.value.length == 0) {
        document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorError">邮箱地址不能为空</span>';
    }
    else if (!checkEmail()) {              
        document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorError">邮箱地址格式错误</span>';
    }else{
        ThinkAjax.send('__URL__/checkTitle','ajax=1&email='+username,emailCheckResult,"resultreturn");
    };
} 
function emailCheckResult(data,status){
    if (status==0){
        document.getElementById( "focus_username" ).className = "border-error input-text"; 
        document.getElementById("tip_username").innerHTML='<span id="resultreturn" class="validatorMsg validatorError">此邮箱已被注册</span>';
    }else{
        existeml = true;
        document.getElementById( "focus_username" ).className = "input-text"; 
        document.getElementById("tip_username").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
    };
    
}
function emailCheckResultSubmit(data,status){
    if (status==0) {
        document.getElementById( "focus_username" ).className = "border-error input-text"; 
        document.getElementById("tip_username").innerHTML='<span id="resultreturn" class="validatorMsg validatorError">此邮箱已被注册</span>';
        existeml = 0;
        alert("xucang"+existeml);
    }
}
function clsPassword(){
    document.getElementById( "focus_password" ).className = "border-focus input-text"; 
    document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorFocus">请填写密码</span>';
} 
function resPassword(){
    document.getElementById( "focus_password" ).className = "border-error input-text"; 
    if (document.registerform.password.value.length == 0) {
         document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorError">密码不能为空</span>';
    }
    else{
        existpass = true;
        document.getElementById( "focus_password" ).className = "input-text"; 
        document.getElementById("tip_password").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
    };
} 
function clsConfirmPassword(){
    document.getElementById( "focus_password2" ).className = "border-focus input-text"; 
    document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorFocus">重复输入一次密码</span>';
} 
function resConfirmPassword(){
    document.getElementById( "focus_password2" ).className = "border-error input-text"; 
    if (document.registerform.password2.value.length == 0) {
        document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorError">重复输入一次密码</span>';
    }
    else if(focus_password.value!=focus_password2.value) {
        document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorError">两次输入密码不同</span>';
    }
    else{
        existpass2 = true;
        document.getElementById( "focus_password2" ).className = "input-text"; 
        document.getElementById("tip_password2").innerHTML='<span class="validatorMsg validatorValid">&nbsp;</span>';
    };
} 

//验证邮箱格式
function checkEmail(){
    var temp = document.getElementById("focus_username");
    //对电子邮件的验证
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!myreg.test(temp.value)){
        //myreg.focus();
        return false;
    }
    else
        return true;
}
function my_check(){
    resUserName();
    resPassword();
    resConfirmPassword();
    if (existeml && existpass && existpass2) {
        return (true);
    }else{
        return (false);
    }
}

/*//自定义方法hideElement()
function hideElement(id){
    document.getElementById(id).style.display="none";
}
//自定义方法showElement()
function showElement(id){
    document.getElementById(id).style.display="";
}*/
/*function returnError(){
    document.getElementById( "focus_username" ).className = "border-error input-text"; 
    document.getElementById( "tip_username_email" ).className = "validatorMsg validatorError"; 
    document.getElementById("tip_username_email").innerHTML="此邮箱已被注册";
    document.getElementById("focus_username").focus();
}*/
