<?php


class Feature
{
	public $name, $position, $status, $tableName, $adminTableName, $feature;
	public $entryError=array();
	public $frontPageYes, $positionalLevel, $sectionYes;
	public $access=NULL;
	
	function __construct()
	{
		
	}
	
	function setName($name)
	{
		$this->name=$name;
	}
	
	function setPosition($position)
	{
		$this->position=$position;
	}
	
	function setTableName($tableName)
	{
		$this->tableName=$tableName;
	}
	
	function setAdminTableName($adminTableName)
	{
		$this->adminTableName=$adminTableName;
	}
	
	function setStatus($status)
	{
		$this->status=$status;
	}
	
	function setFeature($feature)
	{
		$this->feature=$feature;
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	
	function tuneFeatures()
	{
		global $mysql;
		$error=new Error();
		$arrayPst=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features`";
		$sql= $mysql->query($str);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$frontPageYes='frontPage'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			$frontPagePosition='position'.$result['id'];
			$frontPagePosition=$_POST[$frontPagePosition];
			//$accessLevel='accessLevel'.$result['id'];
			//$accessLevel=$_POST[$accessLevel];
			$positionalLevel='positionalLevel'.$result['id'];
			$positionalLevel=$_POST[$positionalLevel];
			$status='status'.$result['id'];
			$status=$_POST[$status];
			//$displayMenus='displayMenus'.$result['id'];
			//$displayMenus=$_POST[$displayMenus];
			$fullDisplay='fullDisplay'.$result['id'];
			$fullDisplay=$_POST[$fullDisplay];
			
			$mainViewTemplateId='mainViewTemplateId'.$result['id'];
			$mainViewTemplateId=$_POST[$mainViewTemplateId];
			
			
			
			
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_features` SET `frontPageYes`='".$frontPageYes."',`fpPosition`='".$frontPagePosition."',`status`='".$status."',`position`='".$fullDisplay."',`mainViewTemplateId`='".$mainViewTemplateId."' WHERE `id`='".$result['id']."'";
			//echo $update."<br />";
			$sql1= $mysql->query($update);
		}
		$url= 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	//getter functions
	function getName($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `id` = '".$id."'";
		
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$this->name=$result['name'];
		}
		return $this->name;
	}
	
	function getPosition()
	{
		return $this->position;
	}
	
	function getTableName()
	{
		return $this->tableName;
	}
	
	function getAdminTableName()
	{
		return $this->adminTableName;
	}
	
	function getStatus()
	{
		return $this->status;
	}
	
	function getFeature()
	{
		return $this->feature;
	}
	
	function getId($feature)
	{
		//echo Feature::getId('articles');
		global $mysql;
		$id=null;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `name` = '".$feature."' AND status = 'Activated'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$id=$result['id'];
		}
		return $id;
	}
	
	function getDetails($id)
	{
		//echo Feature::getId('articles');
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `id` = '".$id."' OR `name` = '".$id."' AND status = 'Activated'";
		
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	
	
	function grantAccess($id)
	{
		global $mysql;
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `id` = '".$id."' AND status = 'Activated' LIMIT 0, 1";
		//echo $str;
		$sql_features= $mysql->query($str);
		$result_features = $mysql->fetch_assoc_mine($sql_features);
		
		$user=new User();
		$userTypeId=$user->getUserTypeId($_SESSION['uid']);
		if(($result_features['lowestAccessLevel']<=$userTypeId))
		{
			
			$this->access=TRUE;
		}
		else 
		{
			$this->access=FALSE;
		}
		return $this->access;
	}
	
	
	
	function getAlias($fid)
	{
		global $mysql;
		$str_features="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `id` = '".$fid."' AND `status` = 'Activated' LIMIT 0, 1";
		//echo $str_features;
		$sql= $mysql->query($str_features);
		$result_features = $mysql->fetch_assoc_mine($sql);
		return $result_features['featureAliasId'];
	
	}
	
	
	
	function mView($position, $parameter1=NULL, $featureAliasId=NULL)
	{
		//alias stands for feature related to the main feature
		//check feature_alias table to find alias for a feature
		//if you dont find that alias, return the fiid value
		global $mysql;
		global $error;
		



		if($featureAliasId==1)
		{
			$refId=FEATURE::getAlias($_REQUEST['fid']);
		}
		else
		{
			if(is_numeric($featureAliasId)==1)
			{
				$refId=$featureAliasId;
			}
			else
			{
				if((isset($_REQUEST['fid'])) && (is_numeric($_REQUEST['fid'])==1))
				{
					$refId=$_REQUEST['fid'];
				}
				else
				{
					$refId=FEATURE::getId('Frontpage');
					//echo $refId;
				}
			}
		}
		
		if($refId!=NULL)
		{
			$str_ref= "AND id = ".$refId;
		}
		else
		{
			$str_ref= "AND id = ".FEATURE::getId('Frontpage');
			
		}
		
		$str_features="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `position` = '".$position."' AND `status` = 'Activated' ".$str_ref." LIMIT 0, 1";
		//echo $str_features;
		$sql_features= $mysql->query($str_features);
		
		while($result_features = $mysql->fetch_assoc_mine($sql_features))
		{
			$str=str_replace(" ", "", $result_features['name']);
			$str=ucfirst(strtolower($str));
			
			if($str=='Frontpage')
			{
				
			}
			global $obj;
			$obj=new $str();	
			
			
			
			//$access=$obj->grantAccess($id);
			$access=TRUE;

			if($access==TRUE)
			{
				
				$obj->displayFeature($_REQUEST['fiid'],$parameter1);
			}
			else
			{
				$error->showComponent("ERRCPJ0100",$_SERVER['HTTP_REFERER'],3);
			}
		}
		
	
		
	}
	
	
	
	
	function fView($position,$parameter=NULL, $parameter1=NULL)
	{
		global $mysql;
		$error=new Error();
		
		
		if((isset($position)))
		{
			$refId=$position;
			
		}
		else
		{
			$refId=NULL;
		}
		
		
		if($refId!=NULL)
		{
			$str_ref= "AND `fpPosition` = '".$refId."'";
		}
		else
		{
			$str_ref= NULL;
		}
		$str_features="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' ".$str_ref." LIMIT 0, 1";
		
		$sql_features= $mysql->query($str_features);
		
		if($mysql->num_rows > 0)
		{
			while($result_features = $mysql->fetch_assoc_mine($sql_features))
			{
				$str=str_replace(" ", "", $result_features['name']);
				$str=ucfirst(strtolower($str));
				//echo $str;
				/*if($str=='Frontpage')
				{
					$error->showComponent("ERRCPJ0100",$_SERVER['HTTP_REFERER'],3);
				}
				else
				{*/
					global $obj;
					$obj=new $str();
					//echo $parameter;
					$obj->displayFPFeature($parameter, $parameter1);
				//}
				
			}
		}
		else
		{
		//	$error->showComponent("ERRCPJ0100",$_SERVER['HTTP_REFERER'],3);
		}	
	
		
	}
	
	
}

?>