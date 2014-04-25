<?php
$config = array(
	//'配置项'=>'配置值'
	'URL_MODEL'=> 1,
	'URL_HTML_SUFFIX'=> 'html',
	'TMPL_VAR_IDENTIFY' => 'array',
	'VAR_PAGE'=>'page',

	'MAIL_ADDRESS'=>'chinesenextdoor@163.com', // 邮箱地址
	'MAIL_SMTP'=>'smtp.163.com', // 邮箱SMTP服务器
	'MAIL_LOGINNAME'=>'chinesenextdoor@163.com', // 邮箱登录帐号
	'MAIL_PASSWORD'=>'nextdoor', // 邮箱密码
	'MAIL_CHARSET'=>'UTF-8',//编码
	'MAIL_AUTH'=>true,//邮箱认证
	'MAIL_HTML'=>false,//true HTML格式 false TXT格式

	'LANG_AUTO_DETECT'=> true,	//是否自动检测语言
	'LANG_SWITCH_ON'=> true,	//开启语言包功能
	'DEFAULT_LANG'=>'en-us',		//默认语言的文件夹是zh-cn
	'LANG_LIST'=>'en-us,zh-cn'//必须写可允许的语言列表
);
return array_merge(include './Conf/config.php',$config);
?>