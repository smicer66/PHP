<?php
class Controller_Message
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/message/view/fpView.php");
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		include("features/message/view/join_now.php");
	}
	
}
?>