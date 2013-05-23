<?php

class Specialization
{
	function __construct()
	{
	
	}
	
	function getDetails($id=NULL)
	{
		global $mysql;
		if($id==NULL)
		{
			$extraStr="";
		}
		else
		{
			$extraStr=" AND `id` = '".$id."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_specialization` WHERE status = '1'".$extraStr;
		
		$sql= $mysql->query($str);
		return $sql;
	}
	
	function getDetailsFromProjectId($id)
	{
		global $mysql;
		$str="SELECT name FROM `".DEFAULT_DB_TBL_PREFIX."_project_specialization`, `".DEFAULT_DB_TBL_PREFIX."_specialization` WHERE (".DEFAULT_DB_TBL_PREFIX."_project_specialization.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_project_specialization.projectId = '".$id."') AND (".DEFAULT_DB_TBL_PREFIX."_specialization.id = ".DEFAULT_DB_TBL_PREFIX."_project_specialization.specializationId)";
		//echo $str;
		$array=array();
		
		
		$sql= $mysql->query($str);
		while($result=$mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result['name']);
		}
		return $array;
	}
	
	
	function getUserEntryId($uid, $specId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user_specialization` WHERE status = '1' AND `userId` = '".$uid."' AND `specializationId` = '".$specId."'";
		echo $str."<br>";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return $result['id'];
		}
		else
		{
			return NULL;
		}
	}
	
	
	function getTotalCount()
	{
		global $mysql;
		if($id==NULL)
		{
			$extraStr="";
		}
		else
		{
			$extraStr=" AND `id` = '".$id."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_specialization` WHERE status = '1'".$extraStr;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
}
?>