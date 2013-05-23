<?php

//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/"."component_class.php");

//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/"."db.php");


class Menu
{
	public $type;
	public $menuItems=array();
	public $seperatorYes;
	public $iconYes;
	public $name;
	public $accessLevel;

	
	
	function __construct()
	{
	
	}
	
	
	
	function createNewMenu()
	{
		global $mysql;
		$error=new Error();
		//check image types first before uploadingf o!
		$headerName=setDataDB($_POST['menuName']);
		$parentId=$_POST['menuParent'];
		$position=$_POST['menuPosition'];
		$type=$_POST['menuType'];
		$section=$_POST['section'];
		$sectionChild=$_POST['sectionChild'];
		
		
		if($_POST['CreateMenu']=='Create')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_menu` (`id` ,`uniqueId` ,`name`,`parentId` ,`status`, `type`)VALUES (NULL , '".uniqid("")."', '".$headerName."','".$parentId."','Activated','".$type."')";
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('menu_creator').'&errcpj=errcpj101';
		}
		if($_POST['UpdateMenu']=='Update')
		{
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu` SET `name`= '".$headerName."', `parentId` = '".$parentId."',`type` = '".$type."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('menu_creator').'&errcpj=errcpj102';
		}
		echo $url;
				//$sql=$display_announcement->doQuery($entryString);
		$sql= $mysql->query($entryString);
		echo $entryString;
		return $url;
	}
	
	
	
	
	function updateChildMenu()
	{
		global $mysql;
		$error=new Error();
		if(isset($_REQUEST['pid']))
		{
			$parentId="`parentId` = '".$_REQUEST['pid']."'";
		}
		else
		{
			$parentId="`parentId` IS NULL";
		}	
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `menuId` = '".$_REQUEST['mid']."'  AND ".$parentId;
		$sql=$mysql->query($str);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=escapeshellcmd(strip_tags($_POST[$status]));
			if($status!=1)
			{
				$status=0;
			}
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu_items` SET `status`= '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			//echo $entryString."<br />";
			$sqlX= $mysql->query($entryString);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	
	function mapMenuToFeature()
	{
		global $mysql;
		$error=new Error();
		$menu=new Menu();
		
		
		$feat=new Feature();
		$user=new User();
		$userDet=$user->getUserDetails($_SESSION['uid']);
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
		 	
		$sql=$mysql->query($str);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$position='position'.$result['id'];
			$position=$_POST[$position];
			if($position=='NULL')
			{
				$position=NULL;
			}
			else
			{
				
				$menuFeatDet=$menu->getMenuFeatureDetails($_POST['feature'],$_POST['preview'], $result['id']);
				if($menuFeatDet)
				{
					if(is_numeric($_POST['preview'])==1)
					{
						$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_feature_menus` SET `position` = '".$position."',`featureChildId` = '".$_POST['preview']."' WHERE `id` = '".$menuFeatDet['id']."' LIMIT 1";
					}
					else
					{
						$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_feature_menus` SET `position` = '".$position."' WHERE `id` = '".$menuFeatDet['id']."' LIMIT 1";
					}
					
				}
				else
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId`,`featureChildId` ,`menuId` ,`position` ,`status`)VALUES ('' , '".$_POST['feature']."', '".$_POST['preview']."', '".$result['id']."', '".$position."', '1')";
					
				}
				//echo $entryString."<br />";
				$sql1= $mysql->query($entryString);
			}
			$position=null;
		
			
			
			
		}	
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj011');
		return $url;
		
		//echo $url;
	}
	
	function insertMenuItems()
	{
		global $mysql;
		$error=new Error();
		//check image types first before uploadingf o!
		$menuItemName=setDataDB($_POST['menuItemName']);
		$menuId=$_POST['menuName'];
		$featureId=$_POST['featureName'];
		$preview=$_POST['preview'];
		$parentId=$_POST['parentMenu'];
		
		if($_POST['InsertMenuItems']=='Insert')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_menu_items` (`id` ,`menuId` ,`title`,`linkToFeatureId` ,`linkToFeatureChildId` ,`status`, `parentId`)VALUES (NULL , '".$menuId."', '".$menuItemName."','".$featureId."','".$preview."','1',".$parentId.")";
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('menu_items_inserter').'&errcpj=errcpj101';
		}
				//$sql=$display_announcement->doQuery($entryString);
		
		if($_POST['UpdateMenuItems']=='Update')
		{
			
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu_items` SET `menuId`= '".$menuId."', `title` = '".$menuItemName."',`linkToFeatureId` = '".$featureId."', `linkToFeatureChildId`= '".$preview."', `parentId` = ".$parentId." WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('menu_items_inserter').'&errcpj=errcpj102';
		}
		
		//echo $entryString;
		$sql= $mysql->query($entryString);
		return $url;
	}
	
	
	function editMenuListings()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu`";
		$sql=$mysql->query($query);
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=escapeshellcmd(strip_tags($_POST[$status]));
			if($status!=1)
			{
				$status=0;
			}
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu` SET `status`= '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			echo $entryString;
			$sqlX= $mysql->query($entryString);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	function getMenuDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	
	
	
	
	function getMenuItemDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	function getMenuFeatureDetails($id,$id1='NULL', $menuId)
	{
		global $mysql;
		if($section!='NULL')
		{
			
			if(is_numeric($id1)!=1)
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `featureId` = '".$id."' AND `menuId` = '".$menuId."' LIMIT 0, 1";
			
			}
			else
			{
				$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `featureId` = '".$id."' AND `featureChildId` = '".$id1."' AND `menuId` = '".$menuId."'";
			}
			//echo $str;
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			return $result;
		}
		else
		{
			return null;
		}
		

		
	}
	
	
	function setMenuItems($name)
	{
		global $mysql;	
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_".strtolower($name)."` WHERE `status` = '1' AND name = '".$name."'";
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($this->menuItems,getRealDataNoHTML($result['itemName']));
				$this->accessLevel=$result['accessLevel'];
			}	
		}
		return $this->menuItems;
	}
	
	
	
	function menuItemHasChild($id)
	{
		global $mysql;	
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND `parentId` = '".$id."'";
		$sql=$mysql->query($query);
		if($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	
	function displayComponent($position, $menuBar=NULL)
	{
		global $mysql;	
		$menuArray=array(0);
		$menu='';
		$feature=new Feature();
		
		
		if(isset($_REQUEST['fid']))
		{
			$id=$_REQUEST['fid'];
			if($id==0)
			{
				$id=$feature->getId('Frontpage');
			}
			
			
		}
		else
		{
			$id=$feature->getId('Frontpage');
		}
		
		if(is_numeric($_REQUEST['fiid'])==1)
		{
			$id1=$_REQUEST['fiid'];
		}
		else
		{
			$id1=0;
		}
		
		
		
		
		if(isset($_REQUEST['fid']))
		{
			$id4=$_REQUEST['fid'];
		}
		else
		{
			$id4=$feature->getId('Frontpage');
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `id` = '".$id4."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		$featurename=strtolower(str_replace(" ", "_", $result['name']));
		//echo $featurename;
		if($featurename!='frontpage')
		{
			
			$str2="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$featurename."` WHERE `id` = '".$_REQUEST['fiid']."'";
			//echo $str2;
			$sql2= $mysql->query($str2);
			$result2 = $mysql->fetch_assoc_mine($sql2);
			$extraStr=" AND featureChildId = '".$_REQUEST['fiid']."'";
		}
		else
		{
			$extraStr="";
		}
			
		$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `position` = '".$position."' AND `featureId` = '".$id."'".$extraStr." ORDER by id DESC LIMIT 0, 1";

		$sql1= $mysql->query($query1);
		$extraStr='';
		if($mysql->num_rows == 0)
		{
			$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_feature_menus` WHERE `status` = '1' AND `position` = '".$position."' AND `featureId` = '".$id."'".$extraStr."  ORDER by id DESC LIMIT 0, 1";
			//echo $query1;
			$sql1= $mysql->query($query1);
		}
		
		if($mysql->num_rows > 0)
		{
			while($result1 = $mysql->fetch_assoc_mine($sql1))
			{
				$menuDet=$this->getMenuDetails($result1['menuId']);
				if($menuDet['status']=='Activated')
				{
					$menuName=$menuDet['name'];
					if($menuDet['type']=='Horizontal')
					{
						$horizontalYes=1;
					}
					$menuId=$result1['menuId'];
					
					if($horizontalYes==1)
					{	

						if($menuBar==NULL)
						{
							$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND `menuId` = '".$result1['menuId']."' AND `parentId` IS NULL";
							
							$sql=$mysql->query($query);
							$no_of_items=$mysql->num_rows;
							
							$width=floor(100/$no_of_items);

							
							$menu=$menu."<div class='menuDiv'><ul class='menu' id='menu'>";
							
							while($result = $mysql->fetch_assoc_mine($sql))
							{
								$menu=$menu."<li><a href='index.php?fid=".$result['linkToFeatureId']."&fiid=".$result['linkToFeatureChildId']."".$result['addParameter']."' class='menulink'>".$result['title']."</a>";
								$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND `parentId` = '".$result['id']."'";
								//echo $query;
								$sql2=$mysql->query($query);
								
								if($mysql->num_rows > 0)
								{
									$menu=$menu."<ul>";
									while($result2 = $mysql->fetch_assoc_mine($sql2))
									{
										$menu=$menu."<li><a href='index.php?fid=".$result2['linkToFeatureId']."&fiid=".$result2['linkToFeatureChildId']."".$result2['addParameter']."'>".getRealDataNoHTML($result2['title'])."</a></li>";
										
									}
									$menu=$menu."</ul>";
								}
								$menu=$menu."</li>";
								
							}
							$menu=$menu."</ul></div>";
						}
						else if($menuBar==1)
						{
							
							$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND `menuId` = '".$result1['menuId']."' AND `parentId` IS NULL";
							$sql=$mysql->query($query);
							$countre=$mysql->num_rows;
							$countre1=0;
							while($result = $mysql->fetch_assoc_mine($sql))
							{
								$menu=$menu."<a href='index.php?fid=".$result['linkToFeatureId']."&fiid=".$result['linkToFeatureChildId']."".$result['addParameter']."' class='menulink'>".$result['title']."</a>";
								$countre1++;
								if($countre1<$countre)
								{
									$menu=$menu." | ";
								}
							}
						}
					}
					else
					{
						$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND `menuId` = '".$menuId."' AND `parentId` IS NULL";
						$sql=$mysql->query($query);
						
						
						$menu="<table border='0' width='100%' cellspacing='0' cellpadding='0'>";
						$portlet=new Portlet();
						$menu=$menu.$portlet->displayHeader($menuName,"");
						$menu=$menu."<tr>
						  <td colspan='5' class='portletBorder' >
						<table border='0' width='100%' cellspacing='0' cellpadding='0'>";
						while($result = $mysql->fetch_assoc_mine($sql))
						{
							$menu=$menu."<tr><td class='menuCellType1'>&nbsp;&nbsp;&#8226;&nbsp;&nbsp;&nbsp;&nbsp;<a class='link_type1' href='index.php?linkToFeatureId=".$result['linkToFeatureId']."&linkToFeatureChildId=".$result['linkToFeatureChildId']."".$result['addParameter']."'>".getRealDataNoHTML($result['title'])."</a></td></tr>";				
						}
						$menu=$menu."<tr><td class='cell_seperator' colspan='2'>&nbsp;</td></tr></table>
						</td></tr></table>";
					}
				}
			
			}
		}
		return $menu;
	}
	
	

}
//addressing system=&feat=devotionals&id=90
//$menu=new Menu();
//echo $menu->displayComponent('left');
?>