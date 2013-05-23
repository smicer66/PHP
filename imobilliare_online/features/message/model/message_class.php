<?php



class Message extends Feature
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `id` = '".$id."' AND `status` = '1'";
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
	
	
	function getUserProjectMessage($fiid, $userId)
	{
		global $mysql;
		$array=array();
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1' AND receipient_unread = '1' AND `receipient_id` = '".$userId."' AND `project_id` = '".$fiid."'";

		
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($array, $result['id']);
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
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr." AND receipient_unread = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	function getUnreadMessageCount($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `receipient_id` = '".$userId."'";
		}
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr." AND receipient_unread = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
			
		
	}
	
	
	function getMessageDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `id` = '".$id."'";
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
		
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		
		if($result['source_id']==$_SESSION['uid'])
		{
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_messages` SET `source_unread` = 0 WHERE `id` = '".$id."' AND `source_unread` = '1'";
			$sql1= $mysql->query($update);
		}
		else if($result['receipient_id']==$_SESSION['uid'])
		{
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_messages` SET `receipient_unread` = 0 WHERE `id` = '".$id."' AND `receipient_unread` = '1'";
			$sql1= $mysql->query($update);
		}
	}
	
	
	function deleteInboxMessage($array)
	{
		global $mysql;
		for($count=0;$count<sizeof($array);$count++)
		{
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_messages` SET `status` = 0 WHERE `id` = '".$array[$count]."' AND receipient_id = '".$_SESSION['uid']."'";
			echo $update;
			$sql1= $mysql->query($update);
		}
		return 'Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'');
		
		
	}
	
	function deleteOutboxMessage($array)
	{
		global $mysql;
		for($count=0;$count<sizeof($array);$count++)
		{
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_messages` SET `status` = 0 WHERE `id` = '".$array[$count]."' AND source_id = '".$_SESSION['uid']."'";
			echo $update;
			$sql1= $mysql->query($update);
		}
		return 'Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'');
		
		
	}
	
	
	
	function getProjectFiles($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_message_files` WHERE `messageId` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	function getOutboxListing($start, $no,$userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `authorUserId` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr." ORDER BY dateOfCreation DESC LIMIT ".$start.", ".$no."";
		$sql= $mysql->query($str);
		return $sql;	
	}
	
	
	
	function getOutboxListingCount($userId=NULL)
	{
		global $mysql;
		
		if($userId!=NULL)
		{
			$extraStr=" AND `authorUserId` = '".$userId."'";
		}
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr;
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr." ORDER BY creation_date DESC LIMIT ".$start.", ".$no."";
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr;
		
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr;
		
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
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `status` = '1'".$extraStr." ORDER BY creation_date DESC LIMIT ".$start.", ".$no;
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
		CONTROLLER_MESSAGE::controlFrontPageDisplay();
	}
	
	function displayFeature($id=NULL)
	{
		CONTROLLER_MESSAGE::controlFlowProcess($id);
	}
	
	
	
	function sendMessage($projId=NULL)
	{
		global $mysql;
		//print_r($_POST);
		$subject=setDataDB($_POST['SUBJECT']);
		//echo $to;
		//echo $subject;
		//$to=$_POST['TO'];
		//echo sizeof($_POST['To']);

		//echo $to;
		$details=setDataDB($_POST['MSG']);
		//echo $details;
		$createDate=date('Y-m-d H:i:s');
		
		$senderDet=USER::getDetails($_SESSION['uid']);
		
		
		if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
		{

			if($projId!=NULL)
			{
			
				$projDet=PROJECT::getProjectDetails($projId);
				$recp_results=USER::getDetails($projDet['emp_id']);
				
				$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_messages` (`id` ,`unique_id`,`project_id` ,`subject` ,`source_id` ,`receipient_id`,`details` ,`creation_date` ,`status`,`unread`, `receipient_unread`, `source_unread`)VALUES ('' , UUID(),'".$projId."', '".$subject."', '".$_SESSION['uid']."', '".$recp_results['id']."', '".$details."', '".$createDate."', 1, 1, 1, 1)";
				$sql= $mysql->query($entryString);
								
				$siteDet=SITE::getDetails();
				$subject1='Message on Imobilliare from '.$senderDet['username'];
				$text_body = "Read Message below:<br />".$details."<br /><br />To reply to this message, please click on the link below or navigate to your mail box on Imobilliare.com where you can find the message to reply to it. Link to the message is: http://www.imobilliare.com/index.php?fid=".FEATURE::getId('Message')."&fiid=".$mysql->insert_id."&view=1";
				$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
				/*$text_body .= "Sincerely, <br>";
				$text_body .= "<b>Imobilliare Management</b>";*/
				//echo 
				$emailer=new Email();
				//echo $message;
				$user=new User();
				$emailer->sendMail($recp_results['email'], $subject1, $text_body, $siteDet);
			}
			else
			{
				$receipients=explode('; ', $_POST['To']);
				
				for($count=0;$count<sizeof($receipients);$count++)
				{
					//assuming all are provided
					//echo "sadsa";
					//echo $_SESSION['suid'];
					$recp_results=USER::getDetails($receipients[$count]);
					if($recp_results!=FALSE)
					{
						$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_messages` (`id` ,`unique_id`,`project_id` ,`subject` ,`source_id` ,`receipient_id`,`details` ,`creation_date` ,`status`,`unread`, `receipient_unread`, `source_unread`)VALUES ('' , UUID(),'".$projId."', '".$subject."', '".$_SESSION['uid']."', '".$recp_results['id']."', '".$details."', '".$createDate."', 1, 1, 1, 1)";
						echo $entryString;
						$sql= $mysql->query($entryString);
										
						$siteDet=SITE::getDetails();
						$subject1='Message on Imobilliare from '.$senderDet['username'];
						$text_body = "Read Message below:<br />".$details."<br /><br />To reply to this message, please click on the link below or navigate to your mail box on Imobilliare.com where you can find the message to reply to it. Link to the message is: http://www.imobilliare.com/index.php?fid=".FEATURE::getId('Message')."&fiid=".$mysql->insert_id."&view=1";
						$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
						/*$text_body .= "Sincerely, <br>";
						$text_body .= "<b>Imobilliare Management</b>";*/
						//echo 
						$emailer=new Email();
						//echo $message;
						$user=new User();
						$emailer->sendMail($recp_results['email'], $subject1, $text_body, $siteDet);
		
					}
				}
			}
		}
		else if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
		{
//			$to=join(',', $_POST['To']);
//echo $_POST['receipient'];


			$receipients=explode('; ', setDataDB($_POST['TO']));
			print_r($receipients);
			
			for($count=0;$count<sizeof($receipients);$count++)
			{
				//assuming all are provided
				//echo "sadsa";
				//echo $_SESSION['suid'];
				$recp_results=whoIsUser($receipients[$count]);
				print_r($recp_results);
				if($recp_results!=FALSE)
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_messages` (`id` ,`unique_id`,`project_id` ,`subject` ,`source_id` ,`receipient_id`,`details` ,`creation_date` ,`status`,`unread`, `receipient_unread`, `source_unread`)VALUES ('' , UUID(),'".$projId."', '".$subject."', '".$_SESSION['uid']."', '".$recp_results['id']."', '".$details."', '".$createDate."', 1, 1, 1, 1)";
					echo $entryString;
					$sql= $mysql->query($entryString);
									
					$siteDet=SITE::getDetails();
					$subject1='Message on Imobilliare from '.$senderDet['username'];
					$text_body = "Read Message below:<br />".$details."<br /><br />To reply to this message, please click on the link below or navigate to your mail box on Imobilliare.com where you can find the message to reply to it. Link to the message is: http://www.imobilliare.com/index.php?fid=".FEATURE::getId('Message')."&fiid=".$mysql->insert_id."&view=1";
					$text_body .="<br><br>Note: This is an autogenerated message. Please do not reply this mail.<br><br>";
					/*$text_body .= "Sincerely, <br>";
					$text_body .= "<b>Imobilliare Management</b>";*/
					//echo 
					$emailer=new Email();
					//echo $message;
					$user=new User();
					$emailer->sendMail($recp_results['email'], $subject1, $text_body, $siteDet);
	
				}
			}
		}
		$url='Location: '.ERROR::constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19030');
		
		return $url;
	}
	
	
	function registerForEmailUpdates()
	{
		global $mysql;
	}
	
	
	function getMyMessage($authId, $id=NULL)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `id` = '".$id."' AND `status` = '1'";
		$sql= $mysql->query($str);
		return $sql;
	}
	
	function getMyUnreadMessageCount($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_messages` WHERE `receipient_id` = '".$id."' AND `status` = '1' AND `receipient_unread` = 1";
//		echo $str;
		$sql= $mysql->query($str);
		return $mysql->num_rows;
	}
	
	
	
}


?>