<?php
	if($name==NULL)
	{
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `status` = '1' AND fpYes = '1' LIMIT 1, 0";
	}
	else
	{
		$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_newsletter` WHERE `name` = '".$name."' LIMIT 1, 0";
	}
	$sql= $mysql->query($str);
	while($result = $mysql->fetch_assoc_mine($sql))
	{
?>		
			<table width='100%' border='0' cellspacing='0' cellpadding='0'>
			<?php
			
			echo PORTLET::displayHeader($result['title'], "");
			?>
			<tr>
			<td colspan='5' class='portletBorder'><div class='fpPortletDisplay'>
			<?php
			
			echo adjustImageUrlToViewLife(getRealDataNoHTML($result['fpText']));
			?>
			</div><div class='readMore'>&nbsp;<br /><strong>[+]</strong>&nbsp;&nbsp;
			<?Php
			echo "<a href='index.php?fid=".FEATURE::getId('Newsletter').'&fiid='.$result['id']."'>Read More</a>";?>
			&nbsp;&nbsp;</div></td></tr>
			</table>
<?php
	}
?>