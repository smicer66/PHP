<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php
			echo PORTLET::displayHeader("Site Map", "");
			?>
  </table>	
	<table width="100%" border="0" align="center" cellpadding="1" cellspacing="0" class="onlyBorderAlone defaultBgColor">	
	<tr>
	<td>
		<br />
	<?php
		global $mysql;
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_sitemap` WHERE `status` = '1' GROUP BY `featureId`";
		$sql= $mysql->query($str);
		while($result = $mysql->fetch_assoc_mine($sql))
		{
			$feature=FEATURE::getDetails($result['featureId']);
			echo "<table width='100%' border='0' cellspacing='0' cellpadding='5'>";
			echo "<tr>
			<td class='headerTitle' colspan='2'>".getRealDataNoHTML($feature['name'])."
			</td>
			</tr>
			</table>";
		  	$str1="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_sitemap` WHERE `status` = '1' AND `featureId` = '".$result['featureId']."' ORDER BY `name` DESC";
			$sql1= $mysql->query($str1); 
			$maparray=array();
			$featureChild=array();
			while($result1 = $mysql->fetch_assoc_mine($sql1))
			{
			  	array_push($maparray, $result1['name']);
				array_push($featureChild, $result1['featureChildId']);
			}
			
			$rmd=floor((sizeof($maparray) / 2)) + 1;
			$countr=0;
			echo "<table width='70%' border='0' cellspacing='2' cellpadding='5'>";
			for($count=0;$count<$rmd;$count++)
			{
				if(strlen($maparray[$countr])>0)
				{
					$class="cellType1";
					echo "<tr>
					<td width='50%'>";
					if(strlen($maparray[$countr]))
					{
						echo "&nbsp;&nbsp;&#8226;&nbsp;&nbsp;<a href='index.php?fid=".$result['featureId']."&fiid=".$featureChild[$countr]."'>".$maparray[$countr++]."</a>";
					}
					$class="cellType2";
					echo "</td>
					<td >";
					if(strlen($maparray[$countr]))
					{
						echo "&nbsp;&nbsp;&#8226;&nbsp;&nbsp;<a href='index.php?fid=".$result['featureId']."&fiid=".$featureChild[$countr]."'>".$maparray[$countr++]."</a>";
					}
					echo "</td></tr>";
				}
					
			}
			echo "</table>";	
			
		  
		}
	?>	<br /><br />

	</td>
	  </tr>
  </table>