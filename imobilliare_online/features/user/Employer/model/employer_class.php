<?php

class Employer extends User
{
	private $accessLevel;
	public $id;
	public $entryError=array();
	
	function __construct()
	{
	}
	
	function previewLink($id, $id2=NULL, $id3)
	{
		global $mysql;
		$checked='';
		$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_usertype` WHERE `name` = 'Employer' AND `status` = '1'";
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
				echo "&nbsp;&nbsp;".getRealDataNoHTML($result['username'])."<br />";
				$checked='';
			}
		}
		
	}
	
	function fullPreview($id)
	{
		//not applicable
	}
	
	
	function displayFPFeature($position=null, $parameter2=null)
	{
		
		include_once("../../agent/model/features/user/agent/controller/controller_class.php");
		CONTROLLER_EMPLOYER::controlFrontPageDisplay();
	}


	
	function displayFeature($resultArray=NULL)
	{
		include("../controller/controller_class.php");
		CONTROLLER_EMPLOYER::controlFlowProcess();
	}
	
	
	
	
	function doRegister($securityOption)
	{
		global $mysql;
		$error=new Error();
		$userfile=$_POST['userfile'];						
		$profile=setDataDB(trim($_POST['profile']));						
		$username=setDataDB($_POST['username']);
		$usernameArray=explode(' ', $username);
		$password=setDataDB($_POST['password']);						
		$confirmPassword=setDataDB($_POST['confirmPassword']);	
		$email=setDataDB($_POST['email']);
		
		
		$captchaCode=setDataDB($_POST['anti_spam_code']);
		
		
		setcookie("profile", $_POST['profile'], time()+3600);
		setcookie("username", $_POST['username'], time()+3600);
		setcookie("email", $_POST['email'], time()+3600);
		
		$usertype=new UserType();
		$userTypeDet=$usertype->getDetails('Employer');

		
		$password=$securityOption($password);
		$authenticate=md5(uniqid((rand()."".$username), true));
		echo $captchaCode;
		
		$upload_dir='features/user/Employer/view/images/';
		
		if(sizeof($usernameArray)==1)
		{
			
				
				$query = $mysql->query("SELECT `username` FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `username` = '" . $username . "'");
				
				if ($mysql->num_rows > 0)
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1001');
				}
				else
				{								
					if(((strlen(trim($_POST['password'])) <6) || ($_POST['password'] != $_POST['confirmPassword'])))
					{
						return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1002');
					}
					else
					{
						$query = $mysql->query('SELECT email FROM `'.DEFAULT_DB_TBL_PREFIX.'_user` ' . 'WHERE email="' . $email . '"');
						if ($mysql->num_rows > 0)
						{
							$emailExist=1;
						}
						if ((!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $email)) || ($emailExist==1))
						{
							return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1003');
						}
						else
						{
							//upload picture
							if($captchaCode==setDataDB($_SESSION['pal-microcomuting-captcha']))
							{
								
								
								//insert the data
								if(isSuperAdmin($_SESSION['uid']))
								{
									$exSt=",`userTypeId`";
									$exSt1=", '".$userTypeDet['id']."'";
									
								}
								else
								{
									$exSt=",`userTypeId`";
									$exSt1=", '".$userTypeDet['id']."'";
								}
								$sql = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user` (`id` ,`company_name` ,`username` ,`password` ,`subspt_date` ,`status` ,`email`, `logo_file_id` ,`profile` ,`country`,`state`,`unique_id`,`tempPass`,`activationCode`".$exSt.") VALUES(NULL, '".$name."','".$username."', '".$password."', CURRENT_TIMESTAMP, 'Unconfirmed', '".$email."', '".$fileId."', '".$profile."','".$country."','".$state."','".uniqid()."', '".setDataDB($_POST['password'])."', '".$authenticate."'".$exSt1.")";
								//echo $sql;
								$sql=$mysql->query($sql);
								$uid=$mysql->insert_id;
								
								$fileInputName='userfile';
								
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
												header($url);
											}
											else
											{
												$move[0]=0;
												$confirm_entry=1;
												$uniq_id=uniqid("");
													
												$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`unique_id` ,`fileName` ,`dateUploaded` ,`status`,`size`, `source_id`, `segment`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, 'Valid', '".$size."', '".$uid."', 'Profile')";
												//$sql=$display_announcement->doQuery($entryString);
												echo $entryString;
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
												$sql=null;
												rename($data_file, $data_file1) or die("Could not rename $data_file");
											}
										}
									}
									else
									{
										return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj007');
									}
								}
								
								if(is_numeric($uid)==1)
								{
									setcookie("profile", $_POST['profile'], time()-3600);
									setcookie("username", $_POST['username'], time()-3600);
									setcookie("email", $_POST['email'], time()-3600);
									
									
									$siteDet=SITE::getDetails();
	//									$site=new Site();
	//								$siteDet=$site->getDetails();
	//								After 5 days, this link will become invalid!<br />
	//									$subject='Final Step for imobilliare.com registeration!Welcome To '.$siteDet['churchName'].' portal!';
									$subject='Final Step for Imobilliare.com registeration!!';
									$message='Hello '.$username.',<br />To complete your registeration for  '.$siteDet['churchName'].', please click on the link: <br><br /><a href="http://www.imobilliare.com/?fid='.parent::getId('user').'&register=1&auth='.$authenticate.'&us='.USERTYPE::getUserTypeId('Employer').'">Activate My Account</a> or copy the URL and paste in your browser address bar: http://www.imobilliare.com/?fid='.parent::getId('user').'&register=1&auth='.$authenticate.'&us='.USERTYPE::getUserTypeId('Employer').'<br /><br />
									Note: This is an autogenerated message. Please do not reply this mail.<br><br>
									Sincerely, <br>'.$siteDet['churchName'].' Management';
									
									
									$emailer=new Email();
									//echo $message;
									$user=new User();
									//echo 10;	
									//include ("../../../features/user/user_class.php");
									$emailer->sendMail($email, $subject, $message, $siteDet);
					
									return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
								}
								else
								{
									return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj132');
								}
								//$site=new Site();
								
							
									
										
								
							}
							else
							{
								//wrong captcha
								return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj220');
							}
						}
					}
				}
					
			
		}
		else
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2201212');
		}
	}
	
	
	
	
	function doEditAcct($securityOption)
	{
		global $mysql;
		$error=new Error();
		$userfile=$_POST['userfile1'];						
		$profile=setDataDB(trim($_POST['profile']));				
		$password=setDataDB($_POST['password']);
		$confirmpassword=setDataDB($_POST['confirmpassword']);
		$email=setDataDB($_POST['email']);
		$captchaCode=setDataDB($_POST['anti_spam_code']);
		
		
		//setcookie("agencyEditStatus", 1, time()+3600);
		setcookie("profile", $_POST['profile'], time()+3600);
		setcookie("username", $_POST['username'], time()+3600);
		setcookie("email", $_POST['email'], time()+3600);

		$usertype=new UserType();
		$userTypeDet=$usertype->getDetails('Agent');
		$passwordStr='';

		
		echo $captchaCode;
		
		$upload_dir='features/user/Employer/view/images/';
		
		
			
				
					
		$artDet=USER::isEmailExists($email);
		$moveNext=1;
		$resultMOD = USER::getUserDetails($_SESSION['uid']);
		
		
		if(($artDet!=FALSE) && ($artDet['id']!=$_SESSION['uid']))
		{
			echo $artDet['id'];
			$moveNext=0;
		}
		else
		{
			
		}
		
			
		if($moveNext==0)
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2035');
		}
		else
		{
			if((((strlen(trim($_POST['password'])) <6) || ($_POST['password'] != $_POST['confirmpassword']))) && (strlen($_POST['confirmpassword'])>0))
			{
				echo strlen(trim($password));
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1005');
			}
			else
			{
				$passwordStr=", `password` = '".$securityOption($_POST['password'])."'";
				if ((!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $email)))
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1003');
				}
				else
				{
					//upload picture
					if($captchaCode==setDataDB($_SESSION['pal-microcomuting-captcha']))
					{
						
						
						$fileInputName='userfile1';
						
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
										header($url);
									}
									else
									{
										$move[0]=0;
										$confirm_entry=1;
										$uniq_id=uniqid("");
											
										//$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
										$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`unique_id` ,`fileName` ,`dateUploaded` ,`status`,`size`, `source_id`, `segment`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, 'Valid', '".$size."', '".$_SESSION['uid']."', 'Profile')";
										//$sql=$display_announcement->doQuery($entryString);
										//echo $entryString;
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
										$sql=null;
										rename($data_file, $data_file1) or die("Could not rename $data_file");
									}
								}
							}
							else
							{
								return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj007');
							}
						}
						
						
						
						if(is_numeric($fileId)==1)
						{
							$sql = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `email` = '".$email."' ,`company_name` = '".$name."',`logo_file_id` = '".$fileId."'".$passwordStr." WHERE id = ".$_SESSION['uid'];
						}
						else
						{
							$sql = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `email` = '".$email."'".$passwordStr." WHERE id = ".$_SESSION['uid'];
						}
						$sql=$mysql->query($sql);
						
						
						
						echo $sql;
							
								
						if($sql)
						{
						
							setcookie("name", NULL, time()-3600);
							setcookie("profile", NULL, time()-3600);
							setcookie("username", NULL, time()-3600);
							setcookie("email", NULL, time()-3600);
							setcookie("country", NULL, time()-3600);
							setcookie("state", NULL, time()-3600);
							
							return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
						}
						else
						{
							return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj132');
						}
					}
					else
					{
						//wrong captcha
						return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj220');
					}
				}
			}
		}
			
	}
}

?>
