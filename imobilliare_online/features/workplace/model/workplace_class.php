<?php

class Workplace
{
	function __construct()
	{
	
	}
	
	
	function displayFPFeature($position=null, $parameter2=null)
	{
		//echo 12;	
		//include_once("features/workplace/controller/controller_class.php");
		CONTROLLER_WORKPLACE::controlFrontPageDisplay();
	}


	
	function displayFeature($resultArray=NULL)
	{
		//include("../controller/controller_class.php");
		CONTROLLER_WORKPLACE::controlFlowProcess();
	}
	
}
?>