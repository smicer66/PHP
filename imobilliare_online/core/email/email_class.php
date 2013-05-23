<?php

class Email
{
	function __construct()
	{
	
	}
	
	function setEntryError($entryError)
	{
		array_push($this->entryError,$entryError);
	}
	
	
	
	function sendMail($mailAddress, $subject, $mailBody, $siteDet)
	{
		//print_r($siteDet);
		if ($siteDet['activateSendMails']== 1)
		{
			require_once("includes/mailer/class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsHTML(true);
			
			
			$ranum1 = rand(0,900);
			$ranum2 = rand(0,900);
			$ranum3 = rand(0,900);
			$datetime=strftime('%c');
			
			
			
			$headers='';
			$headers .= "Received:from ".$siteDet['churchName']." <".$siteDet['adminMail'].">\r\n";
			$headers .= "Date: $datetime\r\n";
			$headers .= "To: $mailAddress\r\n";
			$headers .= "From: ".$siteDet['churchName']." <".$siteDet['adminMail'].">\r\n";
			$headers .= "Organization: ".$siteDet['churchName']."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "Content-Transfer-encoding: 8bit\r\n";
			$headers .= "Reply-To: ".$siteDet['churchName']." <".$siteDet['adminMail'].">\r\n";
			$headers .= "Message-ID: <md5000000$ranum3$ranum1.msg>\r\n";
			$headers .= "Return-Path: <".$siteDet['adminMail'].">\r\n";
			$headers .= "X-Priority: 1\r\n";
			$headers .= "X-MSmail-Priority: High\r\n";
			$headers .= "X-Mailer: Microsoft Office Outlook, Build 11.0.5510\r\n";
			$headers .= "X-MimeOLE: Produced By Microsoft MimeOLE V6.00.2800.1441\r\n";
			$headers .= "X-Sender: <".$siteDet['adminMail'].">\r\n";
			
			echo "<br />".$headers."<br />".$subject."<br />".$mailBody."<br />".$mailAddress;
			mail($mailAddress, $subject,$mailBody,$headers);
		}
	}
	
	
	
	
	
	function sendIt($subject=NULL, $body, $receipientArray, $identifier)
	{
		
		$mail = new phpmailer();
		$mail -> SMTPKeepAlive = 'true';
		$mail->IsSMTP();
		$mail->Host = SOCKETHOST;
		$mail -> SetLanguage('en', 'class/');

		IF ($smtpauth == 'TRUE')
		{
			$mail->SMTPAuth = 'true';
			$mail->Username = SMTPAUTHUSER;
			$mail->Password = SMTPAUTHUSERPASS;
		}

		$mail->From = SOCKETFROM;
		$mail->FromName = SOCKETFROMNAME;
		$mail->AddReplyTo(SOCKETFROM, SOCKETFROMNAME);

		$mail->IsHTML(False);
		$mail->Subject = $subject;

// VERIFY THE EMAIL ADDRESS
		IF ($makeverify == 'TRUE')
		{
			$regid = md5($identifier);
		}
		$mail -> Body = $body;
		//echo $body;

// EMAIL THE USER IF THE CONFIG IS SET TO TRUE
		//originally supposed to use the global $site variable
		if(!isset($site))
		{
			//include_once($_SERVER['DOCUMENT_ROOT']."/".substr(substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI'])), 0, strpos($_SERVER['REQUEST_URI'],'/',1))."core/site/site_class.php");
			$site = new Site();
		}
		
		
		IF ($site->sendMails()== 'TRUE')		
		{
			for($countre=0;$countre<sizeof($receipientArray);$countre++)
			{
				$mail->AddAddress($receipientArray[$countre], stripslashes($receipientArray[$countre]));
				IF(!$mail -> Send())
				{
					echo $receipientArray[$countre];
					//$obj->setEntryError(ERROR_ERRORSENDMAIL);
					
				}
				else
				{
				
				}
				$mail -> ClearAddresses();
			}
		}

// EMAIL THE ADMIN IF THE CONFIG IS SET TO TRUE

		IF ($site->sendAdminMailCopy() == 'TRUE')
		{
			$mail->AddAddress($site->siteEmail, $site->siteAddress.'- [Admin]');

			IF(!$mail -> Send())
			{
				//$obj->setEntryError(ERROR_ERRORSENDMAIL);
			}
			else
			{
			
			}
			$mail -> ClearAddresses();
		}

		$mail -> SmtpClose();
	}
}

?>