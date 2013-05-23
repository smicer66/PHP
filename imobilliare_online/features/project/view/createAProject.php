<?php
$result_spec_SQL=SPECIALIZATION::getDetails();
$array=array();
while($result_spec=$mysql->fetch_assoc_mine($result_spec_SQL))
{
	array_push($array, $result_spec);
}
$userDetails=USER::getDetails($_SESSION['uid']);

if((isset($_REQUEST['edit'])))
{

	$reedit=1;
	$projDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);
	$projSpecialization=PROJECT::getProjectSpecialization($_REQUEST['fiid']);
	//print_r($projSpecialization);
}

?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php

	  	if(isset($_REQUEST['edit']))
		{
			$str_t="Edit My Project";
		}
		else
		{	
			$str_t="Post A Project";
		}
			echo PORTLET::displayHeader($str_t, "");
			?>
</table>	
<form action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			
			}
			else
			{
			}
			 ?>' method='POST'>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
    <tr>
      <td  bgcolor='#FFFCEC' class='tdstyle152 tdstyle151'><br>
            <span class='style10'>Id: (<?php if(!isset($_SESSION['uid'])){?>You need to sign in first!<?php } else{?>For validation<?php }?>) </span><br>
			<input name='USERNAME' type='text' class='formtextboxtype4' readonly="1" value='<?php echo $userDetails['username'];?>'>
			
            <br>
            <span class='style10'>Password:</span><br>
            <input name='PASSWORD' id='PASSWORD' type='password' class='formtextboxtype4' >
				<span id='PASSWORDFailed' class='<?php
				if(isset($_SESSION['errors']['PASSWORD']))
				{
				?>style37'>Wrong Password Entered or password field empty
				<?php
				}
				else
				{
				?>hidden'>Wrong Password Entered or password field empty</span>
				<?php
				}
				?>
            <br>
            <br>
Visitor? <a href='?fid=<?php echo FEATURE::getId('User');?>'>Click</a> to Sign Up <br>
<br></td>
    </tr>
    <tr>
      <td align='left' bgcolor='#FFFADD' class='tdstyle152 tdstyle151'><span class='style34'><u><br>
            Enter the Project Details...</u></span><br>
        <span class='style10'><br>
Project Title:</span>
<!--onblur='validate(this.value, this.id)' -->

			<span class='style56'>&nbsp;&nbsp;&nbsp;</span>
			
			<span class='style56'>&nbsp;&nbsp;&nbsp;</span>
			
			<span class='style56'>&nbsp;&nbsp;&nbsp;</span>
			
			<span class='style56'>&nbsp;
			&nbsp;&nbsp;</span><br />
			<input name='PROJECT_NAME' id='PROJECT_NAME' type='text'   class='formtextboxtype1' value='

