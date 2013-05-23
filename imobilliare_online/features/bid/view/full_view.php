<?php

$bidListingIdsArray=BID::getProjectBidIds($_REQUEST['fiid']);
$projectListingDetails=PROJECT::getProjectDetails($_REQUEST['fiid']);



//if(PROJECT::isExpired($_REQUEST['fiid']))
//{
	//if project is expired dont display
	//header('Location: index.php?fid='.FEATURE::getId('Project').'&ex=1');
//}

?>



<br>
    <br>
    <span class="style34"><u>Bids Already Posted:</u></span><br>
    <br>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("Bids For Project ID: ".$projectListingDetails['unique_id'],"");
?>
</table>

    
	
	
	  
		<?php
		
		if(sizeof($bidListingIdsArray)==0)
		{
			
			?>
			<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="onlyBorderAlone defaultBgColor">
			<tr>
					<td>
		<?Php
			echo "<br>No bids have been placed.<br><br>";
			echo " <a href='?fid=".FEATURE::getId('Bid')."&fiid=".$_REQUEST['fiid']."'>";
			echo "Click here</a> to place a bid<br><br>";
			?>
			</td>
			</tr>
			</table>
			<?php
			
		}
		else
		{
			if (($projectListingDetails['hidden_bids']==1) && ($projectListingDetails['emp_id']!=$_SESSION['uid']))
			{
			
				if(BID::sentBid($projId, $_SESSION['uid']))
				{
				?>
					<table width="100%" border="1" cellpadding="0" cellspacing="0"  class="onlyBorderAlone defaultBgColor">
					<?php
						for($count=0;$count<sizeof($bidListingIdsArray);$count++)
						{
							$bidDetails=BID::getBidDetails($bidListingIdsArray[$count]);
							if($bidDetails['developer_id']==$_SESSION['uid'])
							{
								$userDetails=USER::getUserDetails($bidDetails['developer_id']);
								$mod=$count % 2;
							
								if($mod==0)
								{
									$class='tdstyle13';
								}
								else
								{
									$class='tdstyle14';
								}
						?>
								<tr>
								<td class="<?php echo $class;?>">
								
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
									<tr>
									<td width="24%" valign="top" class="tdstyle22"><strong>Developer:</strong></td>
									<td class="tdstyle22"><a href="members.php?fid=<?php echo FEATURE::getId('User');?>&fiid=<?php echo $userDetails['id'];?>&vacct=1&us=<?php echo $userDetails['userTypeId'];?>"><?php echo $userDetails['username'];?></a> 
									<?php
									
									if((($projectListingDetails['status']=="On-Going") || ($projectListingDetails['status']=="Completed") || ($projectListingDetails['status']=="Assigned")) && ($projectListingDetails['chosen_developer_id']==$bidDetails['developer_id']))
									{
									?>
									&nbsp;&nbsp;&nbsp;<font color="blue"><b>Winning Bidder</b></font>
									<?php
									}	
									?>
									</td>
									</tr>
									<tr>
									<td valign="top" class="tdstyle22"><strong>Period :</strong></td>
									<td class="tdstyle22" valign="top" ><?php echo $bidDetails['period'];?> days</a></td>
									</tr>
									<tr>
									<td valign="top" class="tdstyle22"><strong>Cost: </strong></td>
									<td class="tdstyle22" valign="top" >NGN <?php echo $bidDetails['amount'];?></td>
									</tr>
									<tr>
									<td valign="top" class="tdstyle22"><strong>Bid Detail: </strong></td>
									<td class="tdstyle22" valign="top" ><?php echo $bidDetails['detail']?></td>
									</tr>
									<tr>
									<td valign="top">&nbsp;</td>
									<td align="right"><br>
									</td>
									</tr>
									</table>
								
								</td>
								</tr>
				<?php 
							}
						}
						?>
					</table>
				<?php
				}
				else
				{
				?>
					<table width="100%" border="0" cellpadding="0" cellspacing="0"  class="onlyBorderAlone defaultBgColor">
					<tr>
					<td>
					<?Php
					echo "<br>The Employer of this project has decided to keep All bids on this project hidden.<br><br>";
					echo " <a href='?fid=".FEATURE::getId('Bid')."&fiid=".$_REQUEST['fiid']."'>";
					echo "Click here</a> to place a bid<br><br>";
					?>
					</td>
					</tr>
					</table>
				<?php
				}
			}
			else
			{
					?>
					<table width="100%" border="1" cellpadding="0" cellspacing="0"  class="onlyBorderAlone defaultBgColor">
					<?php
						for($count=0;$count<sizeof($bidListingIdsArray);$count++)
						{
							$bidDetails=BID::getBidDetails($bidListingIdsArray[$count]);
							$userDetails=USER::getUserDetails($bidDetails['developer_id']);
							$mod=$count % 2;
						
							if($mod==0)
							{
								$class='tdstyle13';
							}
							else
							{
								$class='tdstyle14';
							}
					?>
							<tr>
							<td class="<?php echo $class;?>">
							
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
								<td width="24%" valign="top" class="tdstyle22"><strong>Developer:</strong></td>
								<td class="tdstyle22"><a href="members.php?fid=<?php echo FEATURE::getId('User');?>&fiid=<?php echo $userDetails['id'];?>&vacct=1&us=<?php echo $userDetails['userTypeId'];?>"><?php echo $userDetails['username'];?></a> 
								<?php
								//echo $bidDetails['developer_id'];
								if((($projectListingDetails['status']=="On-Going") || ($projectListingDetails['status']=="Completed") || ($projectListingDetails['status']=="Assigned")) && ($projectListingDetails['chosen_developer_id']==$bidDetails['developer_id']))
								{
								?>
								&nbsp;&nbsp;&nbsp;<font color="blue"><b>Winning Bidder</b></font>
								<?php
								}	
								?>
								</td>
								</tr>
								<tr>
								<td valign="top" class="tdstyle22"><strong>Period :</strong></td>
								<td class="tdstyle22" valign="top" ><?php echo $bidDetails['period'];?> days</a></td>
								</tr>
								<tr>
								<td valign="top" class="tdstyle22"><strong>Cost: </strong></td>
								<td class="tdstyle22" valign="top" >NGN <?php echo $bidDetails['amount'];?></td>
								</tr>
								<tr>
								<td valign="top" class="tdstyle22"><strong>Bid Detail: </strong></td>
								<td class="tdstyle22" valign="top" ><?php echo $bidDetails['detail'];?></td>
								</tr>
								<tr>
								<td valign="top">&nbsp;</td>
								<td align="right"><br>
								</td>
								</tr>
								</table>
								<div class="right_align">
								<?php
								if($projectListingDetails['status']=='Open')
								{
									if($projectListingDetails['emp_id']==$_SESSION['uid'])
									{
								?>
							<a href='?fid=<?php echo FEATURE::getId('Project');?>&fiid=<?php echo $_REQUEST['fiid'];?>&fiiid=<?php echo $bidDetails['id'];?>&assign'>
Assign this project to <?php echo $userDetails['username'];?></a>&nbsp;&nbsp;&nbsp;&nbsp;
									<?php
									}
									if($userDetails['id']!=$_SESSION['uid'])
									{
									?>
<a href='?fid=<?php echo FEATURE::getId('user');?>&fiid=<?php echo $_REQUEST['fiid'];?>&epyt=dib&dib=<?php echo $bidDetails['id'];?>&complaint'>Report This Bid</a>
								
								<?php
									}
								}
								?></div>
							</td>
							</tr>
				<?php 
						}
						?>
		</table>
				<?php
			}
		}
		
		?>
		
		
		
		