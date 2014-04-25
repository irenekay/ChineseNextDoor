<?php
Class FindpasswordAction extends Action {
	public function index(){
		$this->display('FindPassword');
	}
  public function find(){
    $user=$_POST['username'];
    $email=$_POST['email'];
    $rset = M("User")->where("emailAdress='$email' and username='$user'")->find();
    if(!$rset){
        $this->ajaxReturn(2,L('userNameError'),0);
      }else{
        $newpswd = '';
        for ($a = 0; $a < 6; $a++) {
            $newpswd .= chr(mt_rand(97, 122));
        }
        $data['password'] = md5($newpswd);
        $list = M('user')->where("emailAdress='$email' and username='$user'")->data($data)->save();
        if(count($list)>0){
          import('@.ORG.Mail');
          $result = SendMail($email,'Find Your Password From Chinese Next Door','Your new password is '.$newpswd,'Chinese Next Door');  
          if ($result)
            $this->ajaxReturn(0,L('sendSucess'),1);   
          else
            $this->ajaxReturn(0,L('findFalse'),0);
        }
        else
          $this->ajaxReturn(0,L('findFalse'),0);
    }
  }
}
?>