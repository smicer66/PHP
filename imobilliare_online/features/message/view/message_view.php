<?php
$msgDetails=MESSAGE::getMessageDetails($_REQUEST['fiid']);
$userDetailsSource=USER::getUserDetails($msgDetails['source_id']);
$userDetailsRecp=USER::getUserDetails($msgDetails['receipient_id']);
$projectListingDetails=PROJECT::getProjectDetails($msgDetails['project_id']);
?>
<table width='651' border='0' cellspacing='0' cellpadding='0'>
<?php

echo PORTLET::displayHeader("View Message:", "");
?>
</table>

<table width="651" border="0" cellpadding="0" cellspacing="0">
  <tr>
    
    <td bgcolor="#FFFCEC" class="tdstyle152" style="border:#CCCCCC 1px solid"><u><br>
      </u>
        <table width='495' border='0' cellpadding='0' cellspacing='0' bgcolor="#F9FAFD" class='tdstyle20'>
          <tr>
            <td width="100" align='center' valign='middle' class="tdstyle21b" style="font-size:13px"><strong>From:</strong></td>
            <td width="395" align='center' valign='middle' class="tdstyle21c" style="font-size:13px"><?php echo $userDetailsSource['username'];?></td>
          </tr>
          <tr>
            <td width="100" align='center' valign='middle' class="tdstyle21b" style="font-size:13px"><strong>To:</strong></td>
            <td width="395" align='center' valign='middle' class="tdstyle21c" style="font-size:13px"><?php echo $userDetailsRecp['username'];?></td>
          </tr>
          <tr>
            <td align='center' valign='middle' class="tdstyle21b" style="font-size:13px"><strong>Date Sent: </strong></td>
            <td align='center' valign='middle' class="tdstyle21c" style="font-size:13px"><?php echo $msgDetails['creation_date'];?></td>
          </tr>
          <tr>
            <td align='center' valign='middle' class="tdstyle21b" style="font-size:13px"><strong>Subject:</strong></td>
            <td align='center' valign='middle' class="tdstyle21c" style="font-size:13px"><?php echo $msgDetails['subject'];?></td>
          </tr>
		  
		  <tr>
			<td align='center' valign='middle' class='tdstyle21b' style="font-size:13px"><strong>Project:</strong></td>
			<td align='center' valign='middle' class='tdstyle21c' style="font-size:13px"><?php echo $projectListingDetails['header'];?></td>
		  </tr>
        </table>
			<br>
			<?php
			if($msgDetails['source_id']==$_SESSION['uid'])
			{
			?>
&nbsp;<a href='?fid=<?php echo PROJECT::getId('Message');?>&fiid=<?php echo $projectListingDetails['id'];?>'>Forward</a><br>
<br>
			<?php
			}
			else
			{
			?>
&nbsp;<a href='?fid=<?php echo PROJECT::getId('Message');?>&fiid=<?php echo $projectListingDetails['id'];?>&viewmsgtype=2&compose'>Reply</a><br>
<br>
			<?php
			}
			?>
                <u> </u><span class="style10"><br>
                </span>
                <table width='495' border='0' cellpadding='0' cellspacing='0' bgcolor="#F9FAFD" class='tdstyle20'>
                  <tr>
                    <td colspan="2" align='center' valign='middle' class="tdstyle21b" style="font-size:13px"><strong><u>Message:</u></strong><br>
                        <br>
                        <?php echo $msgDetails['details'];?>
                        <br>
                        <br>
                    </td>
                  </tr>
                </table>
              <span class="style10"><br>
                </span><span class="style10"></span><br>
            </td>
          </tr>
		  
        </table>