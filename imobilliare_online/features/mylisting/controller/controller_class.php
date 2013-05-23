<?php
class Controller_Mylisting
{
	function __controller()
	{
	
	}
	
	
	function controlFrontPageDisplay($id=NULL)
	{
		global $mysql;
		include("features/mylisting/view/fpView.php");
		
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		
		include("features/mylisting/view/fullView.php");
	}
}
?>