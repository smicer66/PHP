<?php

class Developer extends User
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
		$strX="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_user_type` WHERE `name` = 'Rps' AND `status` = '1'";
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
				echo "&nbsp;&nbsp;".getRealDataNoHTML($result['firstName'])." ".getRealDataNoHTML($result['lastName'])." - ".getRealDataNoHTML($result['username'])."<br />";
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
		include("../../rps/model/features/user/rps/controller/controller_class.php");
		CONTROLLER_RPS::controlFrontPageDisplay();
	}


	
	function displayFeature($resultArray=NULL)
	{
		include("../../rps/model/features/user/rps/controller/controller_class.php");
		CONTROLLER_RPS::controlFlowProcess();
	}
	
	
	
	
	function doRegister($securityOption)
	{
		global $mysql;
		$error=new Error();
		$userfile=$_POST['userfile'];						
		$profile=setDataDB(trim($_POST['profile']));						
		$username=setDataDB($_POST['username']);
		$usernameArray=explode(' ', $username);
		$password=($_POST['password']);						
		$confirmPassword=setDataDB($_POST['confirmPassword']);	
		$email=setDataDB($_POST['email']);
		$captchaCode=setDataDB($_POST['anti_spam_code']);
		
		//$userDetails=USER::getUserDetFromUniq($id);
		$msg=setDataDB(escapeshellcmd(strip_tags($_POST['PROFILE'])));
		$msglen=strlen($msg);
		echo $hrlyrate;
		
		
		setcookie("name", $_POST['txtName'], time()+3600);
		setcookie("profile", $_POST['profile'], time()+3600);
		setcookie("username", $_POST['username'], time()+3600);
		setcookie("email", $_POST['email'], time()+3600);
		
		setcookie("PROFILE", $_POST['PROFILE'], time()+3600);
		setcookie("SPECS", $_POST['SPECS'], time()+3600);	
		
		$usertype=new UserType();
		$userTypeDet=$usertype->getDetails('Developer');

		
		$password=$securityOption($password);
		$authenticate=md5(uniqid((rand()."".$username), true));
		echo $captchaCode;
		
		$upload_dir='features/user/developer/view/images/';
		if(sizeof($usernameArray)==1)
		{
				
				$query = $mysql->query("SELECT `username` FROM `".DEFAULT_DB_TBL_PREFIX."_user` WHERE `username` = '" . $username . "'");
				
				if ($mysql->num_rows > 0)
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1001');
				}
				else
				{								
					if(((strlen(trim($_POST['password'])) <6) || ($_POST['password'] != $_POST['confirmPassword'])) && ($result['passwordYes']=='1'))
					{
						//echo strlen(trim($password));
						return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1002');
					}
					else
					{
						$query = $mysql->query('SELECT email FROM `'.DEFAULT_DB_TBL_PREFIX.'_user` ' . 'WHERE email="' . $email . '"');
						if ($mysql->num_rows > 0)
						{
							$emailExist=1;
						}
						
						if ((filter_var($email, FILTER_VALIDATE_EMAIL)==FALSE) || ($emailExist==1))
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
								$user_uid=uniqid();
								$sql = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user` (`id` ,`company_name` ,`username` ,`password` ,`subspt_date` ,`status` ,`email`, `logo_file_id` ,`profile` ,`country`,`state`,`unique_id`,`totalworth`,`tempPass`,`activationCode`".$exSt.") VALUES(NULL, '".$name."','".$username."', '".$password."', CURRENT_TIMESTAMP, 'Unconfirmed', '".$email."', '".$fileId."', '".$msg."','".$country."','".$state."','".$user_uid."', '".$hrlyrate."','".setDataDB($_POST['password'])."','".$authenticate."'".$exSt1.")";
								echo $sql;
								//`profile` =  '".$msg."',`avg_hrly_rate` = '".$hrlyrate."'
								$sql=$mysql->query($sql);
								$uid=$mysql->insert_id;
								//$site=new Site();
								
	//									$site=new Site();
	//								$siteDet=$site->getDetails();
	//									$subject='Final Step for imobilliare.com registeration!Welcome To '.$siteDet['churchName'].' portal!';
								
							
									
										
								if($sql)
								{
									
									
									
									
									
									
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
									
									//return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'&step=2&uiq='.$user_uid);
									if(is_numeric($uid)==1)
									{
										/*echo "pos1";
										$userDetails=USER::getUserDetFromUniq($id);
										$msg=setDataDB(escapeshellcmd(strip_tags($_POST['PROFILE'])));
										$msglen=strlen($msg);
										$hrlyrate=setDataDB(escapeshellcmd(strip_tags($_POST['HRLYRATE'])));
										$hrlyratelen=strlen($hrlyrate);
										echo $hrlyrate;*/
										
										
										$str='';
										
											if (sizeof($_POST['SPECS'])>0)
											{
												
												$profile_email_content=no_email_http($_POST['PROFILE']);
												if($profile_email_content==2)
												{
													
													$profile=nl2br(escapeshellcmd(strip_tags($_POST['PROFILE'])));
													$post_date=date("m/d/Y");	
													$post_time=localtime();
													$time="$post_time[2]:$post_time[1]:$post_time[0]";
													//$entryString1 = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `profile` =  '".$msg."',`avg_hrly_rate` = '".$hrlyrate."'";
													//$sql= $mysql->query($entryString1);
													//echo $entryString1;
													
													
													if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
													{
														echo "pos2";
														$entryString = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user_specialization` SET status = 0 WHERE  `userId` = '".$uid."'";
														echo $entryString;
														//$sql= $mysql->query($entryString);
														for ($i=0; $i<(sizeof($_POST['SPECS'])); $i++)
														{
															//$userId=USER::getUserDetFromUniq($_REQUEST['uiq']);
															//$isUserSpecAvailable=USER::isUserSpecAvailable($userId['id']);
															//$userSpecEntryId=SPECIALIZATION::getUserEntryId($userDetails['id'], $_POST['SPECS'][$i]);			
															//echo $userSpecEntryId;
															//if(is_numeric($userSpecEntryId)!=1)
															//{
																$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user_specialization` (`id` ,`userId` ,`specializationId` ,`status` ) VALUES(NULL, '".$uid."','".$_POST['SPECS'][$i]."', '1')";
																//echo $entryString;
															//	$sql= $mysql->query($entryString);
															/*}
															else
															{
																$entryString = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user_specialization` SET status = 1 WHERE  `userId` = '".$userDetails['id']."' AND `specializationId` = '".$specId."'";
																//echo $entryString;
																$sql= $mysql->query($entryString);
															}*/
														}
														
													}
													else
													{
														
														
														for ($i=0; $i<(sizeof($_POST['SPECS'])); $i++)
														{
															//$userId=USER::getUserDetFromUniq($_REQUEST['uiq']);
															//$isUserSpecAvailable=USER::isUserSpecAvailable($userId['id']);
															$userSpecEntryId=SPECIALIZATION::getUserEntryId($uid, $_POST['SPECS'][$i]);			
															//echo $userSpecEntryId;
															if(is_numeric($userSpecEntryId)!=1)
															{
																$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user_specialization` (`id` ,`userId` ,`specializationId` ,`status` ) VALUES(NULL, '".$uid."','".$_POST['SPECS'][$i]."', '1')";
																$sql= $mysql->query($entryString);
															}
														}
													}
													//development purposes //mailer(1, 7, $str_us_name[0], $str_1[0], $email);
													
													//After 5 days, this link will become invalid!<br />
													
													
													
													
													$siteDet=SITE::getDetails();
													$subject='Final Step for Imobilliare registeration!';
													$message='Hello '.$username.',<br />To complete your registeration for  Imobilliare, please click on the link: <br><br /><a href="http://www.imobilliare.com/index.php?fid='.parent::getId('user').'&register=1&auth='.$authenticate.'&us='.USERTYPE::getUserTypeId('Developer').'">Activate My Account</a> or copy the URL and paste in your browser address bar: http://www.imobilliare.com/index.php?fid='.parent::getId('user').'&register=1&auth='.$authenticate.'&us='.USERTYPE::getUserTypeId('Developer').'<br /><br />
													Note: This is an autogenerated message. Please do not reply this mail.<br><br>
													Sincerely, <br>'.$siteDet['churchName'].' Management';
													
													
													$emailer=new Email();
								//					echo $message;
													$user=new User();
													//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
													//echo 10;	
													//include ("../../../features/user/user_class.php");
													$emailer->sendMail($email, $subject, $message, $siteDet);
																	
													setcookie("name", $_POST['txtName'], time()-3600);
													setcookie("profile", $_POST['profile'], time()-3600);
													setcookie("username", $_POST['username'], time()-3600);
													setcookie("email", $_POST['email'], time()-3600);
													setcookie("country", $_POST['country'], time()-3600);
													setcookie("state", $_POST['state'], time()-3600);
													setcookie("PROFILE", '', time()-3600);
													setcookie("HRLYRATE", '', time()-3600);							
													setcookie("SPECS", '', time()-3600);
													
													return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
													
												
												}
												//notify user of invalid xters in profile
												else
												{
													return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7400');							
												//	header($url);	
												}
											}
											//notify developer to select area of specialization
											else
											{
												return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7401');
											//	header($url);			
											}
										
									}
									else
									{
										//no unique Id attached
										return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
									}
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
		else
		{
			return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj2201212');
		}	
	}
	
	
	function setUserSpecialization($id)
	{
		global $mysql;
		
		echo 1212;
		$error=new Error();
		setcookie("PROFILE", $_POST['PROFILE'], time()+3600);
		setcookie("HRLYRATE", $_POST['HRLYRATE'], time()+3600);							
		setcookie("SPECS", $_POST['SPECS'], time()+3600);	
		

		
		if(is_numeric($uid)==1)
		{
			/*echo "pos1";
			$userDetails=USER::getUserDetFromUniq($id);
			$msg=setDataDB(escapeshellcmd(strip_tags($_POST['PROFILE'])));
			$msglen=strlen($msg);
			$hrlyrate=setDataDB(escapeshellcmd(strip_tags($_POST['HRLYRATE'])));
			$hrlyratelen=strlen($hrlyrate);
			echo $hrlyrate;*/
			
			
			$str='';
			if(($hrlyratelen>0) && (is_numeric($hrlyrate)==1))
			{
				if (sizeof($_POST['SPECS'])>0)
				{
					
					$profile_email_content=no_email_http($_POST['PROFILE']);
					if($profile_email_content==2)
					{
						
						$profile=nl2br(escapeshellcmd(strip_tags($_POST['PROFILE'])));
						$post_date=date("m/d/Y");	
						$post_time=localtime();
						$time="$post_time[2]:$post_time[1]:$post_time[0]";
						$entryString1 = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `profile` =  '".$msg."',`avg_hrly_rate` = '".$hrlyrate."'";
						//$sql= $mysql->query($entryString1);
						echo $entryString1;
						
						
						if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
						{
							echo "pos2";
							$entryString = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user_specialization` SET status = 0 WHERE  `userId` = '".$userDetails['id']."'";
							echo $entryString;
							//$sql= $mysql->query($entryString);
							for ($i=0; $i<(sizeof($_POST['SPECS'])); $i++)
							{
								//$userId=USER::getUserDetFromUniq($_REQUEST['uiq']);
								//$isUserSpecAvailable=USER::isUserSpecAvailable($userId['id']);
								//$userSpecEntryId=SPECIALIZATION::getUserEntryId($userDetails['id'], $_POST['SPECS'][$i]);			
								//echo $userSpecEntryId;
								//if(is_numeric($userSpecEntryId)!=1)
								//{
									$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user_specialization` (`id` ,`userId` ,`specializationId` ,`status` ) VALUES(NULL, '".$userDetails['id']."','".$_POST['SPECS'][$i]."', '1')";
									//echo $entryString;
								//	$sql= $mysql->query($entryString);
								/*}
								else
								{
									$entryString = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user_specialization` SET status = 1 WHERE  `userId` = '".$userDetails['id']."' AND `specializationId` = '".$specId."'";
									//echo $entryString;
									$sql= $mysql->query($entryString);
								}*/
							}
							
						}
						else
						{
							
							
							for ($i=0; $i<(sizeof($_POST['SPECS'])); $i++)
							{
								//$userId=USER::getUserDetFromUniq($_REQUEST['uiq']);
								//$isUserSpecAvailable=USER::isUserSpecAvailable($userId['id']);
								$userSpecEntryId=SPECIALIZATION::getUserEntryId($userDetails['id'], $_POST['SPECS'][$i]);			
								//echo $userSpecEntryId;
								if(is_numeric($userSpecEntryId)!=1)
								{
									$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user_specialization` (`id` ,`userId` ,`specializationId` ,`status` ) VALUES(NULL, '".$userDetails['id']."','".$_POST['SPECS'][$i]."', '1')";
									$sql= $mysql->query($entryString);
								}
							}
						}
						//development purposes //mailer(1, 7, $str_us_name[0], $str_1[0], $email);
						
						//After 5 days, this link will become invalid!<br />
						
						setcookie("PROFILE", '', time()-3600);
						setcookie("HRLYRATE", '', time()-3600);							
						setcookie("SPECS", '', time()-3600);
						
						
						$siteDet=SITE::getDetails();
						$subject='Final Step for Imobilliare registeration!';
						$message='Hello '.$userDetails['username'].',<br />To complete your registeration for  Imobilliare, please click on the link: <br><br /><a href="http://www.imobilliare.com/index.php?fid='.parent::getId('user').'&register=1&auth='.$userDetails['activationCode'].'&us='.USERTYPE::getUserTypeId('Developer').'">Activate My Account</a> or copy the URL and paste in your browser address bar: http://www.imobilliare.com/index.php?fid='.parent::getId('user').'&register=1&auth='.$userDetails['activationCode'].'&us='.USERTYPE::getUserTypeId('Developer').'<br /><br />
						Note: This is an autogenerated message. Please do not reply this mail.<br><br>
						Sincerely, <br>'.$siteDet['churchName'].' Management';
						
						
						$emailer=new Email();
	//					echo $message;
						$user=new User();
						//$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
						//echo 10;	
						//include ("../../../features/user/user_class.php");
						$emailer->sendMail($userDetails['email'], $subject, $message, $siteDet);
										
					
						$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj131');
						
					
					}
					//notify user of invalid xters in profile
					else
					{
						$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7400');							
					//	header($url);	
					}
				}
				//notify developer to select area of specialization
				else
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7401');
				//	header($url);			
				}
			}
			//else notify user that the hrly rate is not numeric
			else
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj7402');
			//	header($url);		
			}
		}
		else
		{
			//no unique Id attached
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
		}
		return $url;
	}
	
	
	
	
	function saveUserSpecialization()
	{
		global $mysql;
		$error=new Error();
		setcookie("PROFILE", $_POST['PROFILE'], time()+3600);
		setcookie("HRLYRATE", $_POST['HRLYRATE'], time()+3600);							
		//setcookie("SPECS", $_POST['SPECS'], time()+3600);	
		
		$msg=setDataDB(escapeshellcmd(strip_tags($_POST['PROFILE'])));
		$msglen=strlen($msg);
		$hrlyrate=setDataDB(escapeshellcmd(strip_tags($_POST['HRLYRATE'])));
		$hrlyratelen=strlen($hrlyrate);
		
		
		$str='';
		if(($hrlyratelen>0) && (is_numeric($hrlyrate)==1))
		{
			
			if (sizeof($_POST['SPECS'])>0)
			{
				
				$profile_email_content=no_email_http($_POST['PROFILE']);
				if($profile_email_content==2)
				{
					
					$profile=nl2br(escapeshellcmd(strip_tags($_POST['PROFILE'])));
					
					
					USER::deleteMySpecialization();
					$entryString1 = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `profile` =  '".$msg."',`avg_hrly_rate` = '".$hrlyrate."'";
//					echo $entryString1;
					$sql= $mysql->query($entryString1);
					//echo print_r($_POST['SPECS']);

//					echo "----".sizeof($_POST['SPECS']);
					for ($i=0; $i<(sizeof($_POST['SPECS'])); $i++)
					{
					
						
						$userId=$_SESSION['uid'];
						//$isUserSpecAvailable=USER::isUserSpecAvailable($userId);
						
							
							
							$entryString = "INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_user_specialization` (`id` ,`userId` ,`specializationId` ,`status` ) VALUES(NULL, '".$userId."',".$_POST['SPECS'][$i].", '1')";
							//echo $entryString;							
							$sql= $mysql->query($entryString);
							//echo $entryString."<br />";
						
						
					}
					//development purposes //mailer(1, 7, $str_us_name[0], $str_1[0], $email);
					
					
					setcookie("PROFILE", '', time()-3600);
					setcookie("HRLYRATE", '', time()-3600);							
					setcookie("SPECS", '', time()-3600);
					
					
					
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj102');
					
				
				}
				//notify user of invalid xters in profile
				else
				{
					$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19050');							
				//	header($url);	
				}
			}
			//notify developer to select area of specialization
			else
			{
				$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19051');
			//	header($url);			
			}
		}
		//else notify user that the hrly rate is not numeric
		else
		{
			$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj19052');
		//	header($url);		
		}
		return $url;
	}
	
	
	
	
	
	
	function doEditAcct($securityOption)
	{
		global $mysql;
		$error=new Error();
		$userfile=$_POST['userfile1'];						
		$profile=setDataDB(trim($_POST['profile']));	
		$name=setDataDB(trim($_POST['company_name']));						
		$password=setDataDB($_POST['password']);
		$confirmpassword=setDataDB($_POST['confirmpassword']);
		$email=setDataDB($_POST['email']);
		$country=$_POST['country'];
		$state=$_POST['state'];
		$captchaCode=setDataDB($_POST['anti_spam_code']);
		
		
		//setcookie("agencyEditStatus", 1, time()+3600);
		setcookie("profile", $_POST['profile'], time()+3600);
		setcookie("username", $_POST['username'], time()+3600);
		setcookie("email", $_POST['email'], time()+3600);
		setcookie("country", $_POST['country'], time()+3600);
		setcookie("state", $_POST['state'], time()+3600);
		setcookie("name", $_POST['name'], time()+3600);

		$usertype=new UserType();
		$userTypeDet=$usertype->getDetails('Agent');
		$passwordStr='';

		
		echo $captchaCode;
		
		$upload_dir='features/user/developer/view/images/';
		
		
			
				
					
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
			if((((strlen(trim($_POST['password'])) <6) && ((strlen(trim($_POST['password'])) >0)) && ($_POST['password'] != $_POST['confirmpassword']))))
			{
				echo strlen(trim($password));
				return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1005');
			}
			else 
			{
				if(((strlen(trim($_POST['password'])) >0)) && ($_POST['password'] == $_POST['confirmpassword']))
				{
					$passwordStr=", `password` = '".$securityOption($_POST['password'])."'";
				}
				else
				{
					$passwordStr="";
				}
				if ((!eregi('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$', $email)))
				{
					return 'Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj1003');
				}
				else
				{
					//upload picture
					echo $_SESSION['pal-microcomuting-captcha'];
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
										$url='Location: '.$error->constructErrorAddy($_SERVER['HTTP_REFERER'],'errcpj=errcpj009');header($url);
									}
									else
									{
										$move[0]=0;
										$confirm_entry=1;
										$uniq_id=uniqid("");
											
									//	$entryString="INSERT INTO `".DEFAULT_DB_TBL_PREFIX."_files` (`id` ,`uniqueId` ,`fileName` ,`dateUploaded` ,`status`)VALUES ('' , '".$uniq_id."', '".$file['name']."', CURRENT_TIMESTAMP, '1')";
										
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
							$sql = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `email` = '".$email."' ,`company_name` = '".$name."',`logo_file_id` = '".$fileId."',`country` = '".$country."',`state` = '".$state."'".$passwordStr." WHERE id = ".$_SESSION['uid'];
						}
						else
						{
							$sql = "UPDATE `".DEFAULT_DB_TBL_PREFIX."_user` SET `email` = '".$email."' ,`company_name` = '".$name."',`country` = '".$country."',`state` = '".$state."'".$passwordStr." WHERE id = ".$_SESSION['uid'];
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
