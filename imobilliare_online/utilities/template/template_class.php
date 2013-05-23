<?php
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//require_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."component/feature_display/feature_display_class.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."features/feature_class.php");
////include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."template/asquire/index.php");

class Template
{
	public $tempName, $status, $dateCreated, $creator, $tempFilePath, $cssFilePath;

	function __construct()
	{

	}
	
	function getEditorClassFile()
	{
		global $mysql;
		$str3="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_site` WHERE `status` = '1'";
		$sql3= $mysql->query($str3);
		$result3 = $mysql->fetch_assoc_mine($sql3);
		//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."utilities/util.php");
		$fileName=$result3['editorClassFileId'];
		//$fileName=getPictureFileName($result3['editorClassFileId'], 1);
		if(strlen($fileName)>0)
		{
			return $fileName;
		}
		else
		{
			return FALSE;
		}
	}
	
	
	function installTemplate()
	{
		global $mysql;
		$error=new Error();
		$templateName=setDataDB($_POST['templateName']);
		$creator=setDataDB($_POST['creator']);
		$dateCreated=setDataDB($_POST['dateCreated']);
		$description=setDataDB($_POST['description']);
		$directory_name=str_replace(" ", "", $templateName);
	//	$directoryName=$_SERVER['DOCUMENT_ROOT'].'/'.substr(substr($_SERVER['REQUEST_URI'],1,-1), 0, strpos($_SERVER['REQUEST_URI'],'/',1)).'template/'.$directory_name;
		$directoryName='../template/'.$directory_name;
		if(strlen($templateName)==0)
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj142');
		}
		else
		{
			mkdir($directoryName);
		}
	//	echo 112;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_template` WHERE `templateName` = '".$templateName."'";
		$sql= $mysql->query($str);
		if($sql->num_rows>0)
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj141');
			//$feature->setEntryError("ERROR_TEMPLATENAMEEXISTS");
			break;
		}
		else
		{
			if((strlen($templateName)==0) || (strlen($creator)==0) || (strlen($dateCreated)==0))
			{
				if(strlen($templateName)==0)
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj142');
				}
				if(strlen($creator)==0)
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj143');
				}
				if(strlen($dateCreated)==0)
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj144');
				}
			
			}
			else
			{
					if(isset($_FILES['userfile']))
					{
						$size=$_FILES['userfile']['size'];
						if($size==0)
						{
							$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj147');
							//$feature->setEntryError("ERROR_TEMPLATEDATECREATED");
							break;
						}
						else
						{
							$upload_dir='../../template/';
							$size=0;	
							$file=$_FILES['userfile'];			
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
									$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj148');
									break;
							}
							
							//else move file to folder
							//if the file generally cannot be uploaded
							if(!@move_uploaded_file($file['tmp_name'], $upload_dir.basename($file['name'])))
							{
								$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj148');
							}
							else
							{
								$move[0]=0;
	//							www.studera.nu
	//		
								$zipFilePath=$upload_dir."".$file['name'];
								$go_ahead=1;
								
								if($go_ahead==1)
								{
									$zip = new dUnzip2($zipFilePath);
									$zip->debug = true;
									
									$zip->getList();
									$zip->unzipAll($directoryName);
									$zip->close();
									
									$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_templates` (`id` ,`templateName` ,`creatorNames` ,`dateCreated` ,`dateUploaded`,`tempFilePath` ,`status` , `frontPageYes`)VALUES ('' , '".$templateName."', '".$creator."', '".$dateCreated."', CURRENT_TIMESTAMP, 'index.php', 'Deactive', '0')";
									$sql= $mysql->query($entryString);
									$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj149');
									@unlink($zipFilePath);
								}
								else
								{
									$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj150');
								}
								
							}
							
						}
						
					}
					else
					{
						//no design page
						$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj148');
					}
					
			
			}
		}
		return $url;
	}
	
	
	function updateTemplate()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates`";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			$status='status'.$result['id'];
			$status=$_POST[$status];
			
			if($status!='1')
			{
				$status='Deactive';
			}
			else
			{
				$status='Active';
			}
			echo $status."<br /><br />";
			$fpYes='fpYes'.$result['id'];
			$fpYes=$_POST[$fpYes];
			if($fpYes!=1)
			{
				$fpYes=0;
			}
			
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_templates` SET `status` = '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			echo $update;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		return $url;
	}
	
	
	
	function mapTemplate()
	{
		global $mysql;
		$error=new Error();
		$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features`";
		$sql=$mysql->query($query);
		
		while(($result = $mysql->fetch_assoc_mine($sql)))
		{
			
			$templateId='templateId'.$result['id'];
			$templateId=$_POST[$templateId];
			
			$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_features` SET `mainViewTemplateId` = '".$templateId."' WHERE `id` = '".$result['id']."' LIMIT 1";
			$sql1= $mysql->query($update);
			echo $update;
		}
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
	}
	
	
	function useTemplate($featureId)
	{
		global $mysql;
		$str3="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `id` = '".$featureId."'";
		$sql3= $mysql->query($str3);
		
		while($result3 = $mysql->fetch_assoc_mine($sql3))
		{
			$str2="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `id` = '".$result3['mainViewTemplateId']."'";
			$sql2= $mysql->query($str2);
			while($result2 = $mysql->fetch_assoc_mine($sql2))
			{
				return $_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."template/".str_replace(' ', '', getRealDataNoHTML($result2['templateName']))."/".$result2['tempFilePath'];
			}
		}
	}
	
	function setActiveTemplate()
	{
		global $mysql;

		if((isset($_REQUEST['fid'])) && (is_numeric($_REQUEST['fid'])==1))
		{
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND id = '".$_REQUEST['fid']."'";
			//echo $str;
			$sql= $mysql->query($str);
			if($mysql->num_rows > 0)
			{
				while($result = $mysql->fetch_assoc_mine($sql))
				{
					/*if((isset($result['subViewTemplateIds'])) && (is_numeric($result['subViewTemplateIds'])==1))
					{
						$tempId=$result['subViewTemplateIds'];
					}
					else
					{*/
						$tempId=$result['mainViewTemplateId'];
					//}
					$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `id` = '".$tempId."' AND `status` = 'Active'";
					//echo $str_temp;
					$sql_temp= $mysql->query($str_temp);
					if($mysql->num_rows > 0)
					{
						while($result_temp = $mysql->fetch_assoc_mine($sql_temp))
						{
							$this->tempName=str_replace(' ', '', getRealDataNoHTML($result_temp['templateName']));
							//echo $result_temp['templateName'];
							$this->tempFilePath=$result_temp['tempFilePath'];
							$this->cssFilePath=$result_temp['cssFilePath'];
						}
					}
					else
					{
						$this->tempName=NULL;
						//echo $result_temp['templateName'];
						$this->tempFilePath=NULL;
						$this->cssFilePath=NULL;
						
					}
				}
			}
			else
			{
				$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active' AND `frontPageYes` = '1'";
				//echo $str_temp;
				$sql_temp= $mysql->query($str_temp);
	
				while($result_temp = $mysql->fetch_assoc_mine($sql_temp))
				{
					//echo $result_temp['templateName'];
	
					$this->tempName=str_replace(' ', '', $result_temp['templateName']);
					$this->tempFilePath=$result_temp['tempFilePath'];
					$this->cssFilePath=$result_temp['cssFilePath'];
				}
			}
		}
		
		else
		{
			//$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active' AND `frontPageYes` = '1'";
			$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_features` WHERE `status` = 'Activated' AND `name` = 'Frontpage'";
			//echo $str_temp;
			$sql= $mysql->query($str);

			while($result = $mysql->fetch_assoc_mine($sql))
			{
				//echo $result_temp['templateName'];
				$str_temp="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active' AND `id` = '".$result['mainViewTemplateId']."'";
				$sql_temp= $mysql->query($str_temp);
				$result_temp = $mysql->fetch_assoc_mine($sql_temp);

				$this->tempName=str_replace(' ', '', $result_temp['templateName']);
				$this->tempFilePath=$result_temp['tempFilePath'];
				$this->cssFilePath=$result_temp['cssFilePath'];
			}
		}
		
		//$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_templates` WHERE `status` = 'Active'".$extra_str;
		//$sql= $mysql->query($str);

		
	}
}

//$temp=new Template();
//echo $temp->getEditorClassFile();
?>