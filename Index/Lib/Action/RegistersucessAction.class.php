<?php
Class RegistersucessAction extends Action {
	Public function index(){
        $id=$this->_param('id');
        $User = M("User"); 
        $data['activation'] = 1;
        $result = $User->where("userId='$id'")->save($data);
        $re = 0;
        if ($result)
            $re = 1;
        $this->assign('re',$re);
		$this->display('Registersucess');	
	}
}
?>