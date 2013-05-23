<?php
if($_POST['PROJECT']=='Submit My Project')
{
	$regStatus=PROJECT::doCreateProject();
	$url=$regStatus;
	header($url);
}


if($_POST['EditCategory']=='Update')
{
	$regStatus=PROJECT::doUpdateProjectCategoryList();
	$url=$regStatus;
	header($url);
}


if($_POST['PROJECT']=='Save My Project')
{
	$regStatus=PROJECT::doUpdateProject();
	$url=$regStatus;
	//header('Location: '.$url);
}

if($_POST['Project_Add_Images']=='Add Files')
{
	$url=PROJECT::addImages();
	header($url);
}

if($_POST['Project_Listings']=='Update')
{
	$regStatus=PROJECT::updateListings($_REQUEST['search_start']);
	$url=$regStatus;
	header($url);
}


if($_POST['Project_Listings']=='Automatically Set Status')
{
	$regStatus=PROJECT::automaticSet($_REQUEST['search_start']);
	$url=$regStatus;
	header($url);
}

if($_POST['createPropCat']=='Create')
{
	$regStatus=PROJECT::createProjectCategory();
	$url=$regStatus;
	header($url);
}



if($_POST['createPropType']=='Create')
{
	$regStatus=PROJECT::createProjectType();
	$url=$regStatus;
	header($url);
}


if($_POST['EditPropType']=='Update')
{
	$regStatus=PROJECT::updatePropTypeListing();
	$url=$regStatus;
	header($url);
}

if($_POST['Project_Listing']=='Save')
{
	$url=PROJECT::saveListing();
	header($url);
}

if($_POST['Project_Listing']=='Start Listing')
{
	$url=PROJECT::startListing();
	header($url);
}

if($_POST['Project_Listing']=='Update Listing')
{
	$url=PROJECT::updateListing();
	header($url);
}

if($_POST['Add_Images']=='OK')
{
	$url=PROJECT::addImageToListing();
	//header($url);
}


if((isset($_REQUEST['delFid'])) && (strlen($_REQUEST['delFid'])>0))
{
	$url=PROJECT::delListingFile($_REQUEST['delFid']);
	
	header($url);
}
?>