<?php
if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
{
	$resultMOD = USER::getUserDetails($_SESSION['uid']);
	$hrlyrate=$resultMOD['avg_hrly_rate'];
	$profile=$resultMOD['profile'];
	$specsArray=USER::getMySpecialization($_SESSION['uid']);
	//print_r($specsArray);
}
else
{
	$hrlyrate=$_COOKIE['HRLYRATE'];
	$profile=$_COOKIE['PROFILE'];
	$specsArray=$_COOKIE['SPECS'];
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
			echo PORTLET::displayHeader("Specify Area of Specialization", "");
			?>
  </table>
  
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="onlyBorderAlone defaultBgColor">
	<tr>
	<td colspan="4" align="left" ><br>
	<u><label>My Profile:</label></u><span class="style10"><br>
	<br>                  
	<textarea name="PROFILE" id="PROFILE" class="formtextarea12" onblur="validateRegForm(this.value, this.id)"><?php
	echo $profile;?></textarea>
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
			  
			  ?>">Invalid characters in profile. No contact addresses should be included.</span>
			  <br>
	<br>
	<br>	</td>
	<tr>
	<td colspan="4" align="left" ><br>

		<u><label>Finance:</label></u><br>

	Hourly Rate:
              <span class="style4">
              $
              <input name="HRLYRATE" id="HRLYRATE" type="text" class="formtextboxtype4" onblur="validateRegForm(this.value, this.id)" value="<?php echo $hrlyrate;?>">
			  <span id="HRLYRATEFailed" class="
			  <?php
			  if(isset($_SESSION['errors']['HRLYRATE']))
			  {
			  	echo $_SESSION['errors']['HRLYRATE'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
			  
			  ?>
			  ">Error! Invalid hourly rate typed, or empty hourly rate field.</span>              </span>
			  <br>
          <table width="75%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="warningText"><div align="justify"><U>Note:</U><BR>
                Ensure you place the correct hourly rate as this will help Employers in awarding projects to you. </div></td>
            </tr>
          </table><br>
<br>
<br>	</td>
	</tr>
	<tr>
	<td colspan="4" align="left">
	<u><label>Area of Expertise:</label></u><br><br>
	
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
		if(in_array($result['id'], $specsArray))
		{
			$checked="checked";
		}
		else
		{
			$checked="";
		}


		if(($co23==0))
		{
			echo "<td valign='top' width='33%'>";
			echo "<table>";
		}


		$co23++;?>
		<tr>
		<td valign="top">
		<input name="SPECS[]" type="checkbox" class="formcheckboxes" value="
		<?php echo $result['id'].'" '.$checked;?>>
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
  <td>
  <?Php
  	if((isset($_REQUEST['mod'])) && ($_REQUEST['mod']==1))
	{
	?>
	 <input name="EDITSPEC" type="submit" class="button11" value="Save" />
	<?Php
	}
	else
	{
	?>
	
  <input name="NEXT1" type="submit" class="button11" value="Submit" />
  	<?php
	}
	?>
</table>

	</td>
	</tr>
	<tr>
	<td colspan="4" align="right" ><br><br></td>
	</tr>
	</table>
	</form>