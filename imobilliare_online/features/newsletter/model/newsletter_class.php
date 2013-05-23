<?php


class Newsletter extends Feature
{
	public $receipientArray=array();
	public $entryError=array(); 
	
	function __construct()
	{
	
	}
	
	function getNewsletterDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `id` = '".$id."' OR `name` = '".$id."'";
		//echo $str;
		$sql= $mysql->query($str);
		
		if($mysql->num_rows > 0)
		{
			$resultMOD = $mysql->fetch_assoc_mine($sql);
			return $resultMOD;
		}
		else
		{
			return NULL;
		}
	}
	
	
	
	function createUpdateNewsletter()
	{
		$newsletterTitle=setDataDB($_POST['newsletterTitle']);
		$newsletterName=setDataDB($_POST['newsletterName']);
		$newsletterContents=setDataDB(adjustImageUrlToFit($_POST['newsletterContents'],0));
		$receipientTypeId=$_POST['receipientTypeId'];
		$fpText=setDataDB($_POST['fpText']);
		
	//	$article=new Article_admin();
	//$newsletter=new Newsletter_admin();
		global $newsletter;
		$error=new Error();
		$artDet=NEWSLETTER::getNewsletterDetails($newsletterName);
		$moveNext=1;
		if($_POST['UpdateNews']=='Update')
		{
			$resultMOD = NEWSLETTER::getNewsletterDetails($_REQUEST['id']);
		}
		
		if(($artDet) && ($_POST['UpdateNews']=='Update') && ($newsletterName!=$resultMOD['name']))
		{
			$moveNext=0;
		}
		else
		{
			if(($artDet) && ($_POST['saveNews']=='Submit'))
			{
				$moveNext=0;
			}
		}
		
			
		if($moveNext==0)
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj9029');
		}
		else
		{
			if((strlen($newsletterContents)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj016');
			}
			else if((strlen($newsletterName)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
			}
			else if((strlen($newsletterTitle)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj015');
			}
			else if((strlen($fpText)==0))
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj017');
			}
			else
			{
				global $mysql;
				if(($_POST['saveNews']=='Submit'))
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_newsletter` (`id` ,`name` ,`contentsHtml`, `contentsNoHtml` ,`dateOfPublication`,`title`, `status`, `fpText`)VALUES ('' , '".$newsletterName."', '".$newsletterContents."', '".strip_tags(ereg_replace("&nbsp;"," ",$newsletterContents))."', CURRENT_TIMESTAMP, '".$newsletterTitle."', '1', '".$fpText."')";
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
				}
				if($_POST['UpdateNews']=='Update')
				{
					$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_newsletter` SET `name`= '".$newsletterName."', `contentsHtml`= '".$newsletterContents."', `contentsNoHtml` = '".strip_tags(ereg_replace("&nbsp;"," ",$newsletterContents))."',`title` = '".$newsletterTitle."',`fpText` = '".$fpText."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
				}
				
				$sql= $mysql->query($entryString);
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
			}
		}	
		return $url;
		
	}
	
	
	function sendNewsletterStepOne()
	{
		global $mysql;
		$error=new Error();
		$newsletterId=$_POST['newsletter'];
		$receipientType=setDataDB($_POST['receipient']);
		$receipientArray=array();
	
		global $mysql;global $newsletter;
		$newsletter=new Newsletter();
	
		if(($receipientType)=='NULL')
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj104');
		}
		if(($newsletterId)=='NULL')
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj106');
		}
		else
		{
			
			$user=new User();
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `userTypeId` = '".$receipientType."'";
			$sql= $mysql->query($str);
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($receipientArray, $user->getEmail($result['id']));
			}
			$_SESSION['showTextField']=0;
			
			$_SESSION['sentTo']=$receipientArray;
			$_SESSION['newsletterId']=$newsletterId;
			$_SESSION['newsletterBody']=$newsletter->getNewsletterBody($_SESSION['newsletterId'], 1);
			
	
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('newsletter_sender').'&senderPreview=1';
		}
		
		return $url;
		
	}
	
	
	
	function sendNewsletterStepTwo()
	{
		global $mysql;
		$error=new Error();
		include_once("../includes/mailer/class.phpmailer.php");
		include_once("../core/email/email_class.php");
		include_once("../core/site/site_class.php");
		global $newsletter;
		$mail=new Email();
		$site=new Site();
		$siteDet=$site->getDetails();
		if(sizeof($_SESSION['sentTo'])==0)
		{
			if(strlen($_POST['receipients'])>0)
			{
				$receipientsArray=explode(',', $_POST['receipients']);
				$_SESSION['sentTo']=$receipientsArray;
				$sendIt=1;
			}
			else
			{
				$sendIt=0;
			}
		}
		else
		{
			$sendIt=1;
		}
		if($sendIt==1)
		{
			//include ("file:///D|/wamp/www/features/newsletter/newsletter_class.php");
			for($countre=0;$countre<sizeof($_SESSION['sentTo']);$countre++)
			{
				$mail->sendMail($_SESSION['sentTo'][$countre], $_SESSION['mailSubject'], $_SESSION['newsletterBody'], $siteDet);
			}
			
			//$mail->sendIt($_SESSION['mailSubject'], $_SESSION['newsletterBody'], $_SESSION['sentTo']);
			unset($_SESSION['senderPreview'], $_SESSION['sentTo'], $_SESSION['newsletterId'], $_SESSION['newsletterBody']);
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj105');
		}
		else
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj301');	
		}
		
	}
	
	function updateNewsletterListings()
	{
		global $mysql;
		$error= new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter`";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
				
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$fpYes='fpYes'.$result['id'];
			$fpYes=$_POST[$fpYes];
			if($fpYes!=1)
			{
				$fpYes=0;
			}
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_newsletter` SET `status` = '".$status."', `fpYes` = '".$fpYes."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		}
		
		return $url;
	}
	
	
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';	
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `id` = '".$id."' AND `status` = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".getRealDataNoHTML($result['name'])."<br />";
			$checked='';
		}
	}
	
	function fullPreview($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			echo ucfirst(strtolower($result['title']))."<br /><br />";
		}
		echo $this->displayFeature($id);	
	}
	
	function displayFeature($id=NULL)
	{
		CONTROLLER_NEWSLETTER::controlFlowProcess($id);
	}
	
	function getId($name)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `name` = '".$name."' AND `status` = '1'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			return $result['id'];
		}
	}
	
	
	function checkSubscription($email, $name)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter_receipients` WHERE `newsletterId` = '".$this->getId($name)."' AND `email` = '".$email."' AND `status` = '1'";
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getNewsletterBody($id, $html)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($html==1)
			{
				return getRealDataNoHTML($result['contentsHtml']);
			}
			else
			{
				return getRealDataNoHTML($result['contentsNoHtml']);
			}
		}
	}
	
	
	
	function displayFPFeature($id=NULL, $name=NULL)
	{
		global $mysql;
		$newsLetterArray=array();
		if($name==NULL)
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `status` = '1' AND fpYes = '1' LIMIT 1, 0";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `name` = '".$name."' LIMIT 1, 0";
		}
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			echo '<table width="100%" border="0" cellspacing="0" cellpadding="5">
		  <tr>
			<td>';
			echo getRealDataNoHTML($result['fpText']);
			echo '</td>
		  </tr>
		  <tr>
			<td><form action="newsletter.php" method="post" enctype="multipart/form-data"><input name="newsLetterEmail" type="text" />
			<input type="hidden" value="'.getRealData($result['name']).'" name="newsLetterName" />
			<br />
			<input type="submit" name="newsLetterSignUp" value="OK" /></form></td>
		  </tr>
			</table>';
		}
		
		
		
	}
	
	function getListingCount()
	{
		global $mysql;
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter`, `".DEFAULT_DB_TBL_PREFIX."_user` WHERE ".DEFAULT_DB_TBL_PREFIX."_user.id = '".$_SESSION['id']."' AND (".DEFAULT_DB_TBL_PREFIX."_newsletter.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_newsletter.receipientTypeId = ".DEFAULT_DB_TBL_PREFIX."_user.userTypeId)";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE ".DEFAULT_DB_TBL_PREFIX."_newsletter.status = '1'";
		}
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	function getNewsletterListing($start, $no)
	{
		global $mysql;
		
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter`, `".DEFAULT_DB_TBL_PREFIX."_user` WHERE ".DEFAULT_DB_TBL_PREFIX."_user.id = '".$_SESSION['uid']."' AND (".DEFAULT_DB_TBL_PREFIX."_newsletter.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_newsletter.receipientTypeId = ".DEFAULT_DB_TBL_PREFIX."_user.userTypeId) ORDER BY ".DEFAULT_DB_TBL_PREFIX."_newsletter.id DESC LIMIT ".$start.", ".$no;
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE (".DEFAULT_DB_TBL_PREFIX."_newsletter.status = '1') ORDER BY ".DEFAULT_DB_TBL_PREFIX."_newsletter.id DESC LIMIT ".$start.", ".$no."";
		}
		//echo $str;
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			return $sql;	
		}
		else
		{
			return NULL;
		}
	}
	
}




class Newsletter_admin extends Newsletter
{
	public $entryError=array();
	
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}	
}

//$newsletter=new Newsletter();
////echo $newsletter->getId('Welcome To Texas');
//$newsletter->displayFPFeature(NULL,'Welcome To Texas');
?>