<?php 
if(isset($_COOKIE['postprj']['PROJECT_NAME']))
{
	echo $_COOKIE['postprj']['PROJECT_NAME'];
}
else
{
	if($reedit==1)
	{
		$readonly="readonly='1'";
		echo $projDetails['header'];
	}
	else
	{
		$readonly="";
	}
}
?>' <?php echo $readonly;?>>
			<span id='PROJECT_NAMEFailed' class='
			<?php
			  if(isset($_SESSION['errors']['PROJECT_NAME']))
			  {
			  	echo $_SESSION['errors']['PROJECT_NAME'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
			  
			  ?>
			  ' <?php echo $readonly;?>>This Project Name already exists. Project name must not exceed 35 characters</span>
			  
            <br>
            <br>
            <span class='style10'>No of days your project should last:</span>
			<span class='style56'>&nbsp;&nbsp;&nbsp;<?php echo $str_edit[0];?></span>
			
			<?php 
if(isset($_COOKIE['postprj']['PERIOD']))
{
	$period= $_COOKIE['postprj']['PERIOD'];
}
else
{
	if($reedit==1)
	{
		$period=$projDetails['period'];
	}
}
?>
<?php
if($reedit==1)
{
	$readOnly= "readonly='1'";
}
?><br />
<input name='PERIOD' id='PERIOD' type='text' class='formtextboxtype4' value='<?php echo $period;?>' onblur="checkInputNumeric(this)" <?php echo $readOnly;?>>
            <span class='style56'>days </span><br>
			<span id='PERIODFailed' class='<?php
			  if(isset($_SESSION['errors']['PERIOD']))
			  {
			  	echo $_SESSION['errors']['PERIOD'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
			  ?>'>Invalid Number of days provided. Project period must not exceed 36 days</span>
			  
            <br>
          </span>
<?php
if($reedit==1)
{
?>
<span class='style10'>Add More Days:</span><br />
<select name="ADDDAYS" id="ADDDAYS">
<?php
echo append_serial_nos(1, 36, $_COOKIE['postprj']['ADD_DAYS']);
?>
</select>
<?php
}
?>

		  
		  <br />
		  <br /></td>
    </tr>
    <tr>
      <td align='left' bgcolor='#FFFCEC' class='tdstyle152 tdstyle151'><STRONG class='style10'><br>
              <u>Project Description:</u></STRONG> <br />
				  
<textarea name='PROJ_DETAIL' id='PROJ_DETAIL' class='formtextarea1' ><?php
if(isset($_COOKIE['postprj']['PROJ_DETAIL']))
{
	echo  $_COOKIE['postprj']['PROJ_DETAIL'];
}
else
{
	if($reedit==1)
	{
		
		echo str_replace("<br />", "\r", $projDetails['detail']);
	}
}
?></textarea>

<span id='PROJ_DETAILFailed' class='<?php
			  if(isset($_SESSION['errors']['PROJ_DETAIL']))
			  {
			  	echo $_SESSION['errors']['PROJ_DETAIL'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
			  ?>'>Empty Project Description field or Invalid characters in project description. <br>
No contact addresses should be included.</span>
<br>
<br>
<table width='75%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td><div align='justify' class="warningText"><U>Note:</U><BR>
      Provide explicit details as much as possible in order to give the developers a near-accurate idea about the project. The project details could also be edited later by clicking on edit on top of the project view page. </div></td>
  </tr>
</table>
<br>
<br>

<!--<div id='logoStatus'><span class='style37a'>[optional]&nbsp;&nbsp;&nbsp;</span> </div>
<label class="cabinet"> 
								<input type="file" name='userfile' class="file" />
							</label>
(Maximum 10 MB. You can attach more files later from your admin area.)<br>
<br>
<br><br>-->


</span></td>
    </tr>
    <tr>
      <td  align='left' bgcolor='#FFFADD' class='tdstyle152 tdstyle151'><span class='style10'><strong><br>
                <u>Project Specifications:</u></strong><BR>
          </span>				
				<table width='500'>
				<tr>
				<td>
				Ensure you select the right project specifications as this is the criteria by which developers will be notified of your project				</td>
				</tr>
				</table>
<br>
			<table width="100%" border="0">
				<?php
				$i_1=0;
				for($count=0;$count<(round(sizeof($array)/4));$count++)
				{
					$i=$count * 4;
					//$specs='SPECS'.$i;
					
				?>
					
					<tr>
					<td width="200px">
<input name='SPECS<?php echo ($array[$i]['id']);?>' type='checkbox' class='formcheckboxes' 
value='<?php echo $array[$i]['id'];?>' 
<?php 
if((isset($_COOKIE['postprj']['SPECS'.$array[$i]['id']])) && ($_COOKIE['postprj']['SPECS'.$array[$i]['id']]==$array[$i]['id']))
{
	echo "checked";
}
else
{
	if(($reedit==1) && (in_array($array[$i]['id'], $projSpecialization)))
	{
		echo "checked";
	}
}?>>
					<?php echo $array[$i++]['name'];?>					</td>
					
					<td width="200px">
<input name='SPECS<?php echo ($array[$i]['id']);?>' type='checkbox' class='formcheckboxes' 
value='<?php echo $array[$i]['id'];?>' 
<?php 
if((isset($_COOKIE['postprj']['SPECS'.$array[$i]['id']])) && ($_COOKIE['postprj']['SPECS'.$array[$i]['id']]==$array[$i]['id']))
{
	echo "checked";
}
else
{
	if(($reedit==1) && (in_array($array[$i]['id'], $projSpecialization)))
	{
		echo "checked";
	}
}?>>
					<?php echo $array[$i++]['name'];?>					</td>
					
					<td width="200px">
<input name='SPECS<?php echo ($array[$i]['id']);?>' type='checkbox' class='formcheckboxes' 
value='<?php echo $array[$i]['id'];?>' 
<?php 
if((isset($_COOKIE['postprj']['SPECS'.$array[$i]['id']])) && ($_COOKIE['postprj']['SPECS'.$array[$i]['id']]==$array[$i]['id']))
{
	echo "checked";
}
else
{
	if(($reedit==1) && (in_array($array[$i]['id'], $projSpecialization)))
	{
		echo "checked";
	}
}?>>
					<?php echo $array[$i++]['name'];?>					</td>
					
					<td width="200px">
<input name='SPECS<?php echo ($array[$i]['id']);?>' type='checkbox' class='formcheckboxes' 
value='<?php echo $array[$i]['id'];?>' 
<?php 
if((isset($_COOKIE['postprj']['SPECS'.$array[$i]['id']])) && ($_COOKIE['postprj']['SPECS'.$array[$i]['id']]==$array[$i]['id']))
{
	echo "checked";
}
else
{
	if(($reedit==1) && (in_array($array[$i]['id'], $projSpecialization)))
	{
		echo "checked";
	}
}?>>
					<?php echo $array[$i++]['name'];?>					</td>
					</tr>

				<?Php
				}
				?>
						</table>	
						<br /><br />

						
		


</td>
    </tr>
    <tr>
      <td  align='left' bgcolor='#FFFCEC' class='tdstyle152 tdstyle151'><span class='style10'><strong><br>
                <u>Monetary Details:</u></strong><BR>
            <STRONG><br>
Project Budget: </STRONG> <br>
<table width='90%' height='13' border='0' cellpadding='0' cellspacing='0'>
  <tr>
  <td width='14%'>Minimum:</td>
    <td width='22%'>NGN
	<?php
	if(isset($_COOKIE['postprj']['MINIMUM']))
	{
		$min=  $_COOKIE['postprj']['MINIMUM'];
	}
	else
	{
		if($reedit==1)
		{
			$min= $projDetails['min_bdgt'];
		}
	}
	?>
	<input name='MINIMUM' type='text' class='formtextboxtype4' onkeypress="checkInputNumeric(this)" value='<?php echo $min;?>'></td>
	</tr>
<tr>
	<td width='14%'>Maximum:</td>

    <td width='20%'>NGN
	<?php
	if(isset($_COOKIE['postprj']['MINIMUM']))
	{
		$max=  $_COOKIE['postprj']['MAXIMUM'];
	}
	else
	{
		if($reedit==1)
		{
			$max= $projDetails['max_bdgt'];
			
			if($projDetails['Open_Price']==1)
			{
				$checked_1="checked";
			}
			else
			{
				$checked_1="";
			}
		}
	}
	?>
	<input name='MAXIMUM' type='text' class='formtextboxtype4' onkeypress="checkInputNumeric(this)" value='<?php echo $max;?>'>
	<br />
	<br />
	</td>
	</tr>
	<tr>
	<td colspan="2">
	<input name='BUDT[]' type='checkbox' class='formcheckboxes' value='1' <?Php echo $checked_1;?>>
	<a href='faq.php' title='I am not too sure of the project cost range'>I Don't Know How much to commit, so please leave the project price open</a> </td>
  </tr></table>
  <br><br><strong><u>Preferred Payment Method(s):</u></strong>
  
  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
  <td><input name='PAYMODE' type='radio' class='formcheckboxes' value='1' checked="checked">
      Part Payment, balance is paid on completion of project</td>
	  <td><input name='PAYMODE' type='radio' class='formcheckboxes' value='0' 
	  <?php
	if(isset($_COOKIE['postprj']['PAYMODE']) && ($_COOKIE['postprj']['PAYMODE']==0))
	{
		echo  "checked='checked'";
	}
	else
	{
		if(($reedit==1) && ($projDetails['escrow']==0))
		{
			$checked1="checked";
		}
	}
	?>> 
      No Part Payment. Full Payment After Project Completion</td>
  </tr>
  
</table>
<br><br></td>
    </tr>
    <tr>
      <td  bgcolor='#FFFADD' class='tdstyle152 tdstyle151'><span class='style10'><strong><br>
                <u>Extra Features:</u></strong><BR>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
  

<td width="35%">
	<?php
  if($_COOKIE['postprj']['HIDE_BID']=='Bids_Hidden')
  {
  		$checked1="checked";
  }	
  	else
	{
		if(($reedit==1) && ($projDetails['hidden_bids']==1))
		{
			$checked1="checked";
		}
		else
		{
			$checked1="";
		}
	}
  ?>
  
	<input name='HIDE_BID' type='checkbox' class='formcheckboxes' value='Bids_Hidden' <?php echo $checked1; ?>>
      &nbsp;<a href='faq.php' title='Hide this projects bids from project viewers'>Hide bids from developers/designers</a></td>
	  <td>
	  <?php
	  if($_COOKIE['postprj']['IMOB_CHOOSE']=='imobilliare_Chooses')
	  {
			$checked2="checked";
	  }	
	  else
	{
		if(($reedit==1) && ($projDetails['Choose_Developer']==1))
		{
			$checked2="checked";
		}
	}
	  ?>
	  <input name='IMOB_CHOOSE' type='checkbox' class='formcheckboxes' value='imobilliare_Chooses' <?php echo $checked2; ?>>
	  <a href='faq.php' title='imobilliare.com Support Team will be responsible for selecting a developer to handle this project'>Administrator should help me choose a developer from the project bidders</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  <td colspan='2' valign="top">
  <?php
  if($_COOKIE['postprj']['PRIVATE_BID']=='Private')
  {
  		$checked3="checked";
  }	
  else
	{
		if(($reedit==1) && ($projDetails['private']==1))
		{
			$checked3="checked";
		}
	}
  ?>
      <a href='faq.php' title='Only developers you list will be able to bid on this project.'>Private Invitations</a> &nbsp;<br />
	  <font color='blue'>[Select the Developer(s) you only wish to bid on this project. Hold Ctrl while selecting more than one developer] 
      
	  <select name="SPECIFY[]" multiple="1" size="4">
	  <?php
	  echo append_developer_list($_COOKIE['postprj']['SPECIFY']);
	  ?>
      </select>
      <span class='style4'>
	  <!--<input name='SPECIFY' id='SPECIFY' readonly type='text' class='formelement1' onblur='validate(this.value, this.id)' value='<?php echo $_SESSION['postprj']['SPECIFY'];?>'>
	  <a href='javascript:;' onClick='javascript:window.open(\"devlist.php\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>
	  Select Developers Available</a>-->   <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b></b></font><br>
<span id='SPECIFYFailed' class='
<?php
			  if(isset($_SESSION['errors']['SPECIFY']))
			  {
			  	echo $_SESSION['errors']['SPECIFY'];
			  }
			  else
			  {	
			  	echo "hidden";
			  }
?>
'>[Optional] One of the developers does not exist or List the developers in the right format!</span>
<span id='SPECIFYFailed1'></span>
</td>
    </tr>
</table>
<br>
<?Php
if($reedit==1)
{
?>
<input name='PROJECT' type='submit' class='button13' value='Save My Project'>
<?php
}
else
{
?>
<input name='PROJECT' type='submit' class='button13' value='Submit My Project'>
<?php
}
?>
<br /><br />
	  </td>
    </tr>
  </table>
</form>