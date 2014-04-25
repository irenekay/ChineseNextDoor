<?php
Class SpecificAction extends BaseAction {
	Public function index(){
		$typeid=$this->_param('typeid');  	//获取URL参数
		$image=$this->_param('image');
		$cityid=session('cityid');
 
		$type=M('type')->where("typeId='$typeid'")->select();
		$classid= $type[0]['classId'];
		$class=M('class')->where("classId='$classid'")->select();
		if(GetLanguageType()==0){
			$classname=$class[0]['class'];
			$typename= $type[0]['type'];			
		}else{
			$classname=$class[0]['class_zh'];
			$typename= $type[0]['type_zh'];
		}

		$postTableName=$type[0]['postTableName'];

		import('ORG.Util.Page');	// 导入分页类
		$map['typeId'] = $typeid;
		$map['cityId'] = $cityid;
		$map['verify'] = 1;
		$map['del'] = 0;
		if ($image == 1) {
			$map['imageUrl'] = array('neq',"");
		}
		$count  = M($postTableName)->where($map)->count();	// 查询满足要求的总记录数 $map表示查询条件

    	$Page   = new Page($count,13);	// 实例化分页类 传入总记录数
   	 	$show   = $Page->show();	// 分页显示输出
		$post = M($postTableName)->where($map)->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();
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
			if(strlen($contents)<=80)
				$contents_final=$contents;
			else
				$contents_final=mb_substr($contents,0,45,"UTF-8")."...";
			$time=substr($createTime,0,11);

			$tmp=array("postTitle"=>$postTitle,"pic"=>$flag,
					"contents"=>$contents_final,
					"createTime"=>$time,
					"id"=>$id,
					"typeid"=>$typeId
				);
			$ans[]=$tmp;
		}

		//帖子推广模块
		$maps['typeId'] = $typeid;
		$maps['cityId'] = $cityid;
		$maps['verify'] = 1;
		$maps['del'] = 0;
		$maps['promote'] = 1;
		$promotepost = M($postTableName)->where($maps)->order('createTime desc')->limit(10)->select();
		foreach($promotepost as $value){
			$promotTitle=$value['postTitle'];
			$promotlocation=$value['location'];
			$promotId=$value['id'];
			$promoTypeId=$value['typeId'];
			if(strlen($promotTitle)<=10)
				$title_final=$promotTitle;
			else
				$title_final=mb_substr($promotTitle,0,10,"UTF-8")."...";
			if(strlen($promotlocation)>10)
				$promotlocation=mb_substr($promotlocation,0,20,"UTF-8")."...";
			$temp=array("promotetitle"=>$title_final,
					"promotlocation"=>$promotlocation,
					"promotid"=>$promotId,
					"promotypeid"=>$promoTypeId
				);
			$promotans[]=$temp;
		}

		$this->assign('promotlist',$promotans);	

		$this->assign('typeid',$typeid);
		$this->assign('classid',$classid);
    	$this->assign('list',$ans);		// 赋值数据集
    	$this->assign('page',$show);	// 赋值分页输出
		$this->assign('typename',$typename);
		$this->assign('classname',$classname);
		$this->assign('image',$image);
		$this->display('Specific');	
	}

	Public function group(){
		$classid=$this->_param('classid');  //获取URL参数
		$image=$this->_param('image');
		$cityid=session('cityid');
		$class=M('class')->where("classId='$classid'")->select();
		if(GetLanguageType()==0)
			$classname=$class[0]['class'];
		else
			$classname=$class[0]['class_zh'];
		$postTableName=M('type')->where("classId='$classid'")->getField('postTableName');

		import('ORG.Util.Page');	// 导入分页类
		$map['cityId'] = $cityid;
		$map['verify'] = 1;
		$map['del'] = 0;
		if ($image == 1) {
			$map['imageUrl'] = array('neq',"");
		}
		$count  = M($postTableName)->where($map)->count();	// 查询满足要求的总记录数 $map表示查询条件
    	$Page   = new Page($count,13);	// 实例化分页类 传入总记录数
   	 	$show   = $Page->show();	// 分页显示输出
		$post = M($postTableName)->where($map)->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

		foreach($post as $value){
			$postTitle=$value['postTitle'];
			$createTime=$value['createTime'];
			$imageUrl=$value['imageUrl'];
			$contents_t=$value['contents'];
			$contents = strip_tags($contents_t, ""); 
			$id=$value['id'];
			$typeId=$value['typeId'];
			if($imageUrl=="") 
				$flag=0;  	//无图片
			else 
				$flag=1;	//有图片
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

		//帖子推广模块
		$maps['cityId'] = $cityid;
		$maps['verify'] = 1;
		$maps['del'] = 0;
		$maps['promote'] = 1;
		$promotepost = M($postTableName)->where($maps)->order('createTime desc')->limit(10)->select();
		foreach($promotepost as $value){
			$promotTitle=$value['postTitle'];
			$promotlocation=$value['location'];
			$promotId=$value['id'];
			$promoTypeId=$value['typeId'];
			if(strlen($promotTitle)<=10)
				$title_final=$promotTitle;
			else
				$title_final=mb_substr($promotTitle,0,10,"UTF-8")."...";
			if(strlen($promotlocation)>10)
				$promotlocation=mb_substr($promotlocation,0,20,"UTF-8")."...";
			$temp=array("promotetitle"=>$title_final,
					"promotlocation"=>$promotlocation,
					"promotid"=>$promotId,
					"promotypeid"=>$promoTypeId
				);
			$promotans[]=$temp;
		}
		$this->assign('promotlist',$promotans);
	 
    	$this->assign('list',$ans);		// 赋值数据集
    	$this->assign('page',$show);	// 赋值分页输出
		$this->assign('typename',$typename);
		$this->assign('classname',$classname);
		$this->assign('classid',$classid);
		$this->assign('image',$image);
		$this->display('Specific');	
	}

	Public function search(){
		$range=$this->_param('range'); 
		$detail=$this->_param('detail'); 
		$image=$this->_param('image');
		$cityid=session('cityid');
		if ($range != L('all')) {
			if(GetLanguageType()==0){
				$classid = M('class')->where("class='$range'")->getField('classId');
			}else{
				$classid = M('class')->where("class_zh='$range'")->getField('classId');
			}
			$postTableName=M('type')->where("classId='$classid'")->getField('postTableName');

			import('ORG.Util.Page');	// 导入分页类
			$map['cityId'] = $cityid;
			$map['verify'] = 1;
			$map['del'] = 0;
			$map['postTitle'] = array('like',"%$detail%");
			if ($image == 1) {
				$map['imageUrl'] = array('neq',"");
			}
			$count  = M($postTableName)->where($map)->count();	// 查询满足要求的总记录数 $map表示查询条件
	    	$Page   = new Page($count,13);	// 实例化分页类 传入总记录数
	   	 	$show   = $Page->show();	// 分页显示输出
			$post = M($postTableName)->where($map)->order('createTime desc')->limit($Page->firstRow.','.$Page->listRows)->select();

			foreach($post as $value){
				$postTitle=$value['postTitle'];
				$createTime=$value['createTime'];
				$imageUrl=$value['imageUrl'];
				$contents_t=$value['contents'];
				$contents = strip_tags($contents_t, ""); 

				$id=$value['id'];
				$typeId=$value['typeId'];
				if($imageUrl=="") 
					$flag=0;  	//无图片
				else 
					$flag=1;	//有图片
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

			//帖子推广模块
			$maps['cityId'] = $cityid;
			$maps['verify'] = 1;
			$maps['del'] = 0;
			$maps['promote'] = 1;
			$promotepost = M($postTableName)->where($maps)->order('createTime desc')->limit(10)->select();
			foreach($promotepost as $value){
				$promotTitle=$value['postTitle'];
				$promotlocation=$value['location'];
				$promotId=$value['id'];
				$promoTypeId=$value['typeId'];
				if(strlen($promotTitle)<=10)
					$title_final=$promotTitle;
				else
					$title_final=mb_substr($promotTitle,0,10,"UTF-8")."...";
				if(strlen($promotlocation)>10)
					$promotlocation=mb_substr($promotlocation,0,20,"UTF-8")."...";
				$temp=array("promotetitle"=>$title_final,
						"promotlocation"=>$promotlocation,
						"promotid"=>$promotId,
						"promotypeid"=>$promoTypeId
					);
				$promotans[]=$temp;
			}
			
		}
		else{
			import('ORG.Util.Page');	// 导入分页类
			$model = new Model();
			if ($image == 1) 
				$sqls = "CALL pr_searchpostcount('$detail',1,'$cityid');";
			else
				$sqls = "CALL pr_searchpostcount('$detail',0,'$cityid');";
                        $count = count($model->query($sqls));
	    	        $Page   = new Page($count,13);	// 实例化分页类 传入总记录数
	   	 	$show   = $Page->show();	// 分页显示输出
	   	 	if ($image == 1) 
	   	 		$sql = "CALL pr_searchpost('$detail','$Page->firstRow','$Page->listRows',1,'$cityid');";
	   	 	else
	   	 		$sql = "CALL pr_searchpost('$detail','$Page->firstRow','$Page->listRows',0,'$cityid');";
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

			$promotSql = "CALL pr_getpromot('$cityid');";
			$promotepost = $model->query($promotSql);
			foreach($promotepost as $value){
				$promotTitle=$value['postTitle'];
				$promotlocation=$value['location'];
				$promotId=$value['id'];
				$promoTypeId=$value['typeId'];
				if(strlen($promotTitle)<=10)
					$title_final=$promotTitle;
				else
					$title_final=mb_substr($promotTitle,0,10,"UTF-8")."...";
				$temp=array("promotetitle"=>$title_final,
						"promotlocation"=>$promotlocation,
						"promotid"=>$promotId,
						"promotypeid"=>$promoTypeId
					);
				$promotans[]=$temp;
			}
		}

		$this->assign('promotlist',$promotans);
		$this->assign('list',$ans);		// 赋值数据集
    	$this->assign('page',$show);	// 赋值分页输出
		$this->assign('classname',$range);
		$this->assign('classid',$classid);
		$this->assign('detail',$detail);
		$this->assign('image',$image);
		$this->display('Specific');	
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