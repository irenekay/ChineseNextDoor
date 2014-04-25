<?php
Class IndexAction extends Action {
	Public function index(){
		$isdeliver=$this->_param('deliver'); //如果是从content页面跳转过来的url，则跳转到城市选择页面
		
		//用户之前如果访问过本网站，则跳转到content页面
		$isvisit = cookie('isvisit');
		if(!empty($isvisit)){
			if (empty($isdeliver)){
				redirect('index.php/Content', 0);
			}
		}

		$ww1=M('state')->order('state asc')->limit('0,9')->select();		//leftfirst 
		$left_first=getFinalArray($ww1);

		$ww2=M('state')->order('state asc')->limit('9,18')->select();		//leftsecond  
		$left_second=getFinalArray($ww2);
		
		$ww3=M('state')->order('state asc')->limit('27,13')->select();		//righttop first 
		$right_top_first=getFinalArray($ww3);
		
		$ww4=M('state')->order('state asc')->limit('40,12')->select();		//righttop second 
		$right_top_second=getFinalArray($ww4);

		$lang = GetLanguageType();

		$this->assign('array1',$left_first);
		$this->assign('array2',$left_second);
		$this->assign('array3',$right_top_first);
		$this->assign('array4',$right_top_second);
		$this->assign('lang',$lang);
		$this->display('Index');
				
	}
	Public function delete(){
		echo "this is the delete in index!";
	}
	Public function vote(){ 
		$cityid=$_POST['cityid'];
		$result = M('City')->where("cityId='$cityid'")->setInc('vote');
		if ($result){
			$str = $this->dataLoad();
			$this->ajaxReturn($str,"",1);//红色
		}
		else
			$this->ajaxReturn(0,"",0);
	}
	public function dataLoad(){
		$ww1=M('state')->order('state asc')->limit('0,9')->select();		//leftfirst 
		$left_first=getFinalArray($ww1);

		$ww2=M('state')->order('state asc')->limit('9,18')->select();		//leftsecond  
		$left_second=getFinalArray($ww2);
		
		$ww3=M('state')->order('state asc')->limit('27,13')->select();		//righttop first 
		$right_top_first=getFinalArray($ww3);
		
		$ww4=M('state')->order('state asc')->limit('40,12')->select();		//righttop second 
		$right_top_second=getFinalArray($ww4);

		$str = '<div class="per_state">';
		foreach ($left_first as $state=>$city){
			$str=$str.'<div class="title">'.$state.'</div>';
			foreach($city as $value){
				$id=$value['cityid'];
				$cityname=$value['cityname'];
				$votenum=$value['vote'];
				$str=$str.'<div class="detail">';
				if ($cityname=='boston' || $cityname=='morgantown' || $cityname=='波士顿' || $cityname=='摩根城') {
					$str=$str.'<div class="detailnow">'.'<a href="index.php/Content/index/cityid/'.$id.'" style="font-weight:bold;color:#EE3300">'.$cityname.'</a></div>';
				}else{
					$str=$str.'<div class="detailnow">'.'<a href="javascript:vo(0)" onclick="poll(\''.$id.'\',\''.$cityname.'\',\''.$votenum.'\')">'.$cityname.'</a></div>';
				}
				$str=$str.'</div>';					
			}
			$str=$str.'<div class="cutoffline"></div>';	
		}
		$str=$str.'</div>';

		$str = $str.'&<div class="per_state">';
		foreach ($left_second as $state=>$city){
			$str=$str.'<div class="title">'.$state.'</div>';
			foreach($city as $value){
				$id=$value['cityid'];
				$cityname=$value['cityname'];
				$votenum=$value['vote'];
				$str=$str.'<div class="detail">';
				if ($cityname=='boston' || $cityname=='morgantown'|| $cityname=='波士顿' || $cityname=='摩根城') {
					$str=$str.'<div class="detailnow">'.'<a href="index.php/Content/index/cityid/'.$id.'" style="font-weight:bold;color:#EE3300">'.$cityname.'</a></div>';
				}else{
					$str=$str.'<div class="detailnow">'.'<a href="javascript:vo(0)" onclick="poll(\''.$id.'\',\''.$cityname.'\',\''.$votenum.'\')">'.$cityname.'</a></div>';
				}
				$str=$str.'</div>';					
			}
			$str=$str.'<div class="cutoffline"></div>';	
		}
		$str=$str.'</div>';

		$str = $str.'&<div class="per_state">';
		foreach ($right_top_first as $state=>$city){
			$str=$str.'<div class="title">'.$state.'</div>';
			foreach($city as $value){
				$id=$value['cityid'];
				$cityname=$value['cityname'];
				$votenum=$value['vote'];
				$str=$str.'<div class="detail">';
				if ($cityname=='boston' || $cityname=='morgantown'|| $cityname=='波士顿' || $cityname=='摩根城') {
					$str=$str.'<div class="detailnow">'.'<a href="index.php/Content/index/cityid/'.$id.'" style="font-weight:bold;color:#EE3300">'.$cityname.'</a></div>';
				}else{
					$str=$str.'<div class="detailnow">'.'<a href="javascript:vo(0)" onclick="poll(\''.$id.'\',\''.$cityname.'\',\''.$votenum.'\')">'.$cityname.'</a></div>';
				}
				$str=$str.'</div>';					
			}
			$str=$str.'<div class="cutoffline"></div>';	
		}
		$str=$str.'</div>';

		$str = $str.'&<div class="per_state">';
		foreach ($right_top_second as $state=>$city){
			$str=$str.'<div class="title">'.$state.'</div>';
			foreach($city as $value){
				$id=$value['cityid'];
				$cityname=$value['cityname'];
				$votenum=$value['vote'];
				$str=$str.'<div class="detail">';
				if ($cityname=='boston' || $cityname=='morgantown'|| $cityname=='波士顿' || $cityname=='摩根城') {
					$str=$str.'<div class="detailnow">'.'<a href="index.php/Content/index/cityid/'.$id.'" style="font-weight:bold;color:#EE3300">'.$cityname.'</a></div>';
				}else{
					$str=$str.'<div class="detailnow">'.'<a href="javascript:vo(0)" onclick="poll(\''.$id.'\',\''.$cityname.'\',\''.$votenum.'\')">'.$cityname.'</a></div>';
				}
				$str=$str.'</div>';					
			}
			$str=$str.'<div class="cutoffline"></div>';	
		}
		$str=$str.'</div>';
		return $str;
	}

	Public function setglobal($k){
		if ($k==0) {
			cookie('think_language','en-us',302400);  
		}else{
			cookie('think_language','zh-cn',302400);  
		}
		$str = $this->dataLoad();
		$str = $str.'&'.$k;
		$this->ajaxReturn($str,'',1);
	}
}

?>