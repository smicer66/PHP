<?php
class Controller_Notification
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/notification/view/fpView.php");
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;

		include("features/notification/view/mView.php");
		
	}
	
}
?>