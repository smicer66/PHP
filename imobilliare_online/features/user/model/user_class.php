<?php

class User extends Feature
{
	private $accessLevel;
	public $id;
	public $entryError=array();
	
	function __construct($id=NULL)
	{
		$this->id=$id;	
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		global $mysql;
		$checked='';
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
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
				echo "&nbsp;&nbsp;".getRealDataNoHTML($result['firstName'])." ".getRealDataNoHTML($result['lastName'])." - ".getRealDataNoHTML($result['username'])."<br />";
				$checked='';
			}
		}
		
	}
	
	function fullPreview($id)
	{
		//not applicable
	}
	
	function getListCount($id=NULL)
	{
		if($id!=NULL)
		{
			$extraStr=" AND `userTypeId` = '".$id."'";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1'".$extraStr;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	function deleteMySpecialization()
	{
		global $mysql;
		$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_user_specialization` WHERE `userId` = '".$_SESSION['uid']."'";
		//echo $str;
		$sql= $mysql->query($str);
	}
	
	
	function getMySpecialization($uid)
	{
		global $mysql;
		$array=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user_specialization` WHERE `userId` = '".$uid."'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result['specializationId']);
		}
		return $array;
	}
	
	
	function getUserList($start=NULL, $no=NULL,$userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `userTypeId` = '".$userId."'";
		}
		if(($no!=NULL) && ($start!=NULL))
		{
			$extraStr1=" LIMIT ".$start.", ".$no;
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = 'Active'".$extraStr." ORDER BY username ASC".$extraStr1;
		//echo $str;
		$sql= $mysql->query($str);
		if($sql)
		{
			return $sql;
		}
		else
		{
			return null;
		}
	}
	
	
	
	function isUserExist($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `unique_id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	
	function isUserSpecAvailable($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user_specialization` WHERE status = '1' AND `userId` = '".$id."'";
		echo $str."<br>";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getUserDetFromUniq($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `unique_id` = '".$id."'";
		
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return $result;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getUserDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = '".$id."' AND `status` = 'Active'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	function getDetails($id)
	{
		global $mysql;
		if($id!=NULL)
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = '".$id."'";
		//	echo "<br /><br />".$str."<br /><br />";
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			//print_r($result);
			return $result;
		}
		else
		{
			return NULL;
		}
	}
	
	
	function getAllUsers($id=NULL, $userTypeExcpetion=NULL)
	{
		global $mysql;
		$exception="";

		for($count=0; $count<sizeof($userTypeExcpetion);$count++)
		{
			$exception=$exception."`userTypeId` != ".$userTypeExcpetion[$count];
			if(sizeof($userTypeExcpetion)!=($count+1))
			{
				$exception=$exception." AND ";
			}
			
		}
		
		if($id!=NULL)
		{
			if(strlen($excpetion)>0)
			{
				
					$exception=" AND (".$exception.")";
				
			}
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = ".$id."".$exception." ORDER BY username";
//			echo "<br /><br />".$str."<br /><br />";
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			return $result;
		}
		else
		{
			$array=array();
			if(strlen($excpetion)>0)
			{
				$exception=" AND (".$exception.")";
				
			}
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE ".$exception." ORDER BY username";
		//	echo "<br /><br />".$str."<br /><br />";
			$sql= $mysql->query($str);
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($array, $result);
			}
			return $array;
		}
	}
	
	
	function getEmail($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			return setDataDB($result['email']);
		}
	}
	
	
	function isEmailExists($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `email` = '".$id."'";
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			$result = $mysql->fetch_assoc_mine($sql);
			return $result;
		}
		else
		{
			return FALSE;
		}
	}
	
	function getUserIdFromActKey($value=NULL)
	{
		global $mysql;
		
		if($value==NULL)
		{
			return NULL;
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `activationCode` = '".$value."'";
			echo $str;
			$sql= $mysql->query($str);
			$result = $mysql->fetch_assoc_mine($sql);
			return $result;
		}
	}
	
	function activateUserAccount($value=NULL)
	{
		global $mysql;
		if($value==NULL)
		{
			header('Location: index.php');
		}
		else
		{
			//activate the account by
			//1. remove activation code of user and set his status to 1
			//2. set application userId to 
			$fileId=USER::getUserIdFromActKey($value);
			if(is_numeric($fileId['id'])==1)
			{
				$usDet=USER::getDetails($fileId['id']);
				$devArticle=ARTICLES::getArticleDetails('Developers');
				$empArticle=ARTICLES::getArticleDetails('Employers!');

				$siteDet=SITE::getDetails();
				$subject = "Your Login Details for Imobilliare!";
				$text_body = "Hello,<br><br>";
				$text_body .= "You have been registered on Imobilliare as ";
				if($usDet['userTypeId']==USERTYPE::getUserTypeId('Developer'))
				{
					//html mail
					//plain text mail
					$text_body .= "a Developer. You will be notified of new projects based on your skill specification.";
					$text_body .= "<br>For more details on bidding and handling of projects, click on the link: ";
					$text_body .= "<a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Articles')."&fiid=".$devArticle['id']."'>www.imobilliare.com/?fid=".FEATURE::getId('Articles')."&fiid=".$devArticle['id']."</a>.<br><br>";
					$text_body .= "Your login details are:<br><br>";
					$text_body .= "<b>Id:</b>&nbsp;&nbsp;";
					$text_body .= $usDet['username']."<br>";
					$text_body .= "<b>Password:</b> ";
					$text_body .= $usDet['tempPass']."<br><br>";
					$text_body .= "Happy Bidding!<br><br>";
					$text_body .= "Sincerely, <br>";
					$text_body .= "<b>Imobilliare Management</b>";
				}
				else if($usDet['userTypeId']==USERTYPE::getUserTypeId('Employer'))
				{
					
					//Plain text body (for mail clients that cannot read HTML
					$text_body .= "an Employer. You can now post your projects on Imobilliare as you will be receive notifications of bids placed on projects which you have posted.";
					$text_body .= "<br>For more details on posting projects and handling of bids, copy and paste into your address bar.";
					$text_body .= "<a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Articles')."&fiid=".$empArticle['id']."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Articles')."&fiid=".$empArticle['id']."</a><br><br>";
					$text_body .= "Your login details are:<br><br>";
					$text_body .= "<b>Id:</b>&nbsp;&nbsp;";
					$text_body .= $usDet['username']."<br><br>";
					$text_body .= "<b>Password:</b>&nbsp;&nbsp;";
					$text_body .= $usDet['tempPass']."<br><br>";
					$text_body .= "Happy Posting!<br><br>";
					$text_body .= "Sincerely, <br>";
					$text_body .= "<b>Imobilliare Management</b>";
				}
				
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `activationcode`='',`tempPass`='',`status`='Active' WHERE `id`='".$fileId['id']."'";
				$sql=$mysql->query($update);
				
				$emailer=new Email();
				$emailer->sendMail($usDet['email'], $subject, $text_body, $siteDet);
				
				header('Location: index.php?fid='.parent::getId('user').'&us='.$_REQUEST['us'].'&authenticated');
			}
			else
			{
				header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj877');
			}
			//$fileId1=$mysql->insert_id;
			
		}
	}
	
	function displayFPFeature($parameter_1=NULL, $parameter_2=NULL)
	{
		//echo $parameter_1;
		if($parameter_1==NULL)
		{
			global $login;
			$login=new Login();
			$login->displayLoginForm($loginAddy, NULL);
		}
		else
		{
			//echo 12;
			global $login;
			$login=new Login();
			$login->displaySimpleForm($loginAddy, $parameter_1);
		}			
		
	}


	
	
	
	
	function displayFeature($resultArray=NULL)
	{
		//include("login/model/login_class.php");
		CONTROLLER_USER::controlFlowProcess();
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	function getUserTypeId($id=NULL)
	{
		$userType=new UserType();
		if($id==NULL)
		{
			$userTypeDet=$userType->getDetails('Visitor');
			return $userTypeDet['id'];
		}
		else
		{
			$userDet=USER::getUserDetails($id);
//			$userTypeDet=$userType->getDetails($userDet['churchPostId']);
			return $userDet['userTypeId'];
		}
	}
	
	
	function doRateDeveloper($review, $ratings, $uid,$projId)
	{
		global $mysql;

		if($ratings=='-')
		{
			header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19060');
		}
		else
		{
			if(is_numeric($projId)==1)
			{
				if(PROJECT::userHandledProject($uid, $projId)==TRUE)
				{
					if(PROJECT::ratedPreviously($uid, $projId, $_SESSION['uid'])==FALSE)
					{
						$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_reviews` (`id` ,`unique_id`,`project_id` ,`reviewed_id` ,`reviewer_id` ,`serialno`, `details`,`creation_date`,`creation_time`,`status`) VALUES ('' , UUID(), '".$projId."', '".$uid."', '".$_SESSION['uid']."', '".$ratings."', '".$review."', '".date('m/d/y')."', '".time()."', 'Valid')";
						//
						echo $entryString;
						$sql1= $mysql->query($entryString);
						$projId=$mysql->insert_id;
						header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19061');
					}
					else
					{
						header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19062');
					}
					
				}
				else
				{
					header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19063');
				}
				//header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj102');
			}
			else
			{
				header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19064');
			}
		}
	
	}
	
	
	
	function doRateEmployer($review, $ratings, $uid,$projId)
	{
		global $mysql;

		if($ratings=='-')
		{
			header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19060');
		}
		else
		{
			if(is_numeric($projId)==1)
			{
				if(PROJECT::userOwnsProject($uid, $projId)==TRUE)
				{
			
					if(PROJECT::ratedPreviously($uid, $projId, $_SESSION['uid'])==FALSE)
					{
						$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_reviews` (`id` ,`unique_id`,`project_id` ,`reviewed_id` ,`reviewer_id` ,`serialno`, `details`,`creation_date`,`creation_time`,`status`) VALUES ('' , UUID(), '".$projId."', '".$uid."', '".$_SESSION['uid']."', '".$ratings."', '".$review."', '".date('m/d/y')."', '".time()."', 'Valid')";
						//
						echo $entryString;
						$sql1= $mysql->query($entryString);
						$projId=$mysql->insert_id;
						header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19061');
					}
					else
					{
						header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19062');
					}
					
				}
				else
				{
					header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19065');
				}
				//header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj102');
			}
			else
			{
				header('Location: index.php?fid='.parent::getId('user').'&errcpj=errcpj19064');
			}
		}
	
	}
	
	
	function getRating($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_reviews` WHERE ".DEFAULT_DB_TBL_PREFIX."_reviews.reviewed_id = '".$id."'";
		//echo $str;
		$sql= $mysql->query($str);
		
		$sum=0;
		$count=0;
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$sum=$sum + $result['serialno'];
			$count=count+10;
		//	echo $result['id']."=".$sum."=".$count."<br />";
		}
		return round(($sum/$count)*10);
	}
	
	
	function createEmail()
	{
		global $mysql;
		$error=new Error();
		
		/* idea courtesy of cPanel Email Account Creator 1.3*/
		$userChosen=$_POST['users'];
		$password=$mysql->escape_string(escapeshellcmd(strip_tags($_POST['password'])));
		$cpassword=$mysql->escape_string(escapeshellcmd(strip_tags($_POST['cpassword'])));
		$edomain = $_SERVER['HTTP_HOST'];
		$equota = 20;// amount of space in megabytes
		$epass = $password; // email password
		$cpuser = 'syncstat'; // cPanel username
		$cppass = '*}7v3fQM2Y<N'; // cPanel password
		$cpdomain = 'syncstatefarms.com'; // cPanel domain or IP
		$cpskin = 'x3';  // cPanel skin. Mostly x or x2. 
	// See following URL to know how to determine your cPanel skin
	// http://www.zubrag.com/articles/determine-cpanel-skin.php
	
	// Default email info for new email accounts
	// These will only be used if not passed via URL
	
	
		$user=new User();
		$userDet=$user->getUserDetails($userChosen);
		if($userChosen!='NULL')
		{
			if($userDet)
			{
				if((strlen($password)>6) && ($password==$cpassword))
				{
					$euser=$userDet['username'];
					$f = fopen ("http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/doaddpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota", "r");
					if (!$f) {
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj221');
					break;
					}
					else
					{
						 $url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj223');
						 $update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `portalEmail` = '".$euser."@".$edomain."' WHERE `id` = '".$userChosen."'";
						 $sql1= $mysql->query($update);
						  // Check result
						  while (!feof ($f)) {
							$line = fgets ($f, 1024);
							if (ereg ("already exists", $line, $out)) {
							  $url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj222');
							  break;
							}
						  }
						  @fclose($f);
						
					}
					
				}
				else
				{
					//throw error
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj164');
				}
		 
			}
			else
			{
				 $url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj224');
			}
		}
		else
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		}
		return ($url);
	}
	
	
	function updateUserList()
	{
		global $mysql;
		$error=new Error();
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `userTypeId` != '".USERTYPE::getUserTypeId('Administrator')."'";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user`";
		}
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `status` = '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		header($url);
	}
	
	function confirmActiveUser($username, $password, $suid)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `username` = '".$username."' AND `password` = '".$password."' AND `id` = '".$suid."'";
		//echo $str;
		$sql= $mysql->query($str);
		if($mysql->num_rows>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
}



