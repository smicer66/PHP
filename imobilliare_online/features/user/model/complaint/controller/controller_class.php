<?php
class Controller_Complaint
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/complaint/view/fpView.php");
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		include("features/user/model/complaint/view/compose_complaint.php");
	}
	
}
?>