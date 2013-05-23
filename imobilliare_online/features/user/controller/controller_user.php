<?php
if(isset($_POST['NEXT1']) && ($_POST['NEXT1']=='Submit'))
{
	$regStatus=DEVELOPER::setUserSpecialization($_REQUEST['uiq']);
	$url=$regStatus;
	header($url);

}

if($_POST['Employer']=='Register')
{
	$regStatus=EMPLOYER::doRegister("md5");
	
	$url=$regStatus;
	
	header($url);
}


if($_POST['DEVELOPER']=='Rate')
{
	$regStatus=USER::doRateDeveloper(setDataDB($_POST['review']), $_POST['ratings'], $_POST['RATING'], $_POST['project']);
	
	$url=$regStatus;
	
	header($url);
}

if($_POST['EMPLOYER']=='Rate')
{
	$regStatus=USER::doRateEmployer(setDataDB($_POST['review']), $_POST['ratings'], $_POST['RATING'], $_POST['project']);
	
	$url=$regStatus;
	
	header($url);
}




if($_POST['Employer_Edit']=='Save')
{
	$regStatus=EMPLOYER::doEditAcct("md5");
	
	$url=$regStatus;
	//echo $url;
	header($url);
}


if($_POST['EDITSPEC']=='Save')
{
	//echo 11;
	$regStatus=DEVELOPER::saveUserSpecialization();
	$url=$regStatus;
	//echo $url;
	header($url);
}

if(isset($_POST['UserUpdate']) && $_POST['UserUpdate']=='Update')
{
	$url=USER::updateUserList();
	header($url);
}



if(($_POST['CreateEmail']=='Create'))
{
	$url=USER::createEmail();
	header($url);
}

if($_POST['Developer']=='Sign Up')
{

	$regStatus=DEVELOPER::doRegister("md5");
	$url=$regStatus;
	header($url);
}





if($_POST['DEVELOPER_Edit_Account']=='Save')
{

	$regStatus=DEVELOPER::doEditAcct("md5");
	$url=$regStatus;
	header($url);
}


if($_POST['Problems_Login']=='Retrieve')
{
	$prob=PROBLEMS::forgotPassword(setDataDB($_POST['email']));
	if($prob==TRUE)
	{
		//new password was sent
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj135');
	}
	else
	{
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj136');
	}
	header($url);
}


if($_POST['Login_User']=='Login')
{
	LOGIN::doLogin('md5', setDataDB($_POST['username']), setDataDB($_POST['password']));
}





else if(($_POST['Login_User']=='Logout') || ($_REQUEST['logout']==1))
{
	LOGIN::doLogout();
	if(isset($_REQUEST['return']))
	{
		$url='Location: index.php?fid='.FEATURE::getId('User')."&us=".USERTYPE::getUserTypeId('Agent');
	}
	else
	{
		$url=str_replace('errcpj=','ercp=','Location: '.$_SERVER['HTTP_REFERER']);
	}
	header($url);
}


if((isset($_REQUEST['logout'])) && ($_REQUEST['logout']==1))
{
	LOGIN::doLogout();
	$error=new Error();
	if(isset($_REQUEST['return']))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
	}
	else
	{
		$url='Location: '.$_SERVER['HTTP_REFERER'];
	}
	header($url);
}


?>