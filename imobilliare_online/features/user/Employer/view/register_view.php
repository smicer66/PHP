<?php
$captchaBox=php_captcha(MAXIMUM_FLOAT, MAXIMUM_INCLINE, CAPTCHA_BORDER_SIZE, CAPTCHA_BORDER_COLOR, XTER, PERIOD, EXTERNAL_BORDER_SIZE, EXTERNAL_BORDER_COLOR, CHARSET, SEARCHLIGHT_COLOR, FONT_SIZE, BEAM_WIDTH, CHARACTER_COLOR, FONT_FACE_FILE_URL);
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

<table width='95%' border='0' cellspacing='0' cellpadding='0'>
<?php
			echo PORTLET::displayHeader("Employer Account Sign Up", "<a href='index.php?fid=".FEATURE::getId('User')."&us=".USERTYPE::getUserTypeId('Developer')."'>Sign Up As A Developer</a>");
			?>
</table>
<table width='95%' border='0' cellspacing='5' cellpadding='5' class="onlyBorderAlone defaultBgColor">
  
	<tr>
    <td align='left' colspan='3'><span class='headerTitle'>Account Details:</span></td>
  </tr>
  <tr>
    <td width="22%" align='left' valign='top'><label>Select an Id:</label></td>
    <td width="32%" align='left' valign='top'><input type='text' id='txtUsername' name='username' onblur='validateRegForm(this.value, this.id)' value='<?php echo $_COOKIE["username"];?>'/>    </td>
    <td width="46%" align='left' valign='top'><span id='txtUsernameFailed'
class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please provide a valid Username/Id. If you provided one, then it has already been taken! </span></td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Password:</label>      </td>
    <td align='left' valign='top'><input type='password' name='password' id='txtPassword' onblur='validateRegForm(this.value, this.id)'/><br />
	<span class='warningText'>[Must be at least 6 characters]</span></td>
    <td align='left' valign='top'><span id='txtPasswordFailed' class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please provide a valid password. Password! </span> </td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Retype Password:</label></td>
    <td align='left' valign='top'><input type='password' name='confirmPassword' onblur='validateRegForm(this.value, this.id)' id='txtCPassword'/></td>
    <td align='left' valign='top'><span id='txtCPasswordFailed' class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please type in the same password you typed previously! </span> </td>
  </tr>

<tr>
<td colspan='3' align='left' class='headerTitle'>Employer Details!</td>
</tr>



		
			<tr>
			  <td align='left' valign='top'><label>Email:</label></td>
			  <td align='left' valign='top'>
				<input type='text' id='txtEmail' name='email' onblur='validateRegForm(this.value, this.id)' value='<?php echo $_COOKIE["email"];?>'/>			  </td>
				   <td align='left' valign='top'><span id='txtEmailFailed'
class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' />
Please provide an email address. The email address you provided is not valid or is registered to an existing user!
</span>				   </td>
			</tr>
		
	    <tr>
		  <td align='left' valign='top'><label>Upload Your  Logo:</label></td>
		  <td align='left' valign='top'><!--<label class="cabinet"> -->
								<input type="file" class="file" name='userfile' t/>
							<!--</label>--></td><td>&nbsp;</td>
		</tr>
		
		

				

		<?php
		$charset = '0123456789';
		$code_length = 6;
		
		
		for($i=0; $i < $code_length; $i++) {
		  $code = $code . substr($charset, mt_rand(0, strlen($charset) - 1), 1);
		}
		
		

		//$_SESSION['AntiSpamImage']=$code;
		//include_once("core/captcha/captcha_class.php");
		if(!isset($_REQUEST['fid']))
		{
			$addy='../../../core/captcha/captcha.php';
		}
		else
		{
			$addy='core/captcha/captcha.php';
		}
		?>
		<tr>
	  <td align='left' valign="top"><label>Type the Captcha Code:</label></td>
	  <td align='left' colspan='2'>

		<?php
echo $captchaBox;

?><br /><input name='anti_spam_code' type='text'/> <br /><div class="warningText">No Spaces between characters</div><br />  </td>
	  </tr>
	  
	<tr>
	  <td align='left' colspan='3'><input name='Employer' type='submit' id="Employer" value='Register' class='button11' />
	  <div class="warningText">By Clicking on the Register button<br /> you agree to our <a href='?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo ARTICLES::getIdByName('Policy Note');?>'>Terms of Service</a> and <a href='?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo ARTICLES::getIdByName('Policy Note');?>'>Privacy Policy</a></div></td>
	</tr>
 </table>
</form>