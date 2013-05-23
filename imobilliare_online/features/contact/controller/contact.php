<?php


$error=new Error();


if($_POST['EditContact']=='Update')
{
	$url=CONTACT::updateContactEntries();
	header($url);
}




if(($_POST['CreateContact']=='Create') || ($_POST['UpdateContact']=='Update'))
{
	$url=CONTACT::createContactPage();
	header($url);
}



if((isset($_REQUEST['delContactId'])) && (strlen($_REQUEST['delContactId'])>0))
{
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `uniqueId` = '".$_REQUEST['delContactId']."'";
	$sql=$mysql->query($query);
	$result = $mysql->fetch_assoc_mine($sql);
	if($mysql->num_rows > 0)
	{
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `uniqueId` = '".$_REQUEST['delContactId']."' LIMIT 1";
		$mysql->query($str);
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj013');
	
	}
	else
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj014');
		//throw error non existing id
	}
	header($url);
}





if($_POST['CONTACT']=='Send')
{
	$url=CONTACT::talkToUs();
	header($url);
}

?>