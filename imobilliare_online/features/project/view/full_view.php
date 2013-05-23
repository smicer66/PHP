<?php
$projectListingDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);
$userDetails=USER::getUserDetails($projectListingDetails['emp_id']);
$uidDetails=USER::getUserDetails($_SESSION['uid']);


		
		
		
//if(PROJECT::isExpired($_REQUEST['fiid']))
//{

	//if project is expired dont display
	//echo 1212;
	//header('Location: index.php?fid='.FEATURE::getId('Project').'&ex=1');
//}

?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("About Project ID: ".$projectListingDetails['unique_id'], "");
?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="onlyBorderAlone defaultBgColor">


	  <tr>
        <td colspan="5" bgcolor="#FFFCEC"><div align="right"><?php
if($projectListingDetails['emp_id']==$_SESSION['uid'])
{
?>
          <span class="style10"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	if($projectListingDetails['status']=="Open")
	{
?>
<a href="?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $_REQUEST['fiid'];?>&edit">edit my project</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $_REQUEST['fiid']?>&close=1">close this project</a>
<?php
	}
	/*if($projectListingDetails['status']=="On-Going")
	{
	?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp; <a href="payment.php?kmends=jewhhwehjnnnsjhsj&bbdbsjjee=hhwehjeweh&jdjf=<?php echo $_REQUEST['fiid']; ?>">Pay Contact Fees</a>
<?php
	}	*/
	if($projectListingDetails['status']=="On-Going")
	{
	?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp; <a href="?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $_REQUEST['fiid']?>&complete=1">Yes, Project Has Been Completed!</a>
<?php
	}
}


if((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId("Developer")) || ((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId("Employer")) && ($projectListingDetails['emp_id']!=$_SESSION['uid'])))
{
	?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?fid=<?php echo FEATURE::getId('User');?>&fiid=<?php echo $_REQUEST['fiid'];?>&epyt=tcejorp&complaint">
Report this Project</a>
<?Php
}

if(($projectListingDetails['devstatus']!="Completed") && ($projectListingDetails['chosen_developer_id']==$_SESSION['uid']))
{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="?fid=<?php echo $_REQUEST['fid'];?>&fiid=<?php echo $_REQUEST['fiid'];?>&dcomplete=1"> Project Finished!</a>
<?Php
}
if(($projectListingDetails['emp_id']==$_SESSION['uid']) && ($projectListingDetails['status']=="Completed"))
{
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
	if($projectListingDetails['escrow']=="No")
	{
		echo '<a href="javascript:;" onClick="javascript:window.open(\"escrow.php?id='.$_REQUEST['fiid'].'\",\"Win1\",\"width=500,height=800\")">';
		echo "Pay Developer!</a></span>";
	}
	else
	{
		echo '<a href="payments.php?id='.$_REQUEST['id'].'&kmssends=jasjasf">';
		echo 'Release Advance Payments & Complete balances!</a></span>';
	}
}

//echo $projectListingDetails['status'];
/*if(($projectListingDetails['emp_id']==$_SESSION['uid']) && ($projectListingDetails['status']!="Completed") && ($projectListingDetails['status']!="Closed"))
{
				  echo "<span class='style10'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$id_pro=$_REQUEST['id'];
echo '<a href="javascript:;" onClick="javascript:window.open(\"escrow.php?id='.$_REQUEST['id'].'\",\"Win1\",\"width=500,height=800\")">';
echo "Escrow Money!</a></span>";
}*/
?>
          </span></div><br>
		<label><span class="style56"><span class="style58"><u>Project Details</u></span>:</span></label>
		<span class="style10"><br>
<br>
</span>	
<table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="24%" valign="top" class="tdstyle13"><strong>Title:</strong></td>
              <td width="76%" class="tdstyle13">
			  <?Php
			  echo $projectListingDetails['header'];
