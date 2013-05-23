<?php
$str="SELECT * FROM `".DEFAULT_DB_TBL_PREFIX."_contact` WHERE `frontPageYes` = '1' AND `status` = '1'".$extraStr." LIMIT 0, 1";
$sql= $mysql->query($str);
$result = $mysql->fetch_assoc_mine($sql);
echo "<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
$portlet=new Portlet();
if($frontPageTitle==NULL)
{
	$title= getRealDataNoHTML($result['title']);
}
else
{
	$title= $frontPageTitle;
}
echo $portlet->displayHeader($title, "");
echo "
  <tr>
	<td colspan='5' class='portletBorder'><div class='fpPortletDisplay'>";
	echo truncateText(getRealDataNoHTML($result['body']), 20);
	echo "</div><div class='readMore'>&nbsp;<br /><strong>[+]<a href='index.php?linkToFeatureId=".parent::getId('Announcement')."&linkToFeatureChildId=".$result['id']."'>
	Read More</a>&nbsp;&nbsp;</div>";
echo "</td>
  </tr></table>";