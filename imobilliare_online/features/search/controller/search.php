<?php


$error=new Error();


if($_POST['Submit']=='Save')
{
	$search=new Search();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		$position='position'.$result['id'];
		$position=$_POST[$position];
		if($position!='NULL')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId` ,`menuId` ,`position` ,`section`,`sectionId`,`status`)VALUES ('' , '".$search->getId('Search')."', '".$result['id']."', '".$position."', '".$section."', '".$sectionId."', '1')";
			$sql1= $mysql->query($entryString);
		}
	}	
	
	
	$url='Location: menu_mapper.php?install=112Success';
	header($url);
}



if($_POST['SEARCH']=='Search')
{

	$searchText=$mysql->real_escape_string(strip_tags(escapeshellcmd($_POST['searchText'])));
	
//	$search->setVar(10);
	$_SESSION['search_start']=0;
	$_SESSION['search_last']=SEARCH_PAGING;
	$search=new Search();
	$_SESSION['searchResults']=$search->doSearch($searchText);
	//$_SESSION['searchResults']=array(1,2,2,3,4,5,5,6,6,7,8,0,102,012,32,23,32,23);
	$url='Location: index.php?fid='.FEATURE::getId('search').'&search';
	//echo $url;
	header($url);

}
//echo $_SESSION['search_last'];
/*for($count=0;$count<sizeof($_SESSION['searchResults']);$count++)
{
	echo $_SESSION['searchResults'][$count]."<br><br>";
}*/

if($_POST['SubmitSearchModifier']=='Apply')
{
	$url=SEARCH::setSearchableFeatures();
	header($url);
	
}
?>