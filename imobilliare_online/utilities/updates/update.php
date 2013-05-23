<?php
//if ($lib->getAccessLevel()!="general_user") {
ob_start();

/*include_once("../../../lib/lib.php");
include_once("../../../lib/lib_special.php");
include_once("../../../includes/mysqli.php");
include_once("../../../includes/db.php");
include_once("../../../lib/lib_special.php");
include_once("../../../lib/lib_util.php");
include_once("../../../features/feature_class.php");
include_once("../../../component/feature_display/feature_display_class.php");
include_once("../../../features/user/user_class.php");
include_once("../../../includes/session.inc");
include_once("../../../core/error/error_class.php");
include_once("../../../component/email/email_class.php");
include_once("../../../features/jobs/jobs_class.php");
include_once("../../../utilities/util.php");
include_once("../../../features/section/section_class.php");
include_once("../../../core/unzip/dZip.php");
include_once("../../../core/unzip/dUnzip2.php");*/
$error=new Error();



if(($_POST['Update_Run']=='Yes'))
{
	/*echo 1;
	$error=new Error();
	
	$upload_dir='../files/';
	$fileName=base64_decode($_REQUEST['fide']);
	echo $fileName;
	$zipFilePath=$upload_dir."".$fileName;
	$directory_name=str_replace(" ", "", $fileName);
	$arrayEx=explode('.', $directory_name);
	$directoryName='../files/'.$arrayEx[0];
	//echo $directoryName;
	//run update file
	//1.check for unzip file first, then unzip file
	//2.open file check 1st line if file is from us and then close it
	//3.run the file if true
	//4.delete the file, its folder, and the zipped file
	//return to papa page and congratulate
	if (!is_file($zipFilePath))
	{ 
		die("<b>404 File not found!</b>"); 
	}
	else
	{
		$zip = new dUnzip2($zipFilePath);
		$zip->debug = true;
		
		$zip->getList();
		$zip->unzipAll($directoryName);
		$zip->close();
		@unlink($zipFilePath);
		$fh = fopen($directoryName.'/readme.txt', 'rb') or die("Invalid Update File. Please Try Update Process again!");
		$contents=fread($fh, filesize($directoryName."/readme.txt"));
		//check if base64encode of zip filename exists in the readme.txt file
		echo $fileName;
		if(strpos($contents, base64_encode($fileName)))
		{
			fclose($fh);
			$_SESSION['upcontents']=$contents;
			require_once($directoryName."/".$arrayEx[0].".php");
			header('Location: updater.php?errcpj=errcpj102');
			
		}
		else
		{
			die("Invalid Update File Uploaded! Please repeat update process with a valid update file.");
		}

		
	}*/
	header('Location: ?errcpj=errcpj0002');
}



if(($_POST['Update_Upload']=='Upload'))
{
	$error=new Error();
	$upload_dir='../utilities/updates/files/';
	$fileInputName='userfile';

	$size=$_FILES[$fileInputName]['size'];
	
	if(($size==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj007');
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
					echo 11;
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
			//$sql=$display_announcement->doQuery($entryString);
						$sql= $mysql->query($entryString);
						
						$fileId1=$mysql->insert_id;
						
						//insert other parameters appropriately
						$data_file = basename($file['name']);
	
						$newfilename=base64_encode($data_file);
						$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'fide='.$newfilename);
						
					}
				}
			}
			else
			{
			}
		}	
		
	}
	header($url);		
	
}

?>