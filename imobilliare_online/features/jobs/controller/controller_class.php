<?php

class Controller_Jobs
{

	function __construct()
	{
	
	}
	
	function controlFrontPageDisplay($style)
	{
		global $mysql;
		
		//global $style;
		//echo $style;
		//$style=horizontal, vertical
		if(isset($_REQUEST['redirect']))
		{
			global $mysql;
			$advertDetails=JOBS::getAdvertDetails($_REQUEST['fiid']);
			if($advertDetails['url']==NULL)
			{
				$url='Location: ?fid='.$advertDetails['linkToFeatureId'].'&fiid='.$advertDetails['linkToFeatureChildId'];
				header($url);
			}
			else
			{
				$url='Location: '.$advertDetails['url'];
				header ($url);
			}
		}
		else
		{
			include("features/jobs/view/fpView.php");
		}
	}
	
	
}
?>