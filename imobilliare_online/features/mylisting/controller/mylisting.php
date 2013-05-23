<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();

if((isset($_REQUEST['fiid'])) && (isset($_REQUEST['fid'])) && ($_REQUEST['fid']==FEATURE::getId('My Listing')) && (is_numeric($_REQUEST['fid'])==1) && (isset($_REQUEST['add'])))
{
	
	$url=MYLISTING::addToMyListing($_REQUEST['fiid'], $_SESSION['uid']);
	header($url);
}


if($_POST['EditArticles']=='Update')
{
	$url=ARTICLES::updateArticleListings();
	header($url);
}


if($_POST['SubmitArticles']=='Save')
{
	$article=new Articles();
	$arrayPst=array();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		$position='position'.$result['id'];
		$position=setDataDB($_POST[$position]);
		if($position!=NULL)
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId` ,`menuId` ,`position` ,`section`,`sectionId`,`status`)VALUES ('' , '".$article->getId('Articles')."', '".$result['id']."', '".$position."', '".$section."', '".$sectionId."', '1')";
			$sql1= $mysql->query($entryString);
		}
	}	
	
	
	$url='Location: menu_mapper.php?errcpj=errcpj102';
	header($url);
}



if(($_POST['saveArticles']=='Submit') || ($_POST['UpdateArticles']=='Submit'))
{
	$url=ARTICLES::createAnArticle();
	header($url);
}

?>