<?php

//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");

class Site
{
	public $frontPageTemplate, $innerTemplate, $status;
	public $siteEmail;
	
	function __construct()
	{
	
	}
	
	function getDetails()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1'";
		//echo $query_new;
		$sql_new=$mysql->query($query_new);
		$result = $mysql->fetch_assoc_mine($sql_new);
		//print_r($result);
		return $result;
	}
	
	
	function setSiteSettings()
	{
		global $mysql;
		$error=new Error();
		$churchName=setDataDB($_POST['churchName']);
		$siteTitle=setDataDB($_POST['siteTitle']);
		$currency=setDataDB($_POST['currency']);
		$mailer=$_POST['mailer'];
		$keywords=setDataDB($_POST['keywords']);
		$status=$_POST['status'];
		$description=setDataDB($_POST['description']);
		$author=setDataDB($_POST['author']);
		$copyright=setDataDB($_POST['copyright']);
		$acadSess=setDataDB($_POST['acadSess']);
		
		$fileInputName2='addImage2';
		//$upload_dir2='../../../plugins/tinymce/examples/css/';
		$fileInputName1='userfile1';
		//$upload_dir1='../../../core/site/images/';
		$upload_dir1='../core/site/images/';
		 
		//for file addImage1
		if(isset($_FILES[$fileInputName1]))
		{
			
			$size=$_FILES[$fileInputName1]['size'];
			//
			$count=0; $total_filesize=0;
		}
		if($size>0)
		{
			$file=$_FILES[$fileInputName1];
			
			if(($size!=0))
			{
				$total_filesize=$total_filesize + $size;
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
						$url='Location: upload_pro.php?jdjdfje=lsmdenaw';
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
					if(!@move_uploaded_file($file['tmp_name'], $upload_dir1.basename($file['name'])))
					{
						$moved=0;
					}
					else
					{
						$moved=1;
						$confirm_entry=1;
						$uniq_id=uniqid("");
							
						$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
						echo $entryString;
			//$sql=$display_announcement->doQuery($entryString);
						$sql= $mysql->query($entryString);
						
						$fileId1=$mysql->insert_id;
						
						//insert other parameters appropriately
						$data_file = $upload_dir1.basename($file['name']);
	
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
	
						$data_file1 = $upload_dir1.$newfilename1;
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
				
		if(is_numeric($fileId1)==1)
		{
			$extraStr=$extraStr.",`faviconFileId`='".$fileId1."'";
		}
		$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_site` SET `churchName`='".$churchName."',`yearDeveloped`='".date("Y")."',`siteTitle`='".$siteTitle."', `keywords`='".$keywords."' ,`activateSendMails`='".$mailer."', `status`='".$status."', `currency`='".$currency."', `description` = '".$description."', `author`='".$author."', `copyright` = '".$copyright."'".$extraStr."  WHERE `id` = '1'";
		echo $entryString;
		$sql= $mysql->query($entryString);
		$url='Location: '.$_SERVER['HTTP_REFERER'].'&errcpj=errcpj101';
		return $url;
	}
	
	
	
	function getSiteDetails()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site`";
		$sql_new=$mysql->query($query_new);
		$result = $mysql->fetch_assoc_mine($sql_new);
		return $result;
	}
	
	
	function getFavicon()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1'";
		$sql_new=$mysql->query($query_new);
		$result = $mysql->fetch_assoc_mine($sql_new);
		$fileName=getPictureFileName($result['faviconFileId'], 1);
		return $fileName;
		
	}
	
	
	function getTitle()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1'";
		$sql_new=$mysql->query($query_new);
		$result = $mysql->fetch_assoc_mine($sql_new);
		echo getRealDataNoHTML($result['siteTitle']);
	}
	
	function sendMails()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1' AND `activateSendMails` = '1'";
		$sql_new=$mysql->query($query_new);
		$header="<table width='100%' border='0' cellspacing='5' cellpadding='5' >";
		if($mysql->num_rows > 0)
		{
			$this->siteEmail=$siteEmail;
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function siteOnline()
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1' AND `sendAdminMailYes` = '1'";
		$sql_new=$mysql->query($query_new);
		$result = $mysql->fetch_assoc_mine($sql_new);
		
		if($result['status']==1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function underConstruction()
	{
		include_once("core/site/offline.php");

	}
	
	
	function getFrontPageTemplate()
	{
		return $this->frontPageTemplate;
	}
	
	
	
	
	function getInnerTemplate()
	{
		return $this->innerTemplate;
	}
	
	
	function getStatus()
	{
		return $this->status;
	}
	
	function setFrontPasetemplate($frontPasetemplate)
	{
		return $this->frontPasetemplate;
	}
	
	
	function setInnerTemplate($innerTemplate)
	{
		return $this->innerTemplate;
	}
	
	
	function setStatus($status)
	{
		global $mysql;
		$query_new="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `id` = '1'";
		$sql_new=$mysql->query($query_new);
		
		if($mysql->num_rows > 0)
		{
			$this->siteEmail=$siteEmail;
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function sendAdminMailCopy()
	{
		$siteDet=$this->getSiteDetails();
		if($siteDet['sendAdminMailYes']==1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function prepareSearchTags()
	{
		$siteDet=SITE::getSiteDetails();
		$requestparam="";
		if(strlen($_SERVER['QUERY_STRING'])>0)
		{
			$requestparam="?".$_SERVER['QUERY_STRING'];
		}
		echo "<meta name='title' content='".$siteDet['siteTitle']."' />
		<meta name='description' content='".$siteDet['description']."' />
		<meta name='keywords' content='".$siteDet['keywords']."' />
		<meta name='author' content='".$siteDet['author']."' />
		<meta name='copyright' content='".$siteDet['copyright']."' />
		<link rel='image_src' href='http://imobilliare.com/images/real_banner_fb.jpg' />
		<meta property='og:image' content='http://imobilliare.com/images/real_banner_fb.jpg' />
		<meta property='og:title' content='".$siteDet['siteTitle']."' />
		<meta property='og:url' content='http://imobilliare.com/index.php".$requestparam."' />
		<meta property='og:description' content='".$siteDet['description']."' />";
	}
}

?>