<?php
Class PostAction extends BaseAction {
	public function index(){
		$typeId=$this->_param('typeid');

        $type=M('type')->where("typeId='$typeId'")->select();
        $classid= $type[0]['classId'];
        $class=M('class')->where("classId='$classid'")->select();
        if(GetLanguageType()==0){
            $classname=$class[0]['class'];
            $typename= $type[0]['type'];            
        }else{
            $classname=$class[0]['class_zh'];
            $typename= $type[0]['type_zh'];       
        }


        $map['typeId'] = $typeId;
        $list = M("Type")->where($map)->select();
        $tableName = $list[0]['postTableName'];
        
        $this->assign('typeId',$typeId);
        $this->assign('tableName',$tableName);
        $this->assign('classname',$classname);
        $this->assign('typename',$typename);
		$this->display('Post');
	}
    public function storeposts(){  
        session_id($_REQUEST["sessionid"]);
        session_start();

        $typeId = $_POST['typeId'];
        $map['typeId'] = $typeId;//session('typeId');
        $list = M("Type")->where($map)->select();
        $tableName = $list[0]['postTableName'];
        $model = M($tableName);  

        $data['postTitle'] = $_POST['title'];
        $data['location'] = $_POST['adredetl'];
        $data['contents'] = $_POST['description'];
        $data['telphone'] = $_POST['telephone'];
        $data['cityId'] = session('cityid');
        $data['typeId'] = $_POST['typeId'];
        $data['createTime'] = date('Y-m-d H:i:s',time());
        $data['userid'] = session('userid');
        $data['ipAddress'] = ip2long($this->getIP());
        $data['email'] = $_POST['email'];
        if ($_POST['imageurl'] != '')
            $data['imageUrl'] = substr($_POST['imageurl'], 0, -1);
        $data['promote'] = $_POST['popularize'];

        $list = $model->add($data);
        if($list){
            $returndata = $typeId.'&'.$list;
            $this->ajaxReturn($returndata,"Posting success",1);
        }
        else
            $this->ajaxReturn(0,"Posting failure",0);
    }
    public function modifyad(){  
        session_id($_REQUEST["sessionid"]);
        session_start();

        $map['typeId'] = $_POST['typeId'];
        $list = M("Type")->where($map)->select();
        $tableName = $list[0]['postTableName'];
        $model = M($tableName);  

        $data['postTitle'] = $_POST['title'];
        $data['location'] = $_POST['adredetl'];
        $data['contents'] = $_POST['description'];
        $data['telphone'] = $_POST['telephone'];
        $data['cityId'] = session('cityid');
        $data['typeId'] = $_POST['typeId'];
        $data['createTime'] = date('Y-m-d H:i:s',time());
        $data['userid'] = session('userid');
        $data['ipAddress'] = ip2long($this->getIP());
        $data['email'] = $_POST['email'];
        if ($_POST['imageurl'] != '')
            $data['imageUrl'] = substr($_POST['imageurl'], 0, -1);
        $data['promote'] = $_POST['popularize'];
        
        $id = $_POST['id'];
        $list = $model->where("id ='$id'")->save($data);
        if($list !== false){
            $returndata = $_POST['typeId'].'&'.$id;
            $this->ajaxReturn($returndata,"Modify success",1);
        }
        else
            $this->ajaxReturn(0,"Modify failure",0);
    }
    
    public function getIP()
    {
        global $ip;
        if (getenv("HTTP_CLIENT_IP"))
        $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
        $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
        $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
    }
    public function uploadify(){

        $verifyToken = md5($_POST['timestamp']);

        if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
                $tableName = $_POST['tableName'];

                import("ORG.Net.UploadFile");
                $name = $this->getNewName();//设置上传图片的规则
                $name = session('userid').'_'.$name;
                $upload = new UploadFile();// 实例化上传类
                
                //$upload->thumb      = true;    //设置需要生成缩略图，仅对图像文件有效
                //$upload->thumbMaxWidth  = '1000,1000';    //设置缩略图最大宽度
                //$upload->thumbMaxHeight = '1000,1000';    //设置缩略图最大高度
                //$upload->thumbPrefix    = session('userid').'_'; //设置缩略图文件前缀
                //$upload->thumbSuffix    = '';    //设置缩略图文件后缀
                //$upload->thumbPath      = '';    
                
                $upload->maxSize  = 3145728 ;//设置上传文件大小
                $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置文件上传类型
                $upload->savePath =  './Public/images/'.$tableName.'/';  
                $upload->saveRule = $name;  //设置上传图片的规则
                //$upload->thumbRemoveOrigin  = true;//删除原图

                if(!$upload->upload()) {// 上传错误提示错误信息
                //return false;
                echo $upload->getErrorMsg();
                //echo $targetPath;
                }else{// 上传成功 获取上传文件信息
                    $info =  $upload->getUploadFileInfo();
                    echo $info[0]["savename"];
                }
        }
    }
    public function delete(){
        if($_POST['name']!=""){
            $info = $_POST['name'];
            $tableName = $_POST['tableName'];
            $id = $_POST['id'];

            $item=M($tableName)->where("id ='$id'")->select();      
            $imageUrl=$item[0]['imageUrl'];         
            $image =  substr($info,strrpos($info,"/")+1);//strrpos("$info","/");
            //echo($image);
            if($imageUrl!=""){
                $res=explode("&",$imageUrl);
                foreach($res as $value){
                    if ($value!=$image) {
                        $changeimage = $changeimage.$value."&";
                    }
                }
            }
            $changeimage = substr($changeimage, 0, -1);
            $data['imageUrl'] = $changeimage;
            M($tableName)->where("id ='$id'")->save($data);

            if(unlink('./'.$info)){
                $this->success("success");
            }
            else
                $this->error("unlink fail");
            }
        else
            $this->error("info is gap");
    }
    public function del(){
        if($_POST['name']!=""){
            $info = $_POST['name'];
            //$a = explode(".",$info);
            //unlink('./'.$a[0].'_t100'.'.'.$a[1]);
            //unlink('./'.$a[0].'_t200'.'.'.$a[1]);
            if(unlink('./'.$info)){
                $this->success("success");
            }
            else
                $this->error("unlink fail");
            }
        else
            $this->error("info is gap");
    }
    //生成一个无重复的文件名
    function getNewName(){
        //年月日时分秒格式的字符串
        $timeNow = date('YmdHis',time());
        //生成一个8位小写字母的随机字符串
        $randKey = '';
        for ($a = 0; $a < 8; $a++) {
            $randKey .= chr(mt_rand(97, 122));
        }
        //组成新文件名
        $newName=$timeNow.$randKey;
        return $newName;
    }

    function modify(){
        $id=$this->_param('id');    
        $typeId=$this->_param('typeId');  

        $type=M('type')->where("typeId='$typeId'")->select();
        $classid= $type[0]['classId'];
        $class=M('class')->where("classId='$classid'")->select();
        $classname=$class[0]['class'];
        $typename= $type[0]['type'];
        $tableName=$type[0]['postTableName'];

        $item=M($tableName)->where("id ='$id'")->select();   //get all infos
        $userid = $item[0]['userid'];
        if ($userid != session('userid'))
            $this->error("You have no right to modify someone else's post");

        $postTitle=$item[0]['postTitle'];
        $location=$item[0]['location'];
        $contents=$item[0]['contents'];
        $telphone=$item[0]['telphone'];       
        $imageUrl=$item[0]['imageUrl'];         
        $email=$item[0]['email'];   
        $popular = $item[0]['promote'];

        $this->assign('typeId',$typeId);
        $this->assign('tableName',$tableName);
        $this->assign('classname',$classname);
        $this->assign('typename',$typename);
        $this->assign('id',$id);

        $this->assign('postTitle',$postTitle);
        $this->assign('location',$location);
        $this->assign('contents',$contents);
        $this->assign('telphone',$telphone);
        $this->assign('imageUrl',$imageUrl);
        $this->assign('email',$email);
        $this->assign('popular',$popular);
        $this->display('Post');
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