?>
&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="tdstyle14"><strong>Employer:</strong></td>
              <td class="tdstyle14"><a href="?fid=<?php echo FEATURE::getId('User');?>&vacct=1&fiid=<?php echo $userDetails['id']; ?>&us=<?php echo $userDetails['userTypeId']; ?>"><?php echo $userDetails['username']; ?></a>&nbsp;</td>
            </tr>
            <tr><td valign="top" class="tdstyle13"><strong>Status:</strong></td>
              <td class="tdstyle13">
			  <?php
			  echo $projectListingDetails['status'];
			  ?>
			  &nbsp;</td></tr>
            <tr>
              <td valign="top" class="tdstyle14"><strong>Closes on: </strong></td>
              <td class="tdstyle14">
		    <?php
				 echo $projectListingDetails['expiry_date']."HRS WAT";
            ?>			</tr>
		  </table>
        <span class="style10"></span><br>        </td>
      </tr>
      <tr>
        
        <td colspan="5" align="left" bgcolor="#FFFADD"><p><br>
              <span class="style56"><span class="style58"><u><label>Project Funding: </label></u></span></span></p>
          <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="24%" valign="top" class="tdstyle13"><strong>Budget:</strong></td>
			  <?php
			  if($projectListingDetails['Open_Price']==1)
			  {
			  	?>
				<td width="76%" class="tdstyle13">Open Pricing</td>
				<?php
				
			  }
			  else
			  {
              	?>
				<td width="76%" class="tdstyle13">Between NGN <?php echo $projectListingDetails['min_bdgt']; ?> and NGN <?php echo $projectListingDetails['max_bdgt'];?></td>
				<?php
			  }
            ?>
			</tr>
            <tr>
			<td valign="top" class="tdstyle14"><strong>Escrow Money:</strong></td>
              <td class="tdstyle14">
			  <?php echo $projectListingDetails['escrow'];
			  ?>
			  &nbsp;</td>
            </tr>
            <!--<tr>
              <td valign="top" class="tdstyle13"><strong>Payment Method: </strong></td>
              <td class="tdstyle13"><?php echo $projectListingDetails['payment_mode'];?>&nbsp;</td>
            </tr>-->
          </table>
          <span class="style10"></span><br></td>
      </tr>
      <tr>
        <td colspan="5" align="left" bgcolor="#FFFCEC"><STRONG class="style10"><br>
              </STRONG>
          <p class="style58"><u><label>Employers Preferences:</label></u></p>
          <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="24%" valign="top" class="tdstyle13"><strong>Skills:</strong></td>
			  <td width="76%" class="tdstyle13">
			  <?php $specs=PROJECT::getProjectSpecialization($_REQUEST['fiid']);
			  $arraySpecs=array();
			  for($count=0;$count<sizeof($specs);$count++)
			  {
			  		array_push($arraySpecs, getSpecializationName($specs[$count]));
			  }
			  $specsText=join(', ', $arraySpecs);
			  echo $specsText;
			  ?>&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="tdstyle14"><strong>Project Open for Bidding for: </strong></td>
              <td class="tdstyle14"><?php echo $projectListingDetails['payment_mode'];?> days&nbsp;</td>
            </tr>
          </table>
          <br></td>
      </tr>
      <tr>
	  
        <td colspan="5" align="left" bgcolor="#FFFADD"><br>
          <br>
            <span class="style56"><span class="style58"><u><label>Project Description:</label></u></span></span> <br>
            <br>
            <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="24%" valign="top" class="tdstyle13"><strong>Description:</strong></td>
			  <td width="76%" class="tdstyle13"><?php echo nl2br_skip_html($projectListingDetails['detail']); ?>&nbsp;</td>
            </tr>
            <tr>
              <td valign="top" class="tdstyle14"><strong>File(s) Attached: </strong></td>
              <td class="tdstyle14">
			  <?php
			  
			  $prjFiles=PROJECT::getProjectFiles($_REQUEST['fiid']);
			  if($prjFiles!=NULL)
			  {
			  		while($result = $mysql->fetch_assoc_mine($prjFiles))
					{
						
						$size=generateFileSize($result['size']);
						$data_file1 = "".$newfilename1;
						
						echo "<a href='images/uploaded files/".getPictureFileName($result['id'],1)."'>".$result['fileName']."</a> (".$size.")&nbsp;&nbsp;";
					}
			  }
			  else
			  {
			  		echo "None Available";
			  }	
		?>
			   </td>
            </tr>
          </table>
          <span class="style10"><strong><STRONG class="style10"><u><br>
          </u></STRONG></strong></span></td>
      </tr>
