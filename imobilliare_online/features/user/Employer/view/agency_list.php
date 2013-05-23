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


if((isset($_REQUEST['us'])) && (is_numeric($_REQUEST['us'])==1))
{
	$userListingCount=USER::getListCount($_REQUEST['us']);
	$userListingSQL=USER::getUserList($start, $end, $_REQUEST['us']);
}
?>

<div class='textHeaderStyle1'>Agencies On GrabMyHouse!</div>
<div class='cell_seperator'>&nbsp;</div>

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="objectivePreviewTable">
  <tr>
    <td width="30%" class="cellType7">Agency Name</td>
    <td width="20%" class="cellType7">Phone Number</td>
    <td width="23%" class="cellType7">Contact Email</td>
    <td class="cellType7">Location</td>
  </tr>
  <?php
  	while($resultX = $mysql->fetch_assoc_mine($userListingSQL))
	{
	//	$propLocation=PROJECT::getProjectLocation($resultX['locationId']);
//		$propTrans=PROJECT::getProjectTransaction($resultX['transactionTypeId']);
//		$propState=PROJECT::getProjectState($propLocation['state']);
		$stateDet=getStateName($resultX['state']);
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
			echo "<a href='index.php?fid=".FEATURE::getId('User')."&fiid=".$resultX['id']."'>".$resultX['agencyName']."</a></td>
			<td class='listingCells'>".$resultX['phoneNumber']."</td>
			<td class='listingCells'>".$resultX['email']."</td>
			<td class='listingCells'>".$stateDet['name']."</td>
		  </tr>";
	}

  
  ?>
</table>
<?php

if(MAX_FP_LISTINGS<$userListingCount)
{
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="90%">&nbsp;</td>
	<td class="listingCells" align="center"><a href="index.php?fid=<?php echo FEATURE::getId('User')."&list";?>">View All</a></td>
  </tr>
</table>
<?php
}
else
{
	if($userListingCount<MAX_FP_LISTINGS)
	{
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
}
?>
