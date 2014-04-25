<?php
class UserModel extends Model {
    protected $_validate = array(
    	array('username', 'checkEmailExist', '用户名不存在', 1,'callback', 1),
        array('emailAdress','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证username字段是否唯一  
        //array('password','password2','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
    );
    protected function checkEmailExist($data){
    	$map['emailAdress'] = array('eq',$data);
		$rset = M("User")->where($map)->find();
		if(!$rset)
			return false;
		else
			return true;
    }
}

?>