<?php



class Bid extends Feature
{
	public $entryError=array();
	public $id;
	
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `id` = '".$id."' AND `status` = 'Open'";
	//	echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			$blogi=$this->getProjectDetails($id);
			if($id3==1)
			{
				
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "<a href='javascript:;' onClick='javascript:window.open(\"../../../core/preview/preview.php?featureId=".FEATURE::getId('Project')."&linkToFeatureId=".$id."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
			echo "&nbsp;&nbsp;".$blogi['title']."</a><br />";
			$checked='';
		}
		
		
	}
	
	function doBid($projId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` = '".$projId."' AND (`status` = 'Open')";
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
	
	
	function sentBid($projId, $uid)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `project_id` = '".$projId."' AND `developer_id` = '".$uid."'";
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
	
	
	function getWinningBid($projId, $developer_id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE (".DEFAULT_DB_TBL_PREFIX."_bid.project_id = '".$projId."' AND ".DEFAULT_DB_TBL_PREFIX."_project.id = '".$projId."') AND ".DEFAULT_DB_TBL_PREFIX."_bid.project_id = '".$projId."' AND (".DEFAULT_DB_TBL_PREFIX."_bid.developer_id = '".$developer_id."')";
		//echo $str;
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
	
	function getBidDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			return $result;	
		}
		else
		{
			return NULL;
		}
	}
	
	
	function getMyProjectBid($uid)
	{
		global $mysql;
		$array=array();
		$uidType=USERTYPE::getDetails('Employer');
		//echo $uidType['id'];
		if(USER::getUserTypeId($uid)==$uidType['id'])
		{
			$attachStr=" AND (".DEFAULT_DB_TBL_PREFIX."_project.emp_id = ".$uid.")";
			
		}
		else
		{
			$attachStr=" AND (".DEFAULT_DB_TBL_PREFIX."_bid.developer_id= ".$uid.")";
		}
		
		
		$str="SELECT ".DEFAULT_DB_TBL_PREFIX."_bid.id FROM `".DEFAULT_DB_TBL_PREFIX."_bid`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_bid.status = 1 AND (".DEFAULT_DB_TBL_PREFIX."_bid.project_id = ".DEFAULT_DB_TBL_PREFIX."_project.id)".$attachStr;
		//echo $str;
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				/*if(PROJECT::isExpired($proj_id)==FALSE)
				{
					echo 1212;*/
					array_push($array, $result['id']);
				//}
			}
			return $array;
		}
		else
		{
			return $array;
		}
	}
	
	
	function getProjectBidIds($proj_id)
	{
		global $mysql;
		$array=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `project_id` = '".$proj_id."' AND `status` = 1";
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				if(PROJECT::isExpired($proj_id)==FALSE)
				{
					array_push($array, $result['id']);
				}
			}
			return $array;
		}
		else
		{
			return $array;
		}
	}
	
	
	function getBidTypeId($id)
	{
		//find out if the bid is for projects or for jobs
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result['businessCategoryId'];	
	}
	
	
	function getBidListing($start, $no,$projectId=NULL)
	{
		global $mysql;
		
		
		$array=array();
		
		if($projectId!=NULL)
		{
			$extraStr=" AND `project_id` = '".$projectId."'";
		}
		
		if(PROJECT::getListingCount()>$no)
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `status` = 'Open'".$extraStr." ORDER BY bid_date DESC LIMIT ".$start.", ".$no."";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `status` = 'Open'".$extraStr." ORDER BY bid_date DESC";
		}
		
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			
			if(PROJECT::isExpired($result['id'])==FALSE)
			{
				array_push($array, $result['id']);
			}
		}
		return $array;
	}
	
	
	
	function getBidEndDate($id)
	{
		global $mysql;
		$propDet=BID::getBidDetails($id);
		$endDate=add_or_subtract_days(date('Y-m-d h:i:s'), $propDet['period'], 1);
		/*
		$propActDetSQL=PROJECT::getProjectActivityDetails($id);
		
		if($propActDetSQL==NULL)
		{
			
			$endDate=add_or_subtract_days($propDet['dateCreated'], $propDet['period'], 1);
		}
		else
		{
			
			while($result = $mysql->fetch_assoc_mine($propActDetSQL))
			{
				if($result['pauseListingDate']!='0000-00-00 00:00:00')
				{
					$noOfDaysInSecs=$noOfDaysInSecs + (strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']));
				}
				else
				{
					$noOfDaysInSecs=$noOfDaysInSecs + (strtotime(date('Y-m-d h:i:s')) - strtotime($result['re_startListingDate']));
				}
				
				
			}
			
			$noOfDays=($noOfDaysInSecs);
			$noOfDays=($propDet['period'] * 86400) - $noOfDays;
			//$endDate=add_or_subtract_days(date('Y-m-d h:i:s'), $noOfDays, 1);
			
			//$noOfDays=floor($noOfDaysInSecs/86400);
			
			$endDate=add_or_subtract_days_exactly(date('Y-m-d h:i:s'), $noOfDays, 1);
			
		}
		*/
		return $endDate;
	}
	
	
	function updateListings($start=NULL)
	{	
		global $mysql;
		/*does not concern us*/
		$siteDet=SITE::getDetails();
		if($start==NULL)
		{
			$start=0;
			$end=$siteDet['adminResultsDisplayNumber'];
		}
		else
		{
//			$start=($counter * $siteDet['adminResultsDisplayNumber']);
			//if($start!=0)
			//{
				//$start=$start;
			//}
			$end=$siteDet['adminResultsDisplayNumber'];
		}
		if(isSuperAdmin($_SESSION['uid']))
		{
			$sql=BID::getMyBidListing($start,$end);
		}
		else
		{
			$sql=BID::getMyBidListing($start,$end, $_SESSION['uid']);
		}
		

		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$extraStr='';
			//if(isSuperAdmin($_SESSION['uid']))
			//{
				$status='adminPause'.$result['id'];
				$status=$_POST[$status];
				$extraStr="`status` = '".$status."'";
			//}
			/*else
			{
			
				$status='pause'.$result['id'];
				$status=$_POST[$status];
				if($status==1)
				{
					$status='Suspended';
					$extraStr="`status` = '".$status."'";
				}
				else
				{
				
				}
			}*/
			
			
			if($result['status']!=$status)
			{
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_bid` SET ".$extraStr." WHERE `id` = '".$result['id']."' LIMIT 1";
				$sql1= $mysql->query($update);
			}
			//also update the project activity table
			//now if the project is paused, goto the last the last entry and update the entry with the paused date which is 'now' 
			//if the project is paused and we cant find any last entry, insert the table with both the startdate of the propertty and the
			// paused date which is now
		
			//if the project is restarted, simply make an entry for one restart
			
			
			//if there was no change to the original status of the project dont do anything
			
			if($status==$result['status'])
			{
			
			}
			else
			{
				//if project is paused;
				$endDate=BID::getBidEndDate($result['id']);

				if(($status=='Suspended') || ($status=='Invalid') || ($status=='Expired'))
				{
					if($result['status']=='Valid')
					{
						
						$lastPausedEntry=BID::getLastActivityEntry($result['id']);
						if($lastPausedEntry==NULL)
						{
							//simply insert the entry
							$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` (`id` ,`projectId`,`re_startListingDate` ,`pauseListingDate` ,`supposedEndDate`) VALUES ('' , '".$result['id']."', '".$result['dateCreated']."', CURRENT_TIMESTAMP, '".$endDate."')";
							echo $entryString;
							$sql1= $mysql->query($entryString);
						}
						else
						{
							if($lastPausedEntry['pauseListingDate']=='0000-00-00 00:00:00')
							{
								$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` SET `pauseListingDate` = CURRENT_TIMESTAMP WHERE `id` = '".$lastPausedEntry['id']."' LIMIT 1";
								echo $update;
								$sql1= $mysql->query($update);
							}
						}
					}
					
				}
				else if ($status=='Valid')
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` (`id` ,`projectId`,`re_startListingDate`,`supposedEndDate`)VALUES ('' , '".$result['id']."', CURRENT_TIMESTAMP, '".$endDate."')";
					echo $entryString;
					$sql1= $mysql->query($entryString);
				
				}
			}
		}
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19001');
		return $url;
	
	}
	
	
	
	
	function automaticSet($start=NULL)
	{	
		global $mysql;
		/*
		$siteDet=SITE::getDetails();
		if($start==NULL)
		{
			$start=0;
			$end=$siteDet['adminResultsDisplayNumber'];
		}
		else
		{
//			$start=($counter * $siteDet['adminResultsDisplayNumber']);
			//if($start!=0)
			//{
				//$start=$start;
			//}
			$end=$siteDet['adminResultsDisplayNumber'];
		}
		if(isSuperAdmin($_SESSION['uid']))
		{
			$sql=PROJECT::getMyProjectListing($start,$end);
		}
		else
		{
			$sql=PROJECT::getMyProjectListing($start,$end, $_SESSION['uid']);
		}
		

		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$extraStr='';
			//if(isSuperAdmin($_SESSION['uid']))
			//{
			$value=PROJECT::isExpired($result['id']);
		}
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;*/
	
	}
	
	
	
	
	
	function getListingCount($id=NULL)
	{
	
		if($id!=NULL)
		{
			$extraStr=" AND `project_id` = '".$id."'";
		}
		$count=0;
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE `status` = 'Open'".$extraStr;
		
		$sql= $mysql->query($str);
		while($result=$mysql->fetch_assoc_mine($sql))
		{
			/*$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` WHERE `status` = '1' AND `projectId` = ".$result['id']." ORDER BY id DESC LIMIT 0, 1";
			
			$sql1= $mysql->query($str1);
			$result1=$mysql->fetch_assoc_mine($sql1);
			if((strtotime($result1['supposedEndDate'])) >= (strtotime(date('Y-m-d h:i:s'))))
			{*/
			if(PROJECT::isExpired($result['id'])==FALSE)
			{
				$count++;
			}
			//}
		}
