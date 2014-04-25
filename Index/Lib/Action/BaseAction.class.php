<?php
class BaseAction extends Action{
function _initialize(){
	if(in_array(MODULE_NAME,explode(',',"Detailitem"))){
		$id=$this->_param('id');  	
		$typeId=$this->_param('typeId');  	
		$postTableName=M('type')->where("typeId ='$typeId'")->getField('postTableName');
		$cityId=M($postTableName)->where("id ='$id'")->getField('cityId');
		if(GetlanguageType()==1)
			$cityName=M('city')->where("cityId ='$cityId'")->getField('city_zh');
		else
			$cityName=M('city')->where("cityId ='$cityId'")->getField('city');
		session('cityname',$cityName);									
		session('cityid',$cityId);
	}
	if(!in_array(MODULE_NAME,explode(',',"Content,Detailitem"))){
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
	$session_username = session('username');
	if(!session('?username') || empty($session_username)){
		$cookie_username = cookie('username');
		if(!empty($cookie_username)){
          	$user=cookie('username');
			$password=cookie('passw');
			$rset = M("User")->where("emailAdress='$user' or username='$user'")->find();
			if($rset){
	    		if($rset['password']==$password){
	    			session('email',cookie('email'));
         			session('userid',cookie('userid'));
          			session('username',cookie('username'));
	    		}else{
	    			if(in_array(MODULE_NAME,explode(',',"Choiceitem,Choicedetail,Post,Vip,Account,Collect"))){
	   					$this->redirect('Login/index', 0);
	   				}
	    		}
	   		}else{
	   			if(in_array(MODEL_NAME,explode(',',"Choiceitem,Choicedetail,Post,Vip,Account,Collect"))){
	   				$this->redirect('Login/index', 0);
	   			}
			}
    	}else{
    		if(in_array(MODULE_NAME,explode(',',"Choiceitem,Choicedetail,Post,Vip,Account,Collect"))){
	   			$this->redirect('Login/index', 0);
	   		}
    	}
	}
}
}
?>