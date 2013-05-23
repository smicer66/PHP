<?php


//1,2,3,4,5,6,7
class Mylisting extends Feature
{
	function __construct()
	{
	
	}
	
	function displayFeature($id=NULL)
	{
		global $mysql;
		//echo 22;
		CONTROLLER_MYLISTING::controlFlowProcess($id);
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		echo "No Preview for this function";
		
	}
	
	
	function deleteFromMyListing($propId, $srcId)
	{
		global $mysql;
		$error=new Error();
		
		$propInMyListing=MYLISTING::isProjectInMyListing($propId, $srcId);
		
		if($propInMyListing==FALSE)
		{
			//FALSE implies no listing before. so insert
			$result=PROJECT::$propId;
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_my_listing` (`id` ,`srcId` ,`projectId` ,`status`,`dateAdded`)VALUES ('' , '".$srcId."','".$projectId."', '1', CURRENT_TIMESTAMP)";
			$sql=$mysql->query($str);
		}
		else
		{
			
		}
		
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
		
		return $url;
	}
	
	
	
	function displayMyListingBar($uid)
	{
		global $mysql;
		$queryMOD="SELECT *  FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing` WHERE `srcId` = '".$uid."'";
		$sqlMOD=$mysql->query($queryMOD);
		if($mysql->num_rows > 0)
		{
			
			return $mysql->num_rows;
			
		}
		else
		{
			return 0;
		}
	}
	
		
		
	function addToMyListing($id, $uid)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing` WHERE `projectId` = '".$id."' AND `srcId` = '".$uid."'";
		$sqlMOD=$mysql->query($queryMOD);
		
		if($mysql->num_rows > 0)
		{
			$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2041');
			
		}
		else
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_my_listing` (`id` ,`srcId` ,`projectId` ,`status`,`dateAdded`)VALUES ('' , '".$uid."','".$id."', '1', CURRENT_TIMESTAMP)";
			//echo $entryString;
			$sql=$mysql->query($entryString);
			$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2040');
		}
		return $url;
		
	}
	
	
	function findLink($id, $id2=NULL)
	{
		
		
	}
	
	
	
	
	
	function getMyListingDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing` WHERE `id` = '".$id."'";
		$sqlMOD=$mysql->query($queryMOD);
		
		if($mysql->num_rows > 0)
		{
			$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
			return $resultMOD;
		}
		else
		{
			return NULL;
		}
	}
	
	function fullPreview($id)
	{
		echo "Not available";
	}
	
	function displayFPFeature($id=NULL, $frontPageTitle=NULL)
	{
		global $mysql;
		CONTROLLER_MYLISTING::controlFrontPageDisplay();
		
	}
	
	
	
	function isProjectInMyListing($propId, $srcId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing` WHERE `srcId` = '".$srcId."' AND `projectId` = '".$propId."'";
		$sql=$mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	
	
	
	
}

?>