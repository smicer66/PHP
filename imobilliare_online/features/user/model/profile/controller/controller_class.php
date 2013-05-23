<?php

class Controller_Profile
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay()
	{
		if(isset($_SESSION['sessId']))
		{
			if(file_exists("features/user/model/login/view/logout_view.php"))
			{
				include("features/user/model/login/view/logout_view.php");
			}
			else
			{
				if(file_exists("../features/user/model/login/view/logout_view.php"))
				{
					include("../features/user/model/login/view/logout_view.php");
				}
			}
		}
		else
		{
			if(file_exists("features/user/model/login/view/login_view.php"))
			{
				include("features/user/model/login/view/login_view.php");
			}
			else
			{
				if(file_exists("../features/user/model/login/view/login_view.php"))
				{
					include("../features/user/model/login/view/login_view.php");
				}
			}
		}
	}	
	
	function controlFlowProcess()
	{
		if((isset($_REQUEST['forgetPswd'])) && ($_REQUEST['forgetPswd']==1))
		{
			include("features/user/model/profile/view/account_view.php");
		}
			
		//	
	}
}

?>
