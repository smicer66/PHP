<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();

if($_POST['NOTIFICATION']=='Send Me SMS Updates')
{
	$url=MESSAGE::registerForSMSUpdates();
	header($url);
}


if($_POST['NOTIFICATION']=='Send')
{
	//echo 1212;
	$url=MESSAGE::sendMessage($_REQUEST['fiid']);
	header($url);
}

if($_POST['NOTIFICATION']=='DELETE')
{
	//echo 1212;
	$url=MESSAGE::deleteInboxMessage($_POST['DEL']);
	header($url);
}

if($_POST['NOTIFICATION']=='DELETE')
{
	//echo 1212;
	$url=MESSAGE::deleteOutboxMessage($_POST['DEL']);
	header($url);
}


?>