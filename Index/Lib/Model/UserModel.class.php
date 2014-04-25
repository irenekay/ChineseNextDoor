<?php
class UserModel extends Model {
    protected $_validate = array(
        array('emailAdress','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证username字段是否唯一  
        //array('password','password2','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
    );

    protected $_map = array(
        'username' =>'emailAdress', // 把表单中username映射到数据表的emailAdress字段
    );
}

?>