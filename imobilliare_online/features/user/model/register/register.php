<?php
ob_start();
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/user/user_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/user/register/register_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."lib/lib_util.php");

include_once("../../../lib/lib.php");
include_once("../../../lib/lib_special.php");
include_once("../../../includes/mysqli.php");
include_once("../../../includes/db.php");
include_once("../../../lib/lib_util.php");
include_once("../../../features/feature_class.php");
include_once("../../../component/feature_display/feature_display_class.php");
include_once("../../../features/user/user_class.php");
include_once("../../../includes/session.inc");
include_once("../../../core/error/error_class.php");
include_once("../../../core/site/site_class.php");
include_once("../../../plugins/mailer/class.phpmailer.php");
include_once("../../../component/email/email_class.php");



if($_POST['Submit']=='Register')
{
	//echo 3;
	include_once("../../../features/user/register/register_class.php");
	$register=new Register();
	$regStatus=$register->doRegister("md5");
	//echo $regStatus;
	$url=$regStatus;
	header($url);
}

if($_POST['Submit']=='Modify')
{
	include_once("../../../features/user/register/register_class.php");
	$error=new Error();
	$register=new Register();
	$modStatus=$register->doModify();
	if($modStatus==TRUE)
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj133');
	}
	else
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj134');
	}
	
	header($url);

}


?>
