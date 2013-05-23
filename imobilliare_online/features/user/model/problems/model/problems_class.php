<?php



class Problems extends Feature
{
	/*style depics if thhe login form is flat[horizontal] or vertical[default*]*/
	public $status, $style;
	
	function __construct()
	{
	
	}
	
	
	function forgotPassword($email)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `email` = '".$email."' AND `status` = 'Active'";
		$sql= $mysql->query($str);
		$num=$mysql->num_rows;
		$receipientArray=array();
		$siteDet=SITE::getDetails();
		if($num>0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				$newPswd=md5(uniqid(rand(), true));
				$newPswd=substr($newPswd, 5, 6);
				$subject='New Password Generated For You';
				$message='Hi,<br />A New password has been generated for you!<br /><br />Your new login details are:<br />Id: '.$result['username'].'<br />'.'Password: '.$newPswd;
			
				$message .= "<br /><br />Sincerely, <br>";
				$message .= "<b>Imobilliare Management</b>";
				//echo $message;
				//array_push($receipientArray, $result['email']);
				$emailer=new Email();
				$user=new User();
				$emailer->sendMail($result['email'], $subject, $message, $siteDet);
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `password`='".md5(setDataDB($newPswd))."' WHERE `email`='".$email."'";
				$sql1= $mysql->query($update);
			}
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
		
	
	function displayRetrivalForm()
	{
		global $mysql;
		
		$loginForm="<form id='registerForm' name='registerForm' method='post' action='features/user/problems/problems.php'>
		<table width='100%' border='0' cellspacing='5' cellpadding='5'>";
		$loginForm=$loginForm."<tr>
	   	<td colspan='2' class='featureTitle'>Login Problems<br /></td>
		</tr>";
		$loginForm=$loginForm."<tr>
		  <td width='15%'><strong>Your Email:</strong></td>
		  <td width='65%'><input type='text' name='email' /></td>
		</tr>
		<tr>
		  <td colspan='2'><input type='submit' name='Submit' value='Send' /></td>
		</tr></table></form>";
		$loginForm=$loginForm."</table>
		</form>";
		return $loginForm;
	}
	
	
	function displayTextLink()
	{
		if(file_exists("features/user/model/problems/view/problems_link.php"))
		{
			include("features/user/model/problems/view/problems_link.php");
		}
		else 
		{
			if(file_exists("../features/user/model/problems/view/problems_link_admin.php"))
			{
				include("../features/user/model/problems/view/problems_link_admin.php");
			}
		}
		
	}
	
	

}

?>