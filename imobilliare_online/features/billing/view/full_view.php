<?php
if(!isset($_SESSION['uid']))
{
	header('Location: index.php?fid='.FEATURE::getId('Project').'&ex=1');
}

$siteDet=SITE::getDetails();
$bills_total=BILLING::getTotalFunds($_SESSION['uid']);
$bills_paid_in=BILLING::getTotalFundsPaid($_SESSION['uid']);

$billsListing=BILLING::getFundsListing(0, NULL, $_SESSION['uid'], $_SESSION['uid']);
$billsWithdrawalListing=BILLING::getFundsWithdrawalListing(0, NULL, $_SESSION['uid'], $_SESSION['uid']);



	 
$myProjectDetails=array();
$totalWon=0;
if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Developer'))
{
	$myProjectDetailsSQL=PROJECT::getDeveloperHandlingProjectListing(NULL, NULL,$_SESSION['uid'], 'id', 'ASC');
	while($result=$mysql->fetch_assoc_mine($myProjectDetailsSQL))
	{
		
		$count++;
		if(($result['status']=='Completed'))
		{
			array_push($myProjectDetails, $result);
			$bidDetails=BID::getWinningBid($result['id'], $result['chosen_developer_id']);
			$totalWon=$totalWon + $bidDetails['amount'];
		}
	}
}
else
{
	global $mysql;
	$myProjectDetailsSQL=PROJECT::getProjectListing(NULL, NULL,$_SESSION['uid'], DEFAULT_DB_TBL_PREFIX.'_project.id', 'ASC');
	while($result=$mysql->fetch_assoc_mine($myProjectDetailsSQL))
	{
		$count++;
		if(($result['projStatus']=='Completed'))
		{	
			array_push($myProjectDetails, $result);
		}
	}
}





?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
				  if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
				  {
			echo PORTLET::displayHeader("My Finances&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#addFundsAnchor' onclick=\"showHideIds(new Array('withdraw'), new Array('addFunds'))\";>Add Funds</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='#withdrawFundsAnchor' onclick=\"showHideIds(new Array('addFunds'), new Array('withdraw'))\";>Withdraw Funds</a>");
					}
					else
					{
			echo PORTLET::displayHeader("My Finances&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='#withdrawFundsAnchor' onclick=\"showHideIds(new Array('addFunds'), new Array('withdraw'))\";>Withdraw Funds</a>");
					}
			?>
</table>	
  <table width='100%' border='0' cellspacing='0' cellpadding='5' class=" defaultBgColor">
        <tr>
          <td align='right' bgcolor='' class='tdstyle152' style='border: 1px solid #ccc'><br><!--#EFF8E0-->
		  
              <table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td width='44%' align='left' class='tdstyle20' colspan='2'>
				  <span class='style76' style="text-align:left"><img src='images/bullets2.png'  align='absmiddle' />&nbsp;<strong>General Overview  </strong></span><u><span class='style76'><br />
                  </span></u></td>
			    </tr>
				<tr>
                  <td width='44%' align='left' class='tdstyle20'><span class='style39'><strong>
				  <img src='images/promotion.png' width="12px" align='absmiddle'>&nbsp;
				  <?php
				  if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
				  {
				  ?>
					  Total Funds Recorded:</strong></span></td>
                  <td width='56%' align='left' class='tdstyle20 style39'><?php echo $bills_paid_in;?>.00 <?php echo $siteDet['currency'];?></td>
				  <?php
				  }
				  else
				  {
				  ?>
					  Total Money Earned:</strong></span></td>
                  <td width='56%' align='left' class='tdstyle20 style39'><?php echo $totalWon;?>.00 <?php echo $siteDet['currency'];?></td>
				  <?php
				  }
				  ?>
				  
			    </tr>
				<?php
				  if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
				  {
				  ?>
				  <tr>
                  <td width='44%' align='left' class='tdstyle20'><span class='style39'><strong>
				  <img src='images/promotion.png' width="12px" align='absmiddle'>&nbsp;
				  
					  Total Funds Approved by Administrator:
				  </strong></span></td>
                  <td width='56%' align='left' class='tdstyle20 style39'><?php echo number_format($bills_total, 2, '.', '');?> <?php echo $siteDet['currency'];?></td>
			    </tr>
                <?php
				  }
				  ?>
              </table>
			  
			  <br />
