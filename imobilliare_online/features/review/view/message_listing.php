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
	$messageListingCount=MESSAGE::getOutboxListingCount($_SESSION['uid']);
	$messageListingSQL=MESSAGE::getOutboxListing($start, $end,$_SESSION['uid']);
}
else
{
	$messageListingCount=MESSAGE::getInboxListingCount($_SESSION['uid']);
	$messageListingSQL=MESSAGE::getInboxListing($start, $end,$_SESSION['uid']);
}
?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="objectivePreviewTable">
  <tr>
    <td width="40%" class="cellType7">&nbsp;</td>
    <td width="12%" class="cellType7">From</td>
    <td width="23%" class="cellType7">Message</td>
    <td class="cellType7">Date Received</td>
  </tr>
  <?php
  	while($resultX = $mysql->fetch_assoc_mine($messageListingSQL))
	{
		$userDet=USER::getUserDetails($resultX['authorUserId']);
		if($userDet['userTypeId']==USERTYPE::getUserTypeId('Agent'))
		{
			$name=$userDet['agencyName'];
		}
		else if($userDet['userTypeId']==USERTYPE::getUserTypeId('RPS'))
		{
			$name=$userDet['firstName']." ".$userDet['lastName'];
		}
		
		$time=explode(' ', $resultX['dateSent']);
		if($time[0]==date('Y-m-d'))
		{
			$timing=$time[1];
		}
		else
		{
			$timing=$time[0];
		}
		
		echo "<tr>
			<td class='listingCells'>";
			if($resultX['authorUserId']==$_SESSION['uid'])
			{
				echo "<a href='administrator/index.php?fid=".ADMINISTRATOR::getAdminFunctionId('project_creator')."&mod=1'><img src='images/Modify.png' border='0' class='icon' align='absmiddle' title='Edit Listing'/></a>&nbsp;&nbsp;";
			}
			else
			{
				echo "<img src='images/Modify.png' border='0' class='icon' align='absmiddle' title='Edit Listing'/>&nbsp;&nbsp;";
			}
			echo "<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$resultX['id']."'>".truncateText($resultX['title'], 10)."</a></td>
			<td class='listingCells'>".$name."</td>
			<td class='listingCells'>".truncateText($resultX['subject'],15)."</td>
			<td class='listingCells'>".getDateInWords($timing)."</td>
		  </tr>";
	}

  
  ?>
</table>
<?php
if((!isset($_REQUEST['list'])) && (MAX_FP_LISTINGS<$messageListingCount))
{
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90%">&nbsp;</td>
	<td class="listingCells" align="center"><a href="index.php?fid=<?php echo FEATURE::getId('Message')."&list";?>">View All</a></td>
  </tr>
</table>
<?php
}
else
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
?>