</table>
<div class='cell_seperator'>&nbsp;</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
        <td colspan="5" align="right" bgcolor="">
		<table width="67%" border="0" cellpadding="0" cellspacing="0">
          <tr>
		  <td width="25%">


            <?php

			
			
			if(($uidDetails['userTypeId']==USERTYPE::getUserTypeId("Developer")) && ($projectListingDetails['status']=="Open"))
			{
			
			?><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tdstyle10b">
			<tr>
			
			
			<td width="100%" align="center" valign="middle" background="images/bg9.gif" class="tdstyle20">
			
				<a href="?fid=<?php echo FEATURE::getId('Bid');?>&fiid=<?php echo $_REQUEST['fiid'];?>">
				Submit My Bid </a> </td>
				
			</tr>
			</table><?php
			}
			?>
			</td>
			
			<td width="5%">&nbsp;</td>
            
			<td width="26%">
			<?php
			
			if((((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))) || ((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer')) && ($projectListingDetails['emp_id']==$_SESSION['uid']))) && ($projectListingDetails['status']=="Open"))
			{
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tdstyle10b">
			<tr>
			
			
				<td width="100%" align="center" valign="middle" background="images/bg9.gif" class="tdstyle20">
				<a href="?fid=<?php echo FEATURE::getId('Message');?>&fiid=<?php echo $_REQUEST['fiid'];?>&viewmsgtype=2&compose=1">Post a Message</a> </td>
			
			</tr>
			</table>
			<?php	
			}
			else if((($projectListingDetails['status']=="On-Going" || $projectListingDetails['status']=="Assigned") && ($projectListingDetails['chosen_developer_id']==$_SESSION['uid'])) || (($projectListingDetails['status']=="On-Going" || $projectListingDetails['status']=="Assigned") && ($projectListingDetails['emp_id']==$_SESSION['uid'])))
			{
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tdstyle10b">
			<tr>
			
			
				<td width="100%" align="center" valign="middle" background="images/bg9.gif" class="tdstyle20">
				<a href="?fid=<?php echo FEATURE::getId('Message');?>&fiid=<?php echo $_REQUEST['fiid'];?>">Post a Message</a> </td>
			
			</tr>
			</table>
			<?php	
			}
			?>
			</td>
			
			<td width="5%">&nbsp;</td>
            
			<td width="37%">
			
			
			<?php
			
			if((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer')) || ((USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer')) && ($projectListingDetails['emp_id']==$_SESSION['uid'])))
			{
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tdstyle10b">
			<tr>
			
			
			
				<td width="100%" align="center" valign="middle" background="images/bg9.gif" class="tdstyle20">
				
				<?php
				$userPrjMessages=MESSAGE::getUserProjectMessage($_REQUEST['fiid'], $_SESSION['uid']);
				
				if($userPrjMessages!=NULL)
				{
				?>
					<a href="?fid=<?php echo FEATURE::getId('Message');?>&particulars=<?php echo $_REQUEST['fiid'];?>">Project Messages (<?php echo(sizeof($userPrjMessages));?>)</a>
				<?php
				}
				else
				{
				?>
					<a href="?fid=<?php echo FEATURE::getId('Message');?>&particulars=<?php echo $_REQUEST['fiid'];?>">Project Messages (0)</a>
				<?php
				}
				?>
				
			    </td>
			</tr>
			</table>
			<?php
			}
				?>
			</td>
			
          </tr>
        </table></td>
      </tr>
</table>


<?php
CONTROLLER_BID::controlFlowProcess($_REQUEST['fiid']);
?>