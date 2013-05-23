<?php
ob_start();
////include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/mysqli.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/session.inc");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."includes/db.php");
//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/error/error_class.php");
$error=new Error();


if((isset($_REQUEST['del'])) && ($_REQUEST['del']==1))
{

	$blog=new Blog();
	$resultTYE=$blog->getBlogDetails($_REQUEST['linkToFeatureChildId']);
	if((isset($_REQUEST['delId'])) && (is_numeric($_REQUEST['delId'])==1))
	{
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_blog_posts_comments` WHERE `status` = '1' AND `id` = '".$_REQUEST['delId']."' AND `blogPostId` = '".$_REQUEST['post']."'";
		$sql= $mysql->query($str);
		//$result = $mysql->fetch_assoc_mine($sql);
		
		if(($mysql->num_rows > 0) && ($_SESSION['uid'] == $resultTYE['ownerUserId']))
		{
			$str="DELETE FROM `".DEFAULT_DB_TBL_PREFIX."_blog_posts_comments` WHERE `id` = ".$_REQUEST['delId']." LIMIT 1";
			$mysql->query($str);
			
		}
	}
	$url='Location: '.$_SERVER['HTTP_REFERER'];
	header($url);
}



if($_POST['Edit1']=='Update')
{
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_error`";
	$sql=$mysql->query($query);
	
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		$activateNotifierYes='activateNotifierYes'.$result['id'];
		$activateNotifierYes=$_POST[$activateNotifierYes];
		if($activateNotifierYes!=1)
		{
			$activateNotifierYes=0;
		}
		
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
		$displayUserComment='displayUserComment'.$result['id'];
		$displayUserComment=setDataDB($_POST[$displayUserComment]);
		if($displayUserComment!=1)
		{
			$displayUserComment=0;
		}
		
		$userCommentYes='userCommentYes'.$result['id'];
		$userCommentYes=setDataDB($_POST[$userCommentYes]);
		if($userCommentYes!=1)
		{
			$userCommentYes=0;
		}
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_blog` SET `userCommentYes` = '".$userCommentYes."',`displayUserComment` = '".$displayUserComment."',`activateNotifierYes` = '".$activateNotifierYes."',`status` = '".$status."',`fpYes`='".$fpYes."' WHERE `id` = '".$result['id']."' LIMIT 1";
		$sql1= $mysql->query($update);
		//echo $update;
	}
	$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
	header($url);
}




if($_POST['Edit']=='Update')
{
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_blog_posts`";
	$sql=$mysql->query($query);
	
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		
		$status='status'.$result['id'];
		$status=$_POST[$status];
		if($status!=1)
		{
			$status=0;
		}
		$update="UPDATE `".DEFAULT_DB_TBL_PREFIX."_blog_posts` SET `status` = '".$status."' WHERE `id` = '".$result['id']."' LIMIT 1";
		$sql1= $mysql->query($update);
		//echo $update;
	}
	$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
	header($url);
}



if($_POST['Submit']=='Save')
{
	$blog=new Blog();
	$arrayPst=array();
	$query="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_menu` WHERE `status` = 'Activated'";
	$sql=$mysql->query($query);
	while(($result = $mysql->fetch_assoc_mine($sql)))
	{
		$position='position'.$result['id'];
		$position=setDataDB($_POST[$position]);
		if($position!='NULL')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_feature_menus` (`id` ,`featureId` ,`menuId` ,`position` ,`section`,`sectionId`,`status`)VALUES ('' , '".$blog->getId('Blog')."', '".$result['id']."', '".$position."', '".$section."', '".$sectionId."', '1')";
			$sql1= $mysql->query($entryString);
		}
	}	
	
	
	$url='Location: menu_mapper.php?errcpj=errcpj102';
	header($url);
}



if($_POST['postComment']=='Post')
{
	$firstName=setDataDB($_POST['firstName']);
	$lastName=setDataDB($_POST['lastName']);
	$location=setDataDB($_POST['location']);
	$message=setDataDB($_POST['message']);	
	global $blog;
	
	if((strlen($firstName)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj019');
	}
	else if((strlen($lastName)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj020');
	}
	else if((strlen($location)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj021');
	}
	else if((strlen($message)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj016');
	}
	else
	{
		$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_blog_posts_comments` (`id` ,`blogPostId` ,`firstName` ,`lastName` ,`location`,`message`,`status`,`datePosted`) VALUES ('' , '".$_REQUEST['post']."', '".$firstName."', '".$lastName."', '".$location."', '".$message."', '1', CURRENT_TIMESTAMP)";
		$sql= $mysql->query($entryString);
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'NULL');
	}
	header($url);
}
	
	
if(($_POST['UpdateError']=='Update'))
{
	$url=ERROR::updateErrorMsg();
	header($url);
}



if(($_POST['Update']=='Post') || ($_POST['EditBlogPost']=='Update'))
{
	$topic=setDataDB($_POST['topic']);
	$message=setDataDB($_POST['message']);
	$upload_dir='../images/';
	$addImage=$_POST['addImage1'];
	$fileInputName='userfile';
	if(isset($_FILES[$fileInputName]))
	{
		$size=$_FILES[$fileInputName]['size'];
		$count=0; $total_filesize=0;
	}
	global $blog; 
	
	if((strlen($topic)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj026');
	}
	else if((strlen($message)==0))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj016');
	}
	else if(($size==0)  && ($_POST['EditBlogPost']=='Update') && ($addImage==1))
	{
		$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj008');
	}
	else
	{
		
		
		
		
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
						$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');
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
						$fileId=$mysql->insert_id;
						
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
		else
		{
			
		}
		
		
		$blog1=$blog->getBlogId($_SESSION['uid']);
		if($_POST['Update']=='Post')
		{
			$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_blog_posts` (`id` ,`topic` ,`message` ,`pictureId` ,`datePosted`,`status`,`blogId`) VALUES ('' , '".$topic."', '".$message."', '".$fileId."', CURRENT_TIMESTAMP, '1', '".$blog1['id']."')";
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj101');
		}
		
		if($_POST['EditBlogPost']=='Update')
		{
			if($size > 0)
			{
				$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_blog_posts` SET `topic`= '".$topic."', `pictureId` = '".$fileId."',`message` = '".$message."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			}
			else
			{
				$entryString="UPDATE `".DEFAULT_DB_TBL_PREFIX."_blog_posts` SET `topic`= '".$topic."', `message` = '".$message."' WHERE `id` = '".$_REQUEST['id']."' LIMIT 1";
			}
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		}
			//$sql=$display_announcement->doQuery($entryString);
		$sql= $mysql->query($entryString);
	}
	header($url);

}


if($_POST['EditErrorList']=='Update')
{
	$url=ERROR::updateErrorListing();
	header($url);
}
?>