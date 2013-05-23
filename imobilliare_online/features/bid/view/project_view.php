<?php
$propFileIdSQL=PROJECT::getProjectFiles($_REQUEST['fiid']);
$array_ids=array();
$array_ft=array();
$newCountre=0; $imgPstSt=0; $vdPstSt=0; $audPstSt=0; $pdfPstSt=0;
$imgCounter=0; $vdCounter=0; $audCounter=0; $pdfCounter=0;

while($resultX = $mysql->fetch_assoc_mine($propFileIdSQL))
{
	array_push($array_ids,$resultX['fileId']);
	array_push($array_ft,$resultX['imageType']);
	if(($resultX['imageType']=='Image') && ($imgPstSt==0))
	{
		$imgPst=$newCountre;
		$imgPstSt=1;
		$imgCounter=$imgCounter + 1;
	}
	else if(($resultX['imageType']=='Video') && ($vdPstSt==0))
	{
		$vdPst=$newCountre;
		$vdPstSt=1;
		$vdCounter=$vdCounter + 1;
	}
	else if(($resultX['imageType']=='Audio') && ($audPstSt==0))
	{
		$audPst=$newCountre;
		$audPstSt=1;
		$audCounter=$vdCounter + 1;
	}
	else if(($resultX['imageType']=='pdf') && ($pdfPstSt==0))
	{
		$pdfPst=$newCountre;
		$pdfPstSt=1;
		$pdfCounter=$pdfCounter + 1;
		
	}
	$newCountre++;
	
	/*my own counter*/
	if(($resultX['imageType']=='Image'))
	{
		$imgCounter=$imgCounter + 1;
	}
	else if(($resultX['imageType']=='Video'))
	{
		$vdCounter=$vdCounter + 1;
	}
	else if(($resultX['imageType']=='Audio'))
	{
		$audCounter=$vdCounter + 1;
	}
	else if(($resultX['imageType']=='pdf'))
	{
		$pdfCounter=$pdfCounter + 1;
	}
}

?>
<table width="100%" border="0" cellspacing="5" cellpadding="0">
<?php
					$countre1=0;
					 
						echo "<tr>";
						
						 for($countre=0;$countre<4;$countre++)
						 {
						 	
							if(is_numeric($array_ids[$countre1])==1)
							{
								$propDet=PROJECT::getProjectDetails($array_ids[$countre1]);
								
								
						?>
							  <td valign="top" width="25%" align="center"><table width="10%" border="0" cellspacing="0" cellpadding="0">
								<tr>
								  <td class="cellType8" align="left">
								  <?php
								  
							  echo "<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['fiid']."&search_start=".$countre1."&ftype=".$array_ft[$countre1]."&fiid=".$array_ids[$countre1]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";
							  if(fileFormat(getPictureFileName($array_ids[$countre1]))=='Image')
							  {
							  		echo "<img src='features/project/view/images/".getPictureFileName($array_ids[$countre1])."' alt='Image' class='imagePreview' border='0' title='".$propDet['title']."'/>";
							  }
							  else if(fileFormat(getPictureFileName($array_ids[$countre1]))=='pdf')
							  {
							  		echo "<img src='images/adobe_pdf_icon.png' alt='Image' class='imagePreview' border='0' title='".$propDet['title']."'/>";
							  }
							  else if(fileFormat(getPictureFileName($array_ids[$countre1]))=='Video')
							  {
							  		echo "<img src='images/video_icon.jpg' alt='Image' class='imagePreview' border='0' title='".$propDet['title']."'/>";
							  }
							  else if(fileFormat(getPictureFileName($array_ids[$countre1]))=='Audio')
							  {
							  		echo "<img src='images/audio_icon.jpg' alt='Image' class='imagePreview' border='0' title='".$propDet['title']."'/>";
							  }
							  ?></a><br />
							  <div class="left"><div class="cell_seperator"></div><?php
							  echo "<a href='administrator/index.php?fid=".FEATURE::getId('User')."&complaint'>";?><img src="images/complaints.jpg" alt="complaint" title="lay a complaint" class='icon' border='0' /></a>
						  <?php echo "<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$propDet['id']."&search_start=".$countre1."&ftype=".$array_ft[$countre1]."&fiid=".$array_ids[$countre1++]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>";?><img src="images/zoomin.png" alt="Magnify Image" title="Magnify Image" class='icon' border='0' /></a></div>						  </td>
							</tr>
						  </table></td>
						  <?php
						}
						else
						{?>
							<td valign="top" width="25%" align="center">&nbsp;</td>
							<?php
						}
						?>
						
						  <?php
						  		
						  }
						  echo "</tr>";
						
					  ?>
					  <?php
								if(sizeof($array_ids)>3)
								{
						?>
						<tr><td valign="top" width="25%" align="right" colspan="4"><?php echo "<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['fiid']."&ftype=Image&fiid=".$array_ids[$imgPst]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>All Image files (".$imgCounter.")</a>";
						
						if($vdPstSt==1)
						{
							echo "&nbsp;&nbsp;&nbsp;<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['fiid']."&ftype=Video&fiid=".$array_ids[$vdPst]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>All Video Files (".$vdCounter.")</a>";
						}
						if($audPstSt==1)
						{
							echo "&nbsp;&nbsp;&nbsp;<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['fiid']."&ftype=Audio&fiid=".$array_ids[$audPst]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>All Audio Files (".$audCounter.")</a>";
						}
						if($pdfPstSt==1)
						{
							echo "&nbsp;&nbsp;&nbsp;<a href='javascript:;' onClick='javascript:window.open(\"core/preview/index.php?fid=".FEATURE::getId('Project')."&propId=".$_REQUEST['fiid']."&ftype=pdf&fiid=".$array_ids[$pdfPst]."\",\"Win122\",\"scrollbars=yes,width=500,height=400\")'>All PDF Docs (".$pdfCounter.")</a>";
						}
						echo "</td></tr>";
								}
						?>
                    
  </table>