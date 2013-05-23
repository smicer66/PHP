<?php

//if ($lib->getAccessLevel()!="general_user") {


ob_start();
/*//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/user/user_class.php");*/
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/error/error_class.php");
//$error=new Error();
include_once("../../../lib/lib.php");
include_once("../../../lib/lib_special.php");
include_once("../../../includes/mysqli.php");
include_once("../../../includes/db.php");
include_once("../../../lib/lib_util.php");
include_once("../../../features/feature_class.php");
include_once("../../../component/feature_display/feature_display_class.php");
include_once("../../../features/user/user_class.php");
include_once("../../../includes/session.inc");

global $error;

if($_POST['Submit']=='Login')
{
	include_once("../../../features/user/login/login_class.php");
	
	$login=new Login();
	$loginPara=$login->getLoginParameter();
	$loginPara=setDataDB($_POST[$loginPara]);
	$login->doLogin('md5', $loginPara, setDataDB($_POST['password']));
}


else if(($_POST['Submit']=='Logout') || ($_REQUEST['logout']==1))
{
	include_once("../../../features/user/login/login_class.php");
	$login=new Login();
	$loginPara=$login->doLogout();
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	header($url);
}
else
{
	if(!defined('CH_PORTAL_ACCESS'))
	{
		die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
	}
}
?>
