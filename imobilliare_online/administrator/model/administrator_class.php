<?php



class Administrator
{

	function __construct()
	{
	
	}
	
	function grantAccess($name,$uri)
	{
		//equality options: equal(=), greater(>), less(<), greater or equal(>=), less or equal(<=)
		global $mysql;
		$userType=new User();
		$uid=$userType->getUserTypeId($_SESSION['uid']);
		$error=new Error();
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_administrator_functions` WHERE `uniqueId` = '".$name."' AND status = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		$uri='Location: ';
		if($result)
		{
			if($result['equality']=='=')
			{
				if($uid==$result['accessLevel'])
				{
					
				}
				else
				{
					$uri= $uri.'?errcpj=errcpj0002';
					header($uri);
				}
			}
			else if($result['equality']=='>')
			{
				if($uid>$result['accessLevel'])
				{
				
				}
				else
				{
					$uri=$uri.'?errcpj=errcpj0002';
					header($uri);
				}
			}
			else if($result['equality']=='<')
			{
				if($uid<$result['accessLevel'])
				{
					
				}
				else
				{
					$uri=$uri.'?errcpj=errcpj0002';
					header($uri);
				}
			}
			else if($result['equality']=='>=')
			{
				if($uid>=$result['accessLevel'])
				{
				
				}
				else
				{	
					$uri=$uri.'?errcpj=errcpj0002';
					
					header($uri);
				}
			}
			else if($result['equality']=='<=')
			{
				if($uid<=$result['accessLevel'])
				{
					
				}
				else
				{
					$uri=$uri.'?errcpj=errcpj0002';
					header($uri);
				}
			}
			else
			{
				$uri= $uri.'?errcpj=errcpj0002';
				header($uri);
			}
		}
		else
		{
			$uri= $uri.'?errcpj=errcpj0002';
			header($uri);
		}
	}
	
	
	
	function tuneAdminFunctions()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_administrator_functions` ORDER by `name` DESC";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
					
			$usertype='usertype'.$result['id'];
			$usertype=$_POST[$usertype];
			$equality='equality'.$result['id'];
			$equality=$_POST[$equality];
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_administrator_functions` SET `status` = '".$status."',`accessLevel`='".$usertype."',`equality` = '".$equality."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			//echo $update."<br />";
		}
		$url='Location: '.$_SERVER['HTTP_REFERER'].'&errcpj=errcpj102';
		return $url;
	}
	
	function insertRightFile($id=NULL)
	{
		global $mysql;
		if($id==NULL)
		{
			include_once("view/home.php");
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_administrator_functions` WHERE `uniqueId` = '".$id."' AND status = '1'";
			
		
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			if($result)
			{
				include_once("view/".strtolower($result['name']).".php");
			}
		}
	}
	
	function getAdminFunctionId($name)
	{
		global $mysql;
		if($name==NULL)
		{
			include_once("index.php");
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_administrator_functions` WHERE `name` = '".$name."' AND status = '1'";
			
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			if($result)
			{
				return $result['uniqueId'];
			}
			else
			{
				return NULL;
			}
		}
	}
	
	
	
	function paginateResults($resultArrayNo, $divisor)
	{

		$pageViews=(floor((($resultArrayNo)/$divisor) + 0.999));

		if($pageViews==0)
		{
			$paging=1;
		}
		else
		{
			for($counter=0;$counter<$pageViews;$counter++)
			{
				$counter1=$counter + 1;
			//	echo $counter1;
				$start=($counter * $divisor);
				if($start!=0)
				{
					$start=$start;
				}
				
				$last=$start + $divisor - 1;
				if($last>$resultArrayNo)
				{
					$last=$resultArrayNo;
				}
				
				if(!$_REQUEST['search_start'])
				{
					$linkChecker=0;
				}
				else
				{
					$linkChecker=round(($_REQUEST['search_start'])/$divisor);
				}
				
				if($linkChecker==$counter)
				{
					$paging=$paging."&nbsp;&nbsp;".$counter1;
				}
				else
				{
					$paging=$paging."&nbsp;&nbsp;<a href='index.php?fid=".$_REQUEST['fid']."&search_start=".$start."&search_last=".$last."&fiid=".$_REQUEST['fiid']."&mod=".$_REQUEST['mod']."'>".$counter1."</a>";
				}
			}
		}
		if($pageViews!=0)
		{
			echo "<span align='right' class='textType2'>Page ".$paging." of ".$pageViews."</span>";
		}
	
	}


}

?>