<br />
<table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td colspan="5" align='left'><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>My Withdrawals:</strong></span><br /></td>
                </tr>
				
				
				<tr>
                  <td width="150px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Withdrawal Date</td>
				  <td width="300px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Account Name - Bank</td>
				  <td width="100px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Amount</td>
				  <td width="200px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Withdrawal Processed?</td>
				  <td align='left' class='tdstyle20a'>&nbsp;</td>
                </tr>
			</table>
				<table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <?php
					$amount=0;
					$countr=0;
				if((sizeof($billsWithdrawalListing)>0) && ($billsWithdrawalListing!=FALSE))
				{
					for($count=0;$count<sizeof($billsWithdrawalListing);$count++)
					{
						
							$countr++;	
						
						//$bidDetails=BID::getWinningBid($result['id'], $result['chosen_developer_id']);
						
				?>
				<tr>
                  <td width="150px" align='center' class='tdstyle20'>
				  &nbsp;<img src='images/promotion.png' width="12px" align='absmiddle'>&nbsp;
				  <?php echo $billsWithdrawalListing[$count]['dateRequested'];?> </td>
                  <td width="300px" align='center' class='tdstyle20'>&nbsp;
				  <?php echo $billsWithdrawalListing[$count]['accountName'];?> - <?php echo $billsWithdrawalListing[$count]['name'];?></td>
				  <td width="100px" align='center' class='tdstyle20'>
				  &nbsp;<?php echo $billsWithdrawalListing[$count]['amount']; echo " ".$siteDet['currency'];?>
				  </td>
                  <td width="200px" align='center' class='tdstyle20'>
				  &nbsp;<?php if($billsWithdrawalListing[$count]['adminAttendedYes']==1){echo "Yes";}else{echo "No";} ?></td>
				  <td align='left' class='tdstyle20'>&nbsp;</td> 
                </tr>
						
				<?php
						if($billsWithdrawalListing[$count]['adminAttendedYes']==1){
							$amount=$amount + $billsWithdrawalListing[$count]['amount'];
						}
					}
				}
				if ($countr==0)
				{
				?>
                <tr>
                  <td colspan="2" align='left' class='tdstyle20'> No Funds Withdrawn Yet!</td>
                </tr>
				<?php
				}
				else
				{
				?>
				<tr>
                  <td align='left' class='tdstyle20' style=""><strong>Total Funds Withdrawn:</strong>&nbsp;</td>
                  <td  align='center' class='tdstyle20'>&nbsp;</td>
				  <td  align='center' class='tdstyle20'><strong><?php echo number_format($amount, 2, '.', '')." ".$siteDet['currency'];?></strong></td>
                  <td  align='center' class='tdstyle20'>&nbsp;</td>
				  <td align='left' class='tdstyle20'>&nbsp;</td> 
                </tr>
				<?php
				}
				?>
              </table>
				
				
			  <br />
              <br />
              <table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td colspan="5" align='left'><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>Money Sources:</strong></span><br /></td>
                </tr>
				
				
				<tr>
                  <td width="150px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Date Deposited</td>
				  <td width="200px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Bank</td>
				  <td width="200px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Amount</td>
				  <td width="200px" align='center' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">
				  Admin Approved</td>
				  <td align='left' class='tdstyle20a'>&nbsp;</td>
                </tr>
			</table>
				
				<table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <?php
					$amount=0;
					$countr=0;
				if((sizeof($billsListing)>0) && ($billsListing!=FALSE))
				{
					for($count=0;$count<sizeof($billsListing);$count++)
					{
						
						if(($getDebateList[$count]['status']!='0'))	//completeted
						{
							$countr++;	
						
						//$bidDetails=BID::getWinningBid($result['id'], $result['chosen_developer_id']);
						
				?>
				<tr>
                  <td width="150px" align='center' class='tdstyle20'>
				  &nbsp;<img src='images/promotion.png' width="12px" align='absmiddle'>&nbsp;
				  <?php echo $billsListing[$count]['depositDate'];?> </td>
                  <td width="200px" align='center' class='tdstyle20'>&nbsp;
				  <?php echo $billsListing[$count]['name'];?></td>
				  <td width="200px" align='center' class='tdstyle20'>
				  &nbsp;<?php echo $billsListing[$count]['amount']; echo " ".$siteDet['currency'];?>
				  </td>
                  <td width="200px" align='center' class='tdstyle20'>
				  &nbsp;<?php if($billsListing[$count]['adminApprovedYes']==1){echo "Yes";}else{echo "No";} ?></td>
				  <td align='left' class='tdstyle20'>&nbsp;</td> 
                </tr>
						
				<?php
							if($billsListing[$count]['adminApprovedYes']==1){
								$amount=$amount + $billsListing[$count]['amount'];
							}
						}
					}
				}
				if ($countr==0)
				{
				?>
                <tr>
                  <td colspan="2" align='left' class='tdstyle20'> No Funds Paid In Yet!</td>
                </tr>
				<?php
				}
				else
				{
				?>
				<tr>
                  <td align='center' class='tdstyle20' style=""><strong>Total Funds Paid In:</strong>&nbsp;</td>
                  <td  align='center' class='tdstyle20'>&nbsp;</td>
				  <td  align='center' class='tdstyle20'><strong><?php echo number_format($amount, 2, '.', '')." ".$siteDet['currency'];?></strong></td>
                  <td  align='center' class='tdstyle20'>&nbsp;</td>
				  <td align='left' class='tdstyle20'>&nbsp;</td> 
                </tr>
				<?php
				}
				?>
              </table>
			  
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><a name='withdrawFundsAnchor' class="anchor"><div class="warningText">&nbsp;</div>
			  <div align="right" style="display:inline; padding:5px; background-color:#FF9900; -moz-border-radius: 5px 5px 5px 5px;
	-webkit-border-radius: 3px 3px 3px 3px;
	-khtml-border-radius: 3px 3px 3px 3px;
	border-radius: 3px 3px 3px 3px;"><a href="javascript:showHideIds(new Array('addFunds'), new Array('withdraw'))">Withdraw Funds</a></div>
			  </a>&nbsp;</td>
    <?php
				  if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
				  {
	?>
	<td align="right" width="15%">
	
	<a name='addFundsAnchor' class="anchor"><div class="warningText">&nbsp;</div>
	
			  <div align="right" style="display:inline; padding:5px; background-color:#FF9900; -moz-border-radius: 5px 5px 5px 5px;
	-webkit-border-radius: 3px 3px 3px 3px;
	-khtml-border-radius: 3px 3px 3px 3px;
	border-radius: 3px 3px 3px 3px;"><a href="javascript:showHideIds(new Array('withdraw'), new Array('addFunds'))">Add More Funds</a></div>
			  </a>&nbsp;</td>
	<?php
	}
	?>
  </tr>
