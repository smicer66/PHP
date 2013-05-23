<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();


if($_POST['COMPLAINT']=='Send')
{
	//echo 1212;project

	if(($_REQUEST['epyt'])=='tcejorp')
	{
		$url=COMPLAINT::sendComplaint($_REQUEST['fiid'], 'tcejorp', NULL);
		//header($url);
	}
	else if(($_REQUEST['epyt'])=="dib")
	{
	//	echo 1212;

		$url=COMPLAINT::sendComplaint($_REQUEST['fiid'], 'dib', $_REQUEST['dib']);
	}
	header($url);
}



?>