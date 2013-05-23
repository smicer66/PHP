<?php
		global $mysql;
		$featureDetails=FEATURE::getDetails('message');
		
			echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
			
			
				echo PORTLET::displayHeader("Subscribe For Messages", "");
				echo "<tr>
			   <td colspan='5' class='portletBorder'><div class='fpPortletDisplay'>";
?>
Get daily updates by sms, email on the most recent available project. Click to subscribe for this service.			  
			  
			  
<?php			  
			  echo "</div><div class='readMore'>&nbsp;<br /><strong>[+]</strong>&nbsp;&nbsp;";
				echo "<a href='index.php?fid=".$featureDetails['id']."'>Join Now</a>";
				echo "&nbsp;&nbsp;</div></td></tr>";
			
			echo '</table>';