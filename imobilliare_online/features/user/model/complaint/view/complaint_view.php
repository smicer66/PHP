
<form action="<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
				echo $_SERVER['PHP_SELF'];
			}
			 ?>" method="post" enctype="multipart/form-data">
  <span class="textHeaderStyle1">Complaints</span><br>

Please provide details about any complaints you wish to lay trying as much as possible to give full explanations. This will help us in treating any complaints. <br>Thanks.<br><br>
  <br>
  <table width="90%" height="115" border="0" cellpadding="0" cellspacing="5" bgcolor="#FFFFFF" class="tablealoneborder">
    <tr>
      <td width="23%" height="18" valign="top" class="tableInneraloneborder"><label>Name:</label></td>
      <td width="77%" class="tableInneraloneborder"><input name="name" type="text" id="name" /></td>
    </tr>
    <tr>
      <td height="18" valign="top" class="tableInneraloneborder"><label>Email:</label></td>
      <td class="tableInneraloneborder"><input name="email" type="text" id="email" /></td>
    </tr>
    <tr>
      <td height="18" valign="top" class="tableInneraloneborder"><label>Contact Address:</label>      </td>
      <td class="tableInneraloneborder"><textarea name="address" id="address"></textarea></td>
    </tr>
    <tr>
      <td valign="top" class="tableInneraloneborder"><label>Lay Your Complaint:</label>      </td>
      <td class="tableInneraloneborder"><textarea name="complaint" id="complaint"></textarea>
      <br>
      <br>
      <input name="SubmitComplaint" type="submit" id="SubmitComplaint" value="Submit" /></td>
    </tr>
  </table>
</form>
