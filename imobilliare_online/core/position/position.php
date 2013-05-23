<?php 

if((isset($_REQUEST['delPositionId'])))
{

	$url=POSITION::deletePosition();
	header($url);
}



if($_POST['CreatePosition']=='Create')
{
	$url=POSITION::createPosition();
	header($url);
	
}


if($_POST['EditPosition']=='Update')
{
	global $mysql;
	$url=POSITION::updatePositionListing();
	header($url);
	
}
?>