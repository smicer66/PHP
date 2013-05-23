<?php

class Position 
{

	function __construct()
	{
	
	}
	
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	
	
	function getAvailablePositions()
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position`";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayPosition, getRealDataNoHTML($result['name']));
		}
		return $arrayPosition;
	}
	
	
	
	function updatePositionListing()
	{
		global $mysql;
		$position=new Position();
		$error=new Error();
		
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position`";
		//echo $query;
		$sql=$mysql->query($query);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_position` SET `status`= '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sqlX= $mysql->query($entryString);
			//echo $entryString;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	function deletePosition()
	{
		global $mysql;
		$position=new Position();
		$error=new Error();
		
		
		$resultTYE=$position->getPositionDetails($_REQUEST['delPositionId']);
		if($resultTYE)
		{
			$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_position` WHERE `id` = ".$resultTYE['id']." LIMIT 1";
			echo $str;
			$mysql->query($str);
		}
		$url='Location: '.$_SERVER['HTTP_REFERER'];
		return $url;
	}
	
	
	
	function createPosition()
	{
		global $mysql;
		$position=new Position();
		$error=new Error();
		for($count=1;$count<6;$count++)
		{
			$presentPosition='position'.$count;
			$positionValue=setDataDB($_POST[$presentPosition]);
			if($position->isExists($positionValue))
			{
				$position->setEntryError("Error At Data Entry for Position #".$count);
			}
			else
			{
				if(strlen($positionValue)>0)
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_position` (`id` ,`name` ,`status`)VALUES ('' , '".$positionValue."', '1')";
					//$sql=$display_announcement->doQuery($entryString);
					$sql= $mysql->query($entryString);
				}
			}
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
		return $url;
	}
	
	function isExists($position)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position` WHERE `name` = '".$position."'";
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getPositionDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
}


?>