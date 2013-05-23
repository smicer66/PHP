<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader($title, "");
?>
<tr>
<td colspan='5' class='onlyBorderAlone defaultBgColor'><div class='fpPortletDisplay'><br />
<?php

echo adjustImageUrlToViewLife(truncateText(getRealDataNoHTML($resultX['frontPageContents']), 170));
?>
</div><div class='readMore'>&nbsp;<br /><strong>[+]</strong>&nbsp;&nbsp;
<?Php
echo "<a href='index.php?fid=".$featureDetails['id'].'&fiid='.$resultX['id']."'>Read More</a>";?>
&nbsp;&nbsp;</div><br /></td></tr>
</table>
