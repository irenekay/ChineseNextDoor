<?php
Class VipAction extends BaseAction {
	Public function index(){ 
		$source=$this->_param('source');
		$userid = session('userid');

		import('ORG.Util.Page');	// 导入分页类
		$model = new Model();
		if ($source == 'verify_post')
			$sqls = "CALL pr_getpostcount('$userid',0);";
		else
			$sqls = "CALL pr_getpostcount('$userid',1);";
		$count = count($model->query($sqls));

    	$Page   = new Page($count,8);	// 实例化分页类 传入总记录数
   	 	$show   = $Page->show();	// 分页显示输出
   	 	if ($source == 'verify_post')
   	 		$sql = "CALL pr_getpost($userid,$Page->firstRow,$Page->listRows,0);";
   	 	else
   	 		$sql = "CALL pr_getpost($userid,$Page->firstRow,$Page->listRows,1);";
   	 	$post = $model->query($sql);
		foreach($post as $value){
			$postTitle=$value['postTitle'];
			$createTime=$value['createTime'];
			$imageUrl=$value['imageUrl'];
			$contents_t=$value['contents'];
			$contents = strip_tags($contents_t, ""); 
			$id=$value['id'];
			$typeId=$value['typeId'];
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
    	$this->assign('source',$source);
		$this->display('Vip');	
	}
	public function delete(){
		$typeid=$this->_param('typeid');
		$id=$this->_param('id');
		$page = $this->_param('page');
		$postTableName = M('type')->where("typeId ='$typeid' ")->getField('postTableName');
		$mod = M("$postTableName");
		$map['id'] = $id;
		$data['del'] = 1;
		$mod->where($map)->save($data);
		if (page!="")
			$this->redirect('Vip/index', array('page'=>$page));
		else
			$this->redirect('Vip/index');
    	/*if($result){
    		 $this->success('新增成功', $targetUrl);	
		} else {
    		$this->error('新增失败');
		}*/
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