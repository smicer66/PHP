<?php
$captchaBox=php_captcha(MAXIMUM_FLOAT, MAXIMUM_INCLINE, CAPTCHA_BORDER_SIZE, CAPTCHA_BORDER_COLOR, XTER, PERIOD, EXTERNAL_BORDER_SIZE, EXTERNAL_BORDER_COLOR, CHARSET, SEARCHLIGHT_COLOR, FONT_SIZE, BEAM_WIDTH, CHARACTER_COLOR, FONT_FACE_FILE_URL);


if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
{
	$resultMOD = USER::getUserDetails($_SESSION['uid']);
	$arrayPix = FILES::getFile(NULL, $_SESSION['uid'], NULL,  'Profile', NULL);
	$name=$resultMOD['company_name'];
	$country=$resultMOD['country'];
	$state=$resultMOD['state'];
	$username=$resultMOD['username'];
	$email=$resultMOD['email'];
}
?>

<form id='registerForm' name='registerForm' method='post' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>' enctype='multipart/form-data'>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("Edit My Details", "");
			?>
  </table>				 
<table width='100%' border='0' cellspacing='5' cellpadding='5' class="onlyBorderAlone defaultBgColor">

<tr>
  <td colspan="3" align='left' valign='top'><span class='headerTitle'>Personal Details:</span></td>
  </tr>
<tr>
  <td width="30%" align='left' valign='top'><table width="84" border="1">
    <tr>
      <td width="74"><img src="features/user/developer/view/images/<?php echo getPictureFileName($arrayPix[sizeof($arrayPix) - 1]['id']);?>" width="124" \></td>
    </tr>
    
  </table>
    <table width="140" cellpadding="0" cellspacing="0">
      <tr>
        <td width="138" align="left">
          <input name='addImage' type='checkbox' id='addImage' title='click to change image' onChange='validateFromHome(this.value, this.id)' value='1' /> 
          Change My Pix </td>
      </tr>
    </table>    </td>
  <td align='left' valign='bottom'>&nbsp;<span id='logoStatus4'></span></td>
  <td align='left' valign='top'>&nbsp;</td>
</tr>


			<tr>
			  <td align='left' valign='top'><label>Email:</label></td>
			  <td align='left' valign='top'>
				<input type='text' id='txtEmail' name='email' value='<?php echo $email;?>'/>			  </td>
				   <td align='left' valign='top'><span id='txtEmailFailed'
class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' />
Please provide an email address. The email address you provided is not valid or is registered to an existing user!
</span>				   </td>
			</tr>
			
		

		
					<tr>
					  <td align='left' colspan='3'><span class='headerTitle'>Account Details:</span></td>
	</tr>
						
						<tr>
					  <td align='left' valign='top'><label>Id:</label></td>
					  <td align='left' valign='top'>
					  	<?php echo $username;?>					  </td>
						<td align='left' valign='top'><span id='txtUsernameFailed'
class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' />
Please provide a valid Id. If you provided one, then it has already been taken!
</span></td>
					</tr>
						<tr class="onlyBorderAlone defaultBgColor">
                          <td align='left' valign='top'><label>Password:</label></td>
						  <td align='left' valign='top'><input type='password' id='password' name='password'/></td>
						  <td align='left' valign='top'>&nbsp;</td>
    </tr>
						<tr class="onlyBorderAlone defaultBgColor">
                          <td align='left' valign='top'><label>New Password:</label></td>
						  <td align='left' valign='top'><input type='password' id='confirmpassword' name='confirmpassword'/>
                              <br />
                              <span class="warningText">Only provide this new password if you intend to change your existing password</span></td>
						  <td align='left' valign='top'>&nbsp;</td>
    </tr>
		
	
	
		<?php
		$charset = '0123456789';
		$code_length = 6;
		
		
		for($i=0; $i < $code_length; $i++) {
		  $code = $code . substr($charset, mt_rand(0, strlen($charset) - 1), 1);
		}
		?>
		<tr>
	  <td align='left'><label>Type the security code:</label><br />&nbsp;</td><td align='left' colspan='2'>
	
		<div class="warningText">No Spaces between characters</div><br />

		<?php
echo $captchaBox;

?>
		<br />
		<input name='anti_spam_code' type='text'/> <br /><span class='warningText'>[Type the security code written on the left hand into this textbox]</span>.	  </td>
	  </tr>
	  
	<tr>
	  <td align='left' colspan='3'><input name='DEVELOPER_Edit_Account' type='submit' id="RPS" value='Save' class="button11" /></td>
	</tr>
 </table>
</form>