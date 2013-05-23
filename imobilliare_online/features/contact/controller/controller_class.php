<?php
class Controller_Contact
{
	function __construct()
	{
		
	}
	
	function controlFrontPageDisplay($style=NULL)
	{
		global $mysql;
		
		include("features/contact/view/fpView.php");
		
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		include_once("features/contact/model/contact_class.php");
		$prop=new Project();
		include("features/contact/view/fullView.php");
	}
	
}
?>