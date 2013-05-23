<?php
//if ($lib->getAccessLevel()!="general_user") {
ob_start();


$error=new Error();


if($_POST['EditAdvert']=='Update')
{
	$url=JOBS::updateAdvertListings();
	header($url);
}




if(($_POST['CreateAdvert']=='Create') || ($_POST['UpdateAdvert']=='Update'))
{
	$url=JOBS::createAdvert();
	//echo $url;
	header($url);		
	
}


if($_POST['Advert_Listing']=='Start Display')
{
	$url=JOBS::startListing();
	header($url);
}

if($_POST['Advert_Listing']=='Pause Display')
{
	$url=JOBS::pauseListing();
	header($url);
}

?>