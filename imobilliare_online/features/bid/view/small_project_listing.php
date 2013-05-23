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
	//$projectListingCount=PROJECT::getListingCount($_REQUEST['agId']);
	//$projectListingSQL=PROJECT::getProjectListing($start, $end,$_REQUEST['agId']);
}
else
{
	
	$projectListingCount=PROJECT::getListingCount();
	$projectListingSQL=PROJECT::getProjectListing($start, $end);
	//PROJECT::saveBillingExpenses();
	//echo sizeof($projectListingSQL);
	//echo $projectListingCount;
}
?>
<table width="98%" border="0" cellpadding="0" cellspacing="0">
   
		<tr>
		<td width='1%' valign='top' bgcolor='#FFD325' class='tdstyle10a'><img src='images/bg11.gif' width='9' height='25'></td>
        <td background='images/bg9.gif' class='tdsubmenu6 style39 style38'>Latest 20 Posted Projects
          <div align='center'></div></td>
        <td width='1%' valign='top' class='tdstyle10a'><img src='images/bg10.gif' width='9' height='25'></td>
      	</tr>
		</table>
		
		<table width="98%" border="0" cellpadding="0" cellspacing="0" class="onlyBorderAlone defaultBgColor">
		 
	  	<?php
			$divisor=MAX_LISTINGS/2;
			for($countre=0;$countre<($divisor);$countre++)
			//while($resultX = $mysql->fetch_assoc_mine($projectListingSQL))
			{		
				$projDet=PROJECT::getProjectDetails($projectListingSQL[$countre]);
				//echo $projDet['id'];
				
				$mod=$countre % 2;
				
				if($mod==0)
				{
					$class='tdstyle13';
				}
				else
				{
					$class='tdstyle14';
				}
	
				//in order to print out only latest 20 Open projects and
				//if they are not up to ten then print all that are Open
				//the projects must not be featured or be job listings and they must be Open
				if(strlen($projDet['header'])==0)
				{
				
				}
				else
				{
					echo "<tr>";
					echo "<td colspan='3' align='left' class='".$class."'><A href='?fid=".FEATURE::getId('Project')."&fiid=".$projDet['id']."'>".$projDet['header']."</A></td>";
					echo "</tr>";
				}			
			}
	  
	  
	  
	  
	  
	  ?>


	  
	 <tr><td>&nbsp;</td><td align='right'><br><a href='viewall.php'>View All</a></td></tr> 
    </table>
	
	
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>&nbsp;</td>
	<td class="listingCells" align="right"><?php 
	$pag=new Pagination();
	echo $pag->paginateResults($projectListingCount, MAX_LISTINGS, 'PROJECT', 0);?></td>
</tr>
</table>
