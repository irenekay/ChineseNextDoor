<?php
Class CollectAction extends BaseAction {
	Public function index(){ 
		$userid = session('userid');

		import('ORG.Util.Page');	// 导入分页类
		$count = M("Collect")->where("userId='$userid'")->count();

    	$Page   = new Page($count,8);	// 实例化分页类 传入总记录数
   	 	$show   = $Page->show();	// 分页显示输出
   	 	$post = M("Collect")->where("userId='$userid'")->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($post as $value){
			$id=$value['postId'];
			$typeId=$value['typeId'];
			$postTableName=M('type')->where("typeId='$typeId'")->getField('postTableName');
			$postCont = M($postTableName)->where("id='$id'")->select();

			$postTitle=$postCont[0]['postTitle'];
			$createTime=$postCont[0]['createTime'];
			$imageUrl=$postCont[0]['imageUrl'];
			$contents=$postCont[0]['contents'];
			if($imageUrl=="") $flag=0;  	//无图片
				else $flag=1;					//有图片
			if(strlen($contents)<=100)
				$contents_final=$contents;
			else
				$contents_final=mb_substr($contents,0,50,"UTF-8")."...";
			$time=substr($createTime,0,11);

			$tmp=array("postTitle"=>$postTitle,"pic"=>$flag,
					"contents"=>$contents_final,
					"createTime"=>$time,
					"id"=>$id,
					"typeid"=>$typeId
				);
			$ans[]=$tmp;
		}

    	$this->assign('list',$ans);		// 赋值数据集
    	$this->assign('page',$show);	// 赋值分页输出
		$this->display('Collect');	
	}
	public function delete(){
		$typeid=$this->_param('typeid');
		$id=$this->_param('id');
		$page = $this->_param('page');
		$userid = session('userid');

		$map['userId'] = $userid;
		$map['typeId'] = $typeid;
		$map['postId'] = $id;
		$result = M("Collect")->where($map)->delete();
		if ($result) {
			if (page!="")
				$this->redirect('Collect/index', array('page'=>$page));
			else
				$this->redirect('Collect/index');
		}
	}
	public function checkDel(){
		$typeId = $_POST['typeid'];
		$id = $_POST['id'];
		$postTableName=M('type')->where("typeId ='$typeId'")->getField('postTableName');
		$del = M($postTableName)->where("id ='$id'")->getField('del');
		if ($del == 0)
			$this->ajaxReturn(0,"normal",0);
		else
			$this->ajaxReturn(1,"his post has been deleted",1);
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