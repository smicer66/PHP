<?php

class Project extends Feature
{
	public $entryError=array();
	public $id;
	
	function __construct()
	{
	
	}
	
	
	function updateTheProjects()
	{
		global $mysql;
		$random=array();
		$random[0]=5;
		$random[1]=1;
		$random[2]=2;
		$random[3]=3;
		$random[4]=4;
		
		//echo 1212;
		
		
		$specialFeaturesSQL=PROJECT::getProjectListing(NULL, NULL);
		
		$array_ids=array();
		while($resultX = $mysql->fetch_assoc_mine($specialFeaturesSQL))
		{
			$seed=rand(0, 4);
			$create_date=add_or_subtract_days(date('Y-m-d H:i:s'), $random[$seed], 1);
			$str="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` set status = 'Open', chosen_developer_id = 0 WHERE id = ".$resultX['id'];
			echo $str."<br />";
			$sql= $mysql->query($str);
		}

	}


	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	
	function getProjectFiles($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_files` WHERE `project_id` = '".$id."' AND `status` = 'Valid'";
	//	echo $str;
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

	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` = '".$id."' AND `status` = 'Valid'";
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
	
	function getProjectCategoryList()
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT name FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `status` = '1'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayPosition, getRealDataNoHTML($result['name']));
		}
		return $arrayPosition;
	}
	
	
	function getProjectTypeList()
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT name FROM `".DEFAULT_DB_TBL_PREFIX."_project_type` WHERE `status` = '1'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayPosition, getRealDataNoHTML($result['name']));
		}
		return $arrayPosition;
	}
	
	function createProjectCategory()
	{
		global $mysql;
		$error=new Error();
		
		$description=setDataDB($_POST['description']);
		$projectCategory=$_POST['projectCategory'];
		$catName=setDataDB($_POST['catName']);
		
		
		//assuming all are provided
		if(strlen($catName)==0)
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
		}
		else
		{
			if(($projectCategory)=='NULL')
			{
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2036');
			}
			else
			{
				$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_category` (`id` ,`name`,`projectTypeId` ,`status` ,`description`)VALUES ('' ,'".$catName."', '".$projectCategory."', '1', '".$description."')";
				//$sql=$display_announcement->doQuery($entryString);
				//echo $entryString;
				$sql= $mysql->query($entryString);
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
			}
		}
		
	}
	
	
	
	function createProjectType()
	{
		global $mysql;
		$error=new Error();
		
		$catName=setDataDB($_POST['catName']);
		
		
		//assuming all are provided
		if(strlen($catName)==0)
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
		}
		else
		{
			
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_type` (`id` ,`name`,`status`)VALUES ('' ,'".$catName."', '1')";
			//$sql=$display_announcement->doQuery($entryString);
			//echo $entryString;
			$sql= $mysql->query($entryString);
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
			
		}
		
	}
	
	
	function isExpired($id)
	{
		
		global $mysql;
		//$propDet=PROJECT::getProjectDetails($id);
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` = ".$id;
//		echo $str1;
		$sql1= $mysql->query($str1);
		$result1=$mysql->fetch_assoc_mine($sql1);
		
	//	echo $result1['id'];
		/*echo "=";
		echo $result1['expiry_date'];
		echo "=";
		echo strtotime($result1['expiry_date'])."=";
		echo date('Y-m-d h:i:s')."=";
		echo strtotime(date('Y-m-d h:i:s'))."=";
		echo getDayDiff(($result1['creation_date']), date('Y-m-d h:i:s'));*/
		if($result1['status']=='Completed' && ($result1['emp_id']==$_SESSION['uid'] || $result1['chosen_developer_id']==$_SESSION['uid']))
		{
			//echo $projectListingDetails['status'];
			return FALSE;
		}
		
		
		if((getDayDiff(($result1['creation_date']), date('Y-m-d h:i:s'))>$result1['period']) && ($result1['status']!='Open' && $result1['status']!='Assigned' && $result1['status']!='On-Going'))
		{
			
			return TRUE;
		}
		else if($result1['status']=='Completed' && ($result1['emp_id']==$_SESSION['uid'] || $result1['chosen_developer_id']==$_SESSION['uid']))
		{
			
			//echo $result1['status'];
			return FALSE;
		}
		else if((getDayDiff(($result1['creation_date']), date('Y-m-d h:i:s'))>$result1['period']) && ($result1['status']=='Open' && $result1['status']!='Assigned' && $result1['status']!='On-Going'))
		{
			
			PROJECT::setProjectStatus('Expired', $id);
			return FALSE;
		}
		else
		{
			return FALSE;
		}
		//echo "<br />";		
		
	}
	
	
	
	function setProjectStatus($status, $id)
	{
		global $mysql;
		switch($status)
		{
			case 'Expired':
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'Expired' WHERE `id` = '".$id."' AND `status` != 'Expired'";
				$sql1= $mysql->query($update);
				return $url;
				break;
			
		}
	}
	
	
	
	function getProjectActivityDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` WHERE `projectId` = '".$id."'";
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
	
	
	function getMyProjectActivityDetails()
	{
		global $mysql;
		if(isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId";
			//$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId AND ".DEFAULT_DB_TBL_PREFIX."_project.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.authorUserId = '".$_SESSION['uid']."' AND ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId";
			//$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.authorUserId = '".$_SESSION['uid']."' AND ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId  AND ".DEFAULT_DB_TBL_PREFIX."_project.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
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
	
	
	function delListingFile($id)
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_files` WHERE `uniqueId` = '".$id."'";
		//echo $query;
		$sql=$mysql->query($query);
		$result = $mysql->fetch_assoc_mine($sql);
		if($mysql->num_rows > 0)
		{
			$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_project_files` WHERE `uniqueId` = '".$id."' LIMIT 1";
			$mysql->query($str);
			//echo $str;
			$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_files` WHERE `id` = ".$result['fileId']." LIMIT 1";
			$mysql->query($str);
			//echo $str;
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj013');
		
		}
		else
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj014');
			//throw error non existing id
		}
		return $url;
	}
	
	
	
	
	function getProjectSpecialization($id)
	{
		global $mysql;
		$array=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_specialization` WHERE `projectId` = '".$id."'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result['specializationId']);
		}
		return $array;
	}
	
	
	function getProjectDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` = '".$id."'";
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
	
	
	function getProjectDetailsByName($name)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `header` = '".$name."'";
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
	
	
	function getProjectTransactionDet($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_transaction` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	
	function getProjectTransaction($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_transaction` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result['name'];	
	}
	
	function getProjectType($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_type` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result['name'];	
	}
	
	
	function doUpdateProjectCategoryList()
	{
		global $mysql;
		$error=new Error();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category`";
		$sql= $mysql->query($str);
		while($result=$mysql->fetch_assoc_mine($sql))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_category` SET `status` = '".$status."' WHERE `id` = '".$result['id']."'";
			//echo $update;
			$sql1= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	
	}
	
	
	
	function updatePropTypeListing()
	{
		global $mysql;
		$error=new Error();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_type`";
		$sql= $mysql->query($str);
		while($result=$mysql->fetch_assoc_mine($sql))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_type` SET `status` = '".$status."' WHERE `id` = '".$result['id']."'";
			//echo $update;
			$sql1= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	
	}
	
	
	function getProjectCategory($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_category` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	function getProjectLocation($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_location` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	
	function getProjectState($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	
	function getSpecialListingCount($id=NULL)
	{
		if($id!=NULL)
		{
			$extraStr=" AND `authorUserId` = '".$id."'";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `specialFeatureYes` = '1' AND `status` = 'Valid'".$extraStr;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	function getSpecialFeatureProperties($start=NULL, $no=NULL)
	{
		global $mysql;
		
		if(($start==NULL) && ($end==NULL))
		{
			$str="SELECT ".DEFAULT_DB_TBL_PREFIX."_project.id FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing`, `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Open' AND ".DEFAULT_DB_TBL_PREFIX."_project.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id AND ".DEFAULT_DB_TBL_PREFIX."_billing_type.id = ".DEFAULT_DB_TBL_PREFIX."_billing.billingTypeId AND ".DEFAULT_DB_TBL_PREFIX."_billing_type.name = 'Special Listing'";
			//echo $str;
		}
		else
		{
			$str="SELECT ".DEFAULT_DB_TBL_PREFIX."_project.id FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing`, `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Valid' AND ".DEFAULT_DB_TBL_PREFIX."_project.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id AND ".DEFAULT_DB_TBL_PREFIX."_billing_type.id = ".DEFAULT_DB_TBL_PREFIX."_billing.billingTypeId AND ".DEFAULT_DB_TBL_PREFIX."_billing_type.name = 'Special Listing' ORDER BY dateCreated DESC LIMIT ".$start.", ".$no."";
		}
		//echo $str;
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	function getDeveloperHandlingProjectListing($start=NULL, $no=NULL,$userId=NULL, $orderBy=NULL, $order=NULL)
	{
		global $mysql;
		
		if($orderBy!=NULL)
		{
			$attachStr=$attachStr." ORDER BY ".$orderBy." ".$order;
		}
		
		if($no!=NULL)
		{
			if($start!=NULL)
			{
				$attachStr=" LIMIT ";
				$attachStr=$attachStr."".$start.", ".$no;
			}
			else
			{
				$attachStr=" LIMIT 0";
				$attachStr=$attachStr.", ".$no;
			}
		}
		
		
		if($userId!=NULL)
		{
			$utype=USERTYPE::getDetails('Employer');
			$utype1=USERTYPE::getDetails('Developer');
			if(USER::getUserTypeId($userId)==$utype['id'])
			{
				$extraStr=" WHERE `status` = 'Completed' AND `emp_id` = ".$userId;
			}
			else if(USER::getUserTypeId($userId)==$utype1['id'])
			{
				$extraStr=" WHERE `chosen_developer_id` = '".$userId."' AND `status` = 'Completed'";
			}
		}
		
		if(PROJECT::getListingCount()>$no)
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr."".$attachStr;
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr."".$attachStr;
		}
		//echo $str;
		$sql= $mysql->query($str);
		
		return $sql;
	}
	
	
	
	function getProjectListing($start=NULL, $no=NULL,$userId=NULL, $orderBy=NULL, $order=NULL)
	{
		global $mysql;
		
		if($orderBy!=NULL)
		{
			$attachStr=$attachStr." ORDER BY ".$orderBy." ".$order;
		}
		
		if($no!=NULL)
		{
			if($start!=NULL)
			{
				$attachStr=$attachStr." LIMIT ";
				$attachStr=$attachStr."".$start.", ".$no;
			}
			else
			{
				$attachStr=$attachStr." LIMIT 0";
				$attachStr=$attachStr.", ".$no;
			}
		}
		
		
		if($userId!=NULL)
		{
			$utype=USERTYPE::getDetails('Employer');
			if(USER::getUserTypeId($userId)==$utype['id'])
			{
				$extraStr=" WHERE `emp_id` = '".$userId."'";
				$extraStr=",`".DEFAULT_DB_TBL_PREFIX."_bid` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.emp_id = ".$userId." AND ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_bid.project_id";
			}
			else
			{
				$extraStr=", `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE ".DEFAULT_DB_TBL_PREFIX."_bid.developer_id = ".$userId." AND ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_bid.project_id";
			}
		}
		
		if(PROJECT::getListingCount()>$no)
		{
			$str="SELECT *, ".DEFAULT_DB_TBL_PREFIX."_bid.id as bidId, ".DEFAULT_DB_TBL_PREFIX."_project.id as projectId, ".DEFAULT_DB_TBL_PREFIX."_project.status as projStatus FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr."".$attachStr;
		//	echo $str;
		}
		else
		{
			$str="SELECT *, ".DEFAULT_DB_TBL_PREFIX."_project.id as projectId FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr."".$attachStr;
		//	echo $str;
		}
		//echo $str;
		
		
		$sql= $mysql->query($str);
		
		return $sql;
	}
	
	
	function userHandledProject($uid, $projId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE id = ".$projId." AND chosen_developer_id = ".$uid;
		$sql= $mysql->query($str);
		
		if($mysql->num_rows >0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function userOwnsProject($uid, $projId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE id = ".$projId." AND emp_id = ".$uid;
		$sql= $mysql->query($str);
		
		if($mysql->num_rows >0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function ratedPreviously($uid, $projId, $srcId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_reviews` WHERE project_id = ".$projId." AND reviewed_id = ".$uid." AND reviewer_id = ".$srcId;
		echo $str;
		$sql= $mysql->query($str);
		
		if($mysql->num_rows >0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getProjectEndDate($id)
	{
		global $mysql;
		$propDet=PROJECT::getProjectDetails($id);
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
		return $endDate;
	}
	
	
	function updateListings($start=NULL)
	{	
		global $mysql;
		
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
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET ".$extraStr." WHERE `id` = '".$result['id']."' LIMIT 1";
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
				$endDate=PROJECT::getProjectEndDate($result['id']);

				if(($status=='Suspended') || ($status=='Invalid') || ($status=='Expired'))
				{
					if($result['status']=='Valid')
					{
						
						$lastPausedEntry=PROJECT::getLastActivityEntry($result['id']);
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
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	
	}
	
	
	
	
	function automaticSet($start=NULL)
	{	
		global $mysql;
		
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
		return $url;
	
	}
	
	
	
	
	
	function noOfSecsRan($id)
	{
		global $mysql;
		$propDet=PROJECT::getProjectDetails($id);
		
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` WHERE `projectId` = '".$id."'";
		$sql= $mysql->query($str);
		$totalNoOfDays=0;
		
		
		
		
		if($mysql->num_rows>0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				if(($result['pauseListingDate'])!='0000-00-00 00:00:00')
				{
					$totalNoOfDays=strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']) + $totalNoOfDays;
				}
				else
				{
					$totalNoOfDays= strtotime(date("Y-m-d H:i:s")) - strtotime($result['re_startListingDate']) + $totalNoOfDays;
				}
			}
			
		}
		else
		{
			//echo $propDet['dateCreated'];
			$totalNoOfDays=strtotime(date("Y-m-d H:i:s")) - strtotime($propDet['dateCreated']);
		}
		return ($totalNoOfDays/86400);
	}
	
	
	
	function getLastActivityEntry($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` WHERE `projectId` = '".$id."' ORDER BY id DESC";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	
	
	function getMyFavoriteListingCount()
	{
		if($id!=NULL)
		{
			$extraStr="";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Valid' AND ".DEFAULT_DB_TBL_PREFIX."_my_listing.srcId = '".$_SESSION['uid']."' AND ".DEFAULT_DB_TBL_PREFIX."_my_listing.projectId = ".DEFAULT_DB_TBL_PREFIX."_project.id";
		
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	
	function getProjectsGreaterThan($id)
	{
		global $mysql;
		$name=NULL;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` > '".$id."' AND `status` = 'Open'";
		//echo $str;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	function getMyFavoriteProjectListing($start, $no)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `authorUserId` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_my_listing`, `".DEFAULT_DB_TBL_PREFIX."_project` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Valid' AND ".DEFAULT_DB_TBL_PREFIX."_my_listing.srcId = '".$_SESSION['uid']."' AND ".DEFAULT_DB_TBL_PREFIX."_my_listing.projectId = ".DEFAULT_DB_TBL_PREFIX."_project.id ORDER BY ".DEFAULT_DB_TBL_PREFIX."_project.dateCreated DESC LIMIT ".$start.", ".$no."";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	function getLastProjectId()
	{
		global $mysql;
		$arrayPosition=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `status` = 'Open' ORDER BY id DESC LIMIT 0, 1";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		
		return $result['id'];
	}
	
	
	
	function getListingCount($id=NULL)
	{
	
		if($id!=NULL)
		{
			$extraStr=" AND `emp_id` = '".$id."'";
		}
		$count=0;
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `status` = 'Open'".$extraStr;
		
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
		CONTROLLER_PROJECT::controlFrontPageDisplay($style, $parameter1);
	}
	
	function displayFeature($id=NULL, $parameter1=NULL, $featureAliasId=NULL)
	{
		CONTROLLER_PROJECT::controlFlowProcess($parameter1);
	}
	
	
	function getMyProjectListing($start, $no,$userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr="WHERE `authorUserId` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr." ORDER BY dateCreated DESC LIMIT ".$start.", ".$no."";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	function getMyListingCount($id=NULL)
	{
		if($id!=NULL)
		{
			$extraStr="WHERE `authorUserId` = '".$id."'";
		}
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` ".$extraStr;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	function startListing()
	{
		global $mysql;
		$error=new Error();
		
		$fileSql=PROJECT::getProjectFiles($_REQUEST['fiid']);
		while($result=$mysql->fetch_assoc_mine($fileSql))
		{
			$frontPageYes='frontpage'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			$status='status'.$result['id'];
			$status=$_POST[$status];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_files` SET `status` = '".$status."',`frontPageYes` = '".$frontPageYes."'  WHERE `id` = '".$result['id']."'";
			$sql= $mysql->query($update);
		}
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'Valid' WHERE `id` = '".$_REQUEST['fiid']."'";
		$sql= $mysql->query($update);
		if($sql)
		{
			$propDet=PROJECT::getProjectDetails($_REQUEST['fiid']);
			$startDate=date('Y-m-d H:i:s');
			$endDate=add_or_subtract_days($startDate, $propDet['period'], 1);
			$endDate=$endDate;
			
			$update="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` (`id` ,`projectId`,`re_startListingDate`,`supposedEndDate`,`status`)VALUES ('' , '".$_REQUEST['fiid']."', CURRENT_TIMESTAMP, '".$endDate."', '1')";
			//echo $update;
			//$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` SET `status` = '1' WHERE `projectId` = '".$_REQUEST['fiid']."'";
			$sql= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy('index.php?fid='.ADMINISTRATOR::getAdminFunctionId('create_another').'','errcpj=errcpj102');
		return $url;
	}
	
	
	
	function updateListing()
	{
		global $mysql;
		$error=new Error();
		echo 11;
		$fileSql=PROJECT::getAllProjectFiles($_REQUEST['id']);
		while($result=$mysql->fetch_assoc_mine($fileSql))
		{
			$frontPageYes='frontpage'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			$status='status'.$result['id'];
			$status=$_POST[$status];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_files` SET `status` = '".$status."',`frontPageYes` = '".$frontPageYes."'  WHERE `id` = '".$result['id']."'";
			echo $update; 
			$sql= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	function saveListing()
	{
		global $mysql;
		$error=new Error();
		
		$fileSql=PROJECT::getProjectFiles($_REQUEST['fiid']);
		while($result=$mysql->fetch_assoc_mine($fileSql))
		{
			$frontPageYes='frontpage'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			$status='status'.$result['id'];
			$status=$_POST[$status];
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_files` SET `status` = '".$status."',`frontPageYes` = '".$frontPageYes."'  WHERE `id` = '".$result['id']."'";
			echo $update."<br>";
			$sql= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy('index.php?fid='.ADMINISTRATOR::getAdminFunctionId('create_another').'','errcpj=errcpj2031');
		return $url;
	}
	
	function doCreateProject()
	{
		global $mysql;
		$error=new Error();
		
		//echo 1212;
		$check=0;
		setcookie("postprj[PROJECT_NAME]", $_POST['PROJECT_NAME']);
		setcookie("postprj[PERIOD]", $_POST['PERIOD']);
		setcookie("postprj[PROJ_DETAIL]", $_POST['PROJ_DETAIL']);
		setcookie("postprj[PRIVATE_IVY]", $_POST['PRIVATE_IVY']);
		setcookie("postprj[MAXIMUM]", $_POST['MAXIMUM']);
		setcookie("postprj[MINIMUM]", $_POST['MINIMUM']);
		setcookie("postprj[PAYMODE]", $_POST['PAYMODE']);
		setcookie("postprj[HIDE_BID]", $_POST['HIDE_BID']);		
		setcookie("postprj[IMOB_CHOOSE]", $_POST['IMOB_CHOOSE']);
		setcookie("postprj[SPECIFY]", join(',', $_POST['SPECIFY']));
		
		//print_r($_COOKIE['postprj']);
		$result_spec_SQL=SPECIALIZATION::getDetails();
		$array=array();
		while($result_spec=$mysql->fetch_assoc_mine($result_spec_SQL))
		{
			$specs='SPECS'.$result_spec['id'];
			$specs_1='postprj[SPECS'.$result_spec['id']."]";
			if($_POST[$specs]==$result_spec['id'])
			{
				array_push($array, $result_spec['id']);
				setcookie($specs_1, $_POST[$specs]);
				$check=1;
			}
		}
		
//		print_r($array);
//		setcookie("postprj[SPECS]", $array);
		//echo $_COOKIE['postprj']['SPECS'][0];
		/*print_r ($_COOKIE['postprj']);
		echo "<br />";
		print_r($_POST['SPECS']);*/

		
		
		
		
		$username=setDataDB($_POST['USERNAME']);
		$password=md5(($_POST['PASSWORD']));		
		$project_name=setDataDB($_POST['PROJECT_NAME']);
		$period=setDataDB($_POST['PERIOD']);
		$proj_detail=setDataDB(nl2br($_POST['PROJ_DETAIL']));
		$minimum=setDataDB($_POST['MINIMUM']);
		$maximum=setDataDB($_POST['MAXIMUM']);
		$prj_titler=setDataDB($_POST['PROJECT_NAME']);
		$private_ivy=$_POST['PRIVATE_IVY'];
		$specs=$_POST['SPECS'];
		$post_time=localtime();
		$time=$post_time[2].":".$post_time[1].":".$post_time[0];
		$post_date=date("Y-m-d H:i:s");
		
		if($period<0)
		{
			$period=1;
		}
		$expiry_date=add_or_subtract_days($post_date, $period, 1);
		$expiry_time=$time;		//because we expect it to be in intervals of complete 24hours
		
	
		if($check==0)
		{
			//no specs
			return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19040'));
		}
		else
		{
			if(sizeof($_POST['BUDT'])!=0)
			{
				$num_min=1;
				$num_max=1;
				$minimum=0;
				$maximum=0;
				$budt=1;	
			}
			else
			{
				$num_min=is_numeric($_POST['MINIMUM']);
				$num_max=is_numeric($_POST['MAXIMUM']);
				$budt=0;
			}
			
			
			
			$num_per=is_numeric($_POST['PERIOD']);		
			$proj_period=setDataDB($_POST['PERIOD']);
			
			
			$url_verify=no_email_http($_POST['PROJECT_NAME']);

			if(($url_verify!=2) || (strlen($_POST['PROJECT_NAME'])==0))
			{
				return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19041'));
				//url in project name
			}
			else
			{
				
				//verify that projectname exists
				
				$url_verify_det=no_email_http($_POST['PROJ_DETAIL']);			
				if($url_verify_det!=2)
				{
					//url in project detail
					return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19042'));
				}
				else
				{
					$privater='';
					
					if($_POST['PRIVATE_BID']=='Private')
					{
						$privater='Private';
					}
					else
					{					
					}
					
					if($minimum <= $maximum)
					{
					
					}
					else
					{
						//exchange
						$temp_min=$minimum;
						$minimum=$maximum;
						$maximum=$temp_min;
						
						if($maximum<0)
						{
							$maximum=($maximum * (-1));
						}
						if($minimum<0)
						{
							$minimum=($minimum * (-1));
						}
					}
					
					if(($proj_period>36) || ($proj_period<0))
					{
						//time limit exceeded error
						return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19043'));
					}
					else
					{
						if((strlen($proj_detail))==0)
						{
							//if payment method is not chosen, give employer error message
							return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19044'));
						}
						else
						{
							//echo 12;
								if(sizeof($_POST['SPECIFY'])>0)
								{
									$private=1;
									$private_ivy=join(',', $_POST['SPECIFY']);																			
								}

								$index--;
								$imobilliarechoose=0;
								if(($_POST['IMOB_CHOOSE'])=='imobilliare_Chooses')
								{
									$imobilliarechoose=1;
								}


								$index--;										
								if(($_POST['HIDE_BID'])=='Bids_Hidden')
								{
									$hide=1;
								}
							
							
							//proceed to insert in db
							//$private_ivy='';
							if(USER::confirmActiveUser($username, $password, $_SESSION['uid'])==TRUE)
							{
								if(PROJECT::getProjectDetailsByName($prj_titler)!=NULL)
								{
									return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19045'));
								}
								else
								{
									$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project` (`id` ,`unique_id`,`emp_id` ,`header` ,`detail` ,`period`, `min_bdgt` ,`max_bdgt` ,`Open_Price`,`creation_date`,`expiry_date` ,`private`,`hidden_bids`, `featured`,`status` ,`private_devps`,`Choose_Developer`, `payment_mode`) VALUES ('' , UUID(), '".$_SESSION['uid']."', '".$prj_titler."', '".$proj_detail."', '".$period."', '".round($minimum)."', '".round($maximum)."', '".$budt."', CURRENT_TIMESTAMP, '".$expiry_date."', '".$private."', '".$hide."', 0, 'Open', '".$private_ivy."', '".$imobilliarechoose."', '".$_POST['PAYMODE']."')";
									//
									echo $entryString;
									$sql1= $mysql->query($entryString);
									$projId=$mysql->insert_id;
									
									if(is_numeric($projId))
									{
										for($count=0;$count<sizeof($array);$count++)
										{
											$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_specialization` (`id` ,`projectId`,`specializationId` ,`status`) VALUES ('' , '".$projId."', '".$array[$count]."', '1')";
									//
											echo $entryString;
											$sql1= $mysql->query($entryString);
										}
									}
								}
								setcookie("postprj[SPECS]", '', time() - 86400);
								setcookie("postprj[PROJECT_NAME]", '', time() - 86400);
								setcookie("postprj[PERIOD]", '', time() - 86400);
								setcookie("postprj[PROJ_DETAIL]", '', time() - 86400);
								setcookie("postprj[PRIVATE_IVY]", '', time() - 86400);
								setcookie("postprj[SPECIFY]", '', time() - 86400);
								setcookie("postprj[MAXIMUM]", '', time() - 86400);
								setcookie("postprj[MINIMUM]", '', time() - 86400);
								setcookie("postprj[PAYMODE]", '', time() - 86400);
								setcookie("postprj[HIDE_BID]", '', time() - 86400);
								setcookie("postprj[IMOB_CHOOSE]", '', time() - 86400);
								setcookie("postprj[PRIVATE_BID]", '', time() - 86400);

//($result_spec=$mysql->fetch_assoc_mine($result_spec_SQL))
								for($count=0;$count<sizeof($array);$count++)
								{
									$specs='SPECS'.$array[$count];
									$specs_1='postprj[SPECS'.$array[$count]."]";
									if($_POST[$specs]==$array[$count])
									{
										setcookie($specs_1, '', time() - 86400);
										$check=1;
									}
								}
								
								//echo "<br />This is test1<br />";
								$emailer=new Email();	
								$siteDet=SITE::getDetails();
								if($budt==1)
								{
									$amount="Not specified (Open bidding)";
								}
								else
								{
									$amount="Between NGN".round($minimum)." and NGN".round($maximum);
								}
								$text_body  = "Hello, <br><br>";
								$text_body .= "The project "."-<b>".$prj_titler."</b>-"." has been posted on Imobilliare.com<br><br>";
								$text_body .= "Projects bid range: <b>".$amount."</b><br>";		
								$text_body .= "To view the project click on the link: <a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."</a><br><br>";						
								$text_body .= "Sincerely, <br>";
								$text_body .= "<b>Imobilliare Management</b>";
					
								$subject = "New Project Posted.";	
								//echo "<br />This is test2<br />";
								if($private==1)
								{
									//for private posting
									//mailer(1, 1, $str_em_id[0], $str_em_em[$index0], $str_em_pr1[$index0]);
									
									
									//echo $message;
									//$user=new User();
									//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
									//echo 10;	
									//include ("../../../features/user/user_class.php");
									//echo "<br />This is test3<br />";
									$arraySend=explode(',', $private_ivy);
									for($count=0;$count<sizeof($arraySend);$count++)
									{
										$userDetails=whoIsUser($arraySend[$count]);
										if($userDetails==false)
										{
										
										}
										else
										{											
											$emailer->sendMail($userDetails['email'], $subject, $text_body, $siteDet);
										}
									}
									
								}
								else
								{		
									//echo "<br />This is test3<br />";
									$arrayList=PROJECT::getSendMailToDevelopers($array);
									//print_r($arrayList);
									for($count=0;$count<sizeof($arrayList);$count++)
									{
										$emailer->sendMail($arrayList[$count], $subject, $text_body, $siteDet);						
									}
									//for general posting
								}
								
								return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19046'));
							}
							else
							{
								return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19047'));
							}
						}
					}
				}
				
			}
		}
		//$fileId=$mysql->insert_id;
	}
	
	
	
	function getSendMailToDevelopers($array)
	{
		global $mysql;
		$arrayUserId=array();
		$arrayUserIdResult=array();
		
		for($count=0;$count<sizeof($array);$count++)
		{
			$str="SELECT ".DEFAULT_DB_TBL_PREFIX."_user.email as email FROM `".DEFAULT_DB_TBL_PREFIX."_user_specialization`, `".DEFAULT_DB_TBL_PREFIX."_user` WHERE ".DEFAULT_DB_TBL_PREFIX."_user_specialization.specializationId = '".$array[$count]."' AND ".DEFAULT_DB_TBL_PREFIX."_user_specialization.status = '1' AND (".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_user_specialization.userId = ".DEFAULT_DB_TBL_PREFIX."_user.id)";
			echo "<br />".$str."<br />";
			$sql= $mysql->query($str);
			while($result=$mysql->fetch_assoc_mine($sql))
			{
				//echo $result['email'];
				array_push($arrayUserId,$result['email']);
			}
		}
		
		$arrayUserIdResult=array_unique($arrayUserId);
		//print_r($arrayUserIdResult);
		return $arrayUserIdResult;
	
	}
	
	
	
	function finalRestrictAccess($fiid)
	{
		global $mysql;
		
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `id` = ".$fiid;
		
		$sql1= $mysql->query($str1);
		$result1=$mysql->fetch_assoc_mine($sql1);
		
		if($result1['status']=='Open')
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	
	}
	
	
	
	function doUpdateProject()
	{
		global $mysql;
		$error=new Error();
		
		$check=0;
		setcookie("postprj[PROJECT_NAME]", $_POST['PROJECT_NAME']);
		setcookie("postprj[PERIOD]", $_POST['PERIOD']);
		setcookie("postprj[PROJ_DETAIL]", $_POST['PROJ_DETAIL']);
		setcookie("postprj[PRIVATE_IVY]", $_POST['PRIVATE_IVY']);
		setcookie("postprj[MAXIMUM]", $_POST['MAXIMUM']);
		setcookie("postprj[MINIMUM]", $_POST['MINIMUM']);
		setcookie("postprj[PAYMODE]", $_POST['PAYMODE']);
		setcookie("postprj[HIDE_BID]", $_POST['HIDE_BID']);		
		setcookie("postprj[IMOB_CHOOSE]", $_POST['IMOB_CHOOSE']);
		setcookie("postprj[PRIVATE_BID]", $_POST['PRIVATE_BID']);
		setcookie("postprj[ADD_DAYS]", $_POST['ADDDAYS']);
		
		$result_spec_SQL=SPECIALIZATION::getDetails();
		$array=array();
		while($result_spec=$mysql->fetch_assoc_mine($result_spec_SQL))
		{
			$specs='SPECS'.$result_spec['id'];
			$specs_1='postprj[SPECS'.$result_spec['id']."]";
			if($_POST[$specs]==$result_spec['id'])
			{
				array_push($array, $result_spec['id']);
				setcookie($specs_1, $_POST[$specs]);
				$check=1;
			}
		}
		
//		print_r($array);
//		setcookie("postprj[SPECS]", $array);
		//echo $_COOKIE['postprj']['SPECS'][0];
		/*print_r ($_COOKIE['postprj']);
		echo "<br />";
		print_r($_POST['SPECS']);*/

		
		
		
		
		$username=setDataDB($_POST['USERNAME']);
		$password=md5((escapeshellcmd(strip_tags($_POST['PASSWORD']))));		
		$project_name=setDataDB($_POST['PROJECT_NAME']);
		$period=setDataDB($_POST['PERIOD']);
		
		if(isset($_REQUEST['edit']))
		{
			$projDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);	
			$newPeriod=$_POST['ADDDAYS'] + $period;
			$new_expiry_date=add_or_subtract_days($projDetails['creation_date'], $newPeriod, 1);
		}
		$proj_detail=setDataDB(nl2br(escapeshellcmd(strip_tags($_POST['PROJ_DETAIL']))));
		$minimum=setDataDB(escapeshellcmd($_POST['MINIMUM']));
		$maximum=setDataDB(escapeshellcmd($_POST['MAXIMUM']));
		$prj_titler=setDataDB(escapeshellcmd($_POST['PROJECT_NAME']));
		$private_ivy=$_POST['PRIVATE_IVY'];
		$specs=$_POST['SPECS'];
		$post_time=localtime();
		$time=$post_time[2].":".$post_time[1].":".$post_time[0];

		if($period<0)
		{
			$period=1;
		}
		$expiry_date=add_or_subtract_days($post_date, $period, 1);
		$expiry_time=$time;		//because we expect it to be in intervals of complete 24hours
		
	
		if($check==0)
		{
			//no specs
			//header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj001'));
		}
		else
		{
			if(sizeof($_POST['BUDT'])!=0)
			{
				$num_min=1;
				$num_max=1;
				$minimum=0;
				$maximum=0;
				$budt=1;	
			}
			else
			{
				$num_min=is_numeric($_POST['MINIMUM']);
				$num_max=is_numeric($_POST['MAXIMUM']);
				$budt=0;
			}
			
			$num_per=is_numeric($_POST['PERIOD']);		
			$proj_period=setDataDB($_POST['PERIOD']);
			
			
			$url_verify=no_email_http($_POST['PROJECT_NAME']);

			if(($url_verify!=2) || (strlen($_POST['PROJECT_NAME'])==0))
			{
				header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19041'));
				//url in project name
			}
			else
			{
				
				//verify that projectname exists
				
				$url_verify_det=no_email_http($_POST['PROJ_DETAIL']);			
				if($url_verify_det!=2)
				{
					//url in project detail
					header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19042'));
				}
				else
				{
					$privater='';
					
					if($_POST['PRIVATE_BID']=='Private')
					{
						$privater='Private';
					}
					else
					{					
					}
					
					if($minimum <= $maximum)
					{
					
					}
					else
					{
						//exchange
						$temp_min=$minimum;
						$minimum=$maximum;
						$maximum=$temp_min;
					}
					
					if(($proj_period>36) || ($proj_period<0))
					{
						//time limit exceeded error
						header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19043'));
					}
					else
					{
						if((strlen($_POST['PROJ_DETAIL']))==0)
						{
							//if payment method is not chosen, give employer error message
							header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19044'));
						}
						else
						{
							//echo 12;
								if($_POST['PRIVATE_BID']=='Private')
								{
									$private=1;
									$private_ivy=$_POST['SPECIFY'];																						
								}

								$index--;
								$imobilliarechoose=0;
								if(($_POST['IMOB_CHOOSE'])=='imobilliare_Chooses')
								{
									$imobilliarechoose=1;
								}


								$index--;										
								if(($_POST['HIDE_BID'])=='Bids_Hidden')
								{
									$hide=1;
								}
							
							
							//proceed to insert in db
							$private_ivy='';
							if(USER::confirmActiveUser($username, $password, $_SESSION['uid'])==true)
							{
								
							
								if(isset($_REQUEST['edit']))
								{
									$str=", `expiry_date` = '".$new_expiry_date."', `period` = '".$newPeriod."'";
								}
								
								$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `header` = '".$prj_titler."', `detail` = '".$proj_detail."', `min_bdgt` = '".round($minimum)."', `max_bdgt` = '".round($maximum)."', `Open_Price` = '".$budt."', `private` = '".$private."', `hidden_bids` = '".$hide."', `private_devps` = '".$private."', `Choose_Developer` = '".$imobilliarechoose."', `payment_mode` = '".$_POST['PAYMODE']."'".$str." WHERE `id` = '".$_REQUEST['fiid']."' LIMIT 1";
								
								
								//
								//echo $entryString;
								$sql1= $mysql->query($entryString);
								$projId=$mysql->insert_id;
								//echo $projId;
								
								$entryString="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_project_specialization` WHERE projectId = '".$_REQUEST['fiid']."'";
							//
								//echo $entryString;
								$sql1= $mysql->query($entryString);
								
								for($count=0;$count<sizeof($array);$count++)
								{
									$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_specialization` (`id` ,`projectId`,`specializationId` ,`status`) VALUES ('' , '".$_REQUEST['fiid']."', '".$array[$count]."', '1')";
							//
									//echo $entryString;
									$sql1= $mysql->query($entryString);
								}
							
							
								setcookie("postprj[SPECS]", '', time() - 86400);
								setcookie("postprj[PROJECT_NAME]", '', time() - 86400);
								setcookie("postprj[PERIOD]", '', time() - 86400);
								setcookie("postprj[PROJ_DETAIL]", '', time() - 86400);
								setcookie("postprj[PRIVATE_IVY]", '', time() - 86400);
								setcookie("postprj[MAXIMUM]", '', time() - 86400);
								setcookie("postprj[MINIMUM]", '', time() - 86400);
								setcookie("postprj[PAYMODE]", '', time() - 86400);
								setcookie("postprj[HIDE_BID]", '', time() - 86400);
								setcookie("postprj[IMOB_CHOOSE]", '', time() - 86400);
								setcookie("postprj[PRIVATE_BID]", '', time() - 86400);
								setcookie("postprj[ADD_DAYS]", '', time() - 86400);
								
								
								

//($result_spec=$mysql->fetch_assoc_mine($result_spec_SQL))
								for($count=0;$count<sizeof($array);$count++)
								{
									$specs='SPECS'.$array[$count];
									$specs_1='postprj[SPECS'.$array[$count]."]";
									if($_POST[$specs]==$array[$count])
									{
										setcookie($specs_1, '', time() - 86400);
										$check=1;
									}
								}
										
								if($private==1)
								{
									//for private posting
									//mailer(1, 1, $str_em_id[0], $str_em_em[$index0], $str_em_pr1[$index0]);
								}
								else
								{								
									//for general posting
									//mailer(1, 25, $str_em_id[0], 0, 0);
								}
								
								header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19048'));
							}
							else
							{
								header('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19047'));
							}
						}
					}
				}
				
			}
		}
		//assuming all are provided
		
	}
	
	
	function closeProject($fiid, $uid)
	{
		global $mysql;
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'Closed' WHERE id = '".$fiid."' AND `emp_id` = '".$uid."' LIMIT 1";
		//echo $entryString;
		$sql1= $mysql->query($entryString);
		//$projId=$mysql->insert_id;
		//echo $projId;
	}
	
	
	
	function getListByUserType($uid)
	{
		global $mysql;
		$array=array();
		
		//Employer'
		if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `emp_id` = '".$uid."' AND `chosen_developer_id` != '0' AND `status` = 'Completed'".$extraStr;
			
			$sql= $mysql->query($str);
			while($result=$mysql->fetch_assoc_mine($sql))
			{
				array_push($array,$result['chosen_developer_id']);
			}
		}
		else if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE `chosen_developer_id` = '".$uid."' AND `status` = 'Completed'".$extraStr;
			$sql= $mysql->query($str);
			while($result=$mysql->fetch_assoc_mine($sql))
			{
				array_push($array,$result['emp_id']);
			}
		}
		//print_r($array);
		return $array;
	}
	
	function getReviews($reviewedId)
	{
		global $mysql;
		$extraStr="";
		
		$return=array();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_reviews`, `".DEFAULT_DB_TBL_PREFIX."_user` WHERE ".DEFAULT_DB_TBL_PREFIX."_reviews.reviewed_id = '".$reviewedId."' AND ".DEFAULT_DB_TBL_PREFIX."_reviews.reviewed_id = ".DEFAULT_DB_TBL_PREFIX."_user.id AND ".DEFAULT_DB_TBL_PREFIX."_reviews.status = 'Valid'";
		$sql= $mysql->query($str);
		while($result=$mysql->fetch_assoc_mine($sql))
		{
			array_push($return, $result);
		}
		return $return;
	}
	
	
	function bidderAcceptProject($uniqId, $fiid, $fiiid)
	{
		global $mysql;
		$extraStr="";
		
	
			$str="SELECT *, dateAssigned, header, chosen_developer_id, emp_id, username FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.unique_id = '".$uniqId."' AND ".DEFAULT_DB_TBL_PREFIX."_project.id = '".$fiid."' AND ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Assigned' AND (".DEFAULT_DB_TBL_PREFIX."_user.id = ".DEFAULT_DB_TBL_PREFIX."_project.chosen_developer_id AND ".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active' AND ".DEFAULT_DB_TBL_PREFIX."_bid.project_id = ".DEFAULT_DB_TBL_PREFIX."_project.id AND ".DEFAULT_DB_TBL_PREFIX."_bid.unique_id = '".$fiiid."' AND ".DEFAULT_DB_TBL_PREFIX."_project.chosen_developer_id = ".DEFAULT_DB_TBL_PREFIX."_bid.developer_id)".$extraStr;
			$sql= $mysql->query($str);
			$result=$mysql->fetch_assoc_mine($sql);
//			http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$fiid."&agree=1&iqid=".$projDetail['unique_id']."
			if(($mysql->num_rows>0) && (getDayDiff(date("Y-m-d H:i:s"), $result['dateAssigned'])<3))
			{
				$str="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'On-Going' WHERE `unique_id` = '".$uniqId."' AND `id` = '".$fiid."' AND `status` = 'Assigned'".$extraStr;
					//echo $str;
	
				$sql= $mysql->query($str);
				$devDet=USER::getDetails($result['chosen_developer_id']);
				$empDet=USER::getDetails($result['emp_id']);
				
				$emailer=new Email();	
				$siteDet=SITE::getDetails();
				
				$text_body  = "Hello, <br><br>";
				$text_body .= "Your chosen developer ".$result['username']." has accepted to handle the project "."-<b>".$result['header']."</b>-"." on Imobilliare.com<br><br>";
				$text_body .= "The contact email addresses for the both of you are:<br />";		
				$text_body .= $empDet['username']." (Employer): ".$empDet['email']."<br />".$devDet['username']." (Developer): ".$devDet['email']."<br /><br />Constant communication is required between the two of you in order to ensure that the project is successful. <br />To view the project click on the link: <a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$fiid."</a><br><br>";						
				$text_body .= "Sincerely, <br>";
				$text_body .= "<b>Imobilliare Management</b>";
	
				$subject = "Project - ".$result['header']." - Started!";	
				//echo "<br />This is test2<br />";
				$emailer->sendMail($empDet['email'], $subject, $text_body, $siteDet);
				$emailer->sendMail($devDet['email'], $subject, $text_body, $siteDet);
				$url='Location: index.php?'.str_replace('&agree=1', '&agreed=1', $_SERVER['QUERY_STRING']);
				echo $url;
				return $url;
			}
			else
			{
				$error=new Error();
				return ('Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19350'));
			}
	
	}
	
	
	function projectDeveloperCompleted($fiid, $devId)
	{
		global $mysql;
		
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `devstatus` = 'Completed' WHERE id = '".$fiid."' AND chosen_developer_id = '".$devId."' LIMIT 1";
		echo $entryString;
		$sql1= $mysql->query($entryString, 1);
		echo $mysql->affected_rows;
		if($mysql->affected_rows > 0)
		{
		
			$projDetail=PROJECT::getProjectDetails($fiid);
			$devDetails=USER::getUserDetails($projDetail['chosen_developer_id']);
			$empDetails=USER::getUserDetails($projDetail['emp_id']);
			$siteDet=SITE::getDetails();
			$subject='Project - '.$projDetail['header'].' - has been completed!';
			
	
	
			$text_body = "Hello ".$devDetails['username'].",";
			$text_body .= "<br><br>The employer of the project - <b>".$projDetail['header']."</b> - has been notified that you have indicated that you have finished the project. As such necessary links to enable the employer complete any payments to you have been activated. <br />";
			$text_body .= "<br>If you have any issues in regards to payments ensure you lay any complaints to our support team by clicking on the 'Report this project' link on the projects page.";
			
			$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
			$text_body .= "Sincerely, <br>";
			$text_body .= "<b>Imobilliare Management</b>";
			
			
			$emailer=new Email();
			//echo $message;
			$user=new User();
			//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
			//echo 10;	
			//include ("../../../features/user/user_class.php");
			$emailer->sendMail($devDetails['email'], $subject, $text_body, $siteDet);
			
			
			//e,mployer
			$subject='Project - '.$projDetail['header'].' - Latest status!';
			
	
	
			$text_body = "Hello ".$empDetails['username'].",";
			$text_body .= "<br><br>The selected developer/designer for your project - <b>".$projDetail['header']."</b> - has indicated that they have finished the project.<br>";
			$text_body .= "<br>If you agree that the project has been completed, kindly click on the 'Yes, Project Has Been Completed' link on the projects page and complete or release any funds to the developer.";
			
			$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
			$text_body .= "Sincerely, <br>";
			$text_body .= "<b>Imobilliare Management</b>";
			
			
			$emailer=new Email();
			//echo $message;
			$user=new User();
			//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
			//echo 10;	
			//include ("../../../features/user/user_class.php");
			$emailer->sendMail($empDetails['email'], $subject, $text_body, $siteDet);
		}
	}
	
	
	function projectCompleted($fiid, $empId)
	{
		global $mysql;
		
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'Completed' WHERE id = '".$fiid."' AND emp_id = '".$empId."' LIMIT 1";
		echo $entryString;
		$sql1= $mysql->query($entryString, 1);
		if($mysql->affected_rows > 0)
		{
			$projDetail=PROJECT::getProjectDetails($fiid);
			$devDetails=USER::getUserDetails($projDetail['chosen_developer_id']);
			$empDetails=USER::getUserDetails($projDetail['emp_id']);
			$siteDet=SITE::getDetails();
			$subject='Project - '.$projDetail['header'].' - has been completed!';
			
	
	
			$text_body = "Hello ".$devDetails['username'].",";
			$text_body .= "<br><br>The project - <b>".$projDetail['header']."</b> - which you handled has been assigned a completed status.<br>";
			$text_body .= "<br>You can now rate the employer - ".$empDetails['username']." based on the project. <br>You can also ask the employer to rate you on this project.";
			$text_body .= "Remember the higher your rating, the more likelihood you will be assigned projects in the future by employers.<br>";
			
			
			$text_body .="Click on members lounge link on your menu bar in order to rate an employer";
			$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
			$text_body .= "Sincerely, <br>";
			$text_body .= "<b>Imobilliare Management</b>";
			
			
			$emailer=new Email();
			//echo $message;
			$user=new User();
			//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
			//echo 10;	
			//include ("../../../features/user/user_class.php");
			$emailer->sendMail($devDetails['email'], $subject, $text_body, $siteDet);
			
			
			//e,mployer
			$subject='Project - '.$projDetail['header'].' - has been completed!';
			
	
	
			$text_body = "Hello ".$empDetails['username'].",";
			$text_body .= "<br><br>Your project - <b>".$projDetail['header']."</b> - has been assigned a completed status.<br>";
			$text_body .= "<br>You can now rate the developer - ".$devDetails['username']." who worked on the project. Ratings are based on projects the developer has worked on which were posted by you. <br>You can also ask the developer to rate you on this project.";
			$text_body .= "Remember the higher the developers rating, the more likelihood he/she will be assigned projects in the future by employers.<br>";
			
			
			$text_body .="Click on members lounge link on your menu bar in order to rate a developer";
			$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
			$text_body .= "Sincerely, <br>";
			$text_body .= "<b>Imobilliare Management</b>";
			
			
			$emailer=new Email();
			//echo $message;
			$user=new User();
			//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
			//echo 10;	
			//include ("../../../features/user/user_class.php");
			$emailer->sendMail($devDetails['email'], $subject, $text_body, $siteDet);
		}
	}
	
	
	
	function assignProject($fiid, $devId)
	{
		global $mysql;
		
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project` SET `status` = 'Assigned', `dateAssigned` = CURRENT_TIMESTAMP, `chosen_developer_id` = '".$devId."'  WHERE id = '".$fiid."' AND emp_id = '".$_SESSION['uid']."' LIMIT 1";
		$sql1= $mysql->query($entryString);
		
		$projDetail=PROJECT::getProjectDetails($fiid);
		$devDetails=USER::getUserDetails($projDetail['chosen_developer_id']);
		$siteDet=SITE::getDetails();
		
		$subject = "You've Won Project ".$str_title[0];


		$text_body = "Hello ".$devDetails['username'].",";
		$text_body .= "<br><br>Your bid for the project - <b>".$projDetail['header']."</b> - has been selected by its employer.<br>";
		$text_body .= "<br>To ascertain that you have accepted to handle the project, please click on the link.<br>";
		$text_body .= "If you do not click on the link within 48 hours(2days), it will be deemed that you have not accepted to handle the project.<br>";
		$text_body .= "Some other developer will be reassigned to the project by the employer<br><br>";
		$text_body .="Click on: <a href='http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$fiid."&agree=1&iqid=".$projDetail['unique_id']."'>http://www.imobilliare.com/?fid=".FEATURE::getId('Project')."&fiid=".$fiid."&agree=1&iqid=".$projDetail['unique_id']."</a>";
		$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
		$text_body .= "Sincerely, <br>";
		$text_body .= "<b>Imobilliare Management</b>";
		
		
		$emailer=new Email();
		//echo $message;
		$user=new User();
		//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
		//echo 10;	
		//include ("../../../features/user/user_class.php");
		$emailer->sendMail($empDetails['email'], $subject, $text_body, $siteDet);
	}
	
	
	function addImages()
	{
		global $mysql;
		$error=new Error();
		$upload_dir="../features/project/view/images/";
		$count=0;
		$total_filesize=0;
		$move=array();
		
		$projectId=$_POST['agent_listings'];
		
		for($counter=1;$counter<11;$counter++)
		{
			$fileInputName='userfile'.$counter;
			
	
			
			if(isset($_FILES[$fileInputName]))
			{
				$size=$_FILES[$fileInputName]['size'];
			}
		
			
			
			
			if($size>0)
			{
				$file=$_FILES[$fileInputName];
				
				if(($size!=0))
				{
					$total_filesize=$total_filesize + $size0;
					switch ($file['error'])
					{
						//THE FORM SIZE IS ABOVE THE REQUIRED FORM SIZE
						case UPLOAD_ERR_FORM_SIZE:
							$err_form[0]=1;
							break;
							
						//THE SIZE OF THE UPLOADED FILES EXCEEDED 
						case UPLOAD_ERR_INI_SIZE:
							$err_inisize[0]=1;
							break;
						//PARTIAL FILE UPLOADED
						case UPLOAD_ERR_PARTIAL:
							$err_partial[0]=1;
							break;
				
						//NO ERRORS
						case UPLOAD_ERR_OK:
							if($total_filesize > MAX_FILE_SIZE)
							{
								$err_filesize[0]=1;
							}
							break;
						default:
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
							break;
					}
					
				
				
					//if present total size is above the maximum file_size don't move file to upload folder 
					if($total_filesize > MAX_FILE_SIZE)
					{
						$total_filesize=$total_filesize - $size;
					}
					//else move file to folder
					else
					{
						//if the file generally cannot be uploaded

						$data_file = $upload_dir.basename($file['name']);
						$newfilename=explode('.', basename($file['name']));
						
						$ext = substr($file['name'],strrpos($file['name'],'.') + 1);
						$type = ctype($ext);
						
						if(allowedFileUploads($file['name']))
						{
							if(!@move_uploaded_file($file['tmp_name'], $upload_dir.basename($file['name'])))
							{
								$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
								$move[$count++]=1;
							}
							else
							{
								$move[$count++]=0;
								$confirm_entry=1;
								$uniq_id=uniqid("");
								
									
								$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
								echo $entryString;
					//$sql=$display_announcement->doQuery($entryString);
								$sql= $mysql->query($entryString);
								$fileId=$mysql->insert_id;
								
								
								for($countfile=0; $countfile<sizeof($newfilename); $countfile++)
								{
									if($countfile==0)
									{
										$newfilename1=$uniq_id;
									}
									else
									{
										$newfilename1=$newfilename1.".".$newfilename[$countfile];
									}
								}
			
								$data_file1 = $upload_dir.$newfilename1;
								rename($data_file, $data_file1) or die("Could not rename $data_file");
								
								//insert for header_images
								$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_files` (`id` ,`uniqueId` ,`fileId` ,`imageType` ,`status`,`projectId`)VALUES (NULL , '".uniqid("")."', '".$fileId."', '".$type."', '1', '".$projectId."')";
								echo $entryString;
								$sql= $mysql->query($entryString);
								$fileId=$mysql->insert_id;
							}
						}
						else
						{
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
							$move[$count++]=1;
						}
					}
				}
				else
				{
				}
				
			}
		}
		
		if(in_array(1,$move))
		{
			for($cnt=0;$cnt<sizeof($move);$cnt++)
			{
				if($move[$cnt]==1)
				{
					$_SESSION['error']=$_SESSION['error']." ".$fileError[$cnt];
				}
			}
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');		
		}
		else
		{
			if(isset($_REQUEST['mod']))
			{
				$url='Location: '.$error->constructErrorAddy('index.php?fiid='.$projectId.'&fid='.ADMINISTRATOR::getAdminFunctionId('project_add_images').'','errcpj=errcpj102');

			}
			else
			{
				$url='Location: '.$error->constructErrorAddy('index.php?fiid='.$projectId.'&fid='.ADMINISTRATOR::getAdminFunctionId('start_pause_listing').'','errcpj=errcpj102');
			}
			
		}
		return $url;
	}
	
	
	
	
	function addImageToListing()
	{
		global $mysql;
		$error=new Error();
		$upload_dir="../features/project/view/images/";
		$count=0;
		$total_filesize=0;
		$move=array();
		
		$projectId=$_REQUEST['id'];
		
		for($counter=1;$counter<6;$counter++)
		{
			$fileInputName='userfile'.$counter;
			
	
			
			if(isset($_FILES[$fileInputName]))
			{
				$size=$_FILES[$fileInputName]['size'];
				
			}
		
			
			
			
			if($size>0)
			{
			
				
				$file=$_FILES[$fileInputName];
				
				if(($size!=0))
				{
					$total_filesize=$total_filesize + $size0;
					switch ($file['error'])
					{
						//THE FORM SIZE IS ABOVE THE REQUIRED FORM SIZE
						case UPLOAD_ERR_FORM_SIZE:
							$err_form[0]=1;
							break;
							
						//THE SIZE OF THE UPLOADED FILES EXCEEDED 
						case UPLOAD_ERR_INI_SIZE:
							$err_inisize[0]=1;
							break;
						//PARTIAL FILE UPLOADED
						case UPLOAD_ERR_PARTIAL:
							$err_partial[0]=1;
							break;
				
						//NO ERRORS
						case UPLOAD_ERR_OK:
							if($total_filesize > MAX_FILE_SIZE)
							{
								$err_filesize[0]=1;
							}
							break;
						default:
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
							break;
					}
					
				
				
					//if present total size is above the maximum file_size don't move file to upload folder 
					if($total_filesize > MAX_FILE_SIZE)
					{
						$total_filesize=$total_filesize - $size;
					}
					//else move file to folder
					else
					{
						//if the file generally cannot be uploaded

						$data_file = $upload_dir.basename($file['name']);
						$newfilename=explode('.', basename($file['name']));
						
						$ext = substr($file['name'],strrpos($file['name'],'.') + 1);
						$type = ctype($ext);
						
						if(allowedFileUploads($file['name']))
						{
							if(!@move_uploaded_file($file['tmp_name'], $upload_dir.basename($file['name'])))
							{
								$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
								$move[$count++]=1;
							}
							else
							{
								$move[$count++]=0;
								$confirm_entry=1;
								$uniq_id=uniqid("");
								
									
								$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
								//echo $entryString;
					//$sql=$display_announcement->doQuery($entryString);
								$sql= $mysql->query($entryString);
								$fileId=$mysql->insert_id;
								
								
								for($countfile=0; $countfile<sizeof($newfilename); $countfile++)
								{
									if($countfile==0)
									{
										$newfilename1=$uniq_id;
									}
									else
									{
										$newfilename1=$newfilename1.".".$newfilename[$countfile];
									}
								}
			
								$data_file1 = $upload_dir.$newfilename1;
								rename($data_file, $data_file1) or die("Could not rename $data_file");
								
								//insert for header_images
								$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_files` (`id` ,`uniqueId` ,`fileId` ,`imageType` ,`status`,`projectId`)VALUES (NULL , '".uniqid("")."', '".$fileId."', '".$type."', '1', '".$projectId."')";
								//echo $entryString;
								$sql= $mysql->query($entryString);
								//$fileId=$mysql->insert_id;
							}
						}
						else
						{
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
							$move[$count++]=1;
						}
					}
				}
				else
				{
				}
				
			}
		}
		
		if(in_array(1,$move))
		{
			for($cnt=0;$cnt<sizeof($move);$cnt++)
			{
				if($move[$cnt]==1)
				{
					$_SESSION['error']=$_SESSION['error']." ".$fileError[$cnt];
				}
			}
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');		
		}
		else
		{
			$url='Location: '.$error->constructErrorAddy('index.php?fiid='.$projectId.'&fid='.ADMINISTRATOR::getAdminFunctionId('start_pause_listing').'','errcpj=errcpj102');
		}
		return $url;
	}
	
	
}


?>