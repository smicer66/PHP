<?php



?>

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="objectivePreviewTable">
  <tr>
    <td class="textHeaderStyle2 bgHeaderCell" ><img src="images/154.png" width="16" height="16" />&nbsp;&nbsp;&nbsp;My Newsletters</td>
  </tr>
</table>
	<table width="90%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="17%"><span class="textBodyStyle3">Title:</span></td>
        <td ><?php echo $newsLetterDet['title'];?></td>
      </tr>
      <tr>
        <td class="cell_seperator">&nbsp;</td>
        <td class="cell_seperator">&nbsp;</td>
      </tr>
      <tr>
        <td><span class="textBodyStyle3">Date Sent:</span></td>
        <td><?php echo getDateInWords($newsLetterDet['dateOfPublication']);?></td>
      </tr>
      <tr>
        <td class="cell_seperator">&nbsp;</td>
        <td class="cell_seperator">&nbsp;</td>
      </tr>
      <tr>
        <td><span class="textBodyStyle3">Read:</span></td>
        <td><?php echo $newsLetterDet['contentsHtml'];?></td>
      </tr>
    </table>
