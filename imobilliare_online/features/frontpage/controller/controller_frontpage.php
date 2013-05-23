<?php
if(isset($_POST['FRONTPAGE']) && ($_POST['FRONTPAGE']=='Invite'))
{
	$array=array();
	if($_POST['invite1']!= '')
	{
		array_push($array, setDataDB($_POST['invite1']));
	}
	if($_POST['invite1']!= '')
	{
		array_push($array, setDataDB($_POST['invite2']));
	}
	if($_POST['invite1']!= '')
	{
		array_push($array, setDataDB($_POST['invite3']));
	}
	if($_POST['invite1']!= '')
	{
		array_push($array, setDataDB($_POST['invite4']));
	}
	if($_POST['invite1']!= '')
	{
		array_push($array, setDataDB($_POST['invite5']));
	}
	
	$regStatus=FRONTPAGE::invitePeople($array, setDataDB($_POST['name']));
	$url=$regStatus;
	header($url);

}

?>