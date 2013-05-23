<?php
class Controller_Bid
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
		
		//echo 122;
		if($parameter1==NULL)
		{
			if(isset($_REQUEST['viewMe']))
			{
				include_once("features/bid/view/view_me.php");
			}
			else
			{
				if(((PROJECT::isExpired($_REQUEST['fiid'])==FALSE)) && (USERTYPE::getUserTypeId('Developer')==USER::getUserTypeId($_SESSION['uid'])))
				{
					include_once("features/bid/view/placeBid.php");
				}
				else
				{
					include_once("core/access/unavailable.php");
				}
			}
		}
		else
		{
		
			include_once("features/bid/view/full_view.php");
		}
		
	}
	
}
?>