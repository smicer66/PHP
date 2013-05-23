<?php


/*if(!defined('CH_PORTAL_ACCESS'))
{
   // die('Direct access to this script is forbidden.');    ///  It must be included from a churchPortal page
}*/

ob_start();
$menu=new Menu();


if((isset($_REQUEST['delNMId'])))
{
	
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `id` = '".$_REQUEST['delNMId']."'";
	$sql=$mysql->query($str);
	$resultTYE = $mysql->fetch_assoc_mine($sql);
	
	if($resultTYE)
	{
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `id` = ".$resultTYE['id']." LIMIT 1";
		echo $str;
		$mysql->query($str);
	}
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	header($url);
}


	
if((isset($_REQUEST['delPMId'])))
{
	
	$menu=new Menu();
	$resultTYE=$menu->getMenuDetails($_REQUEST['delPMId']);
	if($resultTYE)
	{
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `id` = ".$resultTYE['id']." LIMIT 1";
	
		$mysql->query($str);
	}
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	header($url);
}



if($_POST['EditMenu']=='Update')
{
	$url=MENU::editMenuListings();
	header($url);

}

 


if($_POST['Submit']=='Map')
{ 
	$url=MENU::mapMenuToFeature();
	header($url);
}



if(($_POST['CreateMenu']=='Create') || ($_POST['UpdateMenu']=='Update'))
{
	$url=MENU::createNewMenu();
	header($url);		
}



if(($_POST['InsertMenuItems']=='Insert') || ($_POST['UpdateMenuItems']=='Update'))
{

	$url=MENU::insertMenuItems();
	header($url);		
}


if($_POST['EditChildMenu']=='Update')
{
	$url=MENU::updateChildMenu();
	header($url);

}

?>