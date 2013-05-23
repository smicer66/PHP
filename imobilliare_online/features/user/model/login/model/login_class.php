<?php

class Login extends Feature
{
	/*style depics if thhe login form is flat[horizontal] or vertical[default*]*/
	public $username, $password, $email, $status, $style;
	public $id;
	
	function __construct()
	{
	
	}
	
	function setStatus($status)
	{
		$this->status=$status;
	}
	
	function setStyle($style)
	{
		$this->style=$style;
	}
	
	function getStatus()
	{
		return $this->status;
	}
	
	function getStyle()
	{
		return $this->style;
	}
	
	function getLoginParameter()
	{
		global $mysql;
		return "Username";
	}
	
	
	
	function displayLoginForm($path, $style=null)
	{	
		CONTROLLER_LOGIN::controlFrontPageDisplay();
	}
	
	function displaySimpleForm($path, $style=null)
	{	
		CONTROLLER_LOGIN::controlFrontPageDisplay($path, $style);
	}
	
	
	function doLogin($securityOption, $loginParameter, $password)
	{
		global $mysql;
		
		
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `username` = '".$loginParameter."' AND `password` = ".$securityOption."('".$password."') AND status = 'Active'";
		//echo $query;
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
			$status=null;
			$status='loginFailed';
			
			if(file_exists("features/user/model/login/view/logout_view.php"))
			{
				$url='Location: index.php?fid='.parent::getId('User').'&login=1&loginFailed=1&errcpj=errcpj130';
			}
			else
			{
				$url='Location: ../index.php?fid='.parent::getId('User').'&login=1&loginFailed=1&errcpj=errcpj130';
			}
			
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
//				$status=$result['userType'];
				$user=new User($result['id']);
				$_SESSION['sessId'] = session_id();
				$_SESSION['actnpals'] = $result['username'];
				$_SESSION['uid'] = $result['id'];
			}
			
			$sql = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_logger` (sessid,userId,data,logDate) VALUES('".$_SESSION['sessId']."',".$user->id.",'".$mysql->escape_string(serialize($_SESSION))."', CURRENT_TIMESTAMP)";
			$mysql->query($sql);
			//$this->status='loginSuccess';
			//$user = userInfo($_SESSION['UID']);
			$url=str_replace('errcpj=','ercp=','Location: '.$_SERVER['HTTP_REFERER']);
			
		}
		
		//return $this->status;
		
		header($url);
	}
	
	function doLogout()
	{
		global $mysql;
		$sql = "UPDATE `".$dbName."`.`".$prefix."_logger SET status = 0 WHERE userId = '".$user->id."'";
		$mysql->query($sql);
		//$user = null;
		unset($_SESSION['sessId'], $_SESSION['uid'],$_SESSION['actnpals']);
//		$this->status=null;
		return TRUE;
	
	}

}

?>