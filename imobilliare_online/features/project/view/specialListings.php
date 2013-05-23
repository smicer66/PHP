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

$specialFeaturesSQL=PROJECT::getSpecialFeatureProperties($start, $end);
$specialListingCount=PROJECT::getSpecialListingCount();
$array_ids=array();
while($resultX = $mysql->fetch_assoc_mine($specialFeaturesSQL))
{
	if(PROJECT::isExpired($resultX['id']))
	{
		//if project is expired dont display
	}
	else
	{
		array_push($array_ids,$resultX['id']);	
	}
	//shuffle($array_ids);
}
?>
<table width="100%" border="0" cellspacing="5" cellpadding="0" class="objectivePreviewTable">
				<tr>
				  <td valign="top" colspan="4">
				  		<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td class="textHeaderStyle2 bgHeaderCell"><img src="images/154.png" width="16" height="16" />&nbsp;&nbsp;Latest Projects</td>
							</tr>
					  	</table></td>
				</tr>
					<?php
					$countre1=0;
					 for($counter=0;$counter<3;$counter++)
					 {
					 	echo "<tr>";
						 for($countre=0;$countre<4;$countre++)
						 {
						 	$propFileIdSQL=PROJECT::getProjectFilesForFp($array_ids[$countre1]);
							$propFileId=$mysql->fetch_assoc_mine($propFileIdSQL);
							$propDet=PROJECT::getProjectDetails($array_ids[$countre1++]);
							
								if(isset($propFileId['fileId']))
								{
						?>
						  <td valign="top" width="25%" align="center"><table width="10%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td class="cellType8" align="left">
							  <?php
						  echo "<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$propDet['id']."'>";?><img src="features/project/view/images/<?php echo getPictureFileName($propFileId['fileId']);?>" alt="Image" class='imagePreview' border='0' title='<?php echo $propDet['title'];?>'/></a><br />
						  <div class="left"><div class="cell_seperator"></div><?php
						  echo "<a href='index.php?fid=".FEATURE::getId('Project')."&fiid=".$propDet['id']."'>";?><img src="images/info1.png" alt="view information" title="View project information" class='icon' border='0' /></a>&nbsp;&nbsp;<?php
						  echo "<a href='administrator/index.php?fid=skdd'>";?><img src="images/complaints.jpg" alt="complaint" title="lay a complaint" class='icon' border='0' /></a>
						  <?php echo "<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$propDet['id']."&fiid=".$propFileId['fileId']."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";?><img src="images/zoomin.png" alt="complaint" title="lay a complaint" class='icon' border='0' /></a></div>						  </td>
							</tr>
						  </table></td>
						  <?php
						  		}
								else
								{
								?>
								<td valign="top" width="25%" align="center"><table width="10%" border="0" cellspacing="0" cellpadding="0">
							<tr>
							  <td class="cellType8" align="left">
							  <?php
							  	if(!isset($_SESSION['uid']))
							  	{
								  	echo "<a href='index.php?fid=".FEATURE::getId('User')."&login=1'>";
						  		}
								else
								{
									echo "<a href='administrator/index.php?fid=".ADMINISTRATOR::getAdminFunctionId('project_creator')."'>";
								}
								
								
								?>
									  <img src="images/empty_add.png" alt="Place Project Here" class='imagePreviewNoBorder' border='0'  /></a><br />
						  <div class="left"><div class="cell_seperator"></div>
						  <img src="images/info1.png" alt="view information" title="View project information" class='icon' border='0' />
						  &nbsp;&nbsp;
						  <img src="images/complaints.jpg" alt="complaint" title="lay a complaint" class='icon' border='0' />&nbsp;&nbsp;
						  <img src="images/zoomin.png" alt="complaint" title="lay a complaint" class='icon' border='0' /></div>						  </td>
							</tr>
						  </table></td>
<?php
								}
						  }
						  echo "</tr>";
					  }
					  ?>
                    
                          </table>
						  <?php
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
						?>