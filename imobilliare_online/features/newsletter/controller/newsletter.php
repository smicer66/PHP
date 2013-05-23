<?php

//if ($lib->getAccessLevel()!="general_user") {

ob_start();
$error=new Error();



if($_POST['EditNews']=='Update')
{
	$url=NEWSLETTER::updateNewsletterListings();
	header($url);
}



if($_POST['Submit']=='Save')
{
	$feat=new Feature();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		$position='position'.$result['id'];
		$position=setDataDB($_POST[$position]);
		if($position!='NULL')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId` ,`menuId` ,`position` ,`section`,`sectionId`,`status`)VALUES ('' , '".$feat->getId('Newsletter')."', '".$result['id']."', '".$position."', '".$section."', '".$sectionId."', '1')";
			$sql1= $mysql->query($entryString);
		}
	}	
	
	
	$url='Location: menu_mapper.php?install=112Success';
	header($url);
}


if($_POST['Back']=='Back')
{
	unset($_SESSION['senderPreview']);
	$url='Location: newsletter_sender.php?dsd';
	header($url);
}


if($_POST['SendMailNews']=='Send')
{
	$url=NEWSLETTER::sendNewsletterStepTwo();
	header($url);
}

if($_POST['SendMailNews']=='Next')
{
	$url=NEWSLETTER::sendNewsletterStepOne();
	header($url);
}



if(($_POST['saveNews']=='Submit') || ($_POST['UpdateNews']=='Update'))
{
	$url=NEWSLETTER::createUpdateNewsletter();
	header($url);
}


if($_POST['newsLetterSignUp']=='OK')
{
	$newsLetterEmail=setDataDB($_POST['newsLetterEmail']);
	$newsLetterName=setDataDB($_POST['newsLetterName']);
	
//	$article=new Article_admin();
//$newsletter=new Newsletter_admin();
	global $newsletter;
	
	
	if((strlen($newsLetterEmail)==0) || (isEmail($newsLetterEmail)==FALSE))
	{
		$newsletter->setEntryError(ERROR_NEWSLETTERCONTENTS);
		$url='Location: admin/newsletter_creator.php?install=112Fail';
	}
	else
	{
		global $mysql;
		
		if($newsletter->checkSubscription($newsLetterEmail, $newsLetterName) == TRUE)
		{
			$newsletter->setEntryError(ERROR_SUBSCRIPTIONEXISTS);
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj107');
		}
		else
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_newsletter_receipients` (`id` ,`email` ,`newsletterId`, `status`)VALUES ('' , '".$newsLetterEmail."', '".$newsletter->getId($newsLetterName)."', '1')";
			$sql= $mysql->query($entryString);
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj108');
		}
		
		
	}
	header($url);
}

?>