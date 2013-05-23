<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/user/user_class.php");

function getRealData($str)
{
	//get real data from utf8_encode
	
	$data=utf8_decode($str);
	//$strpos=strpos($data, '--%©ž');
	return stripslashes(htmlentities($data,ENT_QUOTES));
//	return $data;
}


function no_email_http($str)
{
	$str=preg_split("/ *(['?> <!#$%^&,|}{+\-\*]) */", $str);
	
	for($count=0;($count<sizeof($str));$count++)
	{
		$email=validate_email($str[$count]);
		$url1=validate_url($str[$count], 1);
		$url2=validate_url($str[$count], 2);
		$url3=validate_url($str[$count], 3);

		if (($email!=1) && ($url1!=1) && ($url2!=1) && ($url3!=1))
		{
			//correct no email/http
			$valid_msg=2;
		}
		else
		{	
			//contains url email
			$valid_msg=1;
			break;
		}

	}
	return $valid_msg;		
}


function validate_email($email)
{
	if (! @eregi('^[0-9a-z_]+'.'@'.'([0-9a-z-]+\.)+'.'([0-9a-z]){2,4}$', $email))
	{
		return 2;
	}
	else
	{
		return 1;
	}
}


function validate_url($url, $style)
{
	if($style==1)
	{
		if (! @eregi('http://', $url))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	else if($style==2)
	{
		if (! @eregi('www.', $url))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	else if($style==3)
	{
		if (! @eregi('.com', $url))
		{
			return 0;
		}
		else
		{
			return 1;
		}
	}
	
}


function getRealDataNoHTML($str)
{
	//get real data from utf8_encode
	
	$data=utf8_decode($str);
	//$strpos=strpos($data, '--%©ž');
	return stripslashes($data);
}


function setDataDB($str)
{
	//get real data from utf8_encode
	global $mysql;
	//$data=utf8_encode($str);
	//return $str;
	return $mysql->real_escape_string($str);
}


function append_developer_list($arrayIds=NULL)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	$array=explode(',', $arrayIds);
	
	$query="SELECT ".DEFAULT_DB_TBL_PREFIX."_user.username as username, ".DEFAULT_DB_TBL_PREFIX."_user.id as id FROM `".DEFAULT_DB_TBL_PREFIX."_user`, `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE (".DEFAULT_DB_TBL_PREFIX."_user.status = 'Active') AND (".DEFAULT_DB_TBL_PREFIX."_user.userTypeId = ".DEFAULT_DB_TBL_PREFIX."_usertype.id) AND (".DEFAULT_DB_TBL_PREFIX."_usertype.name = 'Developer')";
	//echo $query;
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML($result['username']));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if(in_array($usertypeIdArray[$count], $array))
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_project_type($value)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_type` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML($result['name']));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_billing_type($value)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_billing_type` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML($result['name']));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_churchposition_list($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_church_positions` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['position']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
	return $option;
}


function append_donations_list($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_donations` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_yearOfStudy()
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_school_level` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['level']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_studentprogrammeOfStudy($id)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bible_students` WHERE `status` = '1' AND `userId` = '".$id."'";
	$sql=$mysql->query($query);
	
	
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_programme_of_study` WHERE `status` = '1' AND `id` = '".$result['programmeOfStudyId']."'";
			$sql1=$mysql->query($query1);
			$result1 = $mysql->fetch_assoc_mine($sql1);
			if($result1)
			{
				array_push($arrayList,getRealDataNoHTML($result1['name']));
				array_push($arrayIdList,$result1['id']);
			}
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}

function append_programmeOfStudy()
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_programme_of_study` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_user_programmeOfStudy($value, $value1, $schoolId)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$queryX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bible_students` WHERE `status` = '1' AND `userId` = '".$value."' AND `schoolId` = '".$schoolId."'";
	$sqlX=$mysql->query($queryX);
	$result = $mysql->fetch_assoc_mine($sqlX);
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_programme_of_study` WHERE `status` = '1' AND `id` != '". $result['programmeOfStudyId']."'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}
	}
	
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value1==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}




function append_option_section($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$selected='';
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}


