<?php
Class DetailitemAction extends BaseAction {
	Public function index(){
		$id=$this->_param('id');  	//获取URL参数
		$typeId=$this->_param('typeId');  
		$type=M('type')->where("typeId ='$typeId' ")->select();	
		if(GetlanguageType()==1)
			$typename=$type[0]['type_zh'];
		else
			$typename=$type[0]['type'];   
		$classid = $type[0]['classId'];
		$class=M('class')->where("classId='$classid' ")->select();
		if(GetlanguageType()==1)
			$classname=$class[0]['class_zh'];
		else
			$classname=$class[0]['class'];
		$postTableName=$type[0]['postTableName'];
			
		$item=M($postTableName)->where("id ='$id' ")->select();   //get all infos
		$postTitle=$item[0]['postTitle'];
		$location=$item[0]['location'];
		$contents=$item[0]['contents'];
		$telphone=$item[0]['telphone'];   		//非必填
		$cityId=$item[0]['cityId'];
		//$typeId=$item[0]['typeId'];
		$time = $item[0]['createTime'];
		$createTime= substr($time,0,strlen($time)-3);
		$userid=$item[0]['userid'];
		$imageUrl=$item[0]['imageUrl'];			
		//$verify=$item[0]['verify'];
		//$ipAddress=$item[0]['ipAddress'];		
		$email=$item[0]['email'];	
		
		$user=M('user')->where("userid ='$userid'")->select();
		$contactor=$user[0]['username'];
		if($telphone=="")
			$telphone="Not settled";
		if($email=="")
			$email="Not settled";
		if($imageUrl!=""){
			$res=explode("&",$imageUrl);
			foreach($res as $value){
				$tmp="__PUBLIC__/images/".$postTableName."/".$value;
				$images[]=$tmp;
			}
		}

		//帖子所在城市
		$cityName=M('city')->where("cityId ='$cityId'")->getField('city');

		//收藏
		$user = session('userid');
		$rset = M("Collect")->where("userId='$user' and typeId='$typeId' and postId='$id'")->find();
		if($rset){
    		$collectpost = 1;
   		}
   		if($imageUrl!=""){
   			$shareImage = 'http://www.bilinabroad.com'.$images[0];
   		}
   		$url = $_SERVER['PHP_SELF']; 
		$filename= substr( $url , strrpos($url , ‘/’)+1 ); 

		$contentshare = strip_tags($contents, ""); 
   		if(strlen($contentshare)<=140)
			$contents_share='#华人比邻#'.$contentshare.'  详情点击：'.'http://www.bilinabroad.com/'.$filename;
		else
			$contents_share='#华人比邻#'.mb_substr($contentshare,0,140,"UTF-8")."...".'  详情点击：'.'http://www.bilinabroad.com/'.$filename;

   		$this->assign('collectpost',$collectpost);
   		$this->assign('id',$id);

   		$this->assign('cityName',$cityName);


		$this->assign('typename',$typename);
		$this->assign('classname',$classname);
		$this->assign('typeid',$typeId);
		$this->assign('classid',$classid);

		$this->assign('postTitle',$postTitle);
		$this->assign('location',$location);
		$this->assign('contents',$contents);
		$this->assign('telphone',$telphone);
		$this->assign('createTime',$createTime);
		$this->assign('images',$images);
		$this->assign('contactor',$contactor);
		$this->assign('email',$email);

		$this->assign('shareImage',$shareImage);
		$this->assign('contents_share',$contents_share);
		$this->display('Detailitem');	
	}
	Public function collect(){ 
		//p("nice!");
		$userId = session('userid');
		$red=$_POST['red'];
		$typeId=$_POST['typeid'];
		$id=$_POST['id'];
		$data['userId'] = $userId;
		$data['typeId'] = $typeId;
		$data['postId'] = $id;
		if ($red == 1) {
			$result = M("Collect")->where($data)->delete();
			if ($result)
				$this->ajaxReturn(0,"gray",1); //灰色
			else
				$this->ajaxReturn(0,"grag",0);
		}else{
			$data['createTime'] = date('Y-m-d H:i:s',time());
			$result = M("Collect")->data($data)->add();
			if ($result)
				$this->ajaxReturn(1,"red",1);//红色
			else
				$this->ajaxReturn(0,"gray",0);
		}
	}
	Public function accusation(){ 
		$reason=$_POST['reason'];
		$advice=$_POST['advice'];
		$data['reason']=$reason;
		$data['advice']=$advice;
		$data['userId']=session('userid');
		$data['postId']=$_POST['id'];
		$data['typeId']=$_POST['typeid'];
		$result = M("accusation")->data($data)->add();
		if ($result)
			$this->ajaxReturn($result,"",1);//红色
		else
			$this->ajaxReturn(0,"",0);
	}
	Public function setglobal($k){
		if ($k==0) {
			cookie('think_language','en-us',302400);  
		}else{
			cookie('think_language','zh-cn',302400);  
		}
		$this->ajaxReturn(1,'',1);
	}
}
?>