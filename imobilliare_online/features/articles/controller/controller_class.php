<?php
class Controller_Articles
{
	function __controller()
	{
	
	}
	
	
	function controlFrontPageDisplay($id=NULL)
	{
		global $mysql;
		$featureDetails=FEATURE::getDetails('articles');
		
		if(is_numeric($id)==1)
		{
			$extraStr=" AND id = '".$id."'";
		}
		$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `status` = '1' AND `frontPageYes` = '1'".$extraStr;
			
		$sqlX= $mysql->query($strX);
		$resultX = $mysql->fetch_assoc_mine($sqlX);
			
		
		if($frontPageTitle==NULL)
		{
			$title=getRealDataNoHTML($resultX['name']);
		}
		else
		{
			$title=$frontPageTitle;
		}
		
		include("features/articles/view/fpView.php");
		
	}
	
	function controlFlowProcess($id=NULL)
	{
		global $mysql;
		if($id!=NULL)
		{
			$extraStr=" AND `id` = '".$id."'";
		}
		else
		{
			if(isset($_REQUEST['fiid']))
			{
				$extraStr=" AND `id` = '".$_REQUEST['fiid']."'";
			}
			else
			{
				$extraStr="";
			}
		}
		
			
			
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles` WHERE `status` = '1'".$extraStr;
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		include_once("features/articles/view/fullView.php");
	}
}
?>