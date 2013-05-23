<?php

//if ($lib->getAccessLevel()!="general_user") {
if(!defined('CH_PORTAL_ACCESS'))
{
   // die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

ob_start();
////include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
include_once("../core/unzip/dZip.php");
include_once("../core/unzip/dUnzip2.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");


global $mysql;


if($_POST['InstallTemplate']=='Install')
{
	echo 11;
	$url=TEMPLATE::installTemplate();
	header($url);
}






if($_POST['Upload']=='Upload')
{

	//check image types first before uploadingf o!
	$templateName=setDataDB($_POST['templateName']);
	
	$directory_name=str_replace(" ", "", $templateName);
	$directory_name=str_replace("/", "_", $directory_name);
	
	$upload_dir=$_SERVER['DOCUMENT_ROOT'].'/'.substr(substr($_SERVER['REQUEST_URI'],1,-1), 0, strpos($_SERVER['REQUEST_URI'],'/',1)).'template/'.$directory_name.'/images/';
	$size=0;
	
	if((strlen($templateName)>0))
	{
		for($counter=1;$counter<11;$counter++)
		{
			$fileInputName='userfile'.$counter;
			
			if(isset($_FILES[$fileInputName]))
			{
				$size=$_FILES[$fileInputName]['size'];
				
			}
		
			
			$count=0;
			$total_filesize=0;
			
			if($size>0)
			{
				$file=$_FILES[$fileInputName];
				
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
							$url='upload_pro.php?jdjdfje=lsmdenaw';
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
							$move[0]=1;
						}
						else
						{
							$move[0]=0;
						}
					}
				}
				else
				{
				
				}
				
				$url='template_installer.php?install=112'.$upload_dir;
			}
		}
	
	}
	else
	{
		if(strlen($templateName)==0)
		{
			$feature->setEntryError("ERROR_NOTEMPLATESELECTED");
			break;
		}

		$url='template_installer_images.php?install=112failed'.$upload_dir;
	}
	
	$redirector=new Redirector();
	$redirector->redirect($url);

}


if($_POST['EditTemplate']=='Update')
{
	$url=TEMPLATE::updateTemplate();
	header($url);
}


if($_POST['MapTemplate']=='Update')
{
	$url=TEMPLATE::mapTemplate();
	header($url);
}

?>