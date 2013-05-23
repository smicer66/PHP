<?php


/*if(!defined('CH_PORTAL_ACCESS'))
{
   // die('Direct access to this script is forbidden.');    ///  It must be included from a churchPortal page
}*/

ob_start();
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");

include_once("lib/lib.php");
include_once("lib/lib_special.php");
include_once("includes/mysqli.php");
include_once("includes/db.php");
include_once("lib/lib_util.php");
include_once("features/model/features_class.php");
include_once("features/user/model/user_class.php");
include_once("includes/session.inc");
include_once("core/error/error_class.php");
include_once("core/email/email_class.php");
include_once("utilities/util.php");
include_once("core/menus/model/menu_class.php");
$menu=new Menu();


if((isset($_REQUEST['delId1'])))
{

	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `id` = '".$_REQUEST['delId1']."'";
	$sql=$mysql->query($str);
	$resultTYE = $mysql->fetch_assoc_mine($sql);
	
	if($resultTYE)
	{
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `id` = ".$resultTYE['id']." LIMIT 1";
		echo $str;
		$mysql->query($str);
	}
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	//header($url);
}


	
if((isset($_REQUEST['delId'])))
{

	$menu=new Menu();
	$resultTYE=$menu->getMenuDetails($_REQUEST['delId']);
	if($resultTYE)
	{
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `id` = ".$resultTYE['id']." LIMIT 1";
		echo $str;
		$mysql->query($str);
	}
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	header($url);
}



if($_POST['Edit']=='Update')
{
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu`";
	echo $query;
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
		$sqlX= $mysql->query($entryString, 1);
	}
	$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
	header($url);

}

 


if($_POST['Submit']=='Map')
{
	//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/feature_class.php");
	$section=$_POST['section'];
	$sectionChild=$_POST['sectionChild'];
	
	$feat=new Feature();
	$user=new User();
	$userDet=$user->getUserDetails($_SESSION['uid']);
	
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	//if(($_POST['feature']=='NULL') || (($_POST['preview']==NULL) && ($feat->getName($_POST['feature'])!='Frontpage')))
	if(($_POST['feature']=='NULL'))
	{
		$str="Ebonyi,Abakaliki,Edo,Benin City,Ekiti,Ado-Ekiti,Enugu,Federal Capital Territory,Abuja,Gombe,Gombe,Imo,Owerri,Jigawa,Dutse,Kaduna,Kaduna,Kano,Kano,Katsina,Katsina,,Kebbi,Birnin Kebbi,Kogi,Lokoja,Kwara,Ilorin,Lagos,Ikeja,Nasarawa,Lafia,Niger,Minna,Ogun,Abeokuta,Ondo,Akure,Osun,Oshogbo,Oyo,Ibadan,Plateau,Jos,Rivers,Port Harcourt,Sokoto,Sokoto, Taraba,Jalingo,Yobe,Damaturu,Zamfara,Gusau";
		$array=explode(',',$str);
		$countr=0;
		while($countr<sizeof($array))
		{
			
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_states` (`id` ,`countryId`,`name`,`status`)VALUES ('' , 'NG', '".$array[$countr++]."','1')";
			$sql=$mysql->query($entryString);
		}
		
		
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj012');
	}
	else
	{
		
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
				echo $position;
				$menuFeatDet=$menu->getMenuFeatureDetails($_POST['feature'],$_POST['preview'], $result['id'],$section,$sectionChild);
				if($menuFeatDet)
				{
					$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_feature_menus` SET `position` = '".$position."',`featureChildId` = '".$_POST['preview']."' WHERE `id` = '".$menuFeatDet['id']."' LIMIT 1";
					$sql1= $mysql->query($entryString, 1);
				}
				else
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId`,`featureChildId` ,`menuId` ,`position` ,`section`,`sectionId`,`status`)VALUES ('' , '".$_POST['feature']."', '".$_POST['preview']."', '".$result['id']."', '".$position."', '".$section."', '".$sectionChild."', '1')";
					$sql1= $mysql->query($entryString);
				}
				
			}
			$position=null;
		
			
			
			
		}	
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj011');
	}
	
	//echo $url;
	header($url);
}



if(($_POST['Create']=='Create') || ($_POST['Update']=='Update'))
{

	//check image types first before uploadingf o!
	$headerName=setDataDB($_POST['menuName']);
	$parentId=$_POST['menuParent'];
	$position=$_POST['menuPosition'];
	$type=$_POST['menuType'];
	$section=$_POST['section'];
	$sectionChild=$_POST['sectionChild'];
	
	
	if($_POST['Create']=='Create')
	{
		$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_menu` (`id` ,`uniqueId` ,`name`,`parentId` ,`status`, `type`, `sectionId`, `sectionChildId`)VALUES (NULL , '".uniqid("")."', '".$headerName."','".$parentId."','Activated','".$type."','".$section."','".$sectionChild."')";
		$url='Location: menu_creator.php?errcpj=errcpj101';
		$sql= $mysql->query($entryString);
	}
	if($_POST['Update']=='Update')
	{
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu` SET `name`= '".$headerName."', `parentId` = '".$parentId."',`type` = '".$type."', `sectionId`= '".$section."', `sectionChild` = '".$sectionChild."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
		$url='Location: menu_creator.php?errcpj=errcpj102';
		$sql= $mysql->query($entryString, 1);
	}
			//$sql=$display_announcement->doQuery($entryString);
	
	//echo $entryString;
	
	header($url);		
}



if(($_POST['Insert']=='Insert') || ($_POST['Update1']=='Update'))
{

	//check image types first before uploadingf o!
	$menuItemName=setDataDB($_POST['menuItemName']);
	$menuId=$_POST['menuName'];
	$featureId=$_POST['featureName'];
	$preview=$_POST['preview'];
	$parentId=$_POST['parentMenu'];
	
	if($_POST['Insert']=='Insert')
	{
		$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_menu_items` (`id` ,`menuId` ,`title`,`linkToFeatureId` ,`linkToFeatureChildId` ,`status`, `parentId`)VALUES (NULL , '".$menuId."', '".$menuItemName."','".$featureId."','".$preview."','1',".$parentId.")";
		$sql= $mysql->query($entryString);
		$url='Location: menu_items_inserter.php?errcpj=errcpj101';
		
	}
			//$sql=$display_announcement->doQuery($entryString);
	
	if($_POST['Update1']=='Update')
	{
		
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_menu_items` SET `menuId`= '".$menuId."', `title` = '".$menuItemName."',`linkToFeatureId` = '".$featureId."', `linkToFeatureChildId`= '".$preview."', `parentId` = ".$parentId." WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
		$url='Location: menu_creator.php?errcpj=errcpj102';
		$sql= $mysql->query($entryString, 1);
	}
	//echo $entryString;
	
	header($url);		
}


if($_POST['Edit1']=='Update')
{
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
		$sqlX= $mysql->query($entryString, 1);
	}
	$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
	header($url);

}

?>