<?php
Class RegisterAction extends Action {
	Public function index(){
		$this->display('Register');	
	}
	public function insert(){
  		$username=$_POST['username'];
        if(!empty($username)){
            $list = M('user')->where("username='$username'")->select();
            if(count($list)>0){
                $this->ajaxReturn(0,"This user name has been registered",0);
                return;
            }
        }
        $email=$_POST['emailAdress'];
        if(!empty($email)){
            $list = M('user')->where("emailAdress='$email'")->select();
            if(count($list)>0){
                $this->ajaxReturn(0,"This e-mail has been registered",0);
                return;
            }
        }

        $model = M('User');  

        $data['username'] = $username;
        $data['emailAdress'] = $email;
        $data['password'] = md5($_POST['password']);
        $data['createTime'] = date('Y-m-d H:i:s',time());

        $list = $model->add($data);
        if($list !== false){
            import('@.ORG.Mail');
            $result = SendMail($email,'Activation Your Account From Chinese Next Door','http://www.bilinabroad.com/index.php/Registersucess/index/id/'.$list,'Chinese Next Door');  
            if ($result)
                $this->ajaxReturn(0,L('activationInfo'),1);
            else
                $this->ajaxReturn(0,L('registerFalse'),0);      
        }     
        else
            $this->ajaxReturn(0,L('registerFalse'),0);
	}
    // 检查标题是否可用
    public function checkTitle()
    {
    	$email=$_POST['email'];
        if(!empty($email)){
            $list = M('user')->where("emailAdress='$email'")->select();
            if(count($list)>0){
            	$this->ajaxReturn(0,L('emailRegistered'),0);
            }
            else{
            	$this->ajaxReturn(1,"此邮箱未被注册！",1);
            }
        }
    }
    public function checkUserName()
    {
        $username=$_POST['username'];
        if(!empty($username)){
            $list = M('user')->where("username='$username'")->select();
            if(count($list)>0){
                $this->ajaxReturn(0,L('nameRegistered'),0);
            }
            else{
                $this->ajaxReturn(1,"此邮箱未被注册！",1);
            }
        }
    }

    public function getUserInfo(){
        $openid = trim($_POST['openId']);
        $model = M('User'); 
        $rset = $model->where("openId='$openid'")->find();
        if ($rset) {
          session('userid',$rset['userId']);
          session('username',$rset['username']);
          $this->ajaxReturn(1,"added success",1);
        }else{
          $username = $_POST['nickname'];
          $data['username'] = $username;
          $data['createTime'] = date('Y-m-d H:i:s',time());
          $data['loginType'] = 1;
          $data['activation'] = 1;
          $data['password'] = md5('123456');
          $data['emailAdress']='example@example.com';
          $data['openId'] = $openid;
          $data['accessToken'] = $_POST['accessToken'];
          $list = $model->add($data);      
          if ($list) {
            session('userid',$list);
            session('username',$username);
            $this->ajaxReturn(1,"added success",1);
          }
        }
    }

      public function getWeiboUserInfo(){
        $id = $_POST['id'];
        $model = M('User'); 
        $rset = $model->where("openId='$id' and loginType=2")->find();
        if ($rset) {
          session('userid',$rset['userId']);
          session('username',$rset['username']);
          $this->ajaxReturn(1,"added success",1);
        }else{
          $username = $_POST['nickname'];
          $data['username'] = $username;
          $data['createTime'] = date('Y-m-d H:i:s',time());
          $data['loginType'] = 2;
          $data['activation'] = 1;
          $data['password'] = md5('123456');
          $data['emailAdress']='example@example.com';
          $data['openId'] = $id;
          $list = $model->add($data);      
          if ($list) {
            session('userid',$list);
            session('username',$username);
            $this->ajaxReturn(1,"added success",1);
          }
        }
      }
      
    	// Public function verify(){
    	// 	import('ORG.Util.Image');
    	// 	Image::buildImageVerify(4,5,'png',80,25);
    	// }
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