<?php
Class AboutAction extends Action {
	public function index(){
    $act=$this->_param('act');
    $this->assign('act',$act);
		$this->display('About');
	}
}
?>