<?php
if(isset($_REQUEST['search_start']))//start of project listing
{
	$start=$_REQUEST['search_start'];
}
else
{
	$start=0;
}

$end=MAX_SPECIAL_LISTINGS;

$specialFeaturesSQL=PROJECT::getProjectListing($start, $end,$_SESSION['uid'], DEFAULT_DB_TBL_PREFIX.'_project.id', 'DESC');
$specialListingCount=PROJECT::getListingCount();

$array_ids=array();
while($resultX = $mysql->fetch_assoc_mine($specialFeaturesSQL))
{
	/*if(PROJECT::isExpired($resultX['projectId']))
	{
		
		//if project is expired dont display
	}
	else
	{*/
		array_push($array_ids,$resultX['projectId']);	
	//}
	//shuffle($array_ids);
}
?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php
$usType=USERTYPE::getDetails('Employer');
if(USER::getUserTypeId($_SESSION['uid'])==$usType['id'])
{
	echo PORTLET::displayHeader("Projects You Created!", "");
}
else
{
	echo PORTLET::displayHeader("You Placed Bids On These Projects!", "");
}
?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="onlyBorderAlone defaultBgColor">


	  <?php
					$countre1=0;
					 for($counter=0;$counter<sizeof($array_ids);$counter++)
					 {
					 	echo "<tr>";
						
						$propDet=PROJECT::getProjectDetails($array_ids[$counter]);
							
								
						?>
						  <td valign="top" width="25%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
					  <td width='24%' valign='top' class='tdstyle14'><strong>Title:</strong></td>
					  <td class="tdstyle14" align="left">
							  <?php
						  echo $propDet['header'];
						  ?>
						   </td>
							</tr>
							
							<tr>
					  <td width='24%' valign='top' class='tdstyle13'><strong>Budget:</strong></td>
					  <td class="tdstyle13" align="left">
							  <?php
						  echo "Between ".$propDet['min_bdgt']." Naira and ".$propDet['max_bdgt']." Naira";
						  ?>
						   </td> 
							</tr>
							
							<tr>
					  <td width='24%' valign='top' class='tdstyle14'><strong>Skills:</strong></td>
					  <td class="tdstyle14" align="left">
					  <?php
					  $specs=PROJECT::getProjectSpecialization($array_ids[$counter]);
					  $arraySpecs=array();
					  for($count=0;$count<sizeof($specs);$count++)
					  {
							array_push($arraySpecs, getSpecializationName($specs[$count]));
					  }
				 	  $specsText=join(', ', $arraySpecs);

					  
					  if(sizeof($arraySpecs)>0)
					  {
					  	echo  $specsText;
					  }
					  else
					  {
					  	echo "None Specified";
					  }
					  ?>
						   </td>
							</tr>
							
							<tr>
					  <td width='24%' valign='top' class='tdstyle13'><strong>Number of Bids:</strong></td>
					  <td class="tdstyle13" align="left">
					  <?php
					  
						$bidArray=BID::getProjectBidIds($array_ids[$counter]);
						if($bidArray!=NULL)
						{
							echo sizeof($bidArray);
						}
						else
						{
							echo 0;
						}
						  ?>
						   </td>
							</tr>
						  </table></td>
						  
						 <?php
						 
						 echo "</tr>";
						 echo "<tr>
					  <td width='24%' valign='top' align='right' colspan='2'>";
					  	echo "<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$propDet['id']."'>
						View This Project Fully</a><br /><br />
						   </td>
							</tr>";
						
					  }
					  ?>
                    
                          </table>
						  <!--<?php
						  if($specialListingCount >MAX_SPECIAL_LISTINGS)
						  {
						  ?>
<table width="29%" border="0" align="right" cellpadding="0" cellspacing="0">
  <tr>
    <td class="listingCells" align="center"><?php 
	$pag=new Pagination();
	echo $pag->paginateResults($specialListingCount, MAX_SPECIAL_LISTINGS, 'PROJECT');?></td>
  </tr>
</table>
						<?php
						}
						?>-->