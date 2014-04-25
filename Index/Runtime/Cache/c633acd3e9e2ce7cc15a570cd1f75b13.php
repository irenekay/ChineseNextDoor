<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="google-site-verification" content="wc6Dvzsyokfdq9zfETmmK_Mza95XaM2c9MaIYRrXCtk" />
    <title><?php echo (L("title_index")); ?></title>
    <meta property="qc:admins" content="07102653576214161227146375" />
    <meta name="Keywords" content="Chinese next door,isting services,US Chinese,classifieds sites,Free post Ads">
    <meta name="Description" content="Chinese Next Door provides local classifieds for jobs,housing,for sale,personals,services,local community,and events for US Chinese">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/index.css"/>
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
<body>
	<div class="wapper">
		<div class="head">
			<span>1</span>
		 	<div class="title"></div>
		</div>
		<span class="lan">	<a href="#" onclick="setGlobal(0)" id='lagEng'><?php echo (L("english")); ?></a>
			    | <a onclick="setGlobal(1)" href="#" id='lagCHS'><?php echo (L("chinese")); ?></a>
			    <!--&nbsp;&nbsp;&nbsp;<a  href="__APP__/Login">QQ登录</a>-->
		</span>
		<div class="clear"></div>
		<div class="content">
			<div class="cutoffline"></div>
		 	<div class="leftpart">
				<div class="left_first" id="id_left_first">
					<div class="per_state">
						<?php if(is_array($array1)): foreach($array1 as $key=>$value): ?><div class="title"><?php echo ($key); ?></div>
							<?php if(is_array($value)): foreach($value as $key=>$value2): ?><div class="detail">
									<?php if(($value2["cityname"] == 'boston') OR ($value2["cityname"] == 'morgantown')OR($value2["cityname"] == '波士顿') OR($value2["cityname"] == '摩根城') ): ?><div class="detailnow"><a href="__APP__/Content/index/cityid/<?php echo ($value2["cityid"]); ?>" style="font-weight:bold;color:#EE3300"><?php echo ($value2["cityname"]); ?></a></div>
									<?php else: ?>
										<div class="detailnow"><a href="javascript:vo(0)" onclick='poll("<?php echo ($value2["cityid"]); ?>","<?php echo ($value2["cityname"]); ?>","<?php echo ($value2["vote"]); ?>")'><?php echo ($value2["cityname"]); ?></a></div><?php endif; ?>
								</div><?php endforeach; endif; ?>
							<div class="cutoffline"></div><?php endforeach; endif; ?>
					</div>
				</div>
		  		<div class="left_second" id="id_left_second">
		  			<div class="per_state">
					<?php if(is_array($array2)): foreach($array2 as $key=>$value): ?><div class="title"><?php echo ($key); ?></div>
						<?php if(is_array($value)): foreach($value as $key=>$value2): ?><div class="detail">
								<?php if(($value2["cityname"] == 'boston') OR ($value2["cityname"] == 'morgantown')OR($value2["cityname"] == '波士顿') OR($value2["cityname"] == '摩根城')): ?><div class="detailnow"><a href="__APP__/Content/index/cityid/<?php echo ($value2["cityid"]); ?>" style="font-weight:bold;color:#EE3300"><?php echo ($value2["cityname"]); ?></a></div>
								<?php else: ?>
									<div class="detailnow"><a href="javascript:vo(0)" onclick='poll("<?php echo ($value2["cityid"]); ?>","<?php echo ($value2["cityname"]); ?>","<?php echo ($value2["vote"]); ?>")'><?php echo ($value2["cityname"]); ?></a></div><?php endif; ?>
							</div><?php endforeach; endif; ?>
						<div class="cutoffline"></div><?php endforeach; endif; ?>
					</div>
				</div>
			</div>
			<div class="rightpart">
				<div class="right_top">
				 	<div class="right_top_first" id="id_right_top_first">
						<div class="per_state">
						<?php if(is_array($array3)): foreach($array3 as $key=>$value): ?><div class="title"><?php echo ($key); ?></div>
							<?php if(is_array($value)): foreach($value as $key=>$value2): ?><div class="detail">
									<?php if(($value2["cityname"] == 'boston') OR ($value2["cityname"] == 'morgantown')OR($value2["cityname"] == '波士顿') OR($value2["cityname"] == '摩根城')): ?><div class="detailnow"><a href="__APP__/Content/index/cityid/<?php echo ($value2["cityid"]); ?>" style="font-weight:bold;color:#EE3300"><?php echo ($value2["cityname"]); ?></a></div>
									<?php else: ?>
										<div class="detailnow"><a href="javascript:vo(0)" onclick='poll("<?php echo ($value2["cityid"]); ?>","<?php echo ($value2["cityname"]); ?>","<?php echo ($value2["vote"]); ?>")'><?php echo ($value2["cityname"]); ?></a></div><?php endif; ?>
								</div><?php endforeach; endif; ?>
							<div class="cutoffline"></div><?php endforeach; endif; ?>
						</div>
					</div>
					<div class="right_top_second" id="id_right_top_second">
						<div class="per_state">
						<?php if(is_array($array4)): foreach($array4 as $key=>$value): ?><div class="title"><?php echo ($key); ?></div>
							<?php if(is_array($value)): foreach($value as $key=>$value2): ?><div class="detail">
									<?php if(($value2["cityname"] == 'boston') OR ($value2["cityname"] == 'morgantown')OR($value2["cityname"] == '波士顿') OR($value2["cityname"] == '摩根城')): ?><div class="detailnow"><a href="__APP__/Content/index/cityid/<?php echo ($value2["cityid"]); ?>" style="font-weight:bold;color:#EE3300"><?php echo ($value2["cityname"]); ?></a></div>
									<?php else: ?>
										<div class="detailnow"><a href="javascript:vo(0)" onclick='poll("<?php echo ($value2["cityid"]); ?>","<?php echo ($value2["cityname"]); ?>","<?php echo ($value2["vote"]); ?>")'><?php echo ($value2["cityname"]); ?></a></div><?php endif; ?>
								</div><?php endforeach; endif; ?>
							<div class="cutoffline"></div><?php endforeach; endif; ?>
						</div>
					</div> 
				</div>
 			</div>
 
		</div>

	</div>
	<div id="footer">
       	<p>
            <span id="id_copyright"><?php echo (L("copyright")); ?></span>
            <span>
            	<a href="__APP__/About/index/act/about" id="id_about"><?php echo (L("about")); ?> |</a>
            	<a href="__APP__/About/index/act/contact" id="id_contact_us"><?php echo (L("contact_us")); ?> |</a>
            	<a href="__APP__/About/index/act/privacy" id="id_privacy_policy"><?php echo (L("privacy_policy")); ?> |</a>
            	<a href="__APP__/About/index/act/terms" id="id_terms_of_use"><?php echo (L("terms_of_use")); ?></a>
            </span>
       	</p>
    </div>
	<script type="text/javascript" src="__PUBLIC__/js/base.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/prototype.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/mootools.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/Ajax/ThinkAjax.js"></script>
    <script type="text/javascript" src="__PUBLIC__/js/artDialog.js"></script>
	<script language="JavaScript" type="text/javascript">
		var i = 1;
		var intervalid;
		function poll(cityid,cityname,num){
	        str="<div>Our web opens to Boston and Morgantown now,<br/> We will open more cities in future.Your valuable<br/> support and vote will greatly help this city to open. <br/>Total number of votes: "+num+"<br/></div>";
	        art.dialog({id:'menu', title:'Vote', content:str,
	            button:[{name:'Vote',
	            		callback:function(){  
	            			ThinkAjax.send('__URL__/vote','ajax=1&cityid='+cityid,returnfun,"");
	                    }},{name:'Cancel'}]
	        });  
	    }
	    function returnfun(data,status){
            if (status==0){
                alert("Sorry,Vote Failed!");
            }
            else{
            	var strs= new Array(); //定义一数组
				strs=data.split("&"); //字符分割      
				document.getElementById("id_left_first").innerHTML=strs[0];
				document.getElementById("id_left_second").innerHTML=strs[1];
				document.getElementById("id_right_top_first").innerHTML=strs[2];
				document.getElementById("id_right_top_second").innerHTML=strs[3];
                ss="<div style='color:gray;font-style:italic;font-size:14px;'>Thanks for your support.</div>";
                art.dialog({content:ss, lock:true, time:1});
                //intervalid = setInterval("fun()", 1000);
            }
        }
	    function fun() {
	        if (i == 0) {
	            window.location.reload();
	        }
	        i--;
	    }
	    function setGlobal(k){
	    	ThinkAjax.send('__URL__/setglobal','ajax=1&k='+k,returnfun1,"");
	    }
	    function returnfun1(data,status){
	    	//alert(data);
	    	var strs= new Array(); //定义一数组
			strs=data.split("&"); //字符分割      
			document.getElementById("id_left_first").innerHTML=strs[0];
			document.getElementById("id_left_second").innerHTML=strs[1];
			document.getElementById("id_right_top_first").innerHTML=strs[2];
			document.getElementById("id_right_top_second").innerHTML=strs[3];
			checkLang(strs[4]);
	    }
	    function checkLang(a){
			if (a==0) {
				document.getElementById("lagEng").innerHTML='English';
				document.getElementById("lagCHS").innerHTML='CHS';
				document.getElementById("id_copyright").innerHTML='Copyright @Chinese-next-door';
				document.getElementById("id_about").innerHTML='About';
				document.getElementById("id_contact_us").innerHTML='Contact Us';
				document.getElementById("id_privacy_policy").innerHTML='Privacy Policy';
				document.getElementById("id_terms_of_use").innerHTML='Terms of Use';
			}else{
				document.getElementById("lagEng").innerHTML='英';
				document.getElementById("lagCHS").innerHTML='中文简';
				document.getElementById("id_copyright").innerHTML='版权 @华人比邻';
				document.getElementById("id_about").innerHTML='关于';
				document.getElementById("id_contact_us").innerHTML='联系我们';
				document.getElementById("id_privacy_policy").innerHTML='隐私声明';
				document.getElementById("id_terms_of_use").innerHTML='使用条款';
			}
	    }
	</script>
</body>
</html>