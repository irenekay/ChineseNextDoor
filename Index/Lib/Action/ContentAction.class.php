<?php
Class ContentAction extends BaseAction {
	Public function index(){

		$cityId=$this->_param('cityid');  //获取URL参数
		
		if (!empty($cityId))  //&& session('?cityname')
		{
			$city=M('city')->where("cityId=$cityId")->select();	
			if(GetLanguageType()==1)
				$cityname = $city[0]['city_zh'];  
			else
				$cityname = $city[0]['city'];  
			session('cityname',$cityname);	//cityid和cityname写入session
			session('cityid',$cityId);		
			cookie('cityname',$cityname,302400);  //cityid和cityname写入cookie,保存一周
			cookie('cityid',$cityId,302400);
			cookie('isvisit',1,302400);
		}

		/*if(empty($cityId) && !session('?cityname'))
		{
			session('cityname',cookie('cityname'));									
			session('cityid',cookie('cityid'));	
		}*/
		echeckCityInfo();

		$ww1=M('class')->order('id asc')->limit('0,2')->select();		//The first column
		$first=getFinalClassArray($ww1);

		$ww2=M('class')->order('id asc')->limit('2,4')->select();		//The second column
		$second=getFinalClassArray($ww2);
		
		$ww3=M('class')->order('id asc')->limit('6,5')->select();		//The third column
		$third=getFinalClassArray($ww3);

		$userid = session('userid');
		$this->assign('userid',$userid);
		
		$this->assign('array1',$first);
		$this->assign('array2',$second);
		$this->assign('array3',$third);

		$this->display('Content');	
	}

	Public function setglobal(){
		$k = $_POST['lang'];
		if ($k==0) {
			cookie('think_language','en-us',302400);  
		}else{
			cookie('think_language','zh-cn',302400);  
		}
		$this->ajaxReturn(1,'设置成功',1);
	}
}
?>