//		echo $str;
		return $count;
	}
	
	
	function displayFPFeature($style, $parameter1=NULL)
	{
		CONTROLLER_BID::controlFrontPageDisplay($style, $parameter1);
	}
	
	function displayFeature($id=NULL, $parameter1=NULL)
	{
		CONTROLLER_BID::controlFlowProcess($parameter1);
	}
	
	
	function getMyBidListing($start, $no,$userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr="WHERE `developer_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` ".$extraStr." ORDER BY bid_date DESC LIMIT ".$start.", ".$no."";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	function getMyListingCount($id=NULL)
	{
		if($id!=NULL)
		{
			$extraStr="WHERE `developer_id` = '".$id."'";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` ".$extraStr;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	
	function bidExist($projId, $userId=NULL, $bidId=NULL)
	{
//		echo $projId;
	//	echo $userId;
		//echo $bidId;
		$extraStr='';
		if($userId!=NULL)
		{
			$extraStr=$extraStr." AND developer_id = '".$userId."'";
		}
		if($bidId!=NULL)
		{
			$extraStr=$extraStr." AND id = '".$bidId."'";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE project_id = '".$projId."'".$extraStr;
//		echo $str;
		$sql= $mysql->query($str);
		if($mysql->num_rows>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	function doCreateBid($projId, $suid)
	{
		global $mysql;
		$error=new Error();
		
		$username=setDataDB($_POST['USERNAME']);
		$password=md5((setDataDB($_POST['PASSWORD'])));
		$msg=nl2br(setDataDB($_POST['msg']));
		$bid=(setDataDB(round($_POST['bid'])));
		$period=(setDataDB(round($_POST['period'])));
		setcookie("formbid[use]", $_POST['USERNAME']);
		setcookie("formbid[passive]", $_POST['PASSWORD']);	
		setcookie("formbid[msg]", $_POST['msg']);
		setcookie("formbid[bid]", $_POST['bid']);
		setcookie("formbid[period]", $_POST['period']);
		setcookie("formbid[mail_lower]", sizeof($_POST['MAIL_LOWER']));
		setcookie("formbid[radio]", ($_POST['radio'][0]));			
		//setcookie("formbid[save]", sizeof($_POST['SAVE']));			
		//setcookie("formbid[BidTempName]", ($_POST['BidTempName']));			
		//setcookie("formbid[selectBidTemp]", ($_POST['selectBidTemp'][0]));				
		$project_id=$projId;
		$post_date=date("m/d/y");
		$post_time=localtime();
		$post_time="$post_time[2]:$post_time[1]:$post_time[0]";
		
		
		
		
		if(sizeof($_POST['Escrow'])>0)
		{									
			if(($_POST['Escrow'][0])=='Yes')
			{
				$escrow="Yes";
			}
			else
			{
				$escrow="No";
			}
		}
		else
		{
			$escrow="No";
		}
		

		$expiry_date=add_or_subtract_days($post_date, $period, 1);
		$expiry_time=$post_time;	
	//	echo $password;
		
		$uniq_id = uniqid("");	
			if(strlen($password)>0 && (USER::confirmActiveUser($username, $password, $suid)))
			{
				
				if(((is_numeric($_POST['bid']))==1) && ($_POST['bid']>0))		//if bid value is a valid number
				{
					//echo 12;
					if(((is_numeric($_POST['period']))==1)  && ($_POST['period']>0))	//is the period not a valid number
					{
						//echo 13;
						$msg3=(setDataDB($_POST['msg']));
						//if no email address exists in the bid details 
						//also check if the bid details actually contains some text
						//if not throw error
						//else proceed to transactions
						if ((no_email_http($msg3))==2)
						{
							//echo 14;
							if((strlen($msg3))>0)
							{
								//echo 15;
								
								//confirm whether a bid has being made before on this project by this same bidder 
								if(BID::bidExist($projId, $suid, NULL)==true)
								{
									//update
									//echo 16;
									
									$projDetail=PROJECT::getProjectDetails($projId);
									$empDetails=USER::getUserDetails($projDetail['emp_id']);
									$devDetails=USER::getUserDetails($suid);
									
									$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_bid` SET `detail` = '".$msg."', `status` = '1', `amount` = '".$bid."', `period` = '".$period."', `bid_date` = '".$post_date." ".$post_time."' WHERE `developer_id` = '".$suid."' AND `project_id` = '".$projId."' LIMIT 1";
									//echo $update;
									$sql1= $mysql->query($update);
									//mailer(1, 4, $_REQUEST['id'], $bid_id, 0);
								//	echo $error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
									setcookie("formbid[use]", '', time() - 86400);
									setcookie("formbid[passive]", '', time() - 86400);	
									setcookie("formbid[msg]", '', time() - 86400);
									setcookie("formbid[bid]", '', time() - 86400);
									setcookie("formbid[period]", '', time() - 86400);
									setcookie("formbid[mail_lower]", '', time() - 86400);
									setcookie("formbid[escrow]", '', time() - 86400);
									setcookie("formbid[prj_bid_mgmt]", '', time() - 86400);		
									setcookie("formbid[radio]", '', time() - 86400);
										//setcookie("formbid[radio]", ($_POST['radio'][0]));
										
										
									$siteDet=SITE::getDetails();
									$subject='Updated Bid for your project - '.$projDetail['header'];
									$text_body = "<u>Updated Bid for your project - <b>".$projDetail['header']."</b>:</u><br>
									Bidder: ".$devDetails['username']."<br>Bid Amount: NGN".$bid."<br>Delivery Period: ".$period." days<br>
									To view your project and its bid(s) click on the link: <a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."</a><br><br>
									Sincerely, <br>
									<b>Imobilliare Management</b>";
//									echo $text_body;
									
									$emailer=new Email();
									//echo $message;
									$user=new User();
									//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
									//echo 10;	
									//include ("../../../features/user/user_class.php");
									$emailer->sendMail($empDetails['email'], $subject, $text_body, $siteDet);
	
									header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19002'));
								}
								else
								{
									//insert
									$projDetail=PROJECT::getProjectDetails($projId);
									$empDetails=USER::getUserDetails($projDetail['emp_id']);
									$devDetails=USER::getUserDetails($suid);
									$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_bid` (`id` ,`detail`,`status` ,`project_id` ,`amount` ,`period`, `bid_date`,`developer_id`, `expiry_date`,`unique_id`) VALUES ('' , '".$msg."', '1', '".$projId."', '".$bid."', '".$period."', '".$post_date." ".$post_time."', '".$suid."', '".substr($expiry_date, 0, 10)." ".$expiry_time."', '".$uniq_id."')";
									//echo $entryString;
									$sql1= $mysql->query($entryString);
									//mailer(1, 3, $str_em_id1[0], $str_em_id[0], 0);
									//echo $error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
									setcookie("formbid[use]", '', time() - 86400);
									setcookie("formbid[passive]", '', time() - 86400);	
									setcookie("formbid[msg]", '', time() - 86400);
									setcookie("formbid[bid]", '', time() - 86400);
									setcookie("formbid[period]", '', time() - 86400);	
									setcookie("formbid[radio]", '', time() - 86400);
									
									$siteDet=SITE::getDetails();
									$subject='Latest Bid for your project - '.$projDetail['header'];
									$text_body = "<u>Bid for your project - <b>".$projDetail['header']."</b>:</u><br>
									Bidder: ".$devDetails['username']."<br>Bid Amount: NGN".$bid."<br>Delivery Period: ".$period." days<br>
									To view your project and its bid(s) click on the link: <a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."</a><br><br>
									Sincerely, <br>
									<b>Imobilliare Management</b>";
									
									
									$emailer=new Email();
									//echo $message;
									$user=new User();
									//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
									//echo 10;	
									//include ("../../../features/user/user_class.php");
									$emailer->sendMail($empDetails['email'], $subject, $text_body, $siteDet);
									
									header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19003'));
									
								}
									
							}		
						}
						else
						{
							header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19004'));
						}
					}
					else
					{
						header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19005'));
					}
				}
				else
				{
					header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19006'));
				}
			}	
			else
			{
				header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19007'));
				
			}
		
	}
	
	
	
	function doUpdateBid()
	{
		global $mysql;
		
		$transaction_type=$_POST['transaction_type'];
		$project_type=$_POST['project_type'];
		$project_specifics=$_POST['project_specifics'];
		$state=$_POST['state'];
		$location_specifics=$_POST['location_specifics'];
		$description=setDataDB($_POST['description']);
		$pricing=setDataDB($_POST['pricing']);
		
		//assuming all are provided
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `pricing` = '".$pricing."', `description` = '".$description."', `locationId` = '".$location_specifics."', `projectCategoryId` = '".$project_specifics."', `transactionTypeId` = '".$transaction_type."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
		echo $update;
		$sql1= $mysql->query($update);
		//store Activity
	//	$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project` (`id` ,`uniqueId`,`projectCategoryId` ,`title` ,`description` ,`authorUserId`,`dateCreated` ,`displayEndDate` ,`locationId` ,`pricing`,`transactionTypeId`,`status`, `period`)VALUES ('' , UUID(),'".$project_specifics."', '".$title."', '".$description."', '".$_SESSION['uid']."', CURRENT_TIMESTAMP, '".$endDate."', '".$location_specifics."', '".$pricing."', '".$transaction_type."', 'Not Started', '".$noOfDays."')";
		//$sql=$display_announcement->doQuery($entryString);
		//echo $entryString;
		//$sql= $mysql->query($entryString);
		return 'index.php?fid='.ADMINISTRATOR::getAdminFunctionId('project_creator').'&id='.$_REQUEST['id'].'&mod='.$_REQUEST['mod'].'&errcpj=errcpj19002';
		//$fileId=$mysql->insert_id;
	}
	
	
	
	
}


?>