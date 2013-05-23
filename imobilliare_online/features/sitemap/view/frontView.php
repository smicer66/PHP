<?php
		global $mysql;
		$featureDetails=FEATURE::getDetails('site map');
		
			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
			
			
				echo PORTLET::displayHeader("Site Map", "");
				echo "<tr>
			   <td colspan='5' class='portletBorder'><div class='fpPortletDisplay'>";
?>
Your Easy way to navigate around the portal. Find links to your favorite pages.			  
			  
			  
<?php			  
			  echo "</div><div class='readMore'>&nbsp;<br /><strong>[+]</strong>&nbsp;&nbsp;";
				echo "<a href='index.php?fid=".$featureDetails['id']."'>Go To Site Map</a>";
				echo "&nbsp;&nbsp;</div></td></tr>";
			
			echo '</table>';