</table>

			  
			  <div class="warningText">&nbsp;</div>
			  <?php
			  if(isset($_REQUEST['add']))
			  {
			  	$display='block';
			  }
			  else
			  {
			  	$display='none';
			  }
			  ?>
			  
			  <div id='addFunds' align="right" style=" position: absolute; right:20px; background-color:#E8E8E8; border:#FFFFFF 1px solid; -moz-border-radius: 5px 5px 5px 5px;
	-webkit-border-radius: 5px 5px 5px 5px;
	-khtml-border-radius: 5px 5px 5px 5px;
	border-radius: 5px 5px 5px 5px; display:inline-block; width: 50%; padding:10px; display:<?php echo $display;?>; -moz-opacity: .9;
	KhtmlOpacity: .9;
	opacity: .9;filter: alpha(opacity=90);">
			  <form action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
			}
			 ?>' method='post'>
			  <div style="text-align:left"><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>Funds Source:</strong></span><br /></div>
			  <table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td style="display:inline-block" valign="top"><label class="addFundsLabel">Full Name of Payee:</label></td>
    <td><input name="names" class="addFunds" type="text" value="<?php echo $_COOKIE['names'];?>" />&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Date of Payment:</label></td>
    <td valign="top"><input name="date" id='dater' class="addFunds" type="text" value="<?php echo $_COOKIE['date'];?>" readonly="readonly" />
	<img src='images/calc.png' align="bottom" border="0" width="20px" onclick="JACS.show(document.getElementById('dater'),event);">
	</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Bank Paid Into:</label></td>
    <td><select name="bank" class="addFunds1"><?php echo append_option_bank($_COOKIE['bank'])?></select>&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Amount:</label></td>
    <td><input name="amount" class="addFunds" type="text" value="<?php echo $_COOKIE['amount'];?>" />&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Extra Notes:</label></td>
    <td><textarea name="notes" class="addFundsTextArea" style="color:#000000; font-size:11px;"><?php echo $_COOKIE['notes'];?></textarea>&nbsp;<br />
	<div class="warningText">&nbsp;</div>
	<input type="submit" name="BILLING" value="Add Funds" class="button11"  style="width:200px"/>

	
	</td>
  </tr>
