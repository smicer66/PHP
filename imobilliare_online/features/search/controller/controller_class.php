<?php

class Controller_Search
{
	
	function __construct()
	{
	}
	
	function controlFrontPageDisplay()
	{
		include_once("features/search/view/frontview.php");
	}	
	
	function controlFlowProcess()
	{
		include_once("features/search/view/search_results.php");
	}
}

?>
