<?php

		
?>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader($result['name'], "");
?>
</table>
<table width='100%' border='0' cellspacing='5' cellpadding='5'  class="onlyBorderAlone defaultBgColor">
	<!--<tr>
			<td class='headerTitle' colspan='5' class='portletBorder'><?Php echo getRealDataNoHTML($result['name']);?><br /><br /></td>
			</tr>-->
<tr><div style="width:30">
<td colspan='5'><?php
			echo adjustImageUrlToViewLife(getRealDataNoHTML($result['contents']));
		?><br /><br /></td>
</tr>
		</table>