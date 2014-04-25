<?php
Class AccountAction extends BaseAction {
	Public function index(){ 
		$source=$this->_param('source');
		$this->assign('source',$source);
		$this->display('Account');	
	}
	public function checkUserName()
    {
        $username=$_POST['username'];
        if(!empty($username)){
            $list = M('user')->where("username='$username'")->select();
            if(count($list)>0){
                $this->ajaxReturn(0,"This user name has been registered",0);
            }
            else{
                $this->ajaxReturn(1,"此邮箱未被注册！",1);
            }
        }
    }
    Public function modifyUser(){
    	$username=$_POST['username'];
    	$userid = session('userid');
        if(!empty($username)){
        	$data['username'] = $username;
            $list = M('user')->where("userId='$userid'")->data($data)->save();
            if(count($list)>0){
            	session('username',$username);
                if(GetlanguageType()==1)
                    $ss="用户名修改成功";
                else
                    $ss="Username successfully modified";
                $this->ajaxReturn(0,$ss,1);            	
            }
            else{
                if(GetlanguageType()==1)
                    $ss="用户名修改失败";
                else
                    $ss="Username modification fails";
            	$this->ajaxReturn(0,$ss,0);
            }
        }
    }
    public function modifyPassword(){
    	$password = md5($_POST['password']);
    	$userid = session('userid');
		$rset = M("User")->where("userId='$userid' and password='$password'")->find();
		if(!$rset){
            if(GetlanguageType()==1){
                $ss="当前密码输入错误";
            }
            else{
                $ss="Old password is wrong"; 
            }
    		$this->ajaxReturn(2,$ss,0);
   		}else{
        	$data['password'] = md5($_POST['newPassword']);
            $list = M('user')->where("userId='$userid'")->data($data)->save();
            if(GetlanguageType()==1){
                $ss="密码修改成功";  $st="密码修改失败";
            }
            else{
                $ss="Password successfully modified"; $st="Password modification fails";
            }
            if(count($list)>0){
                $this->ajaxReturn(0,$ss,1);            	
            }
            else
            	$this->ajaxReturn(0,$st,0);
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