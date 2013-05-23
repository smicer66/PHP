<?php
$captchaBox=php_captcha(MAXIMUM_FLOAT, MAXIMUM_INCLINE, CAPTCHA_BORDER_SIZE, CAPTCHA_BORDER_COLOR, XTER, PERIOD, EXTERNAL_BORDER_SIZE, EXTERNAL_BORDER_COLOR, CHARSET, SEARCHLIGHT_COLOR, FONT_SIZE, BEAM_WIDTH, CHARACTER_COLOR, FONT_FACE_FILE_URL);


if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
{
	$resultMOD = USER::getUserDetails($_SESSION['uid']);
	$arrayPix = FILES::getFile(NULL, $_SESSION['uid'], NULL,  'Profile', NULL);
	if($_COOKIE['agencyEditStatus']==1)
	{
		$name=$_COOKIE['agencyName'];
		$phoneNumber=$_COOKIE['phoneNumber'];
		$state=$_COOKIE['state'];
		$country=$_COOKIE['country'];
		$email=$_COOKIE['email'];
		$website=$_COOKIE['website'];
		$contactAddress=$_COOKIE['contactAddress'];
		$profile=$_COOKIE['profile'];
		$username=$_COOKIE['username'];
	}
	else
	{
		$name=$resultMOD['company_name'];
		$state=$resultMOD['state'];
		$country=$resultMOD['country'];
		$email=$resultMOD['email'];
		$profile=getRealData($resultMOD['profile']);
		$username=$resultMOD['username'];
	}
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
			 
  <table width='95%' border='0' cellspacing='5' cellpadding='5' class="onlyBorderAlone defaultBgColor">
  
  <tr>
    <td colspan="3" align='left' valign='top'><span class='headerTitle'>Employer Details:</span></td>
  </tr>
  <tr>
    <td width="23%" align='left' valign='top'><table width="84" border="1">
      <tr>
        <td width="74"><img src="features/user/Employer/view/images/<?php echo getPictureFileName($arrayPix[sizeof($arrayPix) - 1]['id']);?>" width="174"  /></td>
      </tr>
    </table>
      <table width="140" cellpadding="0" cellspacing="0">
        <tr>
          <td width="138" align="left"><input name='addImage' type='checkbox' id='addImage' title='click to change image' onchange='validateFromHome(this.value, this.id)' value='1' />
            Change Agency Logo</td>
        </tr>
      </table></td>
    <td width="51%" align='left' valign='bottom'><span id='logoStatus4'></span></td>
    <td width="26%" align='left' valign='top'>&nbsp;</td>
  </tr>
  
  <tr>
    <td align='left' valign='top'><label>Email:</label></td>
    <td align='left' valign='top'><input type='text' id='email' name='email'  value='<?php echo $email;?>'/>    </td>
    <td align='left' valign='top'>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td align='left' valign='top'><label>Agency Corporate Profile:</label></td>
    <td align='left' valign='top'><textarea name='profile' cols='30' rows='3'><?php
					echo nl2br_skip_html($profile);
					?>
</textarea>    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align='left' colspan='3'><span class='headerTitle'>Account Details:</span></td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Id:</label></td>
    <td align='left' valign='top'><?php echo $username;?> </td>
    <td align='left' valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>New Password:</label></td>
    <td align='left' valign='top'><input type='password' id='password' name='password'/></td>
    <td align='left' valign='top'>&nbsp;</td>
  </tr>
  <tr>
    <td align='left' valign='top'> <label>Confirm Password:</label></td>
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
	<input name='anti_spam_code' type='text' id='anti_spam_code'/> <br /><span class='warningText'>[Type the security code written on the left hand into this textbox]</span>";?>
       
      . </td>
  </tr>
  <tr>
    <td align='left' colspan='3'><input name='Employer_Edit' type='submit' id="Agency" value='Save' class="button11" /></td>
  </tr>
</table>
</form>