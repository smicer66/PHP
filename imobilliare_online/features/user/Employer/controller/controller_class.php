<?php

class Controller_Employer
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay()
	{
		include("features/user/Employer/view/frontpage.php");
	}	
	
	
	//agency flow process
	function controlFlowProcess()
	{
		global $mysql;
		if(isset($_REQUEST['employer']))
		{
			include("features/user/Employer/view/welcome.php");
		}
		else
		{
			if((isset($_REQUEST['list'])) && ($_REQUEST['list']==1))
			{
				
				include("features/user/Employer/view/agency_list.php");
			}
			else
			{
				
				if((isset($_REQUEST['vacct'])) && ($_REQUEST['vacct']==1))
				{
					include("features/user/model/profile/view/account_view.php");
				}
				else
				{		
						
					if(!isset($_SESSION['uid']))
					{
						include("features/user/Employer/view/register_view.php");
					}
					else
					{
						if(USERTYPE::getUserTypeId('Employer') && USER::getUserTypeId($_SESSION['uid']))
						{
							if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_SESSION['uid'])))
							{
								include("features/user/Employer/view/edit_view.php");
							}
							else
							{
								include("features/user/model/login/view/logout_view_warning.php");
								
							}
						}
						else
						{
							header("Location: index.php");
						}
					}
					
				}
				
			}
		}
		/*else
		{
			if(isset($_REQUEST['authenticated']))
			{	
				include("features/user/agent/view/account_authenticated.php");
			}
		}*/
	}
}

?>
