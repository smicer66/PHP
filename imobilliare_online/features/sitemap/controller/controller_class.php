<?php
class Controller_Sitemap
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay()
	{
		global $mysql;
		
		include("features/sitemap/view/frontView.php");
		
	}
	
	function controlFlowProcess($id=NULL)
	{
		
		include_once("features/sitemap/view/fullView.php");
		
	}
	
}
?>