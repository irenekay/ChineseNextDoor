<?php
Class LogoutAction extends Action {
	public function index(){
    session('email',null);
    session('userid',null);
    session('username',null);
    cookie('email',null);
    cookie('userid',null);
    cookie('username',null);
    cookie('passw',null);
    cookie('weibojs_1699908978',null);
	$targetUrl = $this->_param('next');
    redirect($targetUrl, 0);
	}
}
?>