</table>

			  </form>
			  </div>
			  
			  
			  
			  <?php
			  if(isset($_REQUEST['withdraw']))
			  {
			  	$display='block';
			  }
			  else
			  {
			  	$display='none';
			  }
			  ?>
			  <div id='withdraw' align="right" style=" position: absolute; right:20px; background-color:#E8E8E8; border:#FFFFFF 1px solid; -moz-border-radius: 5px 5px 5px 5px;
	-webkit-border-radius: 5px 5px 5px 5px;
	-khtml-border-radius: 5px 5px 5px 5px;
	border-radius: 5px 5px 5px 5px; display:inline-block; width: 50%; padding:10px; display:<?php echo $display;?>; -moz-opacity: .9;
	KhtmlOpacity: .9;
	opacity: .9;filter: alpha(opacity=90);">
			  <form action='index.php<?php 
			if(strlen($_SERVER['QUERY_STRING'])>0)
			{
				echo "?".$_SERVER['QUERY_STRING'];
			}
			else
			{
			}
			 ?>' method='post'>
			  <div style="text-align:left"><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>Withdraw Funds:</strong></span><br />
			  <div class="warningText">Payments are made on the 14th and 28th of every month</div>
			  <div class="warningText">&nbsp;</div>
			  </div>
			  <table width="100%" border="0" cellspacing="5" cellpadding="0">
  <tr>
    <td valign="top"><label class="addFundsLabel">Select Your Bank:</label></td>
    <td><select name="bank" class="addFunds1"><?php echo append_option_bank($_COOKIE['bank'])?></select>&nbsp;</td>
  </tr>
  <tr>
    <td style="display:inline-block" valign="top"><label class="addFundsLabel">Your Bank Account Name:</label></td>
    <td><input name="names" class="addFunds" type="text" value="<?php echo $_COOKIE['names'];?>" />&nbsp;</td>
  </tr>
  <tr>
    <td style="display:inline-block" valign="top"><label class="addFundsLabel">Your Bank Account Number:</label></td>
    <td><input name="acctnumber" class="addFunds" type="text" value="<?php echo $_COOKIE['names'];?>" />&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Amount I wish to withdraw:</label></td>
    <td><input name="amount" class="addFunds" type="text" value="<?php echo $_COOKIE['amount'];?>" /><br />
	<div class="warningText">Amount must be in 500 Naira denominations</div>
	&nbsp;</td>
  </tr>
  <tr>
    <td valign="top"><label class="addFundsLabel">Extra Notes:</label></td>
    <td><textarea name="notes" class="addFundsTextArea" style="color:#000000; font-size:11px;"><?php echo $_COOKIE['notes'];?></textarea>&nbsp;<br />
	<div class="warningText">&nbsp;</div>
	<input type="submit" name="BILLING" value="Withdraw Funds" class="button11"  style="width:200px"/>

	
	</td>
  </tr>
</table>

			  </form>
			  </div>
			  <?php
			  if(USER::getUserTypeId($_SESSION['uid'])==USERTYPE::getUserTypeId('Employer'))
			  {
			  ?>
              <br />
              <br />
              <table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td align='left'><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>How My Money Has Been Spent</strong></span><u><span class='style76'><br />
                  </span></u></td>
                  <td align='left'>&nbsp; </td>
                </tr>
				
				
				<tr>
                  <td align='left' class='tdstyle20a' style="font-size:13px; font-weight:bold">
				  &nbsp;<u>Project</u></td>
                  <td width='18%' align='left' class='tdstyle20a' style="font-size:13px; font-weight:bold"><u>Amount</u></td>
                </tr>
                <?php

					$countr=0;
					$total_expense=0;
					for($count=0;$count<sizeof($myProjectDetails);$count++)
					{
						
							$countr++;	
						
						$bidDetails=BID::getWinningBid($myProjectDetails[$count]['projectId'], $myProjectDetails[$count]['chosen_developer_id']);
						
				?>
				<tr>
                  <td width='72%' align='left' class='tdstyle20a'>
				  <img src='images/icon312.gif' align='absmiddle'>&nbsp;<a href='?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $myProjectDetails[$count]['id'];?>'> <?php echo $myProjectDetails[$count]['header']; ?></a> </td>
                  <td width='28%' align='left' class='tdstyle20a'>&nbsp;<?php echo $bidDetails['amount']; ?>.00 Naira</td>
                </tr>	
				<?php
					$total_expense=$total_expense + $bidDetails['amount'];
						
					}

				if ($countr==0)
				{
				?>
                <tr>
                  <td colspan="2" align='left' class='tdstyle20'> No project has been completed so far.</td>
                </tr>
				<?php
				}
				else
				{
				?>
				<tr>
                  <td align='left' class='tdstyle20'><strong>Total</strong></td>
                  <td align='left' class='tdstyle20'><strong><?php echo number_format($total_expense, 2, '.', ''); ?> Naira</strong></td>
                </tr>
				<?php
				}
				?>
              </table>
			  <?php
			  }
			  else
			  {
			  ?>
            <br>
              <br>
			  <table width='88%' border='0' align='center' cellpadding='0' cellspacing='0'>
                <tr>
                  <td align='left'><span class='style76'><img src='images/bullets2.png' align='absmiddle' />&nbsp;<strong>How Much Have I Won?</strong></span><u><span class='style76'><br />
                  </span></u></td>
                  <td align='left'>&nbsp; </td>
                </tr>
				
				
				<tr>
                  <td  align='left' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">Projects</td>
                  <td width='18%' align='left' class='tdstyle20a' style="font-size:13px; font-weight:bold; text-decoration:underline">Amount</td>
                </tr>
                <?php

					$countr=0;
					for($count=0;$count<sizeof($myProjectDetails);$count++)
					{
						
						
							$countr++;	
						
						$bidDetails=BID::getWinningBid($myProjectDetails[$count]['id'], $myProjectDetails[$count]['chosen_developer_id']);
						
				?>
				<tr>
                  <td  align='left' class='tdstyle20'>
				  <img src='images/promotion.png' width="12px" align='absmiddle'>&nbsp;<a href='?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $myProjectDetails[$count]['id'];?>'> <?php echo $myProjectDetails[$count]['header']; ?></a> </td>
                  <td align='left' class='tdstyle20'>&nbsp;<?php echo ($bidDetails['amount']); ?>.00 Naira</td>
                </tr>
						
				<?php
					}

				if ($countr==0)
				{
				?>
                <tr>
                  <td colspan="2" align='left' class='tdstyle20'> You have not won and completed any projects yet.</td>
                </tr>
				<?php
				}
				?>
              </table>
			  <?php
			  }
			  ?>
			  <br /><br />
              <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php

	  	
			echo PORTLET::displayHeader("Complaint Form!", "");
			?>
