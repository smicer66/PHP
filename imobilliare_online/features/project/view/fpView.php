<?php

$specialFeaturesSQL=PROJECT::getProjectListing(0, 10, NULL, 'id', 'DESC');
$array_ids=array();
/*while($resultX = $mysql->fetch_assoc_mine($specialFeaturesSQL))
{
	if(PROJECT::isExpired($resultX['id']))
	{
		//if project is expired dont display
	}
	else
	{
		array_push($array_ids,$resultX['id']);	
	}
	shuffle($array_ids);
}*/
?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("Latest Projects", "");
?>
</table>







<table width="100%" border="0" cellspacing="0" cellpadding="0" class="objectivePreviewTable">
<tr>
<td>

<table width='100%' border='0' cellpadding='1' cellspacing='0'>
<tr>
<td background='images/bg9.gif' class='tdsubmenu51 style39 style38'>Project Title</td>
<td width='20%' align='center' background='images/bg9.gif' class='tdsubmenu5 style39 style38'>
<div align='center' class='style52'>Specialization</div>
</td>
<td width='5%' align='center' background='images/bg9.gif' class='tdsubmenu5 style39 style38'>Bids</td>
<td width='10%' align='center' background='images/bg9.gif' class='tdsubmenu5 style39 style38'>Date Posted</td>
<td width='10%' align='center' background='images/bg9.gif' class='tdsubmenu5 style39 style38'>Project Closes</td>
</tr>
		
<?php
$count=0;
while($resultX = $mysql->fetch_assoc_mine($specialFeaturesSQL))
{
	//echo $resultX['id'];
	if(PROJECT::isExpired($resultX['id'])==FALSE)
	{
		$c=$count%2;
		if($c==0)
		{
			$color="tdstyle13";
		}
		else
		{
			$color="tdstyle14";
		}
		?>
	
	<tr>
	<td class='<?php echo $color;?>'>&nbsp;
	<a href='?fid=<?php echo FEATURE::getId('Project')."&fiid=".$resultX['id'];?>'>
	<?php echo $resultX['header'];?></a></td>
	<td width='20%' align='center' class='<?php echo $color;?>'>
	General</td>
	<td width='5%' align='center' class='<?php echo $color;?>'>
	<?php echo sizeof(BID::getProjectBidIds($resultX['id']));?></td>
	<td width='10%' align='center' class='<?php echo $color;?>'>
	<?php echo substr($resultX['creation_date'], 0, 10);?></td>
	<td width='10%' align='center' class='<?php echo $color;?>'>
	<?php echo substr($resultX['expiry_date'],0,10);?></td>
	</tr>
	
<?php
	}
}
?>

                    
  </table>
</td>
</tr>
</table>
<table width="29%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td class="listingCells" align="center"><a href="index.php?fid=<?php echo FEATURE::getId('Project')."&list&bt=".BILLING::getBillingTypeId('Special Listing');?>">View All Open Projects</a></td>
  </tr>
</table>
