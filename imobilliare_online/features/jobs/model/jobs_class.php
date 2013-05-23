<?php

class Jobs extends Feature
{

	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		global $mysql;
		$checked='';
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `id` = '".$id."' AND `status` = '1'";
		
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
				echo "&nbsp;&nbsp;".getRealDataNoHTML($result['name'])."<br />";
				$checked='';
			}
		}
	}
	
	function fullPreview($id)
	{
		//not applicable
	}
	
	function displayFeature($id)
	{
		global $mysql;
		CONTROLLER_JOBS::controlFrontPageDisplay($id);
		
	}
	
	function displayFPFeature($id=NULL, $frontPageTitle=NULL)
	{
		global $mysql;
		
		echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>
		  <tr>
			<td>".$this->getAdvert($id)."</td>
		  </tr>";
		 echo "</table>";
	}
	
	function getAdvertDetails($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `id` = '".$id."'";
		
		$sqlMOD=$mysql->query($queryMOD);
		$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
		return $resultMOD;
	}
	
	function advertExists($id)
	{
		global $mysql;
		$queryMOD="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `name` = '".$id."'";
		$sqlMOD=$mysql->query($queryMOD);
		$resultMOD = $mysql->fetch_assoc_mine($sqlMOD);
		return $resultMOD;
	}
	
	function getAdverts($randomize=1)
	{
		global $mysql;
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `status` = '1'";
		
		$sql1= $mysql->query($str1);
		$id_array=array();
		
		while($result1 = $mysql->fetch_assoc_mine($sql1))
		{
			//echo $result1['id'];
			$str2="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` WHERE `status` = '1' AND `advertId` = '".$result1['id']."' ORDER BY id DESC LIMIT 0,1";
			$sql2= $mysql->query($str2);
			$result2 = $mysql->fetch_assoc_mine($sql2);
			if((strtotime($result2['supposedEndDate'])) >= (strtotime(date('Y-m-d h:i:s'))))
			{
				array_push($id_array, $result1['id']);
			}
		}


		if($randomize==1)
		{
			shuffle($id_array);
		}		
		return $id_array;
	}
	
	
	function getAdvert($id)
	{
		global $mysql;
		$id_array=array();
		
		
		$extraStr=" AND id = '".$id."'";
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `status` = '1'".$extraStr;
		$sql1= $mysql->query($str1);
		
		$result1 = $mysql->fetch_assoc_mine($sql1);
		
			$fileName=getPictureFileName($result1['fileId'], 1);
			$data="<span class='textBodyStyle3'>".$result1['name']."</span><div class='cell_seperator'>&nbsp;</div>";
			$data=$data."<a href='index.php?fid=".FEATURE::getId('Jobs')."&fiid=".$result1['id']."&redirect'><img class='advertImage' src='features/jobs/view/images/".$fileName."' border='0'></a><br /><a href='index.php?fid=".FEATURE::getId('Jobs')."&fiid=".$result1['id']."&redirect' class='link_type3'>".truncateText($result1['textContents'], 20)."</a>";
			//$data=$data."<img class='advertImage' src='features/jobs/view/images/".$fileName."' border='0'><br />".$result1['textContents']."";
		
		return $data;
				
	}
	
	
	function getDefaultAdvert()
	{
		global $mysql;
		$id_array=array();
		
			$data="<span class='textBodyStyle3'>Advertise Today</span><div class='cell_seperator'>&nbsp;</div>";
			$data=$data."<a href='administrator?fid=".ADMINISTRATOR::getAdminFunctionId('jobs_creator')."'><img class='advertImage' src='images/place_advert.png' border='0' alt='place advert'></a><br /><a href='index.php?fid=".FEATURE::getId('Jobs')."&fiid=".$result1['id']."&redirect' class='link_type3'>".$result1['textContents']."</a>";
			//$data=$data."<img class='advertImage' src='features/jobs/view/images/".$fileName."' border='0'><br />".$result1['textContents']."";
		
		return $data;
				
	}
	
	
	
	function getMyAdvertActivityDetails()
	{
		global $mysql;
		if(isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE ".DEFAULT_DB_TBL_PREFIX."_jobs.id = ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId";
			//$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE ".DEFAULT_DB_TBL_PREFIX."_project.id = ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId AND ".DEFAULT_DB_TBL_PREFIX."_project.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE ".DEFAULT_DB_TBL_PREFIX."_jobs.srcId = '".$_SESSION['uid']."' AND ".DEFAULT_DB_TBL_PREFIX."_jobs.id = ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId";
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
	
	
	
	
	function getAdvertLastActivityDetail($adId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE ".DEFAULT_DB_TBL_PREFIX."_jobs.id = ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId AND ".DEFAULT_DB_TBL_PREFIX."_jobs.id = '".$adId."' ORDER BY ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.id DESC LIMIT 0, 1";
		
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			$result1 = $mysql->fetch_assoc_mine($sql);
			return $result1;	
		}
		else
		{
			return FALSE;
		}
	}
	
	function getAdvertActivityDetail($adId)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE ".DEFAULT_DB_TBL_PREFIX."_jobs.id = ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId AND ".DEFAULT_DB_TBL_PREFIX."_jobs.id = '".$adId."'";
		
		$sql= $mysql->query($str);
		if($mysql->num_rows > 0)
		{
			$result1 = $mysql->fetch_assoc_mine($sql);
			return $result1;	
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function getAdvertForAdmin($id)
	{
		global $mysql;
		$id_array=array();
		
		
		$extraStr=" AND id = '".$id."'";
		$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `status` = '1'".$extraStr;
		$sql1= $mysql->query($str1);
		
		$result1 = $mysql->fetch_assoc_mine($sql1);
		
			$fileName=getPictureFileName($result1['fileId'], 1);
			$data="<span class='textBodyStyle3'>".$result1['name']."</span><div class='cell_seperator'>&nbsp;</div>";
			$data=$data."<a href='../index.php?fid=".FEATURE::getId('Jobs')."&fiid=".$result1['id']."&redirect'><img class='advertImage' src='../features/jobs/view/images/".$fileName."' border='0'></a><br /><a href='../index.php?fid=".FEATURE::getId('Jobs')."&fiid=".$result1['id']."&redirect' class='link_type3'>".truncateText($result1['textContents'], 20)."</a>";
			//$data=$data."<img class='advertImage' src='features/jobs/view/images/".$fileName."' border='0'><br />".$result1['textContents']."";
		
		return $data;
				
	}
	
	
	function createAdvert()
	{
		global $mysql;
		$error=new Error();
		


		$name=utf8_encode($_POST['name']);
		$url=utf8_encode($_POST['url']);
		$jobsContents=utf8_encode(adjustImageUrlToFit($_POST['jobsContents'],0));
		$fpYes=$_POST['fpYes'];
		$jobs=new Jobs();
		$fileInputName='userfile1';
		$size=$_FILES[$fileInputName]['size'];
		//echo $size;
		$upload_dir='../features/jobs/view/images/';
		$featureChildId=$_POST['preview'];
		$featureId=$_POST['featureName'];
		$addImage=$_POST['addImage'];
		$user=new User();
		$period=$_POST['noOfDays2'];
		$pricingChoiceId=$_POST['pricingChoice'];
		
		if($_POST['UpdateAdvert']=='Update')
		{
			$resultMOD = JOBS::getAdvertDetails($_REQUEST['id']);
		}
		
		if((isset($section)) && ($section!='NULL'))
		{
			$sectionId=$_POST['sectionChild'];		
		}
		else
		{
			$userDet=$user->getUserDetails($_SESSION['uid']);
			
		}
		if(($jobs->advertExists($name)) && ($_POST['CreateAdvert']=='Create') || ($jobs->advertExists($name)) && ($_POST['UpdateAdvert']=='Update') && ($name!=$resultMOD['name']))
		{
			echo $resultMOD['name'];
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj010');
		}
		
		else if((strlen($jobsContents)==0) && ($advertType=='HTML Format'))
		{
	//		$article->setEntryError(ERROR_ADVERTCONTENTS);
		
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj005');
		}
		else if((strlen($name)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
		}
		else if((($size==0)) && ($_POST['CreateAdvert']=='Create'))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj007');
		}
		else if(($size==0) && ($_POST['UpdateAdvert']=='Update') && ($addImage==1))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj008');
		}
		else
		{
			
			if(isset($_FILES[$fileInputName]))
			{
				$size=$_FILES[$fileInputName]['size'];
				$count=0; $total_filesize=0;
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
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj007');
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
						if(!@move_uploaded_file($file['tmp_name'], $upload_dir.basename($file['name'])))
						{
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
						}
						else
						{
							$move[0]=0;
							$confirm_entry=1;
							$uniq_id=uniqid("");
								
							$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
							//echo $entryString;
				//$sql=$display_announcement->doQuery($entryString);
							$sql= $mysql->query($entryString);
							
							$fileId1=$mysql->insert_id;
							
							//insert other parameters appropriately
							$data_file = $upload_dir.basename($file['name']);
		
							$newfilename=explode('.', basename($file['name']));
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
							
						}
					}
				}
				else
				{
				}
			}	
				//reset file size
				$size=0;
					
					
					
			
			if($_POST['CreateAdvert']=='Create')
			{
				$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_jobs` (`id` ,`textContents`,  `fileId`, `status`, `name`, `linkToFeatureId`, `linkToFeatureChildId`, `srcId`, `dateUploaded`, `url`, `periodLasts`, `billingId`)VALUES ('' , '".$jobsContents."', '".$fileId1."', '1', '".$name."', '".$featureId."', '".$featureChildId."', '".$_SESSION['uid']."', CURRENT_TIMESTAMP, '".$url."', '".$period."', '".$pricingChoiceId."')";
				
				$sql= $mysql->query($entryString);
				$url='Location: index.php?fid='.ADMINISTRATOR::getAdminFunctionId('start_pause_jobs').'&fiid='.$mysql->insert_id;
			}
			if($_POST['UpdateAdvert']=='Update')
			{
				if(($addImage==1) && (is_numeric($fileId1)==1))
				{
					$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `fileId` = '".$fileId1."',`textContents` = '".$jobsContents."', `name` = '".$name."', `linkToFeatureId` = '".$featureId."', `url` = '".$url."',  `linkToFeatureChildId` = '".$featureChildId."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
					//echo "<br />113";
				}
				else
				{
					if(($addImage==0) && (strlen(strip_tags($jobsContents))>0))
					{
						$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `textContents` = '".$jobsContents."', `name` = '".$name."',`url` = '".$url."', `linkToFeatureId` = '".$featureId."', `linkToFeatureChildId` = '".$featureChildId."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
						//echo "<br />112";
					}
					else
					{
						$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `textContents` = '".$jobsContents."', `name` = '".$name."', `url` = '".$url."', `linkToFeatureId` = '".$featureId."', `linkToFeatureChildId` = '".$featureChildId."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
						//echo "<br />111";
					}
				}
				
				echo $entryString;
				//$sql1= $mysql->query($update);
				$sql= $mysql->query($entryString);
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
			}
			
			
		}
		return $url;
	}
	
	
	
	function getLastActivityEntry($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` WHERE `advertId` = '".$id."' ORDER BY id DESC";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;
	}
	
	
	function getAdvertActivityDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` WHERE `advertId` = '".$id."'";
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
	
	
	
	function getAdvertEndDate($id)
	{
		global $mysql;
		$propDet=JOBS::getAdvertDetails($id);
		$propActDetSQL=JOBS::getAdvertActivityDetails($id);
		
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
	
	
	
	function pauseListing()
	{
		global $mysql;
		$error=new Error();
		$resultMOD=JOBS::getAdvertDetails($_REQUEST['fiid']);
		
		$endDate=JOBS::getAdvertEndDate($_REQUEST['fiid']);

		
			if(($resultMOD['status']=='1') && ($resultMOD['pausedYes']=='0'))
			{
				$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `pausedYes` = 1 WHERE `id` = '".$_REQUEST['fiid']."' LIMIT 1";
				$sql1= $mysql->query($update);
				
				
				$lastPausedEntry=JOBS::getLastActivityEntry($_REQUEST['fiid']);
				if($lastPausedEntry==NULL)
				{
					//simply insert the entry
					//$result['dateCreated']: this is wrong as we can not start counting from then but fro when the listing started
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` (`id` ,`advertId`,`re_startListingDate` ,`pauseListingDate` ,`supposedEndDate`) VALUES ('' , '".$resultMOD['id']."', '".$resultMOD['dateUploaded']."', CURRENT_TIMESTAMP, '".$endDate."')";
					echo $entryString;
					//$sql1= $mysql->query($entryString);
				}
				else
				{
					if($lastPausedEntry['pauseListingDate']=='0000-00-00 00:00:00')
					{
						$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` SET `pauseListingDate` = CURRENT_TIMESTAMP WHERE `id` = '".$lastPausedEntry['id']."' LIMIT 1";
						echo $update;
						$sql1= $mysql->query($update);
					}
				}
			}
			else 
			{
				//$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` (`id` ,`projectId`,`re_startListingDate`,`supposedEndDate`)VALUES ('' , '".$result['id']."', CURRENT_TIMESTAMP, '".$endDate."')";
				//echo $entryString;
				//$sql1= $mysql->query($entryString);
			
			}
		
				
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	function displayStopDisplayButton($advertId)
	{
		$resultMOD = JOBS::getAdvertDetails($advertId);
		$totalFunds=BILLING::getTotalFunds($resultMOD['srcId']);
		$totalFundsUsed=BILLING::getTotalFundsUsed();
		$moneyAvail=$totalFunds - $totalFundsUsed;
		$resultAdDet=JOBS::getAdvertLastActivityDetail($advertId);
		
		$moneyNeededAtLeast=BILLING::getBillingEntry($resultMOD['billingId']);
		
		if($moneyAvail >= $moneyNeededAtLeast)
		{
			
			if($resultAdDet['pauseListingDate']=='0000-00-00 00:00:00')
			{
				if(strtotime($resultAdDet['supposedEndDate']) > strtotime(date("Y-m-d H:i:s")))
				{
					return TRUE;
					
				}	
				else
				{
					return FALSE;
				}
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function displayStartDisplayButton($advertId)
	{
		$resultMOD = JOBS::getAdvertDetails($advertId);
		$totalFunds=BILLING::getTotalFunds();
		$totalFundsUsed=BILLING::getTotalFundsUsed();
		$moneyAvail=$totalFunds - $totalFundsUsed;
		$resultAdDet=JOBS::getAdvertLastActivityDetail($advertId);
		
		$moneyNeededAtLeast=BILLING::getBillingEntry($resultMOD['billingId']);
		//echo "<br /><br />".$moneyAvail."<br /><br />";
		if($moneyNeededAtLeast <= $moneyAvail)
		{
			
			if($resultAdDet!=FALSE)
			{
				if($resultAdDet['pauseListingDate']=='0000-00-00 00:00:00')
				{
					//cannot start listing
					return FALSE;
				}
				else
				{
					if(strtotime($resultAdDet['supposedEndDate']) < strtotime(date("Y-m-d H:i:s")))
					{
						return FALSE;
						
					}	
					else
					{
						return TRUE;
					}
				}
			}
			else
			{
				return TRUE;
			}
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function startListing()
	{
		global $mysql;
		$error=new Error();
		
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `pausedYes` = 0, `status` = '1' WHERE `id` = '".$_REQUEST['fiid']."' LIMIT 1";
		$sql= $mysql->query($update);
		
	
		if($sql)
		{
			$adDet=JOBS::getAdvertDetails($_REQUEST['fiid']);
			$startDate=date('Y-m-d H:i:s');
			$endDate=add_or_subtract_days($startDate, $adDet['periodLasts'], 1);
			$endDate=$endDate;
			
			$update="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger` (`id` ,`advertId`,`re_startListingDate`,`supposedEndDate`,`status`)VALUES ('' , '".$_REQUEST['fiid']."', CURRENT_TIMESTAMP, '".$endDate."', '1')";
			echo $update;
			//$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger` SET `status` = '1' WHERE `projectId` = '".$_REQUEST['fiid']."'";
			$sql= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	function updateAdvertListings()
	{
		$user=new User();
		$userDet=$user->getUserDetails($_SESSION['uid']);
		global $mysql;
		if(!isSuperAdmin($_SESSION['uid']))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `srcId` = '".$_SESSION['uid']."'";
		}
		else
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs`";
		}
		
		$sql=$mysql->query($str);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$fpYes='fpYes'.$result['id'];
			$fpYes=$_POST[$fpYes];
			if($fpYes!=1)
			{
				$fpYes=0;
			}
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_jobs` SET `status` = '".$status."',`fpYes`='".$fpYes."' WHERE `id` = '".$result['id']."' LIMIT 1";
//			echo $update;
			$sql1= $mysql->query($update);
			
		}
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
}


//$advert=new Jobs();
//]$advert->displayFPFeature();
//echo $_SESSION['section'];
//echo $_SESSION['sectionId'];
?>