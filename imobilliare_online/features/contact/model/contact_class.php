<?php


class Contact extends Feature 
{
	public $entryError=array();
	
	
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	function fullPreview($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			echo ucfirst(strtolower($result['title']))."<br /><br />";
		}
		echo $this->displayFeature($id);	
	}
	
	
	function previewLink($id, $id2=NULL, $id3)
	{
		$checked='';
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `id` = '".$id."' AND `status` = '1'";
		//echo $str;
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			if($id2==$result['id'])
			{
				$checked='checked';
			}
			$blogi=$this->getContactDetails($id);
			
			if($id3==1)
			{
				echo "<input name='preview' type='radio' value='".$result['id']."' $checked/>";
			}
			echo "&nbsp;&nbsp;".$result['information']."<br />";
			$checked='';
		}
		
		
	}
	
	function getContactDetails($id)
	{
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `id` = '".$id."'";
		$sql= $mysql->query($str);
		$result = $mysql->fetch_assoc_mine($sql);
		return $result;	
	}
	
	function displayFPFeature($style)
	{
		global $mysql;
		CONTROLLER_CONTACT::controlFrontPageDisplay($style);
	}
	
	
	function displayFeature($id=NULL)
	{
		global $mysql;
		CONTROLLER_CONTACT::controlFlowProcess();
	}
	
	function createContactPage()
	{
		global $mysql;
		$error=new Error();
		$phone=setDataDB($_POST['phone']);
		$email=setDataDB($_POST['email']);
		$address=setDataDB(adjustImageUrlToFit($_POST['address'], 0));
		
		$info=adjustImageUrlToFit($_POST['info'], 0);
		
		
		
		$contact=new Contact();
		
		
		if((strlen($info)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj029');
		}
		else if((strlen($email)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj027');
		}
		else if((strlen($address)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj028');
		}
		else if((strlen($phone)==0))
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj030');
		}
		
		
		if($_POST['CreateContact']=='Create')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_contact` (`id` ,`information`,`email`, `phoneNumber`, `contactAddress`, `status`)VALUES ('' , '".$info."','".$email."', '".$phone."', '".$address."', '1')";
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
		}
		if($_POST['UpdateContact']=='Update')
		{
			$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_contact` SET `information`= '".$info."', `email`= '".$email."', `phoneNumber` = '".$phone."',`contactAddress` = '".$address."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		}
		echo $entryString;
		$sql= $mysql->query($entryString);
		return $url;
		
	}
	
	
	function updateContactEntries()
	{
		global $mysql;
		$error=new Error();
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact`";
		
		$sql=$mysql->query($str);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
					
			$frontPageYes='frontPageYes'.$result['id'];
			$frontPageYes=$_POST[$frontPageYes];
			if($frontPageYes!=1)
			{
				$frontPageYes=0;
			}
			
			$status='status'.$result['id'];
			$status=$_POST[$status];
			if($status!=1)
			{
				$status=0;
			}
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_contact` SET `status` = '".$status."',`frontPageYes`='".$frontPageYes."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	function talkToUs()
	{
		global $mysql;
		$error=new Error();
		$names=setDataDB($_POST['names']);
		$email=setDataDB($_POST['email']);
		$message=setDataDB($_POST['message']);
		$contact=new Contact();
		global $mysql;
	
		if(strlen($names)==0)	
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19010');
		}
		else
		{
			if(strlen($email)==0)	
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19011');
			}
			else
			{
				if(strlen($message)==0)	
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19012');
				}
				else
				{
					$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_contact_list` (`id` ,`names` ,`email` ,`message` ,`dateSent` ,`status`)VALUES (NULL,'".$names."','".$email."','".$message."',".CURRENT_TIMESTAMP.",'1')";		
			//$sql=$display_news->doQuery($entryString);
					$sql= $mysql->query($entryString);
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19013');
				}
			}
		}
		return $url;
	}
	
	function paginateSelection($searchMode, $searchModeId, $start, $noOfSearches)
	{
		global $mysql;
		$section=new Section();
		$base=$section->getBase();
		$base=$base['id'];

		if($searchModeId!=NULL)
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".strtolower(str_replace(" ", "_", $searchMode))."` WHERE `status` = '1' AND `parentNodeId` = '".$searchModeId."'";
			$sql= $mysql->query($str);
		}
		else
		{
			if((isset($_REQUEST['linkToFeatureChildId'])) && (is_numeric($_REQUEST['linkToFeatureChildId'])==1))
			{
				$strX1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".strtolower(str_replace(" ", "_", $searchMode))."` WHERE `status` = '1' AND `id` = '".$_REQUEST['linkToFeatureChildId']."'";
				$sqlX1= $mysql->query($strX1);		
				$resultX1 = $mysql->fetch_assoc_mine($sqlX1);
				
				$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".strtolower(str_replace(" ", "_", $searchMode))."` WHERE `status` = '1' AND `section` = '".$resultX1['section']."'";
				
			}
			else
			{
				$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_".strtolower(str_replace(" ", "_", $searchMode))."` WHERE `status` = '1' AND `section` = '".$base."' LIMIT 0, 1";
				
				
			}
			
			$sql= $mysql->query($strX);
		}
		$totalNumberofSearches=$mysql->num_rows;
		
		$pageViews=floor(($totalNumberofSearches/$noOfSearches) + 0.999);
		if($pageViews==0)
		{
			$pageViews=1;
		}
		
		for($counter=0;$counter<$pageViews;$counter++)
		{
			$counter1=$counter + 1;
			//echo $counter1;
			$starter=$counter * $noOfSearches;
			
			$linkChecker=$start/$noOfSearches;
			if($linkChecker==$counter)
			{
				$paging=$paging."&nbsp;&nbsp;".$counter1;
			}
			else
			{
				if($searchModeId==NULL)
				{
					$paging=$paging."&nbsp;&nbsp;<a href='index.php?linkToFeatureId=".parent::getId('contact')."&linkToFeatureChildId=".$_REQUEST['linkToFeatureChildId']."&searchMode=".$_REQUEST['searchMode']."&searchModeId=".$_REQUEST['searchModeId']."&search_start=".$starter."&listChurches'>".$counter1."</a>";
				}
				else
				{
					$paging=$paging."&nbsp;&nbsp;<a href='index.php?linkToFeatureId=".parent::getId('Section')."&linkToFeatureChildId=".$_REQUEST['linkToFeatureChildId']."&sectionId=".$_REQUEST['sectionId']."&searchMode=".$_REQUEST['searchMode']."&searchModeId=".$_REQUEST['searchModeId']."&search_start=".$starter."'>".$counter1."</a>";
				}
			}
		}
		
		return "Page: ".$paging." of $pageViews";
		
	}
	
}

?>