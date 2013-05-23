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
			echo PORTLET::displayHeader("Login Form", "");
			?>
  </table>
  
	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="onlyBorderAlone defaultBgColor">
	<tr>
	<td colspan="4" align="left" ><br>
	<u><label>My Profile:</label></u><span class="style10"><br>
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
	<tr>
	<td colspan="4" align="left" ><br>

		<u><label>Finance:</label></u><br>

	Hourly Rate:
              <span class="style4">
              
              <input name="HRLYRATE" id="HRLYRATE" type="text" class="formtextboxtype4" onblur="validateRegForm(this.value, this.id)" value="<?php echo $_COOKIE['HRLYRATE'];?>">Naira
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
  <td><input name="NEXT1" type="submit" class="button11" value="Submit" />
  
</table>

	</td>
	</tr>
	<tr>
	<td colspan="4" align="right" ><br><br></td>
	</tr>
	</table>
	</form>