<?php
class Controller_Project
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL, $parameter1=NULL)
	{
		global $mysql;
		
		if(($parameter1!=NULL) && ($parameter1=='single-instance'))
		{
			include("features/project/view/small_project_listing.php");
		}
		else
		{
			if($style==NULL)
			{
				include("features/project/view/fpView.php");
			}
			else if ($style==1)
			{
				include("features/project/view/project_listing.php");
			}
		}
	}
	
	function controlFlowProcess($parameter1=NULL)
	{
		global $mysql;
		include_once("features/project/model/project_class.php");
		$prop=new Project();
		
		
		if(isset($_REQUEST['list']))
		{
			if((isset($_REQUEST['bt'])) && (is_numeric($_REQUEST['bt'])==1))
			{	
				//include("features/project/view/specialListings.php");
				include_once("features/project/view/project_listing.php");
			}
			else
			{

				include_once("features/project/view/project_listing.php");
			}
		}
		else 
		{
			if((isset($_REQUEST['ex'])) && ($_REQUEST['ex']==1))
			{
				include_once("core/access/unavailable.php");
			}
			else
			{
				if((isset($_REQUEST['fiid'])) && ($prop->getProjectDetails($_REQUEST['fiid']))!=NULL)
				{
					if(!isset($_REQUEST['edit']))
					{
						include_once("features/project/view/full_view.php");
					}
					else
					{
						
						if(((PROJECT::isExpired($_REQUEST['fiid'])==FALSE)) && (PROJECT::finalRestrictAccess($_REQUEST['fiid'])==FALSE))
						{
							
							include_once("features/project/view/createAProject.php");
						}
						else
						{
							
							include_once("core/access/unavailable.php");
						}
					}
					//echo 44;
				}
				else if((isset($_REQUEST['fiid'])) && ($prop->getProjectDetails($_REQUEST['fiid']))==NULL)
				{
					include_once("core/access/unavailable.php");
				}
				else
				{
					if((isset($_REQUEST['viewMe'])))
					{
						include_once("features/project/view/view_me.php");
					}
					else
					{
						include_once("features/project/view/createAProject.php");
					}
				}
			}
		}
	}
	
}
?>