class UserType
{

	function __construct()
	{
	
	}
	
	function getDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE (`id` = '".$id."' OR `name` = '".$id."') AND `status` = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	function getUserTypeDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	function getUserTypeId($name)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `name` = '".$name."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result['id'];
	}
	
}










function isLogged($id)
{
	global $mysql;
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_logger` WHERE `status` = '1' AND userId = '".$id."'";
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

function isAdmin($userId)
{
	global $mysql;
	
	/*$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `status` = '1' AND (`name` = 'Administrator')";
	$sql= $mysql->query($str);
	$result = $mysql->fetch_assoc_mine($sql);
	
	
	$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `status` = '1' AND (`name` = 'Super Administrator')";
	$sql1= $mysql->query($str1);
	$result1 = $mysql->fetch_assoc_mine($sql1);*/
	
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE (".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_user.id = '".$userId."') AND ((".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Super Administrator' AND ".DEFAULT_DB_TBL_PREFIX."_user.usertypeId = ".DEFAULT_DB_TBL_PREFIX."_usertype.id) OR (".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Administrator' AND ".DEFAULT_DB_TBL_PREFIX."_user.usertypeId = ".DEFAULT_DB_TBL_PREFIX."_usertype.id))";
//(".DEFAULT_DB_TBL_PREFIX."_user.status = '1' AND ".DEFAULT_DB_TBL_PREFIX."_user.id = '".$userId."') AND (".DEFAULT_DB_TBL_PREFIX."_user.usertypeId = ".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Administrator' OR ".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Super Administrator')
	$sql= $mysql->query($str);
	if($mysql->num_rows>0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}


function isSuperAdmin($userId)
{
	global $mysql;
	
	
	/*
	$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `status` = '1' AND (`name` = 'Administrator')";
	$sql1= $mysql->query($str1);
	$result1 = $mysql->fetch_assoc_mine($sql1);
	
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND id = '".$userId."' AND (`userTypeId` = '".$result1['id']."')";
	*/
	
	
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE (".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_user.id = '".$userId."') AND ((".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Administrator' AND ".DEFAULT_DB_TBL_PREFIX."_user.usertypeId = ".DEFAULT_DB_TBL_PREFIX."_usertype.id))";
	//echo $str;
	$sql= $mysql->query($str);
	
	if($mysql->num_rows>0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}




function whoIsUser($str)
{
	global $mysql;
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = 'Active' AND (id = '".$str."' OR username = '".$str."')";
	//echo $str;
	$sql= $mysql->query($str);
	$result = $mysql->fetch_assoc_mine($sql);
	//echo $str;
	if($mysql->num_rows >0)
	{
		return $result;
	}
	else
	{
		return false;
	}
}


function whoIsVisitor($str)
{
	global $mysql;
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_visitor` WHERE `status` = '1' AND (id = '$str')";
	$sql= $mysql->query($str);
	//echo $str;
	if($mysql->num_rows>0)
	{
		return $sql;
	}
	else
	{
		return false;
	}
}

function checkToolsItemActivate($itemName)
{
	global $mysql;
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_toolbox` WHERE `status` = '1' AND (`activateYes` = '1' AND `itemName` = '".$itemName."')";
	$sql= $mysql->query($str);
	if($mysql->num_rows>0)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

//$user=new User();
//$user->displayFPFeature();

?>
