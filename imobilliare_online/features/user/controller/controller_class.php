<?php

class Controller_User
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay()
	{
		if(isset($_SESSION['uid']))
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
		//echo 11;
		
		if((isset($_REQUEST['members'])) && ($_REQUEST['members']=='emp'))
		{
			include("features/user/Employer/view/employer_list.php");
		}
		else if((isset($_REQUEST['members'])) && ($_REQUEST['members']=='dev'))
		{
			include("features/user/developer/view/developer_list.php");
		}
		else
		{
			if((isset($_REQUEST['forgetPswd'])) && ($_REQUEST['forgetPswd']==1))
			{
				include("features/user/model/problems/view/problems_view.php");
			}
			else
			{
	
				if((isset($_REQUEST['register'])) && ($_REQUEST['register']==1))
				{
					if(isset($_REQUEST['auth']))
					{
						USER::activateUserAccount($_REQUEST['auth']);
					}
					else
					{
						include("features/user/model/register/view/register_view.php");
					}
				}
				else
				{
					if(isset($_REQUEST['authenticated']))
					{
						include("features/user/view/account_authenticated.php");
					}
					else
					{
						if((isset($_REQUEST['us'])))
						{
							//echo 11;
							$ustype_name=USERTYPE::getUserTypeDetails($_REQUEST['us']);
							if(is_numeric($ustype_name['id'])==1)
							{
								$ustype_controller='CONTROLLER_'.strtoupper(strtolower($ustype_name['name']));
								//echo $ustype_controller;
								$ustype_controller=new $ustype_controller();
								$ustype_controller->controlFlowProcess();
							}
							else
							{
								CONTROLLER_USER::controlFlowProcess();
							}
						}
						else
						{
							if(isset($_REQUEST['complaint']))
							{
								COMPLAINT::displayFeature();
							}
							else
							{
								if((isset($_REQUEST['login'])) && ($_REQUEST['login']==1))
								{
									if(isset($_SESSION['uid']))
									{
										TOOLBOX::displayFeature($_SESSION['uid']);
									}
									else
									{
										include("features/user/model/login/view/login_full_view.php");
									}
								}	
								else
								{
									
									if(isset($_SESSION['uid']))
									{
										TOOLBOX::displayFeature($_SESSION['uid']);
									}
									else
									{
										include("features/user/model/register/view/register_view.php");
									}
								
								}
								
							}
						}
					}
				}
			}
		}
	}
}

?>
