<?php
Class ChoicedetailAction extends BaseAction {
	Public function index(){
		//$classId = $this->_param('classid');
		$map['classId']=$this->_param('classid');
		$list = M('type')->where($map)->order('id asc')->select();
		$list2=array();
		if(GetLanguageType()==1){
			foreach($list as $value){
				$value['type']=$value['type_zh'];
				$list2[]=$value;
			}
		}else
			$list2=$list;
		$this->assign('array',$list2);
		$this->display('Choicedetail');	
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