function append_option_projects($ref_id, $uid)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
	{
		$myProjectDetailsSQL=PROJECT::getDeveloperHandlingProjectListing(NULL, NULL,$uid, 'id', 'ASC');
	}
	else
	{
		$myProjectDetailsSQL=PROJECT::getProjectListing(NULL, NULL,$uid, 'id', 'ASC');
	}
	
	
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($myProjectDetailsSQL))
		{
			array_push($arrayList,getRealDataNoHTML($result['header']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$selected='';
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}


function append_group_user_list($value, $sql)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$user=new User();
	
	while($result = $mysql->fetch_assoc_mine($sql))
	{
		$userDet=$user->getUserDetails($result['userId']);
		array_push($arrayList,getRealDataNoHTML($userDet['username']));
		array_push($arrayIdList,$result['userId']);
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_user_list($userTypeId, $value=NULL)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$user=new User();
	$userDet=$user->getUserDetails($_SESSION['uid']);
	if($userTypeId!=NULL)
	{
		$extraStr=" AND `userTypeId` = '".$userTypeId."'";
	}
	$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1'".$extraStr." ORDER BY username ASC";
	$sql=$mysql->query($str);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['username']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}


function append_template_option($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active'";
	
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['templateName']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
	return $option;
}



function append_user_no_email($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$user=new User();
	$userDet=$user->getUserDetails($_SESSION['uid']);
	if(!isSuperAdmin($_SESSION['uid']))
	{
		//proceed
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `section` = '".$userDet['section']."' AND `sectionId` = '".$userDet['sectionId']."' AND `portalEmail` IS NULL";
		

	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `portalEmail` IS NULL";
	}
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['username']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_user_list_no_blogs($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$user=new User();
	$userDet=$user->getUserDetails($_SESSION['uid']);
	if(!isSuperAdmin($_SESSION['uid']))
	{
		//proceed
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1' AND `section` = '".$userDet['section']."' AND `sectionId` = '".$userDet['sectionId']."'";
		

	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1'";
	}
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_blog` WHERE `ownerUserId` = '".$result['id']."'";
			$sql1=$mysql->query($query1);
			if($mysql->num_rows == 0)
			{
				array_push($arrayList,getRealDataNoHTML($result['username']));
				array_push($arrayIdList,$result['id']);
			}
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_blogs_list($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$user=new User();
	$userDet=$user->getUserDetails($_SESSION['uid']);
	if(!isSuperAdmin($_SESSION['uid']))
	{
		//proceed
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_blog` WHERE `status` = '1' AND `section` = '".$userDet['section']."' AND `sectionId` = '".$userDet['sectionId']."'";
		
	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_blog` WHERE `status` = '1'";
	}
	//echo $query;
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `id` = '".$result['ownerUserId']."'";
			//echo $query1;
			$sql1=$mysql->query($query1);
			$resultD = $mysql->fetch_assoc_mine($sql1);
			if($mysql->num_rows == 1)
			{
				array_push($arrayList,getRealDataNoHTML($result['title']." - ".$resultD['username']));
				array_push($arrayIdList,$result['id']);
			}
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$option=$option."<option value='NULL' $selected>--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}




function append_option_country($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_country` ORDER BY name";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,getRealDataNoHTML($result['iso_code']));
		}
	}
	//options should be gotten from the positions table
	if($value==NULL)
	{
		$selected="selected = 'selected'";
	}
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
	return $option;
}



function append_option_transaction($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	$option='';
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_transaction` WHERE status ='1' ORDER BY name";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		$option="<option value='NULL'>--Select One--</option>";			
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,getRealDataNoHTML($result['id']));
		}
	}
	//options should be gotten from the positions table
	$selected="";
	if(($value==NULL) || ($value=='NULL'))
	{
		$selected="selected = 'selected'";
	}
	$option="<option value='NULL' ".$selected.">--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
		
	
	return $option;
}




function append_option_locations($value, $relativeState=NULL)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	$option='';
	if($relativeState=='NULL')
	{
		$option="<option value='NULL'>--Select One--</option>";			
	}
	else
	{
		if($relativeState!=NULL)
		{
			$entry=' AND `stateId` = "'.$relativeState.'"';
		}
		else
		{
			$entry='';
		}
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project_location` WHERE status ='1'".$entry." ORDER BY name";
		echo $query;
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
			$option="<option value='NULL'>--Select One--</option>";			
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($arrayList,getRealDataNoHTML($result['name']));
				array_push($arrayIdList,getRealDataNoHTML($result['id']));
			}
		}
		//options should be gotten from the positions table
		$selected="";
		if(($value==NULL) || ($value=='NULL'))
		{
			$selected="selected = 'selected'";
		}
		$option="<option value='NULL' ".$selected.">--Select One--</option>";
		$selected='';
		for($count=0;$count<sizeof($arrayList);$count++)
		{
			if($value==$arrayIdList[$count])
			{
				$selected="selected = 'selected'";
			}
			$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
			$selected='';
		}
	}
		
	
	return $option;
}



function append_option_state($value, $relativeCountry)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	$option='';
	if($relativeCountry=='NULL')
	{
		$option="<option value='NULL'>--Select One--</option>";			
	}
	else
	{
	
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_country` WHERE `name` = '".$relativeCountry."'";

		$sql=$mysql->query($query);
		$result = $mysql->fetch_assoc_mine($sql);
		$relativeCountry=$result['iso_code'];
		
		$countryId=' AND `countryId` = "'.$relativeCountry.'"';
		
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE status ='1'".$countryId." ORDER BY name";
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
			$option="<option value='NULL'>--Select One--</option>";			
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($arrayList,getRealDataNoHTML($result['name']));
				array_push($arrayIdList,getRealDataNoHTML($result['id']));
			}
		}
		//options should be gotten from the positions table
		$selected="";
		if(($value==NULL) || ($value=='NULL'))
		{
			$selected="selected = 'selected'";
		}
		$option="<option value='NULL' ".$selected.">--Select One--</option>";
		$selected='';
		for($count=0;$count<sizeof($arrayList);$count++)
		{
			if($value==$arrayIdList[$count])
			{
				$selected="selected = 'selected'";
			}
			$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
			$selected='';
		}
	}
		
	
	return $option;
}


function append_feature_list()
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,$result['name']);
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$option=$option."<option value='".$arrayIdList[$count]."'>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_option_advert($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_jobs` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($arrayIdList[$count]==$value)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}



