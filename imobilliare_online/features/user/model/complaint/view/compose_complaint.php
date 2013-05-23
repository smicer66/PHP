<?php
$projectListingDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);
$userDetails=USER::getUserDetails($projectListingDetails['emp_id']);
$userDetailsMe=USER::getUserDetails($_SESSION['uid']);
?>
<table width='600' border='0' cellspacing='0' cellpadding='0'>
<?php

if(isset($_REQUEST['fiid']))
{
	echo PORTLET::displayHeader("Complaint On Project ID:  <span class='style45'>#".substr($projectListingDetails['unique_id'],0,10), "");
}
else
{
	echo PORTLET::displayHeader("Send A Complaint!", "");
}
?>
</table>
<table width="600" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFCEC" class="tdstyle151"><br>
            <br></td>
        <td colspan="4" bgcolor="#FFFCEC" class="tdstyle152"><u><br>
            
			
		<form name='compose' action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
			}
			 ?>' method='post'>
		<span class='style10'>Type Your Complaint Here:<br>
        <br>
        </span></u>
        <table width='95%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td valign='top'><span class='style10 style4'>Subject<span class='style10'><span class='style4'>:</span></span></span></td>
        <td><span class='style10'><span class='style10 style4'><span class='style4'></span></span></span>
		
		<input name='SUBJECT' type='text' id='msg' class='formtextboxtype1' value=''>
		</u><br></td>
        </tr>
        <tr>
        <td class='tdstyle16'>&nbsp;</td>
        <td class='tdstyle16'>&nbsp;</td>
        </tr>
		
		<?php
		//display To field if and only if the user is an employer and make the field, enabled for editing
		if(USERTYPE::getUserTypeId('Employer')==$userDetailsMe['userTypeId'])
		{
		?>
		<?php
		}
		else if(USERTYPE::getUserTypeId('Administrator')==$userDetailsMe['userTypeId'])
		{
		?>
			
		<?php
		}
	
		else
		{
		?>
		<?php
		}
		?>
        </table>
        <u><span class='style10'><br>
        </span></u><span class='style10'><span class='style4'>Message:<br>

	    
		<textarea name='MSG' class='formtextarea1' id='PROFILE'><?php echo $_COOKIE['formCompose']['msg'];?></textarea><br>
        <br>
        </span></span><span class='style10'><span class='style4'>
        <input name='COMPLAINT' type='submit' class='button12' value='Send' >
        <br>
        </span></form>
		</span></span><span class="style10"></span><br>        </td>
      </tr>
      

      <tr>
        <td align="left" bgcolor="#ECE9D8" class="tdstyle3">&nbsp;</td>
        <td colspan="4" align="left" bgcolor="#ECE9D8" class="tdstyle3">&nbsp;</td>
        </tr>
    </table>