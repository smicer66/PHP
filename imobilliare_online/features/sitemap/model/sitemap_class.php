<?php


class Sitemap extends Feature
{
	function __construct()
	{
	
	}
	
	function findLink($id, $id2=NULL)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site_map` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			echo "&nbsp;&nbsp;".$result['name']." link ---- index.php?linkToFeatureId=".parent::getId('Articles')."&linkToFeatureChildId=".$id."";
			$checked='';
		}
		
	}
	
	
	function updateSiteMapListing()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_sitemap`";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			
			
					
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_sitemap` SET `status` = '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			//echo $update;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	function createSiteMap()
	{
		global $mysql;
		$siteMapName=setDataDB($_POST['siteMapName'],0);
		$featureName=$_POST['featureName'];
		$error=new Error();
		
	
		
		if((isset($featureName)) && ($featureName!='NULL'))
		{
			$featureNameId=$_POST['preview'];
			if(!isset($featureNameId))
			{
				$featureNameId=0;
			}
		}
	
		if((strlen($featureName)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj062');
		}
		else
		{
		
			global $mysql;
			
			if($_POST['saveSiteMap']=='Submit')
			{
				$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_sitemap` (`id` ,`name`, `featureId` ,`frontpageYes`, `featureChildId` ,`status` )VALUES ('' , '".$siteMapName."', '".$featureName."', '0', '".$featureNameId."', '1')";
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
			}
			if($_POST['UpdateSiteMap']=='Update')
			{
				$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_sitemap` SET `name`= '".$siteMapName."', `featureId` = '".$featureName."',`featureChildId` = '".$featureNameId."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
			}
			//echo $entryString;
			$sql= $mysql->query($entryString);
		}
		
		return $url;
	}
	
	
	
	function displayFeature($id=NULL)
	{
		global $mysql;
		CONTROLLER_SITEMAP::controlFlowProcess();
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site_map` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".getRealDataNoHTML($result['name'])."<br>";
			$checked='';
		}
		
	}
	
	
	
	
	
	function getSiteMapDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site_map` WHERE `id` = '".$id."'";
		$sqlMOD=$mysql->query($queryMOD);
		$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
		return $resultMOD;
	}
	
	
	function displayFPFeature()
	{
		global $mysql;
		CONTROLLER_SITEMAP::controlFrontPageDisplay();
	}
	
}





?>