function append_option_media_specific($type)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media_category` WHERE `name` = '".$type."' AND status = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		$result = $mysql->fetch_assoc_mine($sql);
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media` WHERE `status` = '1' AND mediaCategoryId = '".$result['id']."'";
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
			
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($arrayList,getRealDataNoHTML($result['mediaTitle']));
				array_push($arrayIdList,$result['id']);
			}
		}
	}
	
	
	
	
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$selected='';
		if($arrayIdList[$count]==$_REQUEST['linkToFeatureChildId'])
		{
			$selected='selected';
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}




function append_agent_listings($value, $status=NULL)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	$option='';
	if($status==NULL)
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE (`status` ='Valid' OR  `status` ='Not Started' OR `status` ='Suspended') AND `authorUserId` = '".$_SESSION['uid']."' ORDER BY title";
	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_project` WHERE status ='".$status."' AND `authorUserId` = '".$_SESSION['uid']."' ORDER BY title";

	}
	
	echo $query;
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		$option="<option value='NULL'>--Select One--</option>";			
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['title']));
			array_push($arrayIdList,getRealDataNoHTML($result['id']));
		}
	}
	//options should be gotten from the positions table
	$selected="";
	if(($value==NULL) || ($value=='NULL'))
	{
		$selected="selected = 'selected'";
	}
	$option="<option value='NULL' ".$selected.">--Select One--</option>";
	$selected='';
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($value==$arrayIdList[$count])
		{
			$selected="selected = 'selected'";
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
		
	
	return $option;
}



function append_option_media($value, $style=0)
{
	//style = 0 implies not multiple select
	//else style is multiple select
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	if($style==1)
	{
		$arrayStyle=explode(',', $value);
	}
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['mediaTitle']));
			array_push($arrayIdList,$result['id']);
		}
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		if($style==0)//single
		{
			if($arrayIdList[$count]==$value)
			{
				$selected="selected='selected'";
			}
		}
		else
		{
			if(in_array($arrayIdList[$count], $arrayStyle))
			{
				$selected="selected='selected'";
			}
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
		$selected='';
	}
	return $option;
}



function append_option_fpss($value)
{
	global $mysql;
	$fpssList=array();
	$fpssIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_frontpage_slideshow` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($fpssList,getRealDataNoHTML($result['name']));
			array_push($fpssIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($fpssList);$count++)
	{
		if($fpssIdList[$count]==$value)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$fpssIdList[$count]."' $selected>".$fpssList[$count]."</option>";
	}
	return $option;

}




function parse_urls($text, $maxurl_len = 35, $target = '_self')
{
    if (preg_match_all('/((ht|f)tps?:\/\/([\w\.]+\.)?[\w-]+(\.[a-zA-Z]{2,4})?[^\s\r\n\(\)"\'<>\,\!]+)/si', $text, $urls))
    {
        $offset1 = ceil(0.65 * $maxurl_len) - 2;
        $offset2 = ceil(0.30 * $maxurl_len) - 1;
       
        foreach (array_unique($urls[1]) AS $url)
        {
            if ($maxurl_len AND strlen($url) > $maxurl_len)
            {
                $urltext = substr($url, 0, $offset1) . '...' . substr($url, -$offset2);
            }
            else
            {
                $urltext = $url;
            }
           
            $text = str_replace($url, '<a href="'. $url .'" target="'. $target .'" title="'. $url .'">'. $urltext .'</a>', $text);
        }
    }

    return $text;
}  

