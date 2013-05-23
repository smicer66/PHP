<form id='registerForm' name='registerForm' method='post' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>' enctype='multipart/form-data'>
<table width='95%' border='0' cellspacing='5' cellpadding='5'>
<tr>
<td colspan='3' align='left' class='textHeaderStyle1'>Register Your Agency!</td>
</tr>
<tr>
  <td colspan="3" align='left' valign='top'><span class='headerTitle'>for sms updates: </span></td>
  </tr>



		
			
			<tr>
			  <td width="30%" align='left' valign='top'><label>Mobile Phone Number:</label> <br>
			  <span class="warningText">(e.g. 080ABCDEFGH) </span></td>
			  <td align='left' valign='top'>
			  <input type='text' id='txtPhone' name='phoneNumber' value='<?php echo $_COOKIE["phoneNumber"];?>'/>				</td>
				   <td align='left' valign='top'><span id='txtPhoneFailed'
class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' />
Please provide your phone number
</span>				   </td>
			</tr>
		
		    <tr>
		      <td align='left' valign='top'><input name='Message' type='submit' id="Message" value='Send Me SMS Updates' /></td>
		      <td align='left' valign='top'>&nbsp;</td>
		      <td>&nbsp;</td>
    </tr>
		    <tr>
		      <td align='left' valign='top'><label></label></td>
		      <td align='left' valign='top'>&nbsp;</td>
		      <td>&nbsp;</td>
    </tr>
	    

					<tr>
					  <td align='left' colspan='3'><span class='headerTitle'>for email updates :</span></td>
						</tr>
					<tr>
                      <td align='left' valign='top'><label>Email Address:</label></td>
					  <td align='left' valign='top'><input type='text' id='txtEmail' name='email' value='<?php echo $_COOKIE["email"];?>'/>                      </td>
					  <td align='left' valign='top'><span id='txtEmailFailed'
class='hidden'><img src='images/Error.png' alt='Error!' width='27' align='absmiddle' height='27' /> Please provide an email address. The email address you provided is not valid or is registered to an existing user! </span> </td>
    </tr>
						
				<tr>
				  <td align='left' valign='top'><label>
				    <input name='Message' type='submit' id="Message" value='Send Me Email Updates' />
				  </label></td>
				  <td align='left' valign='top'>&nbsp;</td>
				   <td align='left' valign='top'>&nbsp;</td>
				</tr>
				

		
	
		
	  <td align='left' colspan='3'>&nbsp;</td>
	</tr>
 </table>
</form>