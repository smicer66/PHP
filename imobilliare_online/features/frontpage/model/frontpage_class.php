<?php

class Frontpage
{
	function __construct()
	{
	
	}
	
	
	function displayFPFeature($position=null, $parameter2=null)
	{
		//echo 12;	
		include_once("features/frontpage/controller/controller_class.php");
		CONTROLLER_FRONTPAGE::controlFrontPageDisplay();
	}


	function invitePeople($array, $name)
	{
		global $mysql;
		$yes=0;
		for($count=0;$count<sizeof($array);$count++)
		{
			if ((filter_var($array[$count], FILTER_VALIDATE_EMAIL)==FALSE))
			{
			}
			else
			{
				$yes=1;
				$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_invite` (`id` ,`invite_email` ,`invitee_name` ,`status` ) VALUES(NULL, '".$array[$count]."','".$name."', '1')";
				echo $entryString;
				$sql= $mysql->query($entryString);
								
				$siteDet=SITE::getDetails();
				$subject=$name.' invites you to join Imobilliare.com';
				$message='Hello, <br /><br />'.$name.' has invited you to join Imobilliare.com. Imobilliare is the only place where you can find the best web designers, programmers, and other skilled workers who are ready to provide freelance services. <br /><br />
You can register on Imobiliare.com as Developer if you want to provide skilled services or you can register on Imobilliare.com as an Employer if you want to some service or product to be developed for you. <br /><br />
The Imobilliare service can be found at <a href="http://www.imobilliare.com">imobilliare.com</a><br /><br />
				
				Note: This is an autogenerated message. Please do not reply this mail.<br><br>
				Sincerely, <br>'.$siteDet['churchName'].' Management';
				
				
				$emailer=new Email();
				echo $message;
				$user=new User();
				//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
				//echo 10;	
				//include ("../../../features/user/user_class.php");
				$emailer->sendMail($array[$count], $subject, $message, $siteDet);
								
			
				
			}
			
		}
		
		$error=new Error();
		if($yes==1)
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19020');
		}
		else
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1003');
		}
		return $url;
	}
	
	
	function displayFeature($resultArray=NULL)
	{
		include("../controller/controller_class.php");
		CONTROLLER_FRONTPAGE::controlFlowProcess();
	}
	
}
?>