function append_option_media_category($id)
{
	global $mysql;
	$archyArray=array();
	$archyIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media_category` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($archyArray,getRealDataNoHTML($result['name']));
			array_push($archyIdArray,$result['id']);
		}	
	}
	
	if($id==0)
	{
		$selected1="selected='selected'";
	}
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($archyArray);$count++)
	{
		if($archyIdArray[$count]==$id)
		{
			$selected="selected='selected'";
		}
		$counter=$count + 1;
		$option=$option."<option value='".$archyIdArray[$count]."' $selected>".$archyArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_media_type($id)
{
	global $mysql;
	$archyArray=array();
	$archyIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media_category` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($archyArray,getRealDataNoHTML($result['name']));
			array_push($archyIdArray,$result['id']);
		}	
	}
	
	if($id==0)
	{
		$selected1="selected='selected'";
	}
	$option="<option value='NULL'>--Select One--</option><option value='0' $selected1>All</option>";
	for($count=0;$count<sizeof($archyArray);$count++)
	{
		if($archyIdArray[$count]==$id)
		{
			$selected="selected='selected'";
		}
		$counter=$count + 1;
		$option=$option."<option value='".$archyIdArray[$count]."' $selected>".$archyArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_media_type_real($id)
{
	global $mysql;
	$archyArray=array();
	$archyIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media_category` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($archyArray,getRealDataNoHTML($result['name']));
			array_push($archyIdArray,$result['id']);
		}	
	}
	
	if($id==0)
	{
		$selected1="selected='selected'";
	}
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($archyArray);$count++)
	{
		if($archyIdArray[$count]==$id)
		{
			$selected="selected='selected'";
		}
		$counter=$count + 1;
		$option=$option."<option value='".$archyIdArray[$count]."' $selected>".$archyArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_media_keywords($id, $multiple=NULL)
{
	//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
	global $mysql;
	
	$archyArray=array();
	$archyIdArray=array();
	
	if($multiple==1)
	{
		$arrayStyle=explode(',', $id);
	}
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_media_keywords` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($archyArray,getRealDataNoHTML($result['name']));
			array_push($archyIdArray,$result['id']);
		}	
	}
	
	if($id==0)
	{
		$selected1="selected='selected'";
	}
	$option="<option value='NULL'>--Select One--</option><option value='0' $selected1>All</option>";
	for($count=0;$count<sizeof($archyArray);$count++)
	{
		if($multiple==0)//single
		{
			if($arrayIdList[$count]==$id)
			{
				$selected="selected='selected'";
			}
			
		}
		else
		{
			if(in_array($archyIdArray[$count], $arrayStyle))
			{
				$selected="selected='selected'";
				
			}
			
		}
		$counter=$count + 1;
		$option=$option."<option value='".$archyIdArray[$count]."' $selected>".$archyArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_architecture_tier1($value=null)
{
	global $mysql;
	$archyArray=array();
	$archyIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($archyArray,getRealDataNoHTML($result['name']));
			array_push($archyIdArray,$result['id']);
		}	
	}
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($archyArray);$count++)
	{
		if($value==$archyIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$archyIdArray[$count]."' $selected>".$archyArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_newsletter_receipient_type($value)
{
	$options= array('All Registered Members','This Newsletter Subscribers','Others');
	if($value==NULL)
	{
		$selected="selected='selected'";
	}
	
	$option="<option value='NULL' ".$selected.">--Select One--</option>";	
	$selected='';
	for($count=0;$count<sizeof($options);$count++)
	{
		$counter=$count + 1;
		if($value==$counter)
		{
			$selected="selected='selected'";
		}
		
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_subscription_mode($value)
{
	$options= array('By Email','By SMS','By Hand or At Collection Centre');
	if($value==NULL)
	{
		$selected="selected='selected'";
	}
	
	$option="<option value='NULL' ".$selected.">--Select One--</option>";	
	$selected='';
	for($count=0;$count<sizeof($options);$count++)
	{
		
		$counter=$count + 1;
		if($value==$counter)
		{
			$selected="selected='selected'";
		}
		
		$option=$option."<option value='".$counter."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_subscriptions()
{
	global $mysql;
	$newsletterArray=array();
	$newsletterIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_subscriptions` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($newsletterArray,getRealDataNoHTML($result['name']));
			array_push($newsletterIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($newsletterArray);$count++)
	{
		$option=$option."<option value='".$newsletterIdArray[$count]."' $selected>".$newsletterArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_newsletters()
{
	global $mysql;
	$newsletterArray=array();
	$newsletterIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($newsletterArray,getRealDataNoHTML($result['name']));
			array_push($newsletterIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($newsletterArray);$count++)
	{
		$option=$option."<option value='".$newsletterIdArray[$count]."' $selected>".$newsletterArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_user_type($value)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML($result['name']));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_equality($value=NULL)
{
	$options=array("<",">","<=",">=","=");
	$optionsInWords=array('Lower Than','Greater Than','Lower Than or Equal To','Greater Than or Equal To','Equal To');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$optionsInWords[$count]."</option>";
		$selected="";
	}
	return $option;
}


function getTextAround($string, $search, $counter)
{
	//$string=God is watching us anywhere we go and go to the church to eat fried fish
	//$search = go
	//$count=10
	$arrayPos=array();
	$array=explode(' ', $string);
	for($count=0;$count<sizeof($array);$count++)
	{
		if($array[$count]==$search)
		{
			array_push($arrayPos, $count);
		}
	}

	
	$finalString="...";
	
	$start=$arrayPos[0] - $counter;
	$final=$arrayPos[0] + $counter;
	if($start<0)
	{
		$start=$arrayPos[0];
	}
	
	if(sizeof($arrayPos)==0)
	{
		$final=$counter;
		$start=0;
	}
	
	for($count1=$start;$count1<$final;$count1++)
	{
		$finalString=$finalString." ".$array[$count1];
	
	}
	$finalString=$finalString." ...";
	
 	$replace='<strong><em>'.$search.'</em></strong>';
	return preg_replace("/$search/","<em><b>$replace</b></em>",$finalString);
}





function append_option_advert_type($value)
{
	$options= array('HTML Format','Image Format');
	
	$option="<option value='NULL' >--Select One--</option>";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		else
		{
			$selected="";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
		
	}
	return $option;
}



function append_option($value=NULL)
{
	$options=array('No','Yes');
	if($value==NULL)
	{
		$selected="selected='selected'";
	}
	$option="<option value='NULL' $selected>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$count."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}

function append_option_format_type1($value)
{
	$options=array('Full Names', 'Initials');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}

function append_option_format_type2($value)
{
	$options=array('UPPER CASE', 'Title Case', 'lower case', 'Sentence case', 'tOGGLE cASE');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}

function append_option_format_type3($value)
{
	$options=array('Left', 'Right', 'Justify', 'Center');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}

function append_option_format_type4($value)
{
	$options=array('Full Date', 'MM/DD/YY', 'DD/MM/YY');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_format_sex($value=NULL)
{
	$options=array('Female', 'Male');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_format_positionInAuthority($value=NULL)
{
	//options should be gotten from the positions table
	$options=array('Pastor', 'Member');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_menu_type($value)
{
	//options should be gotten from the positions table
	$options=array('Horizontal', 'Vertical');
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected=NULL;
	}
	return $option;
}




function append_option_menu_position($value=NULL)
{
	global $mysql;
	//options should be gotten from the positions table
	$positionArray=array();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($positionArray,getRealDataNoHTML($result['name']));
		}	
	}
	
	$selected="";
	if($value==NULL)
	{
		$selected="selected='selected'";
	}
	$option="<option value='NULL' $selected>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($positionArray);$count++)
	{
		if($value==$positionArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$positionArray[$count]."' $selected>".$positionArray[$count]."</option>";
		$selected="";
	}
	return $option;

}


function append_option_menu_items($value, $defVal)
{
	global $mysql;
	//options should be gotten from the positions table
	$menuArray=array();
	$menuIdArray=array();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu_items` WHERE `status` = '1' AND menuId = '".$value."' AND `parentId` IS NULL";

	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($menuArray,getRealDataNoHTML($result['title']));
			array_push($menuIdArray,$result['id']);
		}	
	}
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($menuIdArray);$count++)
	{
		if($defVal==$menuIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$menuIdArray[$count]."' $selected>".$menuArray[$count]."</option>";
		$selected="";
	}
	return $option;

}





function append_option_section_items($sectionName, $value=NULL)
{
	global $mysql;
	$tableName=strtolower(str_replace(" ", "_", $sectionName));
	//options should be gotten from the positions table
	$menuArray=array();
	$menuIdArray=array();
	
	$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1' AND `name` = '".$sectionName."'";
	$sql1=$mysql->query($query1);
	$result1 = $mysql->fetch_assoc_mine($sql1);
	if($result1['parentId']==NULL)
	{
	
	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tableName."` WHERE `status` = '1'";
		
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
		}
		else
		{
			while($result = $mysql->fetch_assoc_mine($sql))
			{
				array_push($menuArray,getRealDataNoHTML($result['name']));
				array_push($menuIdArray,$result['id']);
			}	
		}
	}
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($menuArray);$count++)
	{
		if($value==$menuArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$menuIdArray[$count]."' $selected>".$menuArray[$count]."</option>";
		$selected="";
	}
	return $option;

}




function append_option_article_type($parentId=NULL)
{
	global $mysql;
	$articleType=array();
	$articleTypeId=array();
	
	
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_articles_type` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($articleType,getRealDataNoHTML($result['articleTypeName']));
			array_push($articleTypeId,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($articleType);$count++)
	{
		if($parentId==$articleTypeId[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$articleTypeId[$count]."' $selected>".$articleType[$count]."</option>";
		$selected="";
	}
	return $option;
}




function append_option_local_church($sectionsId=NULL)
{
	global $mysql;
	$localChurch=array();
	$localChurchId=array();
	
	if($sectionsId==NULL)
	{
		$extra="";
	}
	else
	{
		$extra=" AND `sectionsId`= '".$sectionsId;
	}
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_local_church` WHERE `status` = '1'".$extra;
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($localChurch,getRealDataNoHTML($result['name']));
			array_push($localChurchId,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($localChurch);$count++)
	{
		$option=$option."<option value='".$localChurchId[$count]."' $selected>".$localChurch[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_format_template($value)
{
	global $mysql;
	$templateName=array();
	$templateNameId=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($templateName,getRealDataNoHTML($result['templateName']));
			array_push($templateNameId,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($templateName);$count++)
	{
		if($value==$templateNameId[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$templateNameId[$count]."' $selected>".$templateName[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_menu_parent($value)
{
	global $mysql;
	$menuParents=array();
	$menuParentsId=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($menuParents,getRealDataNoHTML($result['name']));
			array_push($menuParentsId,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($menuParents);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$menuParentsId[$count]."' $selected>".$menuParents[$count]."</option>";
		$selected="";
	}
	return $option;

}



function append_option_pastor_list($value)
{
	global $mysql;
	$pastorList=array();
	$pastorIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$names="Pst. ".getRealDataNoHTML($result['firstName'])." ".getRealDataNoHTML($result['lastName'])." ".getRealDataNoHTML($result['otherName']).".";
			array_push($pastorList,$names);
			array_push($pastorIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($pastorList);$count++)
	{
		if($value==$pastorIdList[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$pastorIdList[$count]."' $selected>".$pastorList[$count]."</option>";
		$selected="";
	}
	return $option;

}


function append_option_accessLevel($value)
{

	//options should be gotten from the positions table
	$options=array('General User', 'Administrator', 'Special', 'Logged In Member');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		$count1=$count + 1;
		$option=$option."<option value='".$count."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;

}


function append_option_hierarchialPositionalLevel($value)
{

	//options should be gotten from the positions table

	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<21;$count++)
	{
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$count."' $selected>".$count."</option>";
		$selected="";
	}
	return $option;

}


function append_option_status($value)
{

	//options should be gotten from the positions table
	$options=array('Activated', 'Deactivated');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($value==$options[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_section_only_children_parent_value($value)
{
	global $mysql;
	$sectionList=array();
	$sectionIdList=array();
	$sectionRealIdList=array();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1' AND `parentId` IS NOT NULL";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		$sectionList=null;
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($sectionList,getRealDataNoHTML($result['name']));
			array_push($sectionIdList,$result['parentId']);
			array_push($sectionRealIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($sectionList);$count++)
	{
		if($value==$sectionRealIdList[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$sectionIdList[$count]."' $selected>".$sectionList[$count]."</option>";
		$selected='';
	}
	return $option;

}


function append_option_section_except_null()
{
	global $mysql;
	$sectionList=array();
	$sectionIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1' AND `parentId` != 'NULL'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($sectionList,getRealDataNoHTML($result['name']));
			array_push($sectionIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($sectionList);$count++)
	{
		$option=$option."<option value='".$sectionList[$count]."'>".$sectionList[$count]."</option>";
	}
	return $option;

}





function append_option_featureListMenuOnly($value=NULL)
{
	global $mysql;
	$featuresList=array();
	$featuresIdList=array();
	
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `menuYes` = 1";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($featuresList,getRealDataNoHTML($result['name']));
			array_push($featuresIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($featuresList);$count++)
	{
		if($value==$featuresIdList[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$featuresIdList[$count]."' $selected>".$featuresList[$count]."</option>";
		$selected='';
	}
	return $option;

}



function append_option_featureList()
{
	global $mysql;
	$featuresList=array();
	$featuresIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($featuresList,$result['name']);
			array_push($featuresIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($featuresList);$count++)
	{
		$option=$option."<option value='".$featuresIdList[$count]."'>".$featuresList[$count]."</option>";
	}
	return $option;

}



function append_option_fpss_style($value)
{
	$options=array('Simple', 'Complex');
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($options);$count++)
	{
		if($count==1)
		{
			$disabled="disabled='disabled'";
		}
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$options[$count]."' $disabled $selected>".$options[$count]."</option>";
		$selected="";
	}
	return $option;
}


function append_option_department()
{
	global $mysql;
	$deptList=array();
	$deptIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_departments_list` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($deptList,getRealDataNoHTML($result['departmentName']));
			array_push($deptIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($deptList);$count++)
	{
		$option=$option."<option value='".$deptIdList[$count]."'>".$deptList[$count]."</option>";
	}
	return $option;
}


function append_option_position()
{
	global $mysql;
	$positionList=array();
	$positionIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_position` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($positionList,getRealDataNoHTML($result['name']));
			array_push($positionIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($positionList);$count++)
	{
		$option=$option."<option value='".$positionIdList[$count]."'>".$positionList[$count]."</option>";
	}
	return $option;
}


function append_option_menu_name($value)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($arrayList,getRealDataNoHTML($result['name']));
			array_push($arrayIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	if(!strpos($value, ','))
	{
	}
	else
	{
		$haystack=explode(',', $value);
	}
	
	$option="<option value='NULL'>--Select One--</option>";
	
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$selected="";
		if(!strpos($value, ','))
		{
			if($value==$arrayIdList[$count])
			{
				$selected="selected='selected'";
			}
		}
		else
		{
			if(in_array($arrayIdList[$count],$haystack))
			{
				$selected="selected='selected'";
			}
		}
		$option=$option."<option value='".$arrayIdList[$count]."' $selected>".$arrayList[$count]."</option>";
	}
	return $option;
}





function append_option_section_child($id)
{
	global $mysql;
	$arrayList=array();
	$arrayIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_section` WHERE `status` = '1' AND id = '".$id."'";
	echo $query;
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$tblName=strtolower(str_replace(" ", "_", getRealDataNoHTML($result['name'])));

			$query1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".$tblName."` WHERE `status` = '1'";
			$sql1=$mysql->query($query1);
			while($result1 = $mysql->fetch_assoc_mine($sql1))
			{
				array_push($arrayList,getRealDataNoHTML($result1['name']));
				array_push($arrayIdList,$result1['id']);	
			}
			
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($arrayList);$count++)
	{
		$option=$option."<option value='".$arrayIdList[$count]."'>".$arrayList[$count]."</option>";
	}
	return $option;

}

function truncateText($text, $wordLength)
{
	$wordArray=explode(' ',$text);
	if(sizeof($wordArray)<=$wordLength)
	{
		return $text;
	}
	else
	{
		$text=explode(' ', $text);
		$newText="";
	
		for($count=0;$count<$wordLength;$count++)
		{
			$newText=$newText." ".$text[$count];
		}
		return $newText."...";
	}
}

//function for validating email address
function isEmail($email)
{
	if (! @eregi('^[0-9a-z_]+'.'@'.'([0-9a-z-]+\.)+'.'([0-9a-z]){2,4}$', $email))
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

function stateCountryMatch($state, $country)
{
	global $mysql;
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE `id` = '".$state."' AND status = '1' ORDER BY name";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		return FALSE;
	}
	else
	{
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE `id` = '".$state."' AND `countryId` = '".$country."' AND status = '1' ORDER BY name";
		$sql=$mysql->query($query);
		if($mysql->num_rows==0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
}


function append_option_groups()
{
	global $mysql;
	$positionList=array();
	$positionIdList=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_groups` WHERE `status` = '1'";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($positionList,getRealDataNoHTML($result['name']));
			array_push($positionIdList,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	for($count=0;$count<sizeof($positionList);$count++)
	{
		$option=$option."<option value='".$positionIdList[$count]."'>".$positionList[$count]."</option>";
	}
	return $option;
}


function checkEmail($email)
{
	if(!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $email))
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

function getDomain($url)  
{  
	//$nowww = ereg_replace('www.','',$url);  
	$domain = parse_url($url);  
	return $domain["host"];  
}  


function ctype($ext)
{
	switch(strtolower($ext))
	{	
		
		///////////////////////////////
		// Images and images-related //
		///////////////////////////////
		case 'jpg':
		case 'jpeg':
		case 'jpe':
		case 'jfif':
		case 'gif':
		case 'png':
		case 'bmp':
			$ext="Image"; break;
		
		
		/////////////////////////////
		// Audio and aidio-related //
		/////////////////////////////
		
		case 'wav':
		case 'wma':
		case 'mp3':
			$ext="Audio"; break;
		
		case "pdf":
			$ext="pdf"; break;
		/////////////////////////////
		// Video and video-related //
		/////////////////////////////
		
		case 'wmv':
		case 'wmx':
		case 'wvx':
			$ext="Video"; break;
		
		
		//////////////////
		// Default type //
		//////////////////
		default:
			$ext="NULL"; break;
	}
	return $ext;
}



function imageResize($data,$scaleby=false,$targetSize=false,$string='',$noScale=false)
{
	// DYNAMIC IMAGE GENERATOR

	// Variables first
	$targetwidth = $targetSize;
	$targetheight = $targetSize;
	$minSize = 20;
	
	// Validate dimensions
	if($targetwidth < $minSize)
		$targetwidth = $minSize;
	if($targetheight <$minSize)
		$targetheight = $minSize;
	
	// Create a temporary file to use
	$fname = md5(uniqid('d'));
	$file = fopen($fname,'w') or die('Could not complete file processing.');
	fwrite($file,$data);
	fclose($file);

	$img = getimagesize($fname);
	if(!$img)
	{
		die('Unable to properly convert file');
		$del = unlink($fname);
	}
	
	list($width, $height) = getimagesize($fname);
	
	if($scaleby == 'height')
		$percent = $targetheight/$height;
	else
		$percent = $targetwidth/$width;
	
	if($noScale || $percent > 1)
		$percent = 1;
	
	$newwidth = $width * $percent;
	$newheight = $height * $percent;
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	if($img['mime'] == 'image/gif')
		$source = imagecreatefromgif($fname);
	elseif($img['mime']=='image/png')
		$source = imagecreatefrompng($fname);
	else
		$source = imagecreatefromjpeg($fname);
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	
	// Label Picture
	$x1 = 5;
	$y1 = $newheight - 20;
	$textSize = ceil($newwidth / 90);
	$color = imagecolorallocate($thumb, 255, 200, 0);
	imagestring($thumb, $textSize, $textSize, $textSize, $string, $color);
	
	// Export Picture
	if($img['mime'] == 'image/gif')
		imagegif($thumb,$fname);
	elseif($img['mime'] == 'image/png')
		imagepng($thumb,$fname);
	else
		imagejpeg($thumb,$fname);
	
	// Import back the file and catch the file
	$fp = fopen($fname,'r');
	$data = fread($fp,filesize($fname));
	fclose($fp);

	// Delete temporary file
	$del = unlink($fname);
	
	return array('type'=>$img['mime'],'data'=>$data);
}


function fileFormat($filename)
{

	$ext = substr($filename,strrpos($filename,'.') + 1);
	
	switch(strtolower($ext))
	{	
		
		///////////////////////////////
		// Images and images-related //
		///////////////////////////////
		case 'jpg':
		case 'jpeg':
		case 'jpe':
		case 'jfif':
		case 'gif':
		case 'png':
		case 'bmp':
			$ext="Image"; break;
		
		
		/////////////////////////////
		// Audio and aidio-related //
		/////////////////////////////
		
		case 'wav':
		case 'wma':
		case 'mp3':
			$ext="Audio"; break;
		
		case "pdf":
			$ext="pdf"; break;
		/////////////////////////////
		// Video and video-related //
		/////////////////////////////
		
		case 'wmv':
		case 'wmx':
		case 'mpeg':
		case 'wvx':
			$ext="Video"; break;
		
		
		//////////////////
		// Default type //
		//////////////////
		default:
			$ext="NULL"; break;
	}
	return $ext;
}



function allowedFileUploads($filename)
{
	if(fileFormat($filename)!="NULL")
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

function getStateName($id)
{
	global $mysql;
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_states` WHERE status ='1' AND `id` = '".$id."'";
	$sql=$mysql->query($query);
	$result = $mysql->fetch_assoc_mine($sql);
	return $result;
}

function append_option_bank($value)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bank` WHERE `status` = '1' ORDER BY name";
	$sql=$mysql->query($query);
	if($mysql->num_rows==0)
	{
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML(strtoupper(strtolower($result['name']))));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}



function append_option_user($value, $userTypeId)
{
	global $mysql;
	$usertypeArray=array();
	$usertypeIdArray=array();
	
	$sql=USER::getUserList(NULL, NULL, $userTypeId);
	if(!$sql)
	{
		
	}
	else
	{
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			array_push($usertypeArray,getRealDataNoHTML(ucfirst(strtolower($result['username']))));
			array_push($usertypeIdArray,$result['id']);
		}	
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeIdArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeIdArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}


function getTransactionDetails($id)
{
	global $mysql;
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_transactions` WHERE status ='1' AND `name` = '".$id."'";
	$sql=$mysql->query($query);
	$result = $mysql->fetch_assoc_mine($sql);
	return $result;
}


function getBankDetails($id)
{
	global $mysql;
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_bank` WHERE status ='1' AND `id` = '".$id."'";
	$sql=$mysql->query($query);
	$result = $mysql->fetch_assoc_mine($sql);
	return $result;
}



function add_or_subtract_days($date, $period, $style)
{
	if($style==1)
	{
		$equiv_date=strtotime($date);
		echo "<br />date=".$date."<br />";
		$new_date=$equiv_date + ($period * 86400);
//		$ar = strftime('%c',$new_date);
	//	$str=explode (' ', $ar);
//		return $str[0];
		return date('Y-m-d H:i:s', $new_date);
		
	}
	if($style==2)
	{
		$equiv_date=strtotime($date);
		$new_date=$equiv_date - ($period * 86400);
		//$ar = strftime('%c',$new_date);
		//$str=explode (' ', $ar);
		//return $str[0];
		return date('Y-m-d H:i:s', $new_date);
	}

}


function add_or_subtract_days_exactly($date, $period, $style)
{
	if($style==1)
	{
		$equiv_date=strtotime($date);
		$new_date=$equiv_date + $period;
//		$ar = strftime('%c',$new_date);
	//	$str=explode (' ', $ar);
//		return $str[0];
		//echo "<br />".date('Y-m-d H:i:s', $new_date)."<br />";
		return date('Y-m-d H:i:s', $new_date);
		
	}
	if($style==2)
	{
		$equiv_date=strtotime($date);
		$new_date=$equiv_date - ($period * 86400);
		//$ar = strftime('%c',$new_date);
		//$str=explode (' ', $ar);
		//return $str[0];
		return date('Y-m-d H:i:s', $new_date);
	}

}


function getDayDiff($day1, $day2)
{

	if((strtotime($day1)) > (strtotime($day2)))
	{
		$noOfDaysInSecs=(strtotime(day1) - strtotime($day2));
	}
	else
	{
		$noOfDaysInSecs=(strtotime($day2) - strtotime($day1));
	}
//	echo "---".$noOfDaysInSecs."---";
	return floor($noOfDaysInSecs/86400);
}


function append_project_status($value)
{
	global $mysql;
	//status of 'Not Started' wasnot included cos we ont want even the admin to start the listing afresh once it has started
	if(!isSuperAdmin($_SESSION['uid']))
	{
		$usertypeArray=array('Valid', 'Suspended');
	}
	else
	{
		$usertypeArray=array('Invalid', 'Valid', 'Expired', 'Suspended');
	}
	//options should be gotten from the positions table
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=0;$count<sizeof($usertypeArray);$count++)
	{
		if($value==$usertypeArray[$count])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$usertypeArray[$count]."' $selected>".$usertypeArray[$count]."</option>";
		$selected="";
	}
	return $option;
}





function append_serial_nos($start, $end, $value)
{
	global $mysql;
	
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	for($count=$start;$count<$end;$count++)
	{
		if($value==$count)
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$count."' $selected>".$count." days</option>";
		$selected="";
	}
	return $option;
}



function appendMyProjectsHandling($start, $no, $userId, $orderBy, $order, $value)
{
	global $mysql;
	$projSQL=PROJECT::getDeveloperHandlingProjectListing($start, $no,$userId, $orderBy, $order);
	
	$option="<option value='NULL'>--Select One--</option>";
	$selected="";
	while($result = $mysql->fetch_assoc_mine($projSQL))
	{
		if($value==$result['id'])
		{
			$selected="selected='selected'";
		}
		$option=$option."<option value='".$result['id']."' $selected>".$result['header']."</option>";
		$selected="";
	
	}
	return $option;
}

?>
