<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();
////include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/desk/desk_class.php");




if(($_POST['saveSiteMap']=='Submit') || ($_POST['UpdateSiteMap']=='Update'))
{
	$url=SITEMAP::createSiteMap();
	//header($url);
}


if($_POST['EditSiteMap']=='Update')
{
	$url=SITEMAP::updateSiteMapListing();
	header($url);
}

?>