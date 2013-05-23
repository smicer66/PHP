<?php

$bidListingIdsArray=BID::getMyProjectBid($_SESSION['uid']);


?>



    <span class="style34"><u>Bids Already Posted:</u></span><br>
    <br>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("My Bids!", "");
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
			echo "<br><br />No bids have been placed.<br><br>";
			?>
			</td>
			</tr>
			</table>
			<?php
			
		}
		else
		{
			?>
					<table width="100%" border="1" cellpadding="0" cellspacing="0"  class="onlyBorderAlone defaultBgColor">
					<?php
						for($count=0;$count<sizeof($bidListingIdsArray);$count++)
						{
						
							$bidDetails=BID::getBidDetails($bidListingIdsArray[$count]);
							$mod=$count % 2;
							$projectListingDetails=PROJECT::getProjectDetails($bidDetails['project_id']);
						
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

							
								<strong>Project: </strong><?php echo $projectListingDetails['header'];?>(<?php echo $projectListingDetails['status'];?>)
							
							</td>
							</tr>
							<tr>
							<td class="<?php echo $class;?>">
							
								<table width="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
								<td valign="top" width='100' class="tdstyle22"><strong>Period :</strong></td>
								<td class="tdstyle22" valign="top" ><?php echo $bidDetails['period'];?> days</a></td>
								</tr>
								<tr>
								<td valign="top" class="tdstyle22"><strong>Bid Cost: </strong></td>
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
							<tr>
							</tr>
							
				<?php 
						}
						?>
		</table>
				<?php
		}
		
		?>
		
		
		
		