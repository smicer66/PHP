<?php
if(isset($_REQUEST['search_start']))//start of project listing
{
	$start=$_REQUEST['search_start'];
}
else
{
	$start=0;
}

if(isset($_REQUEST['list']))//start of project listing
{
	$end=MAX_LISTINGS;
	
}
else
{
	$end=MAX_FP_LISTINGS;
}


if((isset($_REQUEST['agId'])) && (is_numeric($_REQUEST['agId'])==1))
{
	$projectListingCount=PROJECT::getMyFavoriteListingCount();
	$projectListingSQL=PROJECT::getMyFavoriteProjectListing($start, $end);
}
else
{
	$projectListingCount=PROJECT::getMyFavoriteListingCount();
	$projectListingSQL=PROJECT::getMyFavoriteProjectListing($start, $end);
	//PROJECT::saveBillingExpenses();
}
?>

&nbsp;&nbsp; <br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1%"><img src="images/favor.png" width="49" height="46" align="top" /></td>
    <td><span class="textBodyStyle5">&nbsp;&nbsp;&nbsp;My Favorite Project Listings</span></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="objectivePreviewTable">
  <tr>
    <td class="textHeaderStyle2 bgHeaderCell" colspan="4" ><img src="images/154.png" width="16" height="16" />&nbsp;&nbsp;&nbsp;All Favorite Project Listings</span></td>
  </tr>
  <tr>
    <td width="40%" class="cellType7">Title</td>
    <td width="12%" class="cellType7">Transaction</td>
    <td width="23%" class="cellType7">Location</td>
    <td class="cellType7">Cost - Naira</td>
  </tr>
  <?php
  	if($projectListingCount==0)
	{
		echo "<tr><td class='listingCells' colspan='4' align='center'>None available</td></tr>";
	}
	else
	{
		while($resultX = $mysql->fetch_assoc_mine($projectListingSQL))
		{
			
			
				$propLocation=PROJECT::getProjectLocation($resultX['locationId']);
				$propTrans=PROJECT::getProjectTransaction($resultX['transactionTypeId']);
				$propState=PROJECT::getProjectState($propLocation['stateId']);
				if($propTrans=='Lease')
				{
					$perYear=' (per year)';
				}
				else
				{
					$perYear=' (Buyout)';
				}
				echo "<tr>
					<td class='listingCells'>";
					if($resultX['authorUserId']==$_SESSION['uid'])
					{
						echo "<a href='administrator/index.php?fid=".ADMINISTRATOR::getAdminFunctionId('project_creator')."&id=".$resultX['id']."&mod=1'><img src='images/Modify.png' border='0' class='icon' align='absmiddle' title='Edit Listing'/></a>&nbsp;&nbsp;";
					}
					else
					{
						echo "<img src='images/Modify.png' border='0' class='icon' align='absmiddle' title='Edit Listing'/>&nbsp;&nbsp;";
					}
					echo "<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$resultX['id']."'>".truncateText($resultX['title'], 10)."</a></td>
					<td class='listingCells'>".$propTrans."</td>
					<td class='listingCells'>".$propLocation['name']." - ".$propState['name']."</td>
					<td class='listingCells'>N".number_format($resultX['pricing'])."".$perYear."</td>
				  </tr>";
			
		}
	}
  
  ?>
</table>
<?php
if((!isset($_REQUEST['list'])) && (MAX_FP_LISTINGS<$projectListingCount) && ($projectListingCount>0))
{
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90%">&nbsp;</td>
	<td class="listingCells" align="center"><a href="index.php?fid=<?php echo FEATURE::getId('Project')."&list";?>">View All</a></td>
  </tr>
</table>
<?php
}
else
{
	if($projectListingCount>0)
	{
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
	<td class="listingCells" align="right"><?php 
	$pag=new Pagination();
	echo $pag->paginateResults($projectListingCount, MAX_LISTINGS, 'PROJECT');?></td>
  </tr>
</table>
<?php
	}
}
?>
