<?php if (!defined('THINK_PATH')) exit();?><html> 
   <head> 
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	 <title> QQConnect JSDK - redirectURI </title>
	 <style type="text/css">
		html, body{font-size:14px; line-height:180%;}
	 </style>
	<script type="text/javascript" src="__PUBLIC__/js/base.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/prototype.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/mootools.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/Ajax/ThinkAjax.js"></script>
	<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="100576136" data-redirecturi="http://www.bilinabroad.com/qc_back.html" charset="utf-8"></script>
	<script type="text/javascript">
		//从页面收集OpenAPI必要的参数。get_user_info不需要输入参数，因此paras中没有参数
		// var paras = {};

		// //用JS SDK调用OpenAPI
		// QC.api("get_user_info", paras)
		// 	//指定接口访问成功的接收函数，s为成功返回Response对象
		// 	.success(function(s){
		// 		//成功回调，通过s.data获取OpenAPI的返回数据
		// 		alert("获取用户信息成功！当前用户昵称为："+s.data.nickname);
		// 	})
		// 	//指定接口访问失败的接收函数，f为失败返回Response对象
		// 	.error(function(f){
		// 		//失败回调
		// 		alert("获取用户信息失败！");
		// 	})
		// 	//指定接口完成请求后的接收函数，c为完成请求返回Response对象
		// 	.complete(function(c){
		// 		//完成请求回调
		// 		alert("获取用户信息完成！");
		// 	});
		var cbLoginFun = function(oInfo, oOpts){
    		ThinkAjax.send('__URL__/getUserInfo','ajax=1&nickname='+oInfo.nickname,returnfunc,"");
		};
		function returnfunc(data,status){
			window.location ='__APP__/Content/Index'; 
		}
		//QC.Login({btnId:"qqLoginBtn"}, cbLoginFun);
	</script>
   </head> 
   <body> 
   
	<div>
		<h3>数据传输中，请稍后...</h3>
		<span id="qqLoginBtn"></span>
		<script type="text/javascript">
			  //调用QC.Login方法，指定btnId参数将按钮绑定在容器节点中
		   QC.Login({
		       //btnId：插入按钮的节点id，必选
		       btnId:"qqLoginBtn",    
		       //用户需要确认的scope授权项，可选，默认all
		       scope:"all",
		       //按钮尺寸，可用值[A_XL| A_L| A_M| A_S|  B_M| B_S| C_S]，可选，默认B_S
		       size: "A_M"
		   },cbLoginFun);

		</script>
	</div>


   </body> 
</html>