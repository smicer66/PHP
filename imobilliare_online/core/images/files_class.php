<?php
class Files
{

	function __construct()
	{
	
	
	}
	
	
	function getFile($id=NULL, $sourceId=NULL, $receipientId=NULL, $segment=NULL, $projectId=NULL)
	{
	
		global $mysql;
		$str='';
		$array_super=array();
		
		if($id!=NULL){				$str=$str." AND id=".$id;	}
		if($sourceId!=NULL){		$str=$str." AND source_id=".$sourceId;	}
		if($receipientId!=NULL){	$str=$str." AND receipient_id=".$receipientId;	}
		if($segment!=NULL){			$str=$str." AND segment = '".$segment."'";	}
		if($projectId!=NULL){		$str=$str." AND project_id = ".$projectId;	}
		
		
		$stmt="select * from `".DEFAULT_DB_TBL_PREFIX."_files` WHERE status = 'Valid'".$str;
		
		$query = $mysql->query($stmt);
		while($result=$mysql->fetch_assoc_mine($query))
		{
			array_push($array_super, $result);
		}
		
		return $array_super;
	}



}


?>