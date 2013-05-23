<?php

class Billing extends Feature
{
	private $accessLevel;
	public $id;
	public $entryError=array();
	
	function __construct()
	{
	}
	
	
	function getUserWorth($uid)
	{
//		echo 1212;
		//yet to be provided
		global $mysql;
		$checked='';
		$sum=0;
		if(USER::getUserTypeId($uid)==USERTYPE::getUserTypeId('Employer'))
		{
			$strX="SELECT *, ".DEFAULT_DB_TBL_PREFIX."_bid.amount as amt FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE (`emp_id` = '".$uid."' AND ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Completed') AND (".DEFAULT_DB_TBL_PREFIX."_bid.project_id = ".DEFAULT_DB_TBL_PREFIX."_project.id) AND (".DEFAULT_DB_TBL_PREFIX."_bid.developer_id = ".DEFAULT_DB_TBL_PREFIX."_project.chosen_developer_id)";

			$sql= $mysql->query($strX);
			if($mysql->num_rows > 0)
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					$sum=$sum + $result['amt'];	
		//			echo $sum."<br />";
				}
				return $sum.".00";
			}
			else
			{
				return "0.00";
			}
			
		}
		else if(USER::getUserTypeId($uid)==USERTYPE::getUserTypeId('Developer'))
		{
			$strX="SELECT *, ".DEFAULT_DB_TBL_PREFIX."_bid.amount as amt FROM `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_bid` WHERE (`chosen_developer_id` = '".$uid."' AND ".DEFAULT_DB_TBL_PREFIX."_project.status = 'Completed') AND (".DEFAULT_DB_TBL_PREFIX."_bid.project_id = ".DEFAULT_DB_TBL_PREFIX."_project.id) AND (".DEFAULT_DB_TBL_PREFIX."_bid.developer_id = ".DEFAULT_DB_TBL_PREFIX."_project.chosen_developer_id)";

			//echo $strX;
			$sql= $mysql->query($strX);
			if($mysql->num_rows > 0)
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					$sum=$sum + $result['amt'];	
					//echo $sum."<br />";
				}
				return $sum.".00";
			}
			else
			{
				return "0.00";
			}
			
		}
		
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		global $mysql;
		$checked='';
		$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user_type` WHERE `name` = 'Agent' AND `status` = '1'";
		$sqlX= $mysql->query($strX);
		$resultX = $mysql->fetch_assoc_mine($sqlX);
			
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = '".$id."' AND `status` = '1' AND `userTypeId` = '".$resultX['id']."'";
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
	
	
	
	function updateBillingCosts()
	{
		global $mysql;
		$error=new Error();
		//check image types first before uploadingf o!
		$transacType=setDataDB($_POST['transacType']);
		
		$costs=setDataDB($_POST['costs']);
		$startdate=setDataDB($_POST['startdate']);
		
		if($transacType!='NULL')
		{
			if((strlen($costs)>0) && (is_numeric($costs)==1))
			{
				if(strlen($startdate)==0)
				{
					$startdate=date("Y-m-d H:i:s");
				}
				else
				{
					$startdate=$startdate." ".date("H:i:s");
				}
				$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_billing` (`id` ,`billingTypeId` ,`amountPerDay`,`status` ,`dateEffected`)VALUES (NULL , '".$transacType."','".$costs."','1','".$startdate."')";
				$sql= $mysql->query($entryString);
				$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('billing_costs').'&errcpj=errcpj101';
			}
			else
			{
				$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('billing_costs').'&errcpj=errcpj101';
			}	
		}
		else
		{
			$url='Location: ?fid='.ADMINISTRATOR::getAdminFunctionId('billing_costs').'&errcpj=errcpj101';
		}
		
		
		return $url;
	}
	
	function addComplaint()
	{
		global $mysql;
		$error=new Error();
		$complaint=setDataDB($_POST['complaint']);			
		$subject=setDataDB($_POST['subject']);						
		
		
		setcookie("complaint", $_POST['complaint'], time()+3600);
		setcookie("subject", $_POST['subject'], time()+3600);
		
		
		if(strlen($subject)==0)
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7290');
		}
		else
		{
			if(strlen($complaint)==0)
			{
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7291');
			}
			else
			{
				
				$sql = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_complaints` (`id` ,`uniqueId` ,`sourceId` ,`complaintDetails` ,`dateSent`) VALUES(NULL, UUID(),'".$_SESSION['uid']."', '".$complaint."', CURRENT_TIMESTAMP)";
				//echo $sql;
				$sql=$mysql->query($sql);
				
						
				if($sql)
				{
					setcookie("complaint", $_POST['complaint'], time()-3600);
					setcookie("subject", $_POST['subject'], time()-3600);
					
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7292');
				}
				else
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7293');
				}
						
			}
		}	
	}
	
	function getBillingTypeId($id)
	{
		global $mysql;
		$checked='';
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE `name` = '".$id."'";
		//echo $str;
		$sql= $mysql->query($str);
		//$result = $mysql->fetch_assoc_mine($sql);
			
		if($mysql->num_rows > 0)
		{
			$result = $mysql->fetch_assoc_mine($sql);
			
			return $result['id'];
		}
		else
		{
			return NULL;
		}
	
		
	}
	
	
	
	function getBillingEntry($id)
	{
		global $mysql;
		$checked='';
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		//$result = $mysql->fetch_assoc_mine($sql);
			
		if($mysql->num_rows > 0)
		{
			$result = $mysql->fetch_assoc_mine($sql);
			return $result['amountPerDay'];
		}
		else
		{
			return NULL;
		}
	
		
	}
	
	function fullPreview($id)
	{
		//not applicable
	}
	
	
	function displayFPFeature($position=null, $parameter2=null)
	{
		
		include_once("features/user/agent/controller/controller_class.php");
		CONTROLLER_AGENT::controlFrontPageDisplay();
	}


	
	function displayFeature($resultArray=NULL)
	{
		include("../controller/controller_class.php");
		CONTROLLER_BILLING::controlFlowProcess();
	}
	
	
	
	function getNoOfDaysLeft($propId)
	{
		$propActDetSQL=PROJECT::getProjectActivityDetails($propId);
		$propDet=PROJECT::getProjectDetails($propId);
		$noOfDaysInSecs=0;
		
		if($propActDetSQL!=NULL)
		{
			while($result = $mysql->fetch_assoc_mine($propActDetSQL))
			{
				if($result['pauseListingDate']!='0000-00-00 00:00:00')
				{
					$noOfDaysInSecs=$noOfDaysInSecs + (strtotime($result['pauseListingDate']) - strtotime($result['startListingDate']));
				}
				else
				{
					$noOfDaysInSecs=$noOfDaysInSecs + (strtotime(date('Y-m-d h:i:s')) - strtotime($result['startListingDate']));
				}
				
			}
			$periodInSecs=$result['period'] * 86400;
			
			$diff=$periodInSecs - $noOfDaysInSecs;
			$noOfDays=floor($diff/86400);	
		}
		else
		{
			$noOfDays='Unavailable';
		}
		
		
		return $noOfDays;
		
	}
	
	
	function getTotalFundsOnSystem($uid=NULL)
	{
		global $mysql;
		if($uid==NULL)
		{
			$id=$_SESSION['uid'];
		}
		else
		{
			$id=$uid;
		}
		
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `status` = '1' AND `adminApprovedYes` = '1'";
		
		//echo $strY;
		$sql= $mysql->query($strY);
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				$sum=$sum + $result['amount'];
			}
			return $sum;
		}
		else
		{
			return 0.00;
		}
		
	}
	
	function getTotalFunds($uid=NULL)
	{
		global $mysql;
		if($uid==NULL)
		{
			$id=$_SESSION['uid'];
		}
		else
		{
			$id=$uid;
		}
		
		
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `receivingUserId` = '".$uid."' AND `status` = '1' AND `adminApprovedYes` = '1'";
		
		//echo $strY;
		$sql= $mysql->query($strY);
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				$sum=$sum + $result['amount'];
			}
			return $sum;
		}
		else
		{
			return 0.00;
		}
		
	}
	
	
	function getTotalFundsUsed($uid=NULL)
	{
		global $mysql;
		
		if($uid==NULL)
		{
			$id=$_SESSION['uid'];
		}
		else
		{
			$id=$uid;
		}
		
		//for project
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE `authorUserId` = '".$id."' AND `projectId` = ".DEFAULT_DB_TBL_PREFIX."_project.id  AND `billingId` = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
		
		//echo $strY;
		$sql= $mysql->query($strY);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($result['pauseListingDate']!='0000-00-00 00:00:00')
			{
				$totalAmount=$totalAmount + (floor((strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']))/86400) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			else
			{
				//(floor((strtotime(date('Y-m-d h:i:s')) - strtotime($result['re_startListingDate']))/86400)
				$totalAmount=$totalAmount+ (getDayDiff($result['re_startListingDate'], date('Y-m-d H:i:s')) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			
		}
		
		
		
		
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE ".DEFAULT_DB_TBL_PREFIX."_jobs.srcId = '".$id."' AND ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId = ".DEFAULT_DB_TBL_PREFIX."_jobs.id  AND ".DEFAULT_DB_TBL_PREFIX."_jobs.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
		//echo $strY;
		$sql= $mysql->query($strY);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($result['pauseListingDate']!='0000-00-00 00:00:00')
			{
				$totalAmount=$totalAmount + (floor((strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']))/86400) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			else
			{
				//(floor((strtotime(date('Y-m-d h:i:s')) - strtotime($result['re_startListingDate']))/86400)
				$totalAmount=$totalAmount+ (getDayDiff($result['re_startListingDate'], date('Y-m-d H:i:s')) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			
		}
		return $totalAmount;
	}
	
	
	
	function getTotalFundsUsedOnSystem($uid=NULL)
	{
		global $mysql;
		
		if($uid==NULL)
		{
			$id=$_SESSION['uid'];
		}
		else
		{
			$id=$uid;
		}
		
		//for project
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_project`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE ".DEFAULT_DB_TBL_PREFIX."_project_activity_logger.projectId = ".DEFAULT_DB_TBL_PREFIX."_project.id  AND (`billingId` = ".DEFAULT_DB_TBL_PREFIX."_billing.id  AND ".DEFAULT_DB_TBL_PREFIX."_billing.status = 1) AND (".DEFAULT_DB_TBL_PREFIX."_project.status != 'Invalid'  OR ".DEFAULT_DB_TBL_PREFIX."_project.status != 'Not Started')";
		//echo $strY;
		$sql= $mysql->query($strY);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($result['pauseListingDate']!='0000-00-00 00:00:00')
			{
				$totalAmount=$totalAmount + (floor((strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']))/86400) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			else
			{
				//(floor((strtotime(date('Y-m-d h:i:s')) - strtotime($result['re_startListingDate']))/86400)
				$totalAmount=$totalAmount+ (getDayDiff($result['re_startListingDate'], date('Y-m-d H:i:s')) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			
		}
		
		
		
		
		//for adverts
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger`, `".DEFAULT_DB_TBL_PREFIX."_jobs`, `".DEFAULT_DB_TBL_PREFIX."_billing` WHERE ".DEFAULT_DB_TBL_PREFIX."_advert_activity_logger.advertId = ".DEFAULT_DB_TBL_PREFIX."_jobs.id  AND ".DEFAULT_DB_TBL_PREFIX."_jobs.billingId = ".DEFAULT_DB_TBL_PREFIX."_billing.id";
		//echo $strY;
		$sql= $mysql->query($strY);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($result['pauseListingDate']!='0000-00-00 00:00:00')
			{
				$totalAmount=$totalAmount + (floor((strtotime($result['pauseListingDate']) - strtotime($result['re_startListingDate']))/86400) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			else
			{
				//(floor((strtotime(date('Y-m-d h:i:s')) - strtotime($result['re_startListingDate']))/86400)
				$totalAmount=$totalAmount+ (getDayDiff($result['re_startListingDate'], date('Y-m-d H:i:s')) * BILLING::getBillingEntry($result['billingId']));
				//echo $result['uniqueId']." - ".$totalAmount."<br />";
			}
			
		}
		return $totalAmount;
	}
	
	function getMyFundsListingCount($id=NULL)
	{
		if($id!=NULL)
		{
			$extraStr="WHERE `authorUserId` = '".$id."'";
		}
		global $mysql;
		if(isSuperAdmin($_SESSION['uid']))
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` ORDER BY `id`";
		}
		else
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `sourceUserId` = '".$_SESSION['uid']."' AND `receivingUserId` = '".$_SESSION['uid']."' ORDER BY `id`";
		}
		$sql= $mysql->query($strY);
		return $mysql->num_rows;
	}
	
	
	
	function getTotalFundsPaid($uid=NULL)
	{
		global $mysql;
		$sum=NULL;
		if($uid==NULL)
		{
			$id=$_SESSION['uid'];
		}
		else
		{
			$id=$uid;
		}
		
		
		$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `receivingUserId` = '".$id."' AND `status` = '1'";
		
		
		$sql= $mysql->query($strY);
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				$sum=$sum + $result['amount'];
			}
			return $sum;
			
		}
		else
		{
			return 0.00;
		}
		
	}
	
	
	function getFundsWithdrawalListing($start, $no=NULL, $recId=NULL, $srcId=NULL)
	{
		global $mysql;
		$siteDet=SITE::getDetails();
		
		if($start==NULL)
		{
			$start=0;
			if($no==NULL)
			{
				$no=$siteDet['searchPaging'];	
			}
			else
			{
				$no=$siteDet['searchPaging'];
			}
		}
		else
		{
			$no=$siteDet['searchPaging'];
		}
		
		if(isSuperAdmin($_SESSION['uid']))
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_funds_withdraw` ORDER BY `id` DESC LIMIT ".$start.", ".$no."";
		}
		else
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_funds_withdraw`, `".DEFAULT_DB_TBL_PREFIX."_bank` WHERE ".DEFAULT_DB_TBL_PREFIX."_funds_withdraw.userId = '".$srcId."' AND ".DEFAULT_DB_TBL_PREFIX."_funds_withdraw.bankId = ".DEFAULT_DB_TBL_PREFIX."_bank.id ORDER BY ".DEFAULT_DB_TBL_PREFIX."_funds_withdraw.id DESC LIMIT ".$start.", ".$no."";
		}
		//echo $strY;
		$sql= $mysql->query($strY);
		$array=array();
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($array, $result);
			}
			return $array;
			
		}
		else
		{
			return FALSE;	
		}
	}
	
	
	function getFundsListing($start, $no=NULL, $recId=NULL, $srcId=NULL)
	{
		global $mysql;
		$siteDet=SITE::getDetails();
		
		if($start==NULL)
		{
			$start=0;
			if($no==NULL)
			{
				$no=$siteDet['searchPaging'];	
			}
			else
			{
				$no=$siteDet['searchPaging'];
			}
		}
		else
		{
			$no=$siteDet['searchPaging'];
		}
		
		if(isSuperAdmin($_SESSION['uid']))
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` ORDER BY `id` DESC LIMIT ".$start.", ".$no."";
		}
		else
		{
			$strY="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds`, `".DEFAULT_DB_TBL_PREFIX."_bank` WHERE ".DEFAULT_DB_TBL_PREFIX."_billing_funds.sourceUserId = '".$srcId."' AND ".DEFAULT_DB_TBL_PREFIX."_billing_funds.receivingUserId = '".$recId."' AND ".DEFAULT_DB_TBL_PREFIX."_billing_funds.bankId = ".DEFAULT_DB_TBL_PREFIX."_bank.id ORDER BY ".DEFAULT_DB_TBL_PREFIX."_billing_funds.id DESC LIMIT ".$start.", ".$no."";
		}

		$sql= $mysql->query($strY);
		$array=array();
		if($mysql->num_rows > 0)
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($array, $result);
			}
			return $array;
			
		}
		else
		{
			return FALSE;	
		}
	}
	
	
	
	
	function updateListings($start=NULL)
	{	
		global $mysql;
		echo $start;
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
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` ORDER BY `id` DESC LIMIT ".$start.",".$end;
			echo $str;
		}
		else
		{
			$userDet=USER::getUserDetails($_SESSION['uid']);
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `sourceUserId` = '".$_SESSION['uid']."' ORDER BY `id` DESC LIMIT ".$start.",".$end;
			
		}
		
		$sql=$mysql->query($str);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			
			$status='status'.$result['id'];
			$status=$_POST[$status];
			
			$approve='approve'.$result['id'];
			$approve=$_POST[$approve];
			
			if($status==1)
			{
				$status='1';
				
			}
			else
			{
				$status='0';
			}
			
			if($approve==1)
			{
				$approve='1';
				
			}
			else
			{
				$approve='0';
			}
			
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_billing_funds` SET `status` = '".$status."', `adminApprovedYes` = '".$approve."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			echo $update."<br />";
		}
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	
	}
	
	
	
	function addFunds()
	{
		global $mysql;
		$error=new Error();
		$names=setDataDB($_POST['payin_name']);			
		$bank=$_POST['bank'];						
		$payin_tellerNo=setDataDB($_POST['payin_tellerNo']);	
		$amount=setDataDB($_POST['amount']);
		$transacTypeDet=getTransactionDetails('Add Money');
		
		setcookie("names", $_POST['payin_name'], time()+3600);
		setcookie("bank", $_POST['bank'], time()+3600);
		setcookie("payin_tellerNo", $_POST['payin_tellerNo'], time()+3600);
		setcookie("amount", $_POST['amount'], time()+3600);
		
		
		if(strlen($names)==0)
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj006');
		}
		else
		{
			if(strlen($payin_tellerNo)==0)
			{
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7001');
			}
			else
			{
				if((strlen($amount)==0) && (is_numeric($amount)!=1))
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7003');
				}
				else
				{
					$query = $mysql->query("SELECT `id` FROM `".DEFAULT_DB_TBL_PREFIX."_billing_funds` WHERE `payInTellerNo` = '".$payin_tellerNo."'");
					
					if ($mysql->num_rows > 0)
					{
						return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7004');
					}
					else
					{								
						
						$sql = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_billing_funds` (`id` ,`sourceUserId` ,`amount` ,`transactionTypeId` ,`status` ,`bankId` ,`payInTellerNo` ,`uniqueId`,`receivingUserId`) VALUES(NULL, '".$names."','".$amount."', '".$transacTypeDet['id']."', '1', '".$bank."', '".$payin_tellerNo."', UUID(), '".$names."')";
						echo $sql;
						$sql=$mysql->query($sql);
						
								
						if($sql)
						{
							setcookie("names", $_POST['payin_name'], time()-3600);
							setcookie("bank", $_POST['bank'], time()-3600);
							setcookie("payin_tellerNo", $_POST['payin_tellerNo'], time()-3600);
							setcookie("amount", $_POST['amount'], time()-3600);
							
							return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7000');
						}
						else
						{
							return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7002');
						}
								
					}
				}
			}
		}		
	}
	
	
	
	
	
}
?>