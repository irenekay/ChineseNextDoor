<?php
/**
*格式化打印数组
*/
function p ($array){
	dump($array,1,'<pre>',0);
}
function getFinalArray($ww){
	$final=array();
	$languageType=GetLanguageType();
	foreach($ww as $value)
	{
		//$stateid=$value['stateId'];
		//	p($stateid);
		$map['stateId']=$value['stateId'];
		$map['enable']=1;
		$aa=M('city')->where($map)->order('city asc')->select(); //array('stateId='.$stateid)
		if(count($aa)>0)
		{
			$city=array();
			$list=array();
			foreach($aa as $value2)
			{
				if($languageType==1)	
					$city['cityname']=$value2['city_zh'];
				else
					$city['cityname']=$value2['city'];
				$city['cityid']=$value2['cityId'];
				$city['vote']=$value2['vote'];
				$list[]= $city;
			}
			if($languageType==1)
				$final[$value['state_zh']]=$list;	
			else
				$final[$value['state']]=$list;
		}
	}
	return $final;
}
function GetLanguageType(){
	$lanType = strtolower(cookie('think_language'));
	if ($lanType == 'zh-cn') {
		return 1;
	}else{
		return 0;
	}
}	
/*function getLan(){
	$lanType = session('languageType');
	if(!empty($lanType)){
		if($lanType==1)
			$str="?l=zh-cn";
		else
			$str="?l=en-us";
	}else{
		$str="?l=zh-cn";
	}
	return $str;
}*/
//输出功能页面
function getFinalClassArray($ww){
	$final=array();
	foreach($ww as $value)
	{
		$map['classId']=$value['classId'];
		$aa=M('type')->where($map)->order('id asc')->select();
		if(count($aa)>0)
		{
			$type=array();
			$list=array();
			foreach($aa as $value2)
			{
				if(GetLanguageType()==1)
					$type['typeName']=$value2['type_zh'];
				else
					$type['typeName']=$value2['type'];
				$type['typeId']=$value2['typeId'];
				$list[]=$type;
			}
			if(GetLanguageType()==1)
				$final[$value['class_zh']]=$list;	
			else
				$final[$value['class']]=$list;
		}
	}
	return $final;
}
function getIcon($k){
	if(GetLanguageType()==1)     // () !
		$map['class_zh']=$k;
	else
		$map['class']=$k;	
	$aa=M('class')->where($map)->select();
	$url=$aa[0]['imageUrl'];
	return $url;
}
function getClassId($k){
	if(GetLanguageType()==1)
		$map['class_zh']=$k;
	else
		$map['class']=$k;
	$aa=M('class')->where($map)->select();
	$classId=$aa[0]['classId'];
	return $classId;
}
function picContent($tmp){
	if($tmp=="1")
		return "[pic]";
	else if($tmp=="0")
		return "";
}
function exectue_dql_fenye($sql1,$sql2,$fenyePage){
	$res=mysql_query($sql1,$this->conn) or die(mysql_error());
	$arr=array();
	while($row=mysql_fetch_assoc($res)){
		$arr[]=$row;
	}
	mysql_free_result($res);
	$res2=mysql_query($sql2,$this->conn) or die(mysql_error());
	if($row=mysql_fetch_row($res2)){
		$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
		$fenyePage->rowCount=$row[0];
	}
	mysql_free_result($res2);
	$navigate="";
	//$navigate="<div class="h40"><span class="btn_hint">";
	if ($fenyePage->pageNow>1){
		$prePage=$fenyePage->pageNow-1;
		$navigate="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp;";
		//$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$prePage' class="btn_publish">上一页</a></span>";
	}
	if($fenyePage->pageNow<$fenyePage->pageCount){
		$nextPage=$fenyePage->pageNow+1;
		$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$nextPage'>下一页</a>&nbsp;";
		//$navigate.="<span class="btn_hint"><a href='{$fenyePage->gotoUrl}?pageNow=$nextPage' class="btn_publish">下一页</a></span>";
	}
	$page_whole=1;
	$start=floor(($fenyePage->pageNow-1)/$page_whole)*$page_whole+1;
	$index=$start;
	
	if($fenyePage->pageNow>$page_whole){
		$navigate.="&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=".($start-1)."'>&nbsp;&nbsp;<<&nbsp;&nbsp;</a>";
	}

	for(;$start<$index+$page_whole;$start++){
		$navigate.="<a href='{$fenyePage->gotoUrl}?pageNow=$start'>[$start]</a>";
	}
	$navigate.="&nbsp;&nbsp;<a href='{$fenyePage->gotoUrl}?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;&nbsp;</a>";
	$navigate.=" 当前页{$fenyePage->pageNow}/共{$fenyePage->pageCount}页";
	
	$fenyePage->res_array=$arr;
	$fenyePage->navigate=$navigate;
}
function echeckCityInfo(){
	if(!session('?cityid')){
		$cityId = cookie('cityid');
		if(empty($cityId)){
			redirect('/', 0);
		}
		else{
			session('cityname',cookie('cityname'));									
			session('cityid',cookie('cityid'));
		}
	}
}
function getImgs($k){
	if(GetLanguageType()==1){
		if($k=="login")
			$str= "log_zh.jpg";
		else
			$str=  "reg_zh.jpg";
	}else{
		if($k=="reg")
			$str=  "reg_en.jpg";
		else
			$str=  "log_en.jpg";
	}
	return $str;	
}
/*function echeckLogin(){
	if(!session('?userid')){
		redirect('/index.php/Login', 0);
	}
}*/
function getSimpleContents($contents_t){

	$text = strip_tags($contents_t, " "); 
	p($text);
	// $flag=0;
	// $new="z";
	// p(strlen($contents_t));
	// $new=$new."j";
	// $i=$contents_t[0];
	// $new=$new.$i;
	// p($new);


	// $i=$contents_t[1];
	// $new=$new.$i;
	// p($new);
	// p("okok");

	// p($contents_t[0]);
	// p($contents_t[1]);
	// p($contents_t[2]);
	// p($contents_t[4]);
	// p($contents_t[5]);
	// p($contents_t[6]);
	// p($contents_t[7]);
	// p($contents_t[8]);
	// p($contents_t[9]);
	// p($contents_t[10]);
	// p($contents_t[11]);
	// p($contents_t[12]);

	// for($i=0;$i<strlen($contents_t);){
	// 	if(strncmp($contents_t[$i], "<", 1)===0)	{ p("1 ".$i." ".$contents_t[$i]);	$flag=1; $i++; }
	// 	else if(strncmp($contents_t[$i], ">", 1)===0) 	{ p("2 ".$i." ".$contents_t[$i]);   $flag=0; $i++; }
	// 	else if($flag>0)  { p("3 ".$i." ".$contents_t[$i]); $i++;  }
	// 	else { $new=substr($contents_t,$i); p("4 ".$i." ".$contents_t[$i]." new= ".$new); $i++; }
	// }
	return $new;
}