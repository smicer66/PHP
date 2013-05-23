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

$newletterListingCount=NEWSLETTER::getListingCount();
$newletterListingSQL=NEWSLETTER::getNewsletterListing($start, $end);
?>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="objectivePreviewTable">
  <tr>
    <td class="textHeaderStyle2 bgHeaderCell" colspan="4" ><img src="images/154.png" width="16" height="16" />&nbsp;&nbsp;&nbsp;My Newsletters</td>
  </tr>
  <tr>
    <td width="30%" class="cellType7">Title</td>
    <td class="cellType7">Contents</td>
    <td width="18%" class="cellType7">Date Produced</td>
  </tr>
  <?php
  	if($newletterListingSQL!=NULL)
  	{
		
		while($resultX = $mysql->fetch_assoc_mine($newletterListingSQL))
		{
			
			echo "<tr>
				<td class='listingCells'>".truncateText($resultX['title'], 10)."</a></td>
				<td class='listingCells'>";
				echo "<a href='index.php?fid=".FEATURE::getId('Newsletter')."&fiid=".$resultX['id']."'>".$resultX['contentsNoHtml']."</td>
				<td class='listingCells'>".getDateInWords($resultX['dateOfPublication'])."</td>
			  </tr>";
		}
	}
	else
	{
		echo "<tr>
			<td class='listingCells' colspan='3' align='center'>No Newsletters Available For You!</td>
		  </tr>";
	}
  
  ?>
</table>
<?php
if($newletterListingSQL!=NULL)
{
	if((!isset($_REQUEST['list'])) && (MAX_FP_LISTINGS<$newletterListingCount))
	{
	?>
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	  <tr>
		<td width="90%">&nbsp;</td>
		<td class="listingCells" align="center"><a href="index.php?fid=<?php echo FEATURE::getId('Newsletter')."&list";?>">View All</a></td>
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
		echo $pag->paginateResults($newletterListingCount, MAX_LISTINGS, 'NEWSLETTER');?></td>
	  </tr>
	</table>
	<?php
	}
}
?>
