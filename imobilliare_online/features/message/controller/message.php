<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();

if($_POST['Message']=='Send Me SMS Updates')
{
	$url=MESSAGE::registerForSMSUpdates();
	header($url);
}


if($_POST['MESSAGE']=='Send')
{
//	echo 1212;
	$url=MESSAGE::sendMessage($_REQUEST['fiid']);
	header($url);
}

if($_POST['MESSAGE']=='DELETE')
{
	//echo 1212;
	$url=MESSAGE::deleteInboxMessage($_POST['DEL']);
	header($url);
}

if($_POST['MESSAGE_SENDER']=='DELETE')
{
	//echo 1212;
	$url=MESSAGE::deleteOutboxMessage($_POST['DEL']);
	header($url);
}


?>