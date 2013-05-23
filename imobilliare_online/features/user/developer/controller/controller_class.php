<?php

class Controller_Developer
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay()
	{
		include("features/user/developer/view/frontpage.php");
	}	
	
	function controlFlowProcess()
	{
		if(isset($_REQUEST['developer']))
		{
			include("features/user/Developer/view/welcome.php");
		}
		else
		{
			if((isset($_REQUEST['list'])) && ($_REQUEST['list']==1))
			{
				
				include("features/user/developer/view/agency_list.php");
			}
			else
			{
				if((isset($_REQUEST['vacct'])) && ($_REQUEST['vacct']==1))
				{
					include("features/user/model/profile/view/account_view_rps.php");
				}
				else
				{		
					if(!isset($_REQUEST['authenticated']))
					{	
						//if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Administrator'))
						if(!isset($_SESSION['uid']))
						{
							if((isset($_REQUEST['step'])) && ($_REQUEST['step']==2) && (USER::isUserExist($_REQUEST['uiq'])==TRUE))
							{
								include("features/user/developer/view/register_view_step2.php");
							}
							else
							{
								include("features/user/developer/view/register_view.php");
							}
						}
						else
						{
							if(USERTYPE::getUserTypeId('Developer') && USER::getUserTypeId($_SESSION['uid']))
							{							
								if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1) && (isset($_SESSION['uid'])))
								{
									if((isset($_REQUEST['step'])) && ($_REQUEST['step']==2))
									{
										include("features/user/developer/view/edit_specialization.php");
									}
									else
									{
										include("features/user/developer/view/edit_view.php");
										
									}
								}
								else
								{
									header("Location: index.php");
								}
							}
							else
							{
								header("Location: index.php");
							}
						}
					}
					else
					{
						USER::activateUserAccount($_REQUEST['auth']);
					}
				}
			}
		}	
		
		
		/*if(!isset($_REQUEST['authenticated']))
		{	
			if(!isset($_SESSION['uid']))
			{
				include("features/user/rps/view/register_view.php");
			}
			else
			{
				include("features/user/model/login/view/logout_view_warning.php");
			}
		}
		/*else
		{
			USER::activateUserAccount($_REQUEST['auth']);
		}*/
		
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
