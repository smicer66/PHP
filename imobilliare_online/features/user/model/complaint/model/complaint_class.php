<?php



class Complaint extends Feature
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `id` = '".$id."' AND `status` = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			$blogi=$this->getBlogDetails($id);
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".$blogi['subject'].":: ".$result['topic']."<br />";
			$checked='';
		}
		
		
	}
	
	
	function getUserComplaint($userId, $fiid=NULL)
	{
		global $mysql;
		$array=array();
		
		if($fiid!=NULL)
		{
			$str=" AND `project_id` = '".$fiid."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1' AND `source_id` = '".$userId."'".$str;
		
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result);
		}
		return $array;
	}
	
	function getUnreadMessages($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `receipient_id` = '".$userId."'";
		}
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr." AND unread = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	function getMessageDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `id` = '".$id."'";
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
	
	
	function setReadMessage($id)
	{
		global $mysql;
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_complaint` SET `unread` = 0 WHERE `id` = '".$id."' AND `unread` = '1'";
		$sql1= $mysql->query($update);
	}
	
	
	function getOutboxListing($start, $no,$userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `source_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr." ORDER BY dateOfCreation DESC LIMIT ".$start.", ".$no."";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	
	function getOutboxListingCount($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `source_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr;
		echo $str;
		$sql= $mysql->query($str);
		return $mysql->num_rows;	
	}
	
	
	function getInboxListing($start, $no,$userId=NULL)
	{
		global $mysql;
		$array=array();
		
		if($userId!=NULL)
		{
			$extraStr=" AND `receipient_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr." ORDER BY creation_date DESC LIMIT ".$start.", ".$no."";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result);
		}
		return $array;	
	}
	
	
	
	function getInMessageCount($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `receipient_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr;
		
		$sql= $mysql->query($str);
		return $mysql->num_rows;	
	}
	
	
	function getOutMessageCount($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `source_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr;
		
		$sql= $mysql->query($str);
		return $mysql->num_rows;	
	}
	
	
	
	function getMessageListing($start, $no,$userId=NULL)
	{
		global $mysql;
		$array=array();
		
		if($userId!=NULL)
		{
			$extraStr=" AND `source_id` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `status` = '1'".$extraStr." ORDER BY creation_date DESC LIMIT ".$start.", ".$no;
		//echo $str;
		$sql= $mysql->query($str);
		
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result);
		}
		return $array;	
	}
	
	
	function displayFPFeature()
	{
		CONTROLLER_COMPLAINT::controlFrontPageDisplay();
	}
	
	function displayFeature($id=NULL)
	{
		CONTROLLER_COMPLAINT::controlFlowProcess($id);
	}
	
	
	
	function sendComplaint($projId=NULL, $type, $bid_id=NULL)
	{
		global $mysql;
		$subject=setDataDB($_POST['SUBJECT']);
		$to=$_POST['TO'];
		$details=setDataDB($_POST['MSG']);
		$createDate=date('Y-m-d H:i:s');
		$siteDet=SITE::getDetails();
		
		
		
		if($projId!=NULL)
		{

			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_complaints` (`id` ,`uniqueId`,`project_id` ,`subject` ,`source_id` ,`details` ,`dateSent` ,`status`,`unread`)VALUES ('' , UUID(),'".$projId."', '".$subject."', '".$_SESSION['uid']."', '".$details."', '".$createDate."', 1, 1)";
			$sql= $mysql->query($entryString);
			
			$userRecAdmin=whoIsUser('admin');
			
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_messages` (`id` ,`unique_id`,`project_id` ,`subject` ,`source_id` ,`receipient_id`,`details` ,`creation_date` ,`status`,`unread`)VALUES ('' , UUID(),'".$projId."', '".$subject."', '".$_SESSION['uid']."', '".$userRecAdmin['id']."', '".$details."', '".$createDate."', 1, 1)";
			$sql= $mysql->query($entryString);
			
			$recp_results=whoIsUser('admin');
			
			
			//admin mail sending
			
			$emailer=new Email();
			//echo $message;
			$user=new User();
			$emailer->sendMail($recp_results['email'], $subject, $text_body, $siteDet);
			
			if($type=='tcejorp')
			{
				$projDet=PROJECT::getProjectDetails($projId);
				$recp_results=USER::getDetails($projDet['emp_id']);
				$subject='Complaint on Imobilliare.com ';
				$text_body = "Read Complaint Message below:<br /><br />A complaint has been made on your project -  <a href = 'http://www.imobilliare.com/index.php?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>".$projDet['header'].".</a> <br />Our Administrators are currently looking at the complaint. You will be informed if we find any issues arising.";
				$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
				$text_body .= "Sincerely, <br>";
				$text_body .= "<b>Imobilliare Management</b>";
				
				$emailer=new Email();
				//echo $message;
				$user=new User();
				$emailer->sendMail($recp_results['email'], $subject, $text_body, $siteDet);
			}
			else if($type=="dib")
			{
				//echo $projId;
				$projDet=PROJECT::getProjectDetails($projId);
				$bidDet=BID::getBidDetails($bid_id);
				$recp_results=USER::getDetails($bidDet['developer_id']);
				$subject='Complaint on Imobilliare.com';
				$text_body = "Read Complaint Message below:<br /><br />A complaint has been made on your bid for the project -  <a href = 'http://www.imobilliare.com/index.php?fid=".FEATURE::getId('Project')."&fiid=".$projId."'>".$projDet['header'].".</a> <br />Our Administrators are currently looking at the complaint. You will be informed if we find any issues arising.";
				$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
				$text_body .= "Sincerely, <br>";
				$text_body .= "<b>Imobilliare Management</b>";
				
				$emailer=new Email();
				//echo $message;
				$user=new User();
				$emailer->sendMail($recp_results['email'], $subject, $text_body, $siteDet);
			}
			
			$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19070');
		}
		else
		{
			$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19071');
		}
		
		return $url;
	}
	
	
	
	function getMyMessage($authId, $id=NULL)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_complaint` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		return $sql;
	}
	
	
	
}


?>