<?php
Class ChoiceitemAction extends BaseAction {
	Public function index(){
		$list = M('class')->select();
		//$list2=[];
		if(GetLanguageType()==1){
			foreach($list as $value){
				$value['class']=$value['class_zh'];
				$list2[]=$value;
			}
		}else
			$list2=$list;
		$this->assign('array',$list2);
		$this->display('Choiceitem');	
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