</table>	
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="">
      <tr>
        <td bgcolor="#FFFCEC" class="tdstyle151"><br>
            <br></td>
        <td colspan="4" bgcolor="#FFFCEC" class="tdstyle152"><br>
            
			<form name='compose' action='$url' method='post'>
			<span class='style10'>Make a formal complaint...<br>
        <br>
        </span></u>
        <table width='95%' border='0' cellspacing='0' cellpadding='0'>
        <tr>
        <td class='tdstyle16'>&nbsp;</td>
        <td class='tdstyle16'>&nbsp;</td>
        </tr>
		
		<tr>
			<td><span class='style10 style4'>Subject</span><span class='style10'><span class='style4'>:</span>&nbsp;</span></td>
			<td><input name='About' type='text' class='formtextboxtype1'></td>
			</tr>
			<tr>
			<td><span class='style10 style4'></span><span class='style10'><span class='style4'></span>&nbsp;</span></td>
			<td><span class='style10'><span class='style4'>
			</span></span></td>
			</tr>
			<tr>
			<td><span class='style10 style4'></span><span class='style10'><span class='style4'></span>&nbsp;</span></td>
			<td><span class='style10'><span class='style4'>
			</span></span></td>
			</tr>
			<tr>
			<td><span class='style10 style4'>Project</span><span class='style10'><span class='style4'>:</span>&nbsp;</span></td>
			<td><span class='style10'><span class='style4'>
			<span class='style10'><select name='project' id='project'>
                  <?php 
echo append_option_projects($_COOKIE["id"], $uid);
	?>
              </select></span>
			</span></span></td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td><span class='style10'><span class='style4'>
			    <span class='style64'>Select the project you wish to complaint. If complaint is not about a project, leave this field</span>
			    </span></span>
			    </span></span>&nbsp;</td></tr>
        </table>
        <u><span class='style10'><br>
        </span></u><span class='style10'><span class='style4'>Message:<br>
        <STRONG class='style10'><u>
		<?php
	    if((strlen($_COOKIE['formCompose']['msg']))>0)
		{
			echo "<textarea name='MSG' class='formtextarea1'>".$_COOKIE['formCompose']['msg']."</textarea>";
		}
		else
		{
	        echo "<textarea name='MSG' class='formtextarea1'></textarea>";
		}
		?>
		</u></STRONG><br>
        <br>
        </span></span><span class='style10'><span class='style4'>
        <input name='COMPOSE_SEND' type='submit' class='button11' value='Send' >
        <br>
        </span></form>
			
            <span class="style10"></span><br>        </td>
      </tr>
    </table><br />
<br />
<br />

	  </td>
	  </tr>
</table>