<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();

if($_POST['Message']=='Send Me SMS Updates')
{
	$url=MESSAGE::registerForSMSUpdates();
	header($url);
}


if($_POST['Message']=='Send Me Email Updates')
{
	$url=MESSAGE::registerForEmailUpdates();
	header($url);
}


?>