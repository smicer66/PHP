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
			echo PORTLET::displayHeader("Developer Account Sign Up - Step 1", "<a href='index.php?fid=".FEATURE::getId('User')."&us=".USERTYPE::getUserTypeId('Employer')."'>Sign Up As An Employer</a>");?>
</table>
<table width='95%' border='0' cellspacing='5' cellpadding='5'  class="onlyBorderAlone defaultBgColor">
  <tr>
    <td align='left' colspan='3'><span class='headerTitle'>Account Details:</span></td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Id:</label></td>
    <td width="25%" align='left' valign='top'><input type='text' id='txtUsername' name='username' onblur='validateRegForm(this.value, this.id)' value='<?php echo $_COOKIE["username"];?>'/>    </td>
    <td width="54%" align='left' valign='top'><span id='txtUsernameFailed'
class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please provide a valid Id. If you provided one, then it has already been taken! </span></td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Password:</label>
        <br />
      <span class='warningText'>[Must be at least 6 characters]</span></td>
    <td align='left' valign='top'><input type='password' name='password' id='txtPassword' onblur='validateRegForm(this.value, this.id)'/></td>
    <td align='left' valign='top'><span id='txtPasswordFailed' class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please provide a valid password. Password! </span> </td>
  </tr>
  <tr>
    <td align='left' valign='top'><label>Retype Password:</label></td>
    <td align='left' valign='top'><input type='password' name='confirmPassword' onblur='validateRegForm(this.value, this.id)' id='txtCPassword'/></td>
    <td align='left' valign='top'><span id='txtCPasswordFailed' class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please type in the same password you typed previously! </span> </td>
  </tr>

<tr>
  <td colspan="3" align='left' valign='top'><span class='headerTitle'>Personal Details:</span></td>
  </tr>


			<tr>
			  <td align='left' valign='top'><label>Email:</label></td>
			  <td align='left' valign='top'>
				<input type='text' id='txtEmail' name='email' onblur='validateRegForm(this.value, this.id)' value='<?php echo $_COOKIE["email"];?>'/>			  </td>
				   <td align='left' valign='top'><span id='txtEmailFailed'
class='hidden'><img src='../../rps/view/images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' />
Please provide an email address. The email address you provided is not valid or is registered to an existing user!
</span>				   </td>
			</tr>
			<tr>
              <td align='left' valign='top'><label>Upload Your Logo/Photo:</label></td>
			  <td align='left' valign='top'><!--<label class="cabinet"> -->
								<input type="file" name='userfile' class="file" />
							<!--</label><input type='file' />--></td>
			  <td>&nbsp;</td>
    </tr>
		
		    
	<!--start here-->
	
	<tr>
	<td colspan="3" align="left" ><br>
	<u><label>My Software Developer/Website Designer Profile:</label></u><span class="style10"><br>
	<br>                  
	<textarea name="PROFILE" id="PROFILE" class="formtextarea12" onblur="validateRegForm(this.value, this.id)"><?php
	
	if(isset($_SESSION['values']['PROFILE']))
	{
		echo $_SESSION['values']['PROFILE'];
	}
	?></textarea>
	</span>
	<span id="PROFILEFailed" class="<?php 
			  if(isset($_SESSION['errors']['PROFILE']))
			  {
			  	echo $_SESSION['errors']['PROFILE'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
			  
			  ?>">Please fill appropiately ensuring that the contents of this field do not have any any contact addresses.</span>
			  <br>
	<br>
	<br>	</td>
	</tr>
	<tr>
	<td colspan="3" align="left">
	<u><label>Area of Expertise:</label></u><br><br>
	<?php



		
		if($_REQUEST['kmends']=="jewhhwehjnnnsjhsj")
		{		
				$query=getResult1("project", "job_type", "id", $_REQUEST['jdjf'], "1" );		
				$str_1_1=explode("||", $query);
				$str_1=explode(", ", $str_1_1[0]);
		}
		else
		{
			$str_1[0]="";
		}
$co23=0;
?>
<table width="100%">
<tr>
<td>




<table width="70%" border="0">
<tr>

<?Php
global $mysql;
$specs=SPECIALIZATION::getDetails();
$totalCount=SPECIALIZATION::getTotalCount();

while($result = $mysql->fetch_assoc_mine($specs))
//{
//for($co=0; $co<(sizeof($specs)); $co++)
{


		if(($co23==0))
		{
			echo "<td valign='top' width='33%'>";
			echo "<table>";
		}


		$co23++;?>
		<tr>
		<td valign="top"><?php
		/*if($_REQUEST['kmends']=="jewhhwehjnnnsjhsj")
		{		
			for($falsecounter=0; $falsecounter<((sizeof($str_1))); $falsecounter++)
			{
				if($specs[$co]==$str_1[$falsecounter])
				{
					$checked="checked";
					break;
				}
				else
				{
					$checked="";
				}
			}
		}*/
		
		if(isset($_COOKIE['values']['SPECS']))
		{
			for($i=0; $i<((sizeof($_COOKIE['values']['SPECS']))); $i++)
			{
					if($_COOKIE['values']['SPECS'][$i] == $specs[$co])
					{
						$checked="checked";	
					}
			}
		}
		
		else 
		{
			$checked="";
		}?>
		<input name="SPECS[]" type="checkbox" class="formcheckboxes" value="<?php echo $result['id'].'" '.$checked;?>
		>
		<?Php
		$checked="";

				
		echo "  &nbsp;".$result['name'];?>		</td>
	  </tr>


		<?php
		if(($co23==ceil($totalCount/3)))
		{
			echo "</table>";
			echo "</td>";
			$co23=0;
		}
}
?>
</tr>
</table>
</tr>
</table></td>
</tr>
<tr>
  <td><!--<input name="NEXT1" type="submit" class="button11" value="Submit" />-->
  
</table>

	</td>
	</tr>
	<tr>
	<td colspan="3" align="right" ><br><br></td>
	</tr>
	
		<tr>
	  <td align='left'><?php
echo $captchaBox;

?></td>
	  <td align='left' colspan='2'><label>Type the captcha code:</label><br />
	  <input name='anti_spam_code' type='text'/> <br /><span class='warningText'>[Type the security code written on the left hand into this textbox]</span>.
	  <div class="warningText">No Spaces between characters</div>	  </td>
	  </tr>
	
	
	
	
	
	
	
	
	
	
	
	
	  
	<tr>
	  <td align='left' colspan='3'><input name='Developer' type='submit' id="RPS" value='Sign Up'  class='button11' />
	  <div class="warningText">By Clicking on the Register button<br /> you agree to our <a href='?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo ARTICLES::getIdByName('Policy Note');?>'>Terms of Service</a> and <a href='?fid=<?php echo FEATURE::getId('Articles');?>&fiid=<?php echo ARTICLES::getIdByName('Policy Note');?>'>Privacy Policy</a></div>
	  </td>
	</tr>
 </table>
</form>