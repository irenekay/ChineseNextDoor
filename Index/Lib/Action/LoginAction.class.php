<?php
Class LoginAction extends Action {
	public function index(){
		$this->display('Login');
	}
	public function login(){
    if(session('verify') != md5(strtolower($_POST['verify']))) {
      $this->ajaxReturn(1,L('VerifError'),0);
    }
		$user=$_POST['username'];
		$password=md5($_POST['password']);
		$rset = M("User")->where("emailAdress='$user' or username='$user'")->find();
		if(!$rset){
    		$this->ajaxReturn(2,L('userNameError'),0);
   		}else{
   			if($rset['password']==$password){  
          if ($rset['activation'] == 0) {
            $this->ajaxReturn(4,L('activated'),0);
          }else{
            session('email',$rset['emailAdress']);
            session('userid',$rset['userId']);
            session('username',$rset['username']);
            if($_POST['setcookie'] == '1'){
              cookie('username',$rset['username'],302400);
              cookie('email',$rset['emailAdress'],302400);
              cookie('userid',$rset['userId'],302400);
              cookie('passw',$password,302400);
            }
            $this->ajaxReturn(0,L('loginSucess'),1);
            //$this->ajaxReturn(0,$_POST['setcookie'],1);            
          }

   			}else{
   				$this->ajaxReturn(3,L('passwordError'),0);
   			}
		}
	}
  public function verify() {
    //$type = isset($_GET['type'])?$_GET['type']:'gif';
    //Image::GBVerify();
    /*import('ORG.Util.Image');
    Image::buildImageVerify(6,5,png,90,32,'verify');*/
    import('@.ORG.Image');
    Image::buildImageVerify();
  }
  public function getUserInfo(){
    $openid = $_POST['openId'];
    $model = M('User'); 
    $rset = $model->where("openId='$openid' and loginType=1")->find();
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