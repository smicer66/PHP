<?php

class Controller_Login
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay($path=NULL, $style=NULL)
	{
		if($style==NULL)
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
		else
		{
			include("features/user/model/login/view/simpleLogin.php");
		}
	}	
	
	function controlFlowProcess()
	{
		if((isset($_REQUEST['forgetPswd'])) && ($_REQUEST['forgetPswd']==1))
		{
			CONTROLLER_PROBLEMS::controlFlowProcess();
		}	
		else
		{
			if((isset($_REQUEST['login'])) && ($_REQUEST['login']==1))
			{
				include("features/user/model/login/view/login_view.php");
			}	
		}
			//include("features/user/model/login/view/login_view.